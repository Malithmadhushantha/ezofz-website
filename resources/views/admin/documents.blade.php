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

                        <!-- File Upload Sections -->
                        <div class="col-12">
                            <div class="row g-3 file-upload-cards">
                                <!-- PDF File Upload -->
                                <div class="col-md-4">
                                    <div class="card border-danger">
                                        <div class="card-header bg-danger text-white py-2">
                                            <h6 class="mb-0"><i class="bi bi-file-pdf me-2"></i>Upload PDF File</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <label for="pdf_file" class="form-label">PDF Document</label>
                                            <input type="file" class="form-control @error('pdf_file') is-invalid @enderror"
                                                   id="pdf_file" name="pdf_file" accept=".pdf">
                                            <div class="form-text">Allowed formats: PDF. Max size: 10MB</div>
                                            @error('pdf_file')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Word File Upload -->
                                <div class="col-md-4">
                                    <div class="card border-primary">
                                        <div class="card-header bg-primary text-white py-2">
                                            <h6 class="mb-0"><i class="bi bi-file-word me-2"></i>Upload Word File</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <label for="word_file" class="form-label">Word Document</label>
                                            <input type="file" class="form-control @error('word_file') is-invalid @enderror"
                                                   id="word_file" name="word_file" accept=".doc,.docx">
                                            <div class="form-text">Allowed formats: DOC, DOCX. Max size: 10MB</div>
                                            @error('word_file')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Excel File Upload -->
                                <div class="col-md-4">
                                    <div class="card border-success">
                                        <div class="card-header bg-success text-white py-2">
                                            <h6 class="mb-0"><i class="bi bi-file-excel me-2"></i>Upload Excel File</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <label for="excel_file" class="form-label">Excel Document</label>
                                            <input type="file" class="form-control @error('excel_file') is-invalid @enderror"
                                                   id="excel_file" name="excel_file" accept=".xls,.xlsx">
                                            <div class="form-text">Allowed formats: XLS, XLSX. Max size: 10MB</div>
                                            @error('excel_file')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- File Upload Instructions -->
                            <div class="alert alert-info mt-3">
                                <i class="bi bi-info-circle me-2"></i>
                                <strong>Upload Instructions:</strong> You can upload files in any combination - PDF only, Word only, Excel only, or multiple file types for the same document. At least one file must be uploaded.
                            </div>

                            @error('files')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary" disabled>
                                <i class="bi bi-upload me-2"></i>Upload Document
                            </button>
                            <small class="text-muted ms-3">Select at least one file to enable upload</small>
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
                            <th>Available Files</th>
                            <th>Uploaded</th>
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
                                    @if(optional($document->subcategory)->name)
                                        <br>
                                        <small class="badge bg-info text-dark mt-1">
                                            {{ optional($document->subcategory)->name }}
                                        </small>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-column gap-1">
                                        @if($document->hasPdfFile())
                                            <div class="d-flex align-items-center">
                                                <span class="badge bg-danger me-2">
                                                    <i class="bi bi-file-pdf me-1"></i>PDF
                                                </span>
                                                <small class="text-muted">{{ $document->getPdfFileSizeFormatted() }}</small>
                                            </div>
                                        @endif
                                        @if($document->hasWordFile())
                                            <div class="d-flex align-items-center">
                                                <span class="badge bg-primary me-2">
                                                    <i class="bi bi-file-word me-1"></i>Word
                                                </span>
                                                <small class="text-muted">{{ $document->getWordFileSizeFormatted() }}</small>
                                            </div>
                                        @endif
                                        @if($document->hasExcelFile())
                                            <div class="d-flex align-items-center">
                                                <span class="badge bg-success me-2">
                                                    <i class="bi bi-file-excel me-1"></i>Excel
                                                </span>
                                                <small class="text-muted">{{ $document->getExcelFileSizeFormatted() }}</small>
                                            </div>
                                        @endif
                                        @if(!$document->hasPdfFile() && !$document->hasWordFile() && !$document->hasExcelFile())
                                            <span class="text-muted">No files available</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $document->created_at->format('M d, Y') }}</small>
                                </td>
                                <td>
                                    <div class="d-flex flex-column gap-1">
                                        <!-- Download Buttons -->
                                        <div class="btn-group btn-group-sm">
                                            @if($document->hasPdfFile())
                                                <a href="{{ route('documents.download', ['document' => $document, 'type' => 'pdf']) }}"
                                                   class="btn btn-outline-danger btn-sm" title="Download PDF">
                                                    <i class="bi bi-download"></i> PDF
                                                </a>
                                            @endif
                                            @if($document->hasWordFile())
                                                <a href="{{ route('documents.download', ['document' => $document, 'type' => 'word']) }}"
                                                   class="btn btn-outline-primary btn-sm" title="Download Word">
                                                    <i class="bi bi-download"></i> Word
                                                </a>
                                            @endif
                                            @if($document->hasExcelFile())
                                                <a href="{{ route('documents.download', ['document' => $document, 'type' => 'excel']) }}"
                                                   class="btn btn-outline-success btn-sm" title="Download Excel">
                                                    <i class="bi bi-download"></i> Excel
                                                </a>
                                            @endif
                                        </div>

                                        <!-- Management Buttons -->
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

