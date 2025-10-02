<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PoliceProvince;
use App\Models\PoliceDivision;
use App\Models\PoliceStation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PoliceDirectoryController extends Controller
{
    public function index()
    {
        $provinces = PoliceProvince::withCount(['divisions', 'stations'])->get();
        return view('admin.police.index', compact('provinces'));
    }

    public function createDivision()
    {
        $provinces = PoliceProvince::all();
        return view('admin.police.divisions.create', compact('provinces'));
    }

    public function storeDivision(Request $request)
    {
        $validated = $request->validate([
            'province_id' => 'required|exists:police_provinces,id',
            'name' => 'required|string|max:255|unique:police_divisions'
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        PoliceDivision::create($validated);

        return redirect()->route('admin.police.index')
            ->with('success', 'Police Division created successfully.');
    }

    public function createStation()
    {
        $divisions = PoliceDivision::with('province')->get();
        return view('admin.police.stations.create', compact('divisions'));
    }

    public function storeStation(Request $request)
    {
        $validated = $request->validate([
            'division_id' => 'required|exists:police_divisions,id',
            'name' => 'required|string|max:255',
            'oic_mobile' => 'nullable|string|max:20',
            'office_phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric'
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        PoliceStation::create($validated);

        return redirect()->route('admin.police.index')
            ->with('success', 'Police Station created successfully.');
    }

    public function editStation(PoliceStation $station)
    {
        $divisions = PoliceDivision::with('province')->get();
        return view('admin.police.stations.edit', compact('station', 'divisions'));
    }

    public function updateStation(Request $request, PoliceStation $station)
    {
        $validated = $request->validate([
            'division_id' => 'required|exists:police_divisions,id',
            'name' => 'required|string|max:255',
            'oic_mobile' => 'nullable|string|max:20',
            'office_phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric'
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $station->update($validated);

        return redirect()->route('admin.police.index')
            ->with('success', 'Police Station updated successfully.');
    }

    public function destroyStation(PoliceStation $station)
    {
        $station->delete();
        return redirect()->route('admin.police.index')
            ->with('success', 'Police Station deleted successfully.');
    }
}
