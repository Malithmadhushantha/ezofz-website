<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:law,police',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $file = $request->file('file');
        $path = $file->store('documents', 'public');

        Document::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'file_path' => $path
        ]);

        return redirect()->back()->with('success', 'Document uploaded successfully!');
    }

    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully!');
    }

    public function policeDocuments()
    {
        try {
            $documents = Document::where('category', 'police')
                ->orderByDesc('created_at')
                ->paginate(10);
        } catch (\Exception $e) {
            $documents = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
        }

        return view('documents.police', compact('documents'));
    }

    public function index()
    {
        // For SEO and ads, you can pass meta data as needed
        return view('documents.index');
    }

    public function lawDocuments()
    {
        try {
            $documents = Document::where('category', 'law')
                ->orderByDesc('created_at')
                ->paginate(10);
        } catch (\Exception $e) {
            $documents = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
        }

        return view('documents.law', compact('documents'));
    }

    public function download(Document $document)
    {
        $filePath = $document->file_path;
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'File not found.');
        }
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $filename = $document->title . '.' . $extension;
        return Storage::disk('public')->download($filePath, $filename);
    }
}
