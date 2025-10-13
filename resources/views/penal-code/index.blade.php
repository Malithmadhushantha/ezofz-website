@extends('layouts.app')

@section('title', 'Penal Code Database - EZofz.lk')

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
                                <div class="col-md-6 col-lg-4 col-sm-6 mb-3">
                                    <div class="card h-100 border-primary starred-card">
                                        <div class="card-body d-flex flex-column">
                                            <div class="d-flex align-items-center mb-2">
                                                <h6 class="card-title mb-0">Section {{ $starredSection->section_number }}</h6>
                                                <i class="bi bi-star-fill ms-auto text-warning"></i>
                                            </div>
                                            <p class="card-text small text-muted flex-grow-1">{{ Str::limit($starredSection->name_of_the_section, 50) }}</p>
                                            <a href="{{ route('penal-code.show', $starredSection) }}" class="btn btn-sm btn-outline-primary mt-2">
                                                <i class="bi bi-eye me-1"></i> View Section
                                            </a>
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
                    <h5 class="mb-0"><i class="bi bi-search me-2"></i>Search Penal Code</h5>
                </div>
                <div class="card-body bg-light">
                    <div class="alert alert-info mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <h6 class="mb-0"><i class="bi bi-info-circle me-2"></i>Search Tips</h6>
                            <button class="btn btn-sm btn-link ms-auto d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#searchTipsCollapse" aria-expanded="false" aria-controls="searchTipsCollapse">
                                Show/Hide
                            </button>
                        </div>
                        <div class="collapse show" id="searchTipsCollapse">
                            <ul class="mb-0 small search-tips-list">
                                <li>Use the dropdown to specify where to search</li>
                                <li>Search by section number (e.g., "123"), name, or content</li>
                                <li>Partial matches supported (e.g., "theft")</li>
                            </ul>
                        </div>
                    </div>
                    <form action="{{ route('penal-code.index') }}" method="GET" class="row g-3">
                        <div class="col-md-8 col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" name="search" class="form-control"
                                       placeholder="Search penal code..."
                                       value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-8 col-8">
                            <select name="search_type" class="form-select">
                                <option value="all" {{ request('search_type') == 'all' ? 'selected' : '' }}>All Fields</option>
                                <option value="section_number" {{ request('search_type') == 'section_number' ? 'selected' : '' }}>Section #</option>
                                <option value="section_name" {{ request('search_type') == 'section_name' ? 'selected' : '' }}>Name</option>
                                <option value="chapter" {{ request('search_type') == 'chapter' ? 'selected' : '' }}>Chapter</option>
                                <option value="content" {{ request('search_type') == 'content' ? 'selected' : '' }}>Content</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-4 col-4">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-search me-1"></i> <span class="d-none d-sm-inline">Search</span>
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
                                <div class="col-md-6 col-lg-4 col-sm-6 mb-3">
                                    <div class="card h-100 border-info note-card">
                                        <div class="card-body d-flex flex-column">
                                            <div class="d-flex align-items-center mb-2">
                                                <h6 class="card-title mb-0">Section {{ $noteSection->section_number }}</h6>
                                                <i class="bi bi-journal-text ms-auto text-info"></i>
                                            </div>
                                            <p class="card-text small text-muted flex-grow-1">{{ Str::limit($note, 80) }}</p>
                                            <a href="{{ route('penal-code.show', $noteSection) }}" class="btn btn-sm btn-outline-info mt-2">
                                                <i class="bi bi-eye me-1"></i> View Section
                                            </a>
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
                    <h5 class="mb-0"><i class="bi bi-journal-text me-2"></i>Penal Code Sections</h5>
                </div>
                <div class="card-body">
                    <!-- Desktop view (table) -->
                    <div class="table-responsive d-none d-md-block">
                        <table class="table table-hover mobile-optimized">
                            <thead class="table-sticky-header">
                                <tr>
                                    <th class="chapter-col">Chapter</th>
                                    <th class="section-col">Section</th>
                                    <th class="subsection-col">Sub Sec.</th>
                                    <th class="section-name-col">Name</th>
                                    <th class="actions-col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // Set a higher pagination value to show all entries
                                    $allSections = $sections->items();
                                @endphp
                                @foreach($allSections as $section)
                                <tr id="section-row-{{ $section->id }}">
                                    <td class="chapter-col">
                                        <div class="chapter-info">
                                            <strong>{{ $section->chapter_name }}</strong>
                                            @if($section->sub_chapter_name)
                                                <br>
                                                <small class="text-muted">{{ $section->sub_chapter_name }}</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="section-col">{{ $section->section_number }}</td>
                                    <td class="subsection-col">{{ $section->sub_section_number }}</td>
                                    <td class="section-name-col">{{ $section->name_of_the_section }}</td>
                                    <td class="actions-col">
                                        <a href="{{ route('penal-code.show', $section) }}" class="btn btn-sm btn-primary" title="View Details">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $sections->appends(request()->query())->links() }}
                        </div>
                    </div>

                    <!-- Mobile view (accordion) -->
                    <div class="d-md-none">
                        <div class="accordion chapter-accordion" id="chapterAccordion">
                            @php
                                // Group sections by chapter
                                $groupedSections = collect($sections->items())->groupBy('chapter_name');
                            @endphp

                            @foreach($groupedSections as $chapterName => $chapterSections)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="chapter-heading-{{ Str::slug($chapterName) }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#chapter-collapse-{{ Str::slug($chapterName) }}"
                                                aria-expanded="false" aria-controls="chapter-collapse-{{ Str::slug($chapterName) }}">
                                            <strong>{{ $chapterName }}</strong>
                                            <span class="ms-auto badge bg-primary rounded-pill">{{ count($chapterSections) }}</span>
                                        </button>
                                    </h2>
                                    <div id="chapter-collapse-{{ Str::slug($chapterName) }}" class="accordion-collapse collapse"
                                         aria-labelledby="chapter-heading-{{ Str::slug($chapterName) }}" data-bs-parent="#chapterAccordion">
                                        <div class="accordion-body p-0">
                                            <ul class="list-group list-group-flush">
                                                @foreach($chapterSections as $section)
                                                    <li class="list-group-item">
                                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                                            <div>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="badge bg-secondary me-2">{{ $section->section_number }}</span>
                                                                    <h6 class="mb-0">{{ Str::limit($section->name_of_the_section, 40) }}</h6>
                                                                </div>
                                                                @if($section->sub_chapter_name)
                                                                    <small class="text-muted">{{ $section->sub_chapter_name }}</small>
                                                                @endif
                                                            </div>
                                                            <a href="{{ route('penal-code.show', $section) }}" class="btn btn-sm btn-primary">
                                                                <i class="bi bi-eye"></i>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-3">
                            {{ $sections->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Back to Top Button -->
<button id="backToTopBtn" class="back-to-top-btn" title="Back to Top">
    <i class="bi bi-arrow-up"></i>
</button>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Back to top button functionality
    const backToTopBtn = document.getElementById('backToTopBtn');

    // Show the button when user scrolls down 300px
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.add('show');
        } else {
            backToTopBtn.classList.remove('show');
        }
    });

    // Smooth scroll to top when button clicked
    backToTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Remember opened chapter accordions in session storage
    const accordionButtons = document.querySelectorAll('.chapter-accordion .accordion-button');

    // Check if we have any saved open accordions
    const openAccordions = JSON.parse(sessionStorage.getItem('openPenalCodeChapters')) || [];

    // Open previously opened accordions
    openAccordions.forEach(id => {
        const element = document.getElementById(id);
        if (element) {
            element.classList.add('show');
            const button = document.querySelector(`[data-bs-target="#${id}"]`);
            if (button) button.classList.remove('collapsed');
        }
    });

    // Add listeners to save open state
    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-bs-target').substring(1);
            const isCollapsed = this.classList.contains('collapsed');

            // Update storage when accordion state changes
            setTimeout(() => {
                const currentOpen = JSON.parse(sessionStorage.getItem('openPenalCodeChapters')) || [];

                if (!isCollapsed) {
                    // Add to open list
                    if (!currentOpen.includes(targetId)) {
                        currentOpen.push(targetId);
                    }
                } else {
                    // Remove from open list
                    const index = currentOpen.indexOf(targetId);
                    if (index > -1) {
                        currentOpen.splice(index, 1);
                    }
                }

                sessionStorage.setItem('openPenalCodeChapters', JSON.stringify(currentOpen));
            }, 100);
        });
    });
});
</script>
@endpush

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

