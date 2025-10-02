<?php

namespace App\Http\Controllers;

use App\Models\PoliceProvince;
use App\Models\PoliceDivision;
use App\Models\PoliceStation;
use Illuminate\Http\Request;

class PoliceDirectoryController extends Controller
{
    public function index()
    {
        $provinces = PoliceProvince::withCount(['divisions', 'stations'])->get();
        return view('police.index', compact('provinces'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $stations = PoliceStation::where('name', 'like', "%{$query}%")
            ->with(['division.province'])
            ->take(10)
            ->get();

        return response()->json(['stations' => $stations]);
    }

    public function getDivisions($provinceId)
    {
        $province = PoliceProvince::findOrFail($provinceId);
        $divisions = $province->divisions()->withCount('stations')->get();

        return response()->json([
            'province' => $province,
            'divisions' => $divisions
        ]);
    }

    public function getStations($divisionId)
    {
        $division = PoliceDivision::findOrFail($divisionId);
        $stations = $division->stations()->get();

        return response()->json([
            'division' => $division,
            'stations' => $stations
        ]);
    }

    public function getStation($stationId)
    {
        $station = PoliceStation::with('division.province')->findOrFail($stationId);
        return response()->json($station);
    }
}
