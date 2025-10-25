@extends('admin.layouts.admin')

@section('title', 'Penal Code Overview - Admin Dashboard')
@section('page-title', 'Penal Code Sections Overview')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <div class="d-flex gap-2">
            <a href="{{ route('admin.penal-code.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Back to Management
            </a>
            <a href="{{ route('admin.penal-code.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>Add New Section
            </a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row g-2">
            <div class="col-4">
                <div class="card bg-primary text-white">
                    <div class="card-body text-center py-2">
                        <h5 class="mb-0">{{ $totalSections }}</h5>
                        <small>Total Sections</small>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-info text-white">
                    <div class="card-body text-center py-2">
                        <h5 class="mb-0">{{ $totalChapters }}</h5>
                        <small>Chapters</small>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-success text-white">
                    <div class="card-body text-center py-2">
                        <h5 class="mb-0">{{ $sectionsWithAmendments }}</h5>
                        <small>With Amendments</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">All Sections by Chapter</h5>
        <small class="text-muted">Complete list of entered penal code sections</small>
    </div>
    <div class="card-body">
        @if($sections->count() > 0)
            <div class="accordion" id="overviewAccordion">
                @foreach($sections as $chapterName => $chapterSections)
                    @php
                        $chapterSlug = Str::slug($chapterName);
                        $subChapterGroups = $chapterSections->groupBy('sub_chapter_name');
                    @endphp

                    <div class="accordion-item mb-2">
                        <h2 class="accordion-header" id="overview-heading{{ $chapterSlug }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#overview-collapse{{ $chapterSlug }}" aria-expanded="false"
                                    aria-controls="overview-collapse{{ $chapterSlug }}">
                                <div class="d-flex w-100 justify-content-between align-items-center me-3">
                                    <div>
                                        <strong>{{ $chapterName }}</strong>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <span class="badge bg-primary">{{ $chapterSections->count() }} sections</span>
                                        <span class="badge bg-info">{{ $chapterSections->sum(function($section) { return $section->amendments->count(); }) }} amendments</span>
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div id="overview-collapse{{ $chapterSlug }}" class="accordion-collapse collapse"
                             aria-labelledby="overview-heading{{ $chapterSlug }}" data-bs-parent="#overviewAccordion">
                            <div class="accordion-body p-0">
                                @foreach($subChapterGroups as $subChapterName => $subChapterSections)
                                    @if($subChapterName)
                                        <div class="bg-light px-3 py-2 border-bottom">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <strong class="text-primary">{{ $subChapterName }}</strong>
                                                <span class="badge bg-secondary">{{ $subChapterSections->count() }} sections</span>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="p-3">
                                        <div class="row">
                                            @foreach($subChapterSections as $section)
                                                <div class="col-lg-6 col-md-12 mb-2">
                                                    <div class="card border-start border-primary border-3 h-100">
                                                        <div class="card-body py-2 px-3">
                                                            <div class="d-flex justify-content-between align-items-start">
                                                                <div class="grow">
                                                                    <h6 class="card-title mb-1">
                                                                        Section {{ $section->section_number }}{{ $section->sub_section_number ? '.' . $section->sub_section_number : '' }}
                                                                    </h6>
                                                                    <p class="card-text small mb-1">{{ Str::limit($section->name_of_the_section, 50) }}</p>
                                                                    @if($section->amendments->count() > 0)
                                                                        <span class="badge bg-info">{{ $section->amendments->count() }} amendments</span>
                                                                    @endif
                                                                </div>
                                                                <div class="btn-group btn-group-sm">
                                                                    <button type="button" class="btn btn-outline-primary btn-sm"
                                                                            data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $section->id }}"
                                                                            title="Quick View">
                                                                        <i class="bi bi-eye"></i>
                                                                    </button>
                                                                    <a href="{{ route('admin.penal-code.edit', $section) }}"
                                                                       class="btn btn-outline-warning btn-sm" title="Edit">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-book fs-1 text-muted"></i>
                <p class="mt-2 text-muted">No sections found</p>
                <a href="{{ route('admin.penal-code.create') }}" class="btn btn-primary">Add First Section</a>
            </div>
        @endif
    </div>
</div>

<!-- Quick View Modals -->
@if(isset($sections))
    @foreach($sections as $chapterName => $chapterSections)
        @foreach($chapterSections as $section)
            <div class="modal fade" id="quickViewModal{{ $section->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Section {{ $section->section_number }} - Quick View</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Chapter:</strong><br>
                                    <span class="text-muted">{{ $section->chapter_name }}</span>
                                </div>
                                @if($section->sub_chapter_name)
                                    <div class="col-md-6">
                                        <strong>Sub Chapter:</strong><br>
                                        <span class="text-muted">{{ $section->sub_chapter_name }}</span>
                                    </div>
                                @endif
                            </div>
                            <hr>
                            <div>
                                <strong>Section Name:</strong><br>
                                <span class="text-muted">{{ $section->name_of_the_section }}</span>
                            </div>
                            <hr>
                            <div>
                                <strong>Content:</strong><br>
                                <div class="bg-light p-3 rounded">
                                    {{ Str::limit($section->section_content, 300) }}
                                    @if(strlen($section->section_content) > 300)
                                        <br><small class="text-muted">... (content truncated)</small>
                                    @endif
                                </div>
                            </div>
                            @if($section->amendments->count() > 0)
                                <hr>
                                <div>
                                    <strong>Amendments:</strong>
                                    <span class="badge bg-info ms-2">{{ $section->amendments->count() }} total</span>
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
    @endforeach
@endif

@push('styles')
<style>
    .accordion-button:not(.collapsed) {
        background-color: #e7f3ff;
        color: #0d6efd;
    }

    .accordion-button:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .card.border-start {
        border-left-width: 4px !important;
    }

    .btn-group-sm .btn {
        --bs-btn-padding-y: 0.25rem;
        --bs-btn-padding-x: 0.5rem;
        --bs-btn-font-size: 0.75rem;
    }
</style>
@endpush
@endsection
