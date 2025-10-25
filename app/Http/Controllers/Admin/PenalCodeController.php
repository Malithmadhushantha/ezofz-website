<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PenalCodeSection;
use App\Models\PenalCodeAmendment;
use Illuminate\Http\Request;

class PenalCodeController extends Controller
{
    public function index(Request $request)
    {
        $query = PenalCodeSection::with(['amendments']);

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('section_number', 'like', "%{$search}%")
                  ->orWhere('name_of_the_section', 'like', "%{$search}%")
                  ->orWhere('chapter_name', 'like', "%{$search}%")
                  ->orWhere('sub_chapter_name', 'like', "%{$search}%");
            });
        }

        // Get all sections and sort them properly
        $sections = $query->get()->sortBy(function($section) {
            // Convert section number to proper numerical sorting
            $parts = explode('.', $section->section_number);
            $sortKey = '';
            foreach ($parts as $part) {
                $sortKey .= str_pad((int)$part, 10, '0', STR_PAD_LEFT) . '.';
            }
            return $sortKey;
        });

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

    public function overview()
    {
        // Get all sections grouped by chapter for overview
        $sections = PenalCodeSection::orderBy('chapter_name')
            ->orderBy('sub_chapter_name')
            ->get()
            ->sortBy(function($section) {
                // Convert section number to proper numerical sorting
                $parts = explode('.', $section->section_number);
                $sortKey = '';
                foreach ($parts as $part) {
                    $sortKey .= str_pad((int)$part, 10, '0', STR_PAD_LEFT) . '.';
                }
                return $sortKey;
            })
            ->groupBy('chapter_name');

        // Get statistics
        $totalSections = PenalCodeSection::count();
        $totalChapters = PenalCodeSection::distinct('chapter_name')->count();
        $sectionsWithAmendments = PenalCodeSection::has('amendments')->count();

        return view('admin.penal-code.overview', compact('sections', 'totalSections', 'totalChapters', 'sectionsWithAmendments'));
    }
}