/* Mobile responsive table */
.mobile-optimized {
    width: 100%;
}

/* Column widths */
.chapter-col {
    width: 20%;
}
.section-col {
    width: 10%;
}
.subsection-col {
    width: 10%;
}
.section-name-col {
    width: 45%;
}
.actions-col {
    width: 15%;
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

    /* Back to top button */
    .back-to-top-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--primary);
        color: white;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1000;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .back-to-top-btn.show {
        opacity: 1;
        visibility: visible;
    }

    .back-to-top-btn:hover {
        background: #0056b3;
        transform: translateY(-3px);
    }

    /* Chapter accordion styles */
    .chapter-accordion .accordion-button {
        background-color: #f8f9fa;
        color: #212529;
        padding: 0.75rem 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        text-align: left;
    }

    .chapter-accordion .accordion-button:not(.collapsed) {
        background-color: var(--primary-light);
        color: var(--primary);
    }

    .chapter-accordion .list-group-item {
        padding: 0.75rem 1rem;
        border-left: none;
        border-right: none;
    }

    .chapter-accordion .list-group-item:first-child {
        border-top: none;
    }

    .chapter-accordion .badge {
        font-weight: normal;
    }

    /* Sticky header */
.table-sticky-header {
    position: sticky;
    top: 0;
    background: white;
    z-index: 10;
    box-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

/* Cards for mobile */
.starred-card, .note-card {
    transition: all 0.2s ease;
}

.starred-card:hover, .note-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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

    .table th, .table td {
        padding: 0.5rem;
        font-size: 0.85rem;
    }

    .chapter-info small {
        font-size: 0.7rem;
    }

    .table-responsive {
        border-radius: 0.25rem;
        overflow-x: auto;
    }

    .alert-info ul.search-tips-list {
        padding-left: 1rem;
        margin-top: 0.5rem;
    }

    .search-tips-list li {
        margin-bottom: 0.25rem;
    }

    .form-select {
        font-size: 0.9rem;
    }

    .starred-card .card-title, .note-card .card-title {
        font-size: 0.95rem;
    }

    .chapter-col {
        width: 30%;
    }
    .section-col {
        width: 15%;
    }
    .subsection-col {
        width: 15%;
    }
    .section-name-col {
        width: 40%;
    }

    /* Additional mobile accordion styles */
    .chapter-accordion .accordion-item {
        margin-bottom: 0.5rem;
        border-radius: 0.25rem;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,.125);
    }

    .chapter-accordion .accordion-button:after {
        margin-left: 10px;
    }

    .chapter-accordion h6 {
        font-size: 0.9rem;
        line-height: 1.3;
    }

    /* Better pagination for mobile */
    .pagination {
        justify-content: center;
        flex-wrap: wrap;
    }

    .pagination .page-link {
        padding: 0.375rem 0.75rem;
    }
}
</style>
@endpush

@endsection
