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
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
            'word_file' => 'nullable|file|mimes:doc,docx|max:10240',
            'excel_file' => 'nullable|file|mimes:xls,xlsx|max:10240'
        ]);

        // Ensure at least one file is uploaded
        if (!$request->hasFile('pdf_file') && !$request->hasFile('word_file') && !$request->hasFile('excel_file')) {
            return redirect()->back()->withErrors(['files' => 'At least one file (PDF, Word, or Excel) must be uploaded.']);
        }

        $documentData = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ];

        // Handle PDF file upload
        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');
            $pdfPath = $pdfFile->store('documents/pdf', 'public');
            $documentData['pdf_file_path'] = $pdfPath;
            $documentData['pdf_file_size'] = $pdfFile->getSize();

            // Keep backward compatibility with old file_path column
            if (!isset($documentData['file_path'])) {
                $documentData['file_path'] = $pdfPath;
            }
        }

        // Handle Word file upload
        if ($request->hasFile('word_file')) {
            $wordFile = $request->file('word_file');
            $wordPath = $wordFile->store('documents/word', 'public');
            $documentData['word_file_path'] = $wordPath;
            $documentData['word_file_size'] = $wordFile->getSize();

            // Keep backward compatibility with old file_path column
            if (!isset($documentData['file_path'])) {
                $documentData['file_path'] = $wordPath;
            }
        }

        // Handle Excel file upload
        if ($request->hasFile('excel_file')) {
            $excelFile = $request->file('excel_file');
            $excelPath = $excelFile->store('documents/excel', 'public');
            $documentData['excel_file_path'] = $excelPath;
            $documentData['excel_file_size'] = $excelFile->getSize();

            // Keep backward compatibility with old file_path column
            if (!isset($documentData['file_path'])) {
                $documentData['file_path'] = $excelPath;
            }
        }

        Document::create($documentData);

        $uploadedTypes = [];
        if ($request->hasFile('pdf_file')) $uploadedTypes[] = 'PDF';
        if ($request->hasFile('word_file')) $uploadedTypes[] = 'Word';
        if ($request->hasFile('excel_file')) $uploadedTypes[] = 'Excel';

        $message = 'Document uploaded successfully with ' . implode(', ', $uploadedTypes) . ' file(s)!';

        return redirect()->back()->with('success', $message);
    }

    public function destroy(Document $document)
    {
        // Delete all associated files
        if ($document->pdf_file_path) {
            Storage::disk('public')->delete($document->pdf_file_path);
        }
        if ($document->word_file_path) {
            Storage::disk('public')->delete($document->word_file_path);
        }
        if ($document->excel_file_path) {
            Storage::disk('public')->delete($document->excel_file_path);
        }

        // Delete old file_path for backward compatibility
        if ($document->file_path) {
            Storage::disk('public')->delete($document->file_path);
        }

        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully!');
    }

    public function policeDocuments()
    {
        try {
            $category = \App\Models\Category::where('name', 'police')->first();

            if ($category) {
                $documents = Document::where('category_id', $category->id)
                    ->with(['subcategory'])
                    ->orderByDesc('created_at')
                    ->paginate(15);

                $subcategories = $category->subcategories()->with('documents')->get();
            } else {
                $documents = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
                $subcategories = collect();
            }
        } catch (\Exception $e) {
            $documents = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
            $subcategories = collect();
        }

        return view('documents.police', compact('documents', 'subcategories'));
    }

    public function index()
    {
        $categories = Category::with(['subcategories.documents', 'documents'])
            ->orderBy('name')
            ->get();
        return view('documents.index', compact('categories'));
    }

    public function lawDocuments()
    {
        try {
            $category = \App\Models\Category::where('name', 'law')->first();

            if ($category) {
                $documents = Document::where('category_id', $category->id)
                    ->with(['subcategory'])
                    ->orderByDesc('created_at')
                    ->paginate(15);

                $subcategories = $category->subcategories()->with('documents')->get();
            } else {
                $documents = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
                $subcategories = collect();
            }
        } catch (\Exception $e) {
            $documents = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
            $subcategories = collect();
        }

        return view('documents.law', compact('documents', 'subcategories'));
    }

    public function download(Document $document, $type = null)
    {
        $filePath = null;
        $extension = '';

        // Determine which file to download based on type parameter
        switch ($type) {
            case 'pdf':
                $filePath = $document->pdf_file_path;
                $extension = 'pdf';
                break;
            case 'word':
                $filePath = $document->word_file_path;
                $extension = pathinfo($filePath ?? '', PATHINFO_EXTENSION) ?: 'doc';
                break;
            case 'excel':
                $filePath = $document->excel_file_path;
                $extension = pathinfo($filePath ?? '', PATHINFO_EXTENSION) ?: 'xlsx';
                break;
            default:
                // If no type specified, download the first available file
                if ($document->pdf_file_path) {
                    $filePath = $document->pdf_file_path;
                    $extension = 'pdf';
                } elseif ($document->word_file_path) {
                    $filePath = $document->word_file_path;
                    $extension = pathinfo($document->word_file_path, PATHINFO_EXTENSION);
                } elseif ($document->excel_file_path) {
                    $filePath = $document->excel_file_path;
                    $extension = pathinfo($document->excel_file_path, PATHINFO_EXTENSION);
                } else {
                    // Fallback to old file_path
                    $filePath = $document->file_path;
                    $extension = pathinfo($filePath ?? '', PATHINFO_EXTENSION);
                }
                break;
        }

        if (!$filePath || !Storage::disk('public')->exists($filePath)) {
            abort(404, 'File not found.');
        }

        $filename = $document->title . '.' . $extension;
        return response()->download(storage_path('app/public/' . $filePath), $filename);
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

    // Show documents for a given category (except law/police, which have their own pages)
    public function categoryDocuments($id)
    {
        $category = Category::findOrFail($id);

        // Redirect to law/police pages if needed
        if ($category->name === 'law') {
            return redirect()->route('documents.law');
        }
        if ($category->name === 'police') {
            return redirect()->route('documents.police');
        }

        $documents = Document::where('category_id', $category->id)->orderByDesc('created_at')->paginate(10);

        return view('documents.category', compact('category', 'documents'));
    }

    public function policeDocumentsBySubcategory($subcategory)
    {
        try {
            $category = \App\Models\Category::where('name', 'police')->first();
            $subcategoryModel = \App\Models\Subcategory::where('id', $subcategory)
                ->orWhere('name', $subcategory)
                ->first();

            if ($category && $subcategoryModel) {
                $documents = Document::where('category_id', $category->id)
                    ->where('subcategory_id', $subcategoryModel->id)
                    ->with(['subcategory'])
                    ->orderByDesc('created_at')
                    ->paginate(15);

                $subcategories = $category->subcategories()->with('documents')->get();
            } else {
                $documents = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
                $subcategories = collect();
                $subcategoryModel = null;
            }
        } catch (\Exception $e) {
            $documents = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
            $subcategories = collect();
            $subcategoryModel = null;
        }

        return view('documents.police', compact('documents', 'subcategories', 'subcategoryModel'));
    }

    public function lawDocumentsBySubcategory($subcategory)
    {
        try {
            $category = \App\Models\Category::where('name', 'law')->first();
            $subcategoryModel = \App\Models\Subcategory::where('id', $subcategory)
                ->orWhere('name', $subcategory)
                ->first();

            if ($category && $subcategoryModel) {
                $documents = Document::where('category_id', $category->id)
                    ->where('subcategory_id', $subcategoryModel->id)
                    ->with(['subcategory'])
                    ->orderByDesc('created_at')
                    ->paginate(15);

                $subcategories = $category->subcategories()->with('documents')->get();
            } else {
                $documents = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
                $subcategories = collect();
                $subcategoryModel = null;
            }
        } catch (\Exception $e) {
            $documents = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
            $subcategories = collect();
            $subcategoryModel = null;
        }

        return view('documents.law', compact('documents', 'subcategories', 'subcategoryModel'));
    }
}
