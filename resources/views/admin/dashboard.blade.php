@extends('admin.layouts.admin')

@section('title', 'Admin Dashboard - EZofz.lk')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="mb-0">{{ $documents->total() }}</h4>
                        <p class="mb-0">Total Documents</p>
                    </div>
                    <div>
                        <i class="bi bi-file-text fs-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="mb-0">{{ App\Models\User::where('is_admin', false)->count() }}</h4>
                        <p class="mb-0">Total Users</p>
                    </div>
                    <div>
                        <i class="bi bi-people fs-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="mb-0">{{ App\Models\Document::where('category', 'law')->count() }}</h4>
                        <p class="mb-0">Law Documents</p>
                    </div>
                    <div>
                        <i class="bi bi-balance-scale fs-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="mb-0">{{ App\Models\Document::where('category', 'police')->count() }}</h4>
                        <p class="mb-0">Police Documents</p>
                    </div>
                    <div>
                        <i class="bi bi-shield fs-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-file-text me-2"></i>Recent Documents</h5>
            </div>
            <div class="card-body">
                @if($documents->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Uploaded</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documents->take(5) as $document)
                                    <tr>
                                        <td>{{ $document->title }}</td>
                                        <td>
                                            <span class="badge bg-{{ $document->category == 'law' ? 'warning' : 'info' }}">
                                                {{ ucfirst($document->category) }}
                                            </span>
                                        </td>
                                        <td>{{ $document->created_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ Storage::url($document->file_path) }}" class="btn btn-outline-primary" target="_blank">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <form action="{{ route('documents.destroy', $document) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">
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
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-speedometer2 me-2"></i>Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.documents') }}" class="btn btn-primary">
                        <i class="bi bi-plus me-2"></i>Add New Document
                    </a>
                    <a href="#" class="btn btn-outline-primary">
                        <i class="bi bi-people me-2"></i>Manage Users
                    </a>
                    <a href="#" class="btn btn-outline-primary">
                        <i class="bi bi-gear me-2"></i>System Settings
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i>View Website
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>System Info</h5>
            </div>
            <div class="card-body">
                <p><strong>Laravel Version:</strong> {{ app()->version() }}</p>
                <p><strong>PHP Version:</strong> {{ phpversion() }}</p>
                <p><strong>Environment:</strong> {{ app()->environment() }}</p>
                <p><strong>Last Updated:</strong> {{ date('M d, Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
