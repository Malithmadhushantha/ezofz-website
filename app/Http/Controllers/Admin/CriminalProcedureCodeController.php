<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CriminalProcedureCode;
use App\Models\CriminalProcedureAmendment;
use Illuminate\Http\Request;

class CriminalProcedureCodeController extends Controller
{
    public function index(Request $request)
    {
        $query = CriminalProcedureCode::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('chapter_name', 'like', "%{$search}%")
                  ->orWhere('section_number', 'like', "%{$search}%")
                  ->orWhere('name_of_the_section', 'like', "%{$search}%")
                  ->orWhere('section_content', 'like', "%{$search}%");
            });
        }

        $sections = $query->orderBy('section_number')->paginate(15);
        return view('admin.criminal-procedure-code.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.criminal-procedure-code.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
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

        CriminalProcedureCode::create($validatedData);

        return redirect()->route('admin.criminal-procedure-code.index')
            ->with('success', 'Section added successfully.');
    }

    public function edit(CriminalProcedureCode $section)
    {
        return view('admin.criminal-procedure-code.edit', compact('section'));
    }

    public function update(Request $request, CriminalProcedureCode $section)
    {
        $validatedData = $request->validate([
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

        $section->update($validatedData);

        return redirect()->route('admin.criminal-procedure-code.index')
            ->with('success', 'Section updated successfully.');
    }

    public function destroy(CriminalProcedureCode $section)
    {
        $section->delete();
        return redirect()->route('admin.criminal-procedure-code.index')
            ->with('success', 'Section deleted successfully.');
    }

    /**
     * Show the form for creating a new amendment.
     */
    public function createAmendment(CriminalProcedureCode $section)
    {
        return view('admin.criminal-procedure-code.create-amendment', compact('section'));
    }

    /**
     * Store a new amendment.
     */
    public function storeAmendment(Request $request, CriminalProcedureCode $section)
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

        return redirect()
            ->route('admin.criminal-procedure-code.index')
            ->with('success', 'Amendment added successfully.');
    }

    /**
     * Show amendments for a section.
     */
    public function showAmendments(CriminalProcedureCode $section)
    {
        $amendments = $section->amendments()->orderBy('amendment_date', 'desc')->get();
        return view('admin.criminal-procedure-code.amendments', compact('section', 'amendments'));
    }
}
