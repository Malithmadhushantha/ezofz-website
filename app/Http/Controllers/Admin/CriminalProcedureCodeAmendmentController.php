<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CriminalProcedureCode;
use App\Models\CriminalProcedureCodeAmendment;
use Illuminate\Http\Request;

class CriminalProcedureCodeAmendmentController extends Controller
{
    public function create(CriminalProcedureCode $section)
    {
        return view('admin.criminal-procedure-code.create-amendment', compact('section'));
    }

    public function store(Request $request, CriminalProcedureCode $section)
    {
        $validatedData = $request->validate([
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

        $section->amendments()->create($validatedData);

        return redirect()->route('admin.criminal-procedure-code.edit', $section)
            ->with('success', 'Amendment added successfully.');
    }

    public function edit(CriminalProcedureCode $section, CriminalProcedureCodeAmendment $amendment)
    {
        return view('admin.criminal-procedure-code.edit-amendment', compact('section', 'amendment'));
    }

    public function update(Request $request, CriminalProcedureCode $section, CriminalProcedureCodeAmendment $amendment)
    {
        $validatedData = $request->validate([
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

        $amendment->update($validatedData);

        return redirect()->route('admin.criminal-procedure-code.edit', $section)
            ->with('success', 'Amendment updated successfully.');
    }

    public function destroy(CriminalProcedureCode $section, CriminalProcedureCodeAmendment $amendment)
    {
        $amendment->delete();
        return redirect()->route('admin.criminal-procedure-code.edit', $section)
            ->with('success', 'Amendment deleted successfully.');
    }
}
