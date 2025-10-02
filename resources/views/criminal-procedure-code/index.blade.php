@extends('layouts.app')

@section('title', 'Criminal Procedure Code - EZofz.lk')

@section('content')
<div class="container my-4">
    <div class="row">
        <!-- My Starred Sections -->
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-star-fill me-2"></i>My Starred Sections</h5>
                </div>
                <div class="card-body bg-light">
                    <div class="row">
                        @forelse($starredSections as $starredId)
                            @php
                                $starredSection = $sections->firstWhere('id', $starredId);
                            @endphp
                            @if($starredSection)
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="card h-100 border-primary">
                                        <div class="card-body">
                                            <h6 class="card-title">Section {{ $starredSection->section_number }}</h6>
                                            <p class="card-text small text-muted">{{ Str::limit($starredSection->name_of_the_section, 50) }}</p>
                                            <a href="{{ route('criminal-procedure-code.show', $starredSection) }}" class="btn btn-sm btn-outline-primary">View Section</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="col-12">
                                <p class="text-muted mb-0">No starred sections yet. Click the star icon on any section to add it here.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter Section -->
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-search me-2"></i>Search Criminal Procedure Code</h5>
                </div>
                <div class="card-body bg-light">
                    <div class="alert alert-info mb-3">
                        <h6><i class="bi bi-info-circle me-2"></i>Search Tips:</h6>
                        <ul class="mb-0 small">
                            <li>Use the dropdown to specify where to search or select "All Fields" to search everywhere</li>
                            <li>You can search by section number (e.g., "123"), section name, chapter name, or any text in the content</li>
                            <li>Partial matches are supported (e.g., searching "theft" will find all sections containing that word)</li>
                        </ul>
                    </div>
                    <form action="{{ route('criminal-procedure-code.index') }}" method="GET" class="row g-3">
                        <div class="col-md-10">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" name="search" class="form-control"
                                       placeholder="Search by section number, name, chapter, or content..."
                                       value="{{ request('search') }}">
                                <select name="search_type" class="form-select" style="max-width: 200px;">
                                    <option value="all" {{ request('search_type') == 'all' ? 'selected' : '' }}>All Fields</option>
                                    <option value="section_number" {{ request('search_type') == 'section_number' ? 'selected' : '' }}>Section Number</option>
                                    <option value="section_name" {{ request('search_type') == 'section_name' ? 'selected' : '' }}>Section Name</option>
                                    <option value="chapter" {{ request('search_type') == 'chapter' ? 'selected' : '' }}>Chapter Name</option>
                                    <option value="content" {{ request('search_type') == 'content' ? 'selected' : '' }}>Content</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-search me-1"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sections List -->
        <div class="col-lg-12">
            <!-- My Notes Section -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-journal-text me-2"></i>My Notes</h5>
                </div>
                <div class="card-body bg-light">
                    <div class="row">
                        @forelse($userNotes as $sectionId => $note)
                            @php
                                $noteSection = $sections->firstWhere('id', $sectionId);
                            @endphp
                            @if($noteSection && $note)
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="card h-100 border-info">
                                        <div class="card-body">
                                            <h6 class="card-title">Section {{ $noteSection->section_number }}</h6>
                                            <p class="card-text small text-muted">{{ Str::limit($note, 100) }}</p>
                                            <a href="{{ route('criminal-procedure-code.show', $noteSection) }}" class="btn btn-sm btn-outline-info">View Section</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="col-12">
                                <p class="text-muted mb-0">No notes added yet. Add notes to sections to see them here.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- All Sections -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-journal-text me-2"></i>Criminal Procedure Code Sections</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Chapter</th>
                                    <th>Section Number</th>
                                    <th>Sub Section</th>
                                    <th>Section Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                <tr id="section-row-{{ $section->id }}">
                                    <td>
                                        <strong>{{ $section->chapter_name }}</strong>
                                        @if($section->sub_chapter_name)
                                            <br>
                                            <small class="text-muted">{{ $section->sub_chapter_name }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $section->section_number }}</td>
                                    <td>{{ $section->sub_section_number }}</td>
                                    <td>{{ $section->name_of_the_section }}</td>
                                    <td>
                                        <a href="{{ route('criminal-procedure-code.show', $section) }}" class="btn btn-sm btn-primary" title="View Details">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@push('styles')
<style>
    body {
        padding-top: 60px; /* Height of the fixed navbar */
    }

    :root {
    --primary: #0066cc;
    --primary-light: #e6f0ff;
    --secondary: #6c757d;
    --success: #198754;
    --info: #0dcaf0;
    --warning: #ffc107;
    --danger: #dc3545;
}

.card {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.125);
}

.card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}

.content-box, .note-box {
    border: 1px solid rgba(0, 0, 0, 0.125);
    background-color: #fff;
}

.badge {
    font-weight: 500;
    padding: 0.5em 0.75em;
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 217, 255, 0.2);
}

.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-left: 2px solid var(--cyan);
    padding-left: 20px;
}

.timeline-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
}

.timeline-date {
    font-size: 0.9rem;
    color: var(--cyan);
    margin-bottom: 5px;
}

.timeline-content {
    background: var(--dark-cyan);
    padding: 10px;
    border-radius: 4px;
}

.btn-star, .btn-like {
    background: transparent;
    border: none;
    color: var(--cyan);
    transition: all 0.3s ease;
}

.btn-star:hover, .btn-like:hover {
    transform: scale(1.2);
}

.btn-star.active, .btn-like.active {
    color: var(--cyan);
}

.accordion-button:not(.collapsed) {
    background-color: var(--dark-cyan);
    color: var(--cyan);
}

.accordion-button:focus {
    box-shadow: 0 0 0 2px rgba(0, 217, 255, 0.25);
}

.table {
    margin-bottom: 0;
}

.table th {
    background-color: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
}

.table td {
    vertical-align: middle;
}

.content-box {
    min-height: 50px;
}

.content-box:empty::before {
    content: 'No content available';
    color: #6c757d;
    font-style: italic;
}

.modal-xl {
    max-width: 95%;
}

.section-details {
    background-color: #f8f9fa;
}

.search-highlight {
    background-color: rgba(255, 193, 7, 0.3);
    padding: 0.1em 0.2em;
    border-radius: 2px;
}

/* Mobile Responsive Adjustments */
@media (max-width: 768px) {
    .card-header {
        flex-direction: column;
        align-items: start !important;
    }

    .card-header .actions {
        margin-top: 10px;
    }

    .timeline {
        padding-left: 20px;
    }

    .timeline-item {
        padding-left: 15px;
    }
}
</style>
@endpush

@endsection