@push('styles')
<style>
/* File upload card styles */
.file-upload-cards .card {
    transition: all 0.3s ease;
    opacity: 0.8;
}

.file-upload-cards .card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    opacity: 1;
}

.file-upload-cards .card.file-selected {
    opacity: 1;
    border-width: 2px !important;
}

.file-upload-cards .card-header {
    font-weight: 600;
}

.file-info {
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Table improvements for file types */
.table td {
    vertical-align: middle;
}

.btn-group .btn {
    margin-bottom: 2px;
}
</style>
@endpush

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

    // File upload indicators
    const fileInputs = ['pdf_file', 'word_file', 'excel_file'];
    fileInputs.forEach(function(inputId) {
        const input = document.getElementById(inputId);
        if (input) {
            input.addEventListener('change', function() {
                const card = this.closest('.card');
                const cardHeader = card.querySelector('.card-header');

                if (this.files.length > 0) {
                    const file = this.files[0];
                    const sizeMB = (file.size / (1024 * 1024)).toFixed(2);

                    // Add file info
                    let fileInfo = card.querySelector('.file-info');
                    if (!fileInfo) {
                        fileInfo = document.createElement('div');
                        fileInfo.className = 'file-info mt-2 p-2 bg-light rounded';
                        card.querySelector('.card-body').appendChild(fileInfo);
                    }

                    fileInfo.innerHTML = `
                        <small class="text-success">
                            <i class="bi bi-check-circle me-1"></i>
                            <strong>${file.name}</strong><br>
                            Size: ${sizeMB} MB
                        </small>
                    `;

                    // Update card header to show selected
                    cardHeader.classList.add('border-success');
                    cardHeader.style.opacity = '1';
                } else {
                    // Remove file info
                    const fileInfo = card.querySelector('.file-info');
                    if (fileInfo) {
                        fileInfo.remove();
                    }

                    // Reset card header
                    cardHeader.classList.remove('border-success');
                    cardHeader.style.opacity = '0.8';
                }

                // Update submit button state
                updateSubmitButton();
            });
        }
    });

    function updateSubmitButton() {
        const submitBtn = document.querySelector('button[type="submit"]');
        const hasFiles = fileInputs.some(inputId => {
            const input = document.getElementById(inputId);
            return input && input.files.length > 0;
        });

        if (hasFiles) {
            submitBtn.classList.remove('btn-secondary');
            submitBtn.classList.add('btn-primary');
            submitBtn.disabled = false;
        } else {
            submitBtn.classList.remove('btn-primary');
            submitBtn.classList.add('btn-secondary');
            submitBtn.disabled = true;
        }
    }

    // Initial submit button state
    updateSubmitButton();

    // Form submission confirmation
    const uploadForm = document.querySelector('form[action*="documents.store"]');
    if (uploadForm) {
        uploadForm.addEventListener('submit', function(e) {
            const selectedFiles = [];
            fileInputs.forEach(inputId => {
                const input = document.getElementById(inputId);
                if (input && input.files.length > 0) {
                    const type = inputId.replace('_file', '').toUpperCase();
                    selectedFiles.push(type);
                }
            });

            if (selectedFiles.length === 0) {
                e.preventDefault();
                alert('Please select at least one file to upload.');
                return false;
            }

            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="bi bi-spinner-border spinner-border-sm me-2" role="status"></i>Uploading...';
            submitBtn.disabled = true;
        });
    }
});
</script>
@endpush
