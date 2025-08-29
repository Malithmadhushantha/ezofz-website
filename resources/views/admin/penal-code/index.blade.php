@extends('admin.layouts.admin')

@section('title', 'Penal Code Management - Admin Dashboard')
@section('page-title', 'Penal Code Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <div class="d-flex gap-2">
            <a href="{{ route('admin.penal-code.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>Add Section Data
            </a>
        </div>
    </div>
    <div class="col-md-6">
        <form action="{{ route('admin.penal-code.index') }}" method="GET" class="d-flex gap-2">
            <input type="text" name="search" class="form-control" placeholder="Search sections..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-secondary">
                <i class="bi bi-search me-2"></i>Search
            </button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($sections->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Chapter</th>
                            <th>Section</th>
                            <th>Name</th>
                            <th>Amendments</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $section)
                            <tr>
                                <td>{{ $section->chapter_name }}</td>
                                <td>{{ $section->section_number }}{{ $section->sub_section_number ? '.' . $section->sub_section_number : '' }}</td>
                                <td>{{ $section->name_of_the_section }}</td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $section->amendments->count() }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#sectionModal{{ $section->id }}">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <a href="{{ route('admin.penal-code.edit', $section) }}" class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{ route('admin.penal-code.amendments.create', $section) }}" class="btn btn-sm btn-outline-info">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                        <form action="{{ route('admin.penal-code.destroy', $section) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this section?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Section Details Modal -->
                            <div class="modal fade" id="sectionModal{{ $section->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Section Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-4">
                                                <h6 class="fw-bold">Chapter</h6>
                                                <p>{{ $section->chapter_name }}</p>

                                                @if($section->sub_chapter_name)
                                                    <h6 class="fw-bold">Sub Chapter</h6>
                                                    <p>{{ $section->sub_chapter_name }}</p>
                                                @endif

                                                <h6 class="fw-bold">Section Number</h6>
                                                <p>{{ $section->section_number }}{{ $section->sub_section_number ? '.' . $section->sub_section_number : '' }}</p>

                                                <h6 class="fw-bold">Section Name</h6>
                                                <p>{{ $section->name_of_the_section }}</p>

                                                <h6 class="fw-bold">Content</h6>
                                                <p>{{ $section->section_content }}</p>

                                                @if($section->illustrations_1 || $section->illustrations_2 || $section->illustrations_3)
                                                    <h6 class="fw-bold">Illustrations</h6>
                                                    @if($section->illustrations_1)
                                                        <p><strong>1.</strong> {{ $section->illustrations_1 }}</p>
                                                    @endif
                                                    @if($section->illustrations_2)
                                                        <p><strong>2.</strong> {{ $section->illustrations_2 }}</p>
                                                    @endif
                                                    @if($section->illustrations_3)
                                                        <p><strong>3.</strong> {{ $section->illustrations_3 }}</p>
                                                    @endif
                                                @endif

                                                @if($section->explanation_1 || $section->explanation_2 || $section->explanation_3)
                                                    <h6 class="fw-bold">Explanations</h6>
                                                    @if($section->explanation_1)
                                                        <p><strong>1.</strong> {{ $section->explanation_1 }}</p>
                                                    @endif
                                                    @if($section->explanation_2)
                                                        <p><strong>2.</strong> {{ $section->explanation_2 }}</p>
                                                    @endif
                                                    @if($section->explanation_3)
                                                        <p><strong>3.</strong> {{ $section->explanation_3 }}</p>
                                                    @endif
                                                @endif
                                            </div>

                                            @if($section->amendments->count() > 0)
                                                <div class="mt-4">
                                                    <h6 class="fw-bold">Amendments</h6>
                                                    @foreach($section->amendments as $amendment)
                                                        <div class="card mb-3">
                                                            <div class="card-body">
                                                                <h6>Amendment {{ $amendment->amendment_number }}</h6>
                                                                <p class="text-muted">{{ $amendment->amendment_date->format('F d, Y') }}</p>
                                                                <p>{{ $amendment->amendment_content }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $sections->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="bi bi-book fs-1 text-muted"></i>
                <p class="mt-2">No sections found</p>
            </div>
        @endif
    </div>
</div>
@endsection
