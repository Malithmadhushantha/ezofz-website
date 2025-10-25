@extends('admin.layouts.admin')

@section('title', 'Penal Code Management - Admin Dashboard')
@section('page-title', 'Penal Code Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <div class="d-flex gap-2">
            <a href="{{ route('admin.penal-code.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>Add Section Data
            </a>
            <a href="{{ route('admin.penal-code.overview') }}" class="btn btn-info">
                <i class="bi bi-list-ul me-2"></i>Overview
            </a>
        </div>
    </div>
    <div class="col-md-8">
        <form action="{{ route('admin.penal-code.index') }}" method="GET" class="d-flex gap-2">
            <input type="text" name="search" class="form-control" placeholder="Search sections..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-secondary">
                <i class="bi bi-search me-2"></i>Search
            </button>
            @if(request('search'))
                <a href="{{ route('admin.penal-code.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-lg me-2"></i>Clear
                </a>
            @endif
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($sections->count() > 0)
            @php
                // Group sections by chapter and sub-chapter
                $groupedSections = $sections->groupBy('chapter_name');
            @endphp

            <div class="mb-3">
                <small class="text-muted">Total Sections: {{ $sections->count() }}</small>
            </div>

            <div class="accordion" id="chaptersAccordion">
                @foreach($groupedSections as $chapterName => $chapterSections)
                    @php
                        $chapterSlug = Str::slug($chapterName);
                        $subChapterGroups = $chapterSections->groupBy('sub_chapter_name');
                    @endphp

                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header" id="heading{{ $chapterSlug }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $chapterSlug }}" aria-expanded="false"
                                    aria-controls="collapse{{ $chapterSlug }}">
                                <div class="d-flex w-100 justify-content-between align-items-center me-3">
                                    <strong>{{ $chapterName }}</strong>
                                    <span class="badge bg-primary rounded-pill">{{ $chapterSections->count() }} sections</span>
                                </div>
                            </button>
                        </h2>
                        <div id="collapse{{ $chapterSlug }}" class="accordion-collapse collapse"
                             aria-labelledby="heading{{ $chapterSlug }}" data-bs-parent="#chaptersAccordion">
                            <div class="accordion-body p-0">
                                @foreach($subChapterGroups as $subChapterName => $subChapterSections)
                                    @if($subChapterName)
                                        <div class="bg-light px-3 py-2 border-bottom">
                                            <strong class="text-primary">{{ $subChapterName }}</strong>
                                            <span class="badge bg-secondary ms-2">{{ $subChapterSections->count() }}</span>
                                        </div>
                                    @endif

                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle mb-0">
                                            @if($loop->first)
                                                <thead class="table-light">
                                                    <tr>
                                                        <th style="width: 15%;">Section</th>
                                                        <th style="width: 50%;">Name</th>
                                                        <th style="width: 10%;">Amendments</th>
                                                        <th style="width: 25%;">Actions</th>
                                                    </tr>
                                                </thead>
                                            @endif
                                            <tbody>
                                                @foreach($subChapterSections as $section)
                                                    <tr>
                                                        <td class="fw-medium">
                                                            {{ $section->section_number }}{{ $section->sub_section_number ? '.' . $section->sub_section_number : '' }}
                                                        </td>
                                                        <td>{{ Str::limit($section->name_of_the_section, 60) }}</td>
                                                        <td>
                                                            <span class="badge bg-info">
                                                                {{ $section->amendments->count() }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group btn-group-sm">
                                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#sectionModal{{ $section->id }}" title="View">
                                                                    <i class="bi bi-eye"></i>
                                                                </button>
                                                                <a href="{{ route('admin.penal-code.edit', $section) }}" class="btn btn-outline-warning" title="Edit">
                                                                    <i class="bi bi-pencil"></i>
                                                                </a>
                                                                <a href="{{ route('admin.penal-code.amendments.create', $section) }}" class="btn btn-outline-info" title="Add Amendment">
                                                                    <i class="bi bi-plus-circle"></i>
                                                                </a>
                                                                <form action="{{ route('admin.penal-code.destroy', $section) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this section?')" title="Delete">
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Section Details Modals -->
            @foreach($sections as $section)
                <div class="modal fade" id="sectionModal{{ $section->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Section {{ $section->section_number }} Details</h5>
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
                                    <div class="bg-light p-3 rounded">{{ $section->section_content }}</div>

                                    @if($section->illustrations_1 || $section->illustrations_2 || $section->illustrations_3)
                                        <h6 class="fw-bold mt-3">Illustrations</h6>
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
                                        <h6 class="fw-bold mt-3">Explanations</h6>
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
                                        <h6 class="fw-bold">Amendments ({{ $section->amendments->count() }})</h6>
                                        @foreach($section->amendments as $amendment)
                                            <div class="card mb-3 border-info">
                                                <div class="card-body">
                                                    <h6 class="card-title">Amendment {{ $amendment->amendment_number }}</h6>
                                                    <p class="text-muted small">{{ $amendment->amendment_date->format('F d, Y') }}</p>
                                                    <p class="card-text">{{ $amendment->amendment_content }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('admin.penal-code.edit', $section) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil me-2"></i>Edit Section
                                </a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center py-5">
                <i class="bi bi-book fs-1 text-muted"></i>
                <p class="mt-2 text-muted">No sections found</p>
                @if(request('search'))
                    <a href="{{ route('admin.penal-code.index') }}" class="btn btn-outline-primary">View All Sections</a>
                @endif
            </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    /* Fix pagination button size issues */
    .pagination {
        --bs-pagination-padding-x: 0.75rem;
        --bs-pagination-padding-y: 0.375rem;
        --bs-pagination-font-size: 1rem;
        --bs-pagination-line-height: 1.5;
    }

    .pagination .page-link {
        max-width: 50px;
        text-align: center;
    }

    /* Accordion improvements */
    .accordion-button:not(.collapsed) {
        background-color: #e7f3ff;
        color: #0d6efd;
    }

    .accordion-button:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    /* Table improvements */
    .table th {
        border-top: none;
        font-weight: 600;
        color: #495057;
        background-color: #f8f9fa;
    }

    .btn-group-sm .btn {
        --bs-btn-padding-y: 0.25rem;
        --bs-btn-padding-x: 0.5rem;
        --bs-btn-font-size: 0.875rem;
    }
</style>
@endpush
@endsection
