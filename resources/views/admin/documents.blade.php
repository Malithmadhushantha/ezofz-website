@extends('admin.layouts.admin')

@section('title', 'Document Management - EZofz.lk')
@section('page-title', 'Document Management')

@section('content')
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
                            <label for="category" class="form-label">Category *</label>
                            <select class="form-select @error('category') is-invalid @enderror"
                                    id="category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="law" {{ old('category') == 'law' ? 'selected' : '' }}>Law Documents</option>
                                <option value="police" {{ old('category') == 'police' ? 'selected' : '' }}>Police Documents</option>
                            </select>
                            @error('category')
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
                                   id="file" name="file" accept=".pdf,.doc,.docx" required>
                            <div class="form-text">Allowed formats: PDF, DOC, DOCX. Max size: 2MB</div>
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
                    <span class="fw-bold text-warning">{{ App\Models\Document::where('category', 'law')->count() }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Police Documents:</span>
                    <span class="fw-bold text-info">{{ App\Models\Document::where('category', 'police')->count() }}</span>
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
            <select class="form-select form-select-sm" style="width: auto;">
                <option value="">All Categories</option>
                <option value="law">Law Documents</option>
                <option value="police">Police Documents</option>
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
                            <th>Uploaded</th>
                            <th>File Size</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $document)
                            <tr>
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
                                    <span class="badge bg-{{ $document->category == 'law' ? 'warning' : 'info' }}">
                                        {{ ucfirst($document->category) }}
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
                                        <a href="{{ Storage::url($document->file_path) }}"
                                           class="btn btn-outline-primary" target="_blank" title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ Storage::url($document->file_path) }}"
                                           class="btn btn-outline-success" download title="Download">
                                            <i class="bi bi-download"></i>
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
    const categoryFilter = document.querySelector('select[style*="width: auto"]');
    if (categoryFilter) {
        categoryFilter.addEventListener('change', function() {
            const selectedCategory = this.value;
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                if (!selectedCategory) {
                    row.style.display = '';
                } else {
                    const categoryBadge = row.querySelector('.badge');
                    const categoryText = categoryBadge ? categoryBadge.textContent.toLowerCase() : '';
                    row.style.display = categoryText.includes(selectedCategory) ? '' : 'none';
                }
            });
        });
    }
});
</script>
@endpush
