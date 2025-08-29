@extends('admin.layouts.admin')

@section('title', 'Document Management - EZofz.lk')
@section('page-title', 'Document Management')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.categories') }}" class="btn btn-outline-primary mb-3">
        <i class="bi bi-tags"></i> Manage Categories
    </a>
</div>
<div class="row mb-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-file-text me-2"></i>Upload New Document</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Document Title *</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="category_id" class="form-label">Category *</label>
                            <select class="form-select @error('category_id') is-invalid @enderror"
                                    id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach(\App\Models\Category::orderBy('name')->get() as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="subcategory_id" class="form-label">Subcategory</label>
                            <select class="form-select @error('subcategory_id') is-invalid @enderror"
                                    id="subcategory_id" name="subcategory_id">
                                <option value="">Select Subcategory</option>
                                {{-- Subcategories will be loaded dynamically --}}
                            </select>
                            @error('subcategory_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="file" class="form-label">Document File *</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                   id="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx" required>
                            <div class="form-text">Allowed formats: PDF, DOC, DOCX, XLS, XLSX. Max size: 2MB</div>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-upload me-2"></i>Upload Document
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-bar-chart me-2"></i>Document Statistics</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Total Documents:</span>
                    <span class="fw-bold">{{ $documents->total() }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Law Documents:</span>
                    <span class="fw-bold text-warning">
                        {{
                            \App\Models\Category::where('name', 'law')->first()?->documents()->count() ?? 0
                        }}
                    </span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Police Documents:</span>
                    <span class="fw-bold text-info">
                        {{
                            \App\Models\Category::where('name', 'police')->first()?->documents()->count() ?? 0
                        }}
                    </span>
                </div>
                <hr>
                <p class="text-muted mb-0">Keep your document library organized and up-to-date.</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-folder me-2"></i>All Documents</h5>
        <div class="d-flex gap-2">
            <select class="form-select form-select-sm" id="categoryFilter" style="width: auto;">
                <option value="">All Categories</option>
                @foreach(\App\Models\Category::orderBy('name')->get() as $category)
                    <option value="category-{{ $category->id }}">{{ $category->name }}</option>
                    @foreach($category->subcategories as $sub)
                        <option value="subcategory-{{ $sub->id }}">&nbsp;&nbsp;{{ $sub->name }}</option>
                    @endforeach
                @endforeach
            </select>
        </div>
    </div>
    <div class="card-body">
        @if($documents->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Uploaded</th>
                            <th>File Size</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $document)
                            <tr data-category="{{ optional($document->category)->id ? 'category-' . optional($document->category)->id : '' }}"
                                data-subcategory="{{ optional($document->subcategory)->id ? 'subcategory-' . optional($document->subcategory)->id : '' }}">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-file-text me-2 text-primary"></i>
                                        <strong>{{ $document->title }}</strong>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-muted">{{ Str::limit($document->description, 50) ?: 'No description' }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ optional($document->category)->name }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ optional($document->subcategory)->name ?: '-' }}
                                    </span>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $document->created_at->format('M d, Y') }}</small>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        @if(Storage::exists('public/' . $document->file_path))
                                            {{ round(Storage::size('public/' . $document->file_path) / 1024, 2) }} KB
                                        @else
                                            N/A
                                        @endif
                                    </small>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('documents.edit', $document) }}" class="btn btn-outline-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('documents.destroy', $document) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Are you sure you want to delete this document?')" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $documents->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-file-x display-1 text-muted mb-3"></i>
                <h4 class="text-muted mb-3">No Documents Found</h4>
                <p class="text-muted mb-4">Start building your document library by uploading your first document.</p>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('title').focus()">
                    <i class="bi bi-plus me-2"></i>Upload Your First Document
                </button>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Category filter functionality
    const categoryFilter = document.getElementById('categoryFilter');
    if (categoryFilter) {
        categoryFilter.addEventListener('change', function() {
            const selected = this.value;
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                if (!selected) {
                    row.style.display = '';
                } else if (selected.startsWith('category-')) {
                    row.style.display = row.getAttribute('data-category') === selected ? '' : 'none';
                } else if (selected.startsWith('subcategory-')) {
                    row.style.display = row.getAttribute('data-subcategory') === selected ? '' : 'none';
                } else {
                    row.style.display = '';
                }
            });
        });
    }

    // Subcategory dropdown population
    const categorySelect = document.getElementById('category_id');
    const subcategorySelect = document.getElementById('subcategory_id');
    const allSubcategories = @json(\App\Models\Subcategory::with('category')->get()->groupBy('category_id'));

    function populateSubcategories(categoryId) {
        subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
        if (categoryId && allSubcategories[categoryId]) {
            allSubcategories[categoryId].forEach(function(sub) {
                const option = document.createElement('option');
                option.value = sub.id;
                option.textContent = sub.name;
                subcategorySelect.appendChild(option);
            });
        }
    }

    if (categorySelect && subcategorySelect) {
        categorySelect.addEventListener('change', function() {
            populateSubcategories(this.value);
        });
        // On page load, populate if old value exists
        @if(old('category_id'))
            populateSubcategories({{ old('category_id') }});
            @if(old('subcategory_id'))
                subcategorySelect.value = "{{ old('subcategory_id') }}";
            @endif
        @endif
    }
});
</script>
@endpush
