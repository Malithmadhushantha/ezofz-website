@extends('admin.layouts.admin')

@section('title', 'Admin Dashboard - EZofz.lk')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white position-relative overflow-hidden">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0 fw-bold counter-value">{{ $documents->total() }}</h4>
                        <p class="mb-0 opacity-75">Total Documents</p>
                    </div>
                    <div class="icon-box">
                        <i class="bi bi-file-text fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="progress" style="height: 4px;">
                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white position-relative overflow-hidden">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0 fw-bold counter-value">{{ App\Models\User::where('is_admin', false)->count() }}</h4>
                        <p class="mb-0 opacity-75">Active Users</p>
                    </div>
                    <div class="icon-box">
                        <i class="bi bi-people fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="progress" style="height: 4px;">
                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white position-relative overflow-hidden">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0 fw-bold counter-value">
                            {{ App\Models\Category::where('name', 'law')->first()?->documents()->count() ?? 0 }}
                        </h4>
                        <p class="mb-0 opacity-75">Law Documents</p>
                        <small class="opacity-75">Latest update: {{ App\Models\Category::where('name', 'law')->first()?->documents()->latest()->first()?->updated_at->diffForHumans() ?? 'N/A' }}</small>
                    </div>
                    <div class="icon-box">
                        <i class="bi bi-balance-scale fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="progress" style="height: 4px;">
                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white position-relative overflow-hidden">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0 fw-bold counter-value">
                            {{ App\Models\Category::where('name', 'police')->first()?->documents()->count() ?? 0 }}
                        </h4>
                        <p class="mb-0 opacity-75">Police Documents</p>
                        <small class="opacity-75">Latest update: {{ App\Models\Category::where('name', 'police')->first()?->documents()->latest()->first()?->updated_at->diffForHumans() ?? 'N/A' }}</small>
                    </div>
                    <div class="icon-box">
                        <i class="bi bi-shield fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="progress" style="height: 4px;">
                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-file-text me-2 text-primary"></i>Recent Documents
                </h5>
                <div class="btn-group">
                    <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bi bi-funnel me-1"></i>Filter
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">All Documents</a></li>
                        <li><a class="dropdown-item" href="#">Law Documents</a></li>
                        <li><a class="dropdown-item" href="#">Police Documents</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Recently Added</a></li>
                        <li><a class="dropdown-item" href="#">Recently Updated</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                @if($documents->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Uploaded</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documents->take(5) as $document)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="document-icon me-2">
                                                    @php
                                                        $extension = pathinfo($document->file_path, PATHINFO_EXTENSION);
                                                        $iconClass = match(strtolower($extension)) {
                                                            'pdf' => 'bi-file-pdf text-danger',
                                                            'doc', 'docx' => 'bi-file-word text-primary',
                                                            'xls', 'xlsx' => 'bi-file-excel text-success',
                                                            default => 'bi-file-text text-secondary'
                                                        };
                                                    @endphp
                                                    <i class="bi {{ $iconClass }} fs-4"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">{{ $document->title }}</h6>
                                                    <small class="text-muted">
                                                        @php
                                                            try {
                                                                $fileSize = Storage::size($document->file_path);
                                                                echo $fileSize > 0 ? number_format($fileSize / 1024, 2) . ' KB' : 'File not found';
                                                            } catch (\Exception $e) {
                                                                echo 'Size unavailable';
                                                            }
                                                        @endphp
                                                    </small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ optional($document->category)->name === 'law' ? 'warning' : 'info' }} rounded-pill">
                                                {{ ucfirst(optional($document->category)->name) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-clock-history me-1 text-muted"></i>
                                                {{ $document->created_at->diffForHumans() }}
                                            </div>
                                        </td>
                                        <td>
                                            @php
                                                $status = match(true) {
                                                    $document->created_at->isToday() => ['text' => 'New', 'class' => 'success'],
                                                    $document->updated_at->gt($document->created_at) => ['text' => 'Updated', 'class' => 'warning'],
                                                    default => ['text' => 'Published', 'class' => 'primary']
                                                };
                                            @endphp
                                            <span class="badge bg-{{ $status['class'] }}-subtle text-{{ $status['class'] }} rounded-pill">
                                                {{ $status['text'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ Storage::url($document->file_path) }}" class="btn btn-light" target="_blank" data-bs-toggle="tooltip" title="View Document">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-light" data-bs-toggle="tooltip" title="Edit Document">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('documents.destroy', $document) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-light text-danger" onclick="return confirm('Are you sure you want to delete this document?')" data-bs-toggle="tooltip" title="Delete Document">
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
                    <div class="text-center">
                        <a href="{{ route('admin.documents') }}" class="btn btn-primary">
                            <i class="bi bi-arrow-right me-2"></i>View All Documents
                        </a>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="bi bi-file-x fs-1 text-muted mb-3"></i>
                        <h5 class="text-muted">No documents uploaded yet</h5>
                        <a href="{{ route('admin.documents') }}" class="btn btn-primary">
                            <i class="bi bi-plus me-2"></i>Upload First Document
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="bi bi-lightning-charge text-warning me-2"></i>Quick Actions</h5>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin.documents') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="action-icon bg-primary-subtle text-primary rounded p-2 me-3">
                            <i class="bi bi-plus-lg"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Add New Document</h6>
                            <small class="text-muted">Upload and manage documents</small>
                        </div>
                        <i class="bi bi-chevron-right ms-auto"></i>
                    </a>
                    <a href="{{ route('admin.penal-code.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="action-icon bg-warning-subtle text-warning rounded p-2 me-3">
                            <i class="bi bi-book"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Penal Code</h6>
                            <small class="text-muted">Manage penal code sections</small>
                        </div>
                        <i class="bi bi-chevron-right ms-auto"></i>
                    </a>
                    <a href="{{ route('admin.criminal-procedure-code.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="action-icon bg-success-subtle text-success rounded p-2 me-3">
                            <i class="bi bi-journal-text"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Criminal Procedure</h6>
                            <small class="text-muted">Update procedure codes</small>
                        </div>
                        <i class="bi bi-chevron-right ms-auto"></i>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="action-icon bg-info-subtle text-info rounded p-2 me-3">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">User Management</h6>
                            <small class="text-muted">View and manage users</small>
                        </div>
                        <i class="bi bi-chevron-right ms-auto"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="bi bi-info-circle text-info me-2"></i>System Information</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-hdd-stack text-primary me-2"></i>
                                <span>Laravel Version</span>
                            </div>
                            <span class="badge bg-primary-subtle text-primary">{{ app()->version() }}</span>
                        </div>
                    </div>
                    <div class="list-group-item px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-code-square text-success me-2"></i>
                                <span>PHP Version</span>
                            </div>
                            <span class="badge bg-success-subtle text-success">{{ phpversion() }}</span>
                        </div>
                    </div>
                    <div class="list-group-item px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-gear text-warning me-2"></i>
                                <span>Environment</span>
                            </div>
                            <span class="badge bg-warning-subtle text-warning">{{ ucfirst(app()->environment()) }}</span>
                        </div>
                    </div>
                    <div class="list-group-item px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-clock-history text-info me-2"></i>
                                <span>Last Updated</span>
                            </div>
                            <span class="badge bg-info-subtle text-info">{{ date('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .icon-box {
        background: rgba(255, 255, 255, 0.2);
        padding: 1rem;
        border-radius: 8px;
    }
    .counter-value {
        font-size: 1.75rem;
    }
    .action-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .document-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--bs-light);
        border-radius: 8px;
    }
</style>
@endpush

@push('scripts')
<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endpush

@endsection
