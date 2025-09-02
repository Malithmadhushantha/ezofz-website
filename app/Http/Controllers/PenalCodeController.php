<?php

namespace App\Http\Controllers;

use App\Models\PenalCodeSection;
use App\Models\UserNote;
use App\Models\StarredSection;
use App\Models\LikedSection;
use Illuminate\Http\Request;

class PenalCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['publicIndex']);
    }
    public function publicIndex(Request $request)
    {
        $query = PenalCodeSection::with(['amendments' => function ($query) {
            $query->orderBy('amendment_date', 'desc');
        }]);

        // Search functionality
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('section_number', 'like', "%{$search}%")
                  ->orWhere('name_of_the_section', 'like', "%{$search}%")
                  ->orWhere('section_content', 'like', "%{$search}%");
            });
        }

        // Filter by section number if provided
        if ($request->has('section_number')) {
            $query->where('section_number', $request->section_number);
        }

        $sections = $query->orderBy('section_number')->paginate(10);

        return view('penal-code.public', compact('sections'));
    }

    public function index(Request $request)
    {
        $query = PenalCodeSection::with(['amendments' => function ($query) {
            $query->orderBy('amendment_date', 'desc');
        }]);

        // Enhanced Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $searchType = $request->search_type ?? 'all';

            $query->where(function($q) use ($search, $searchType) {
                // Search based on selected type
                switch ($searchType) {
                    case 'section_number':
                        $q->where('section_number', 'like', "%{$search}%");
                        break;
                    case 'section_name':
                        $q->where('name_of_the_section', 'like', "%{$search}%");
                        break;
                    case 'chapter':
                        $q->where('chapter_name', 'like', "%{$search}%")
                          ->orWhere('sub_chapter_name', 'like', "%{$search}%");
                        break;
                    case 'content':
                        $q->where('section_content', 'like', "%{$search}%")
                          ->orWhere('illustrations_1', 'like', "%{$search}%")
                          ->orWhere('illustrations_2', 'like', "%{$search}%")
                          ->orWhere('illustrations_3', 'like', "%{$search}%")
                          ->orWhere('explanation_1', 'like', "%{$search}%")
                          ->orWhere('explanation_2', 'like', "%{$search}%")
                          ->orWhere('explanation_3', 'like', "%{$search}%");
                        break;
                    default: // 'all'
                        $q->where('section_number', 'like', "%{$search}%")
                          ->orWhere('name_of_the_section', 'like', "%{$search}%")
                          ->orWhere('chapter_name', 'like', "%{$search}%")
                          ->orWhere('sub_chapter_name', 'like', "%{$search}%")
                          ->orWhere('section_content', 'like', "%{$search}%")
                          ->orWhere('illustrations_1', 'like', "%{$search}%")
                          ->orWhere('illustrations_2', 'like', "%{$search}%")
                          ->orWhere('illustrations_3', 'like', "%{$search}%")
                          ->orWhere('explanation_1', 'like', "%{$search}%")
                          ->orWhere('explanation_2', 'like', "%{$search}%")
                          ->orWhere('explanation_3', 'like', "%{$search}%");
                        break;
                }
            });
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('section_number', 'like', "%{$search}%")
                  ->orWhere('name_of_the_section', 'like', "%{$search}%")
                  ->orWhere('section_content', 'like', "%{$search}%");
            });
        }

        // Filter by section number if provided
        if ($request->has('section_number')) {
            $query->where('section_number', $request->section_number);
        }

        $sections = $query->orderBy('section_number')->paginate(10);

        // Get user's starred and liked sections
        $userId = auth()->id();
        $starredSections = StarredSection::where('user_id', $userId)->pluck('section_id')->toArray();
        $likedSections = LikedSection::where('user_id', $userId)->pluck('section_id')->toArray();
        $userNotes = UserNote::where('user_id', $userId)->pluck('note', 'section_id')->toArray();

        return view('penal-code.index', compact('sections', 'starredSections', 'likedSections', 'userNotes'));
    }

    public function show(PenalCodeSection $section)
    {
        $userId = auth()->id();

        // Get user-specific data
        $isStarred = StarredSection::where('user_id', $userId)
                                  ->where('section_id', $section->id)
                                  ->exists();

        $isLiked = LikedSection::where('user_id', $userId)
                               ->where('section_id', $section->id)
                               ->exists();

        $userNote = UserNote::where('user_id', $userId)
                           ->where('section_id', $section->id)
                           ->value('note');

        return view('penal-code.show', compact('section', 'isStarred', 'isLiked', 'userNote'));
    }

    public function saveNote(Request $request, PenalCodeSection $section)
    {
        try {
            $request->validate([
                'note' => 'required|string|max:1000'
            ]);

            UserNote::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'section_id' => $section->id,
                    'type' => 'penal-code'
                ],
                ['note' => $request->note]
            );

            return response()->json(['message' => 'Note saved successfully']);
        } catch (\Exception $e) {
            \Log::error('PenalCodeController saveNote error: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'section_id' => $section->id,
                'note' => $request->note,
                'exception' => $e
            ]);
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function toggleStar(PenalCodeSection $section)
    {
        $userId = auth()->id();

        $starred = StarredSection::where('user_id', $userId)
            ->where('section_id', $section->id)
            ->first();

        if ($starred) {
            $starred->delete();
            $message = 'Section removed from starred';
            $isStarred = false;
        } else {
            StarredSection::create([
                'user_id' => $userId,
                'section_id' => $section->id
            ]);
            $message = 'Section added to starred';
            $isStarred = true;
        }

        return response()->json([
            'message' => $message,
            'isStarred' => $isStarred
        ]);
    }

    public function toggleLike(PenalCodeSection $section)
    {
        $userId = auth()->id();

        $liked = LikedSection::where('user_id', $userId)
            ->where('section_id', $section->id)
            ->first();

        if ($liked) {
            $liked->delete();
            $message = 'Like removed';
            $isLiked = false;
        } else {
            LikedSection::create([
                'user_id' => $userId,
                'section_id' => $section->id
            ]);
            $message = 'Section liked';
            $isLiked = true;
        }

        return response()->json([
            'message' => $message,
            'isLiked' => $isLiked
        ]);
    }

    public function deleteNote(PenalCodeSection $section)
    {
        $note = UserNote::where('user_id', auth()->id())
            ->where('section_id', $section->id)
            ->first();

        if ($note) {
            $note->delete();
            return response()->json(['message' => 'Note deleted successfully']);
        }

        return response()->json(['message' => 'Note not found'], 404);
    }
}
