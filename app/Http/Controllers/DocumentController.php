<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function categories()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name'
        ]);
        Category::create(['name' => $request->name]);
        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $file = $request->file('file');
        $path = $file->store('documents', 'public');

        Document::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
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
            $category = \App\Models\Category::where('name', 'police')->first();
            $documents = $category
                ? Document::where('category_id', $category->id)->orderByDesc('created_at')->paginate(10)
                : new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
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
            $category = \App\Models\Category::where('name', 'law')->first();
            $documents = $category
                ? Document::where('category_id', $category->id)->orderByDesc('created_at')->paginate(10)
                : new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
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

    // Show form to edit a document
    public function edit(Document $document)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.edit_document', compact('document', 'categories'));
    }

    // Update a document
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $data = $request->only(['title', 'description', 'category_id']);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($document->file_path);
            $data['file_path'] = $request->file('file')->store('documents', 'public');
        }

        $document->update($data);

        return redirect()->route('admin.documents')->with('success', 'Document updated successfully!');
    }
}
