<?php

namespace App\Http\Controllers;

use App\Models\CriminalProcedureCode;
use App\Models\CriminalProcedureCodeNote;
use App\Models\CriminalProcedureCodeStarredSection;
use App\Models\CriminalProcedureCodeLikedSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CriminalProcedureCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['publicIndex', 'publicShow']);
    }

    public function publicIndex(Request $request)
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
        return view('criminal-procedure-code.public', compact('sections'));
    }

    public function publicShow(CriminalProcedureCode $section)
    {
        return view('criminal-procedure-code.public-show', compact('section'));
    }

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

        $userNotes = CriminalProcedureCodeNote::where('user_id', Auth::id())
            ->pluck('note', 'criminal_procedure_codes_section_id');

        $starredSections = CriminalProcedureCodeStarredSection::where('user_id', Auth::id())
            ->pluck('criminal_procedure_codes_section_id');

        $likedSections = CriminalProcedureCodeLikedSection::where('user_id', Auth::id())
            ->pluck('criminal_procedure_codes_section_id');        return view('criminal-procedure-code.index', compact('sections', 'userNotes', 'starredSections', 'likedSections'));
    }

    public function show(CriminalProcedureCode $section)
    {
        $userNote = CriminalProcedureCodeNote::where('user_id', Auth::id())
                           ->where('criminal_procedure_codes_section_id', $section->id)
                           ->first();

        $isStarred = CriminalProcedureCodeStarredSection::where('user_id', Auth::id())
                                  ->where('criminal_procedure_codes_section_id', $section->id)
                                  ->exists();

        $isLiked = CriminalProcedureCodeLikedSection::where('user_id', Auth::id())
                               ->where('criminal_procedure_codes_section_id', $section->id)
                               ->exists();

        return view('criminal-procedure-code.show', compact('section', 'userNote', 'isStarred', 'isLiked'));
    }

    public function toggleStar(CriminalProcedureCode $section)
    {
        $starred = CriminalProcedureCodeStarredSection::where('user_id', Auth::id())
            ->where('criminal_procedure_codes_section_id', $section->id)
            ->first();

        if ($starred) {
            $starred->delete();
            $isStarred = false;
            $message = 'Section removed from starred';
        } else {
            CriminalProcedureCodeStarredSection::create([
                'user_id' => Auth::id(),
                'criminal_procedure_codes_section_id' => $section->id
            ]);
            $isStarred = true;
            $message = 'Section added to starred';
        }

        return response()->json([
            'message' => $message,
            'isStarred' => $isStarred
        ]);
    }

    public function toggleLike(CriminalProcedureCode $section)
    {
        $liked = CriminalProcedureCodeLikedSection::where('user_id', Auth::id())
            ->where('criminal_procedure_codes_section_id', $section->id)
            ->first();

        if ($liked) {
            $liked->delete();
            $isLiked = false;
            $message = 'Like removed';
        } else {
            CriminalProcedureCodeLikedSection::create([
                'user_id' => Auth::id(),
                'criminal_procedure_codes_section_id' => $section->id
            ]);
            $isLiked = true;
            $message = 'Section liked';
        }

        return response()->json([
            'message' => $message,
            'isLiked' => $isLiked
        ]);
    }

    public function saveNote(Request $request, CriminalProcedureCode $section)
    {
        try {
            $request->validate([
                'note' => 'required|string|max:1000'
            ]);

            CriminalProcedureCodeNote::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'criminal_procedure_codes_section_id' => $section->id
                ],
                ['note' => $request->note]
            );

            return response()->json(['message' => 'Note saved successfully']);
        } catch (\Exception $e) {
            \Log::error('CriminalProcedureCodeController saveNote error: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'section_id' => $section->id,
                'note' => $request->note,
                'exception' => $e
            ]);
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function deleteNote(CriminalProcedureCode $section)
    {
        try {
            $deleted = CriminalProcedureCodeNote::where('user_id', Auth::id())
                ->where('criminal_procedure_codes_section_id', $section->id)
                ->delete();

            if ($deleted) {
                return response()->json(['message' => 'Note deleted successfully']);
            } else {
                return response()->json(['message' => 'Note not found'], 404);
            }
        } catch (\Exception $e) {
            \Log::error('CriminalProcedureCodeController deleteNote error: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'section_id' => $section->id,
                'exception' => $e
            ]);
            return response()->json(['message' => 'Error deleting note: ' . $e->getMessage()], 500);
        }
    }
}
