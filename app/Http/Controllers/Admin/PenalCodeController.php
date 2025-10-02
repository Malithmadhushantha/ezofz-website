<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PenalCodeSection;
use App\Models\PenalCodeAmendment;
use Illuminate\Http\Request;

class PenalCodeController extends Controller
{
    public function index()
    {
        $sections = PenalCodeSection::orderBy('chapter_name')
            ->orderBy('section_number')
            ->paginate(10);

        return view('admin.penal-code.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.penal-code.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'chapter_name' => 'required|string|max:255',
            'sub_chapter_name' => 'nullable|string|max:255',
            'section_number' => 'required|string|max:50',
            'sub_section_number' => 'nullable|string|max:50',
            'name_of_the_section' => 'required|string|max:255',
            'section_content' => 'required|string',
            'illustrations_1' => 'nullable|string',
            'illustrations_2' => 'nullable|string',
            'illustrations_3' => 'nullable|string',
            'explanation_1' => 'nullable|string',
            'explanation_2' => 'nullable|string',
            'explanation_3' => 'nullable|string',
        ]);

        PenalCodeSection::create($validated);

        return redirect()->route('admin.penal-code.index')
            ->with('success', 'Section added successfully');
    }

    public function edit(PenalCodeSection $section)
    {
        return view('admin.penal-code.edit', compact('section'));
    }

    public function update(Request $request, PenalCodeSection $section)
    {
        $validated = $request->validate([
            'chapter_name' => 'required|string|max:255',
            'sub_chapter_name' => 'nullable|string|max:255',
            'section_number' => 'required|string|max:50',
            'sub_section_number' => 'nullable|string|max:50',
            'name_of_the_section' => 'required|string|max:255',
            'section_content' => 'required|string',
            'illustrations_1' => 'nullable|string',
            'illustrations_2' => 'nullable|string',
            'illustrations_3' => 'nullable|string',
            'explanation_1' => 'nullable|string',
            'explanation_2' => 'nullable|string',
            'explanation_3' => 'nullable|string',
        ]);

        $section->update($validated);

        return redirect()->route('admin.penal-code.index')
            ->with('success', 'Section updated successfully');
    }

    public function createAmendment(PenalCodeSection $section)
    {
        return view('admin.penal-code.create-amendment', compact('section'));
    }

    public function storeAmendment(Request $request, PenalCodeSection $section)
    {
        $validated = $request->validate([
            'amendment_number' => 'required|string|max:50',
            'amendment_date' => 'required|date',
            'amendment_content' => 'required|string',
            'illustrations_1' => 'nullable|string',
            'illustrations_2' => 'nullable|string',
            'illustrations_3' => 'nullable|string',
            'explanation_1' => 'nullable|string',
            'explanation_2' => 'nullable|string',
            'explanation_3' => 'nullable|string',
        ]);

        $section->amendments()->create($validated);

        return redirect()->route('admin.penal-code.index')
            ->with('success', 'Amendment added successfully');
    }

    public function showAmendments(PenalCodeSection $section)
    {
        $amendments = $section->amendments()->orderBy('amendment_date', 'desc')->get();
        return view('admin.penal-code.amendments', compact('section', 'amendments'));
    }

    public function destroy(PenalCodeSection $section)
    {
        $section->delete();
        return redirect()->route('admin.penal-code.index')
            ->with('success', 'Section deleted successfully');
    }
}
