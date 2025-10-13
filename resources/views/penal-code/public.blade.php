@extends('layouts.app')

@section('title', 'Sri Lanka Penal Code Database - Free Online Access to Legal Information')
@section('meta_description', 'Access Sri Lanka\'s comprehensive Penal Code database. Search and explore legal sections, chapters, and amendments. Free legal resource for lawyers, students, and the public.')
@section('meta_keywords', 'Sri Lanka Penal Code, legal database, law sections, criminal law, legal reference, Sri Lankan law')

@section('content')
<!-- Google Ads -->
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="ad-space text-center">
                <!-- Google AdSense Code -->
                {{-- Add your Google AdSense code here --}}
            </div>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row">
        <!-- Title and Description -->
        <div class="col-12 mb-4">
            <h1 class="text-primary mb-3">Sri Lanka Penal Code Database</h1>
            <p class="lead">Access comprehensive information about Sri Lankan Penal Code sections, amendments, and legal references.</p>
        </div>

        <!-- Search and Filter Section -->
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-search me-2"></i>Search Penal Code</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ route('penal-code.public') }}" method="GET" class="row g-3">
                        <div class="col-md-6 col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" name="search" class="form-control"
                                       placeholder="Search by title or content..."
                                       value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-8 col-8">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-hash"></i>
                                </span>
                                <input type="number" name="section_number" class="form-control"
                                       placeholder="Section number"
                                       value="{{ request('section_number') }}">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-4">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-search me-1"></i> <span class="d-none d-sm-inline">Search</span>
                            </button>
                        </div>

                        <!-- Filter for mobile (optional) -->
                        <div class="col-12 d-md-none mt-2">
                            <div class="accordion" id="filterAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFilters">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
                                            <i class="bi bi-funnel me-2"></i> Advanced Filters
                                        </button>
                                    </h2>
                                    <div id="collapseFilters" class="accordion-collapse collapse" aria-labelledby="headingFilters">
                                        <div class="accordion-body">
                                            <div class="mb-3">
                                                <label class="form-label">Sort By</label>
                                                <select class="form-select" name="sort">
                                                    <option value="section_asc" {{ request('sort') == 'section_asc' ? 'selected' : '' }}>Section (Ascending)</option>
                                                    <option value="section_desc" {{ request('sort') == 'section_desc' ? 'selected' : '' }}>Section (Descending)</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-outline-primary w-100">Apply Filters</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sections List -->
        <div class="col-lg-12">
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
                                    // Sort sections by section_number numerically
                                    $allSections = collect($sections->items())->sortBy(function($section) {
                                        return (int)$section->section_number;
                                    });
                                @endphp
                                @foreach($allSections as $section)
                                <tr>
                                    <td class="chapter-col">
                                        <div class="chapter-info">
                                            <strong>{{ $section->chapter_name }}</strong>
                                            @if($section->sub_chapter_name)
                                                <span class="d-none d-md-inline"><br></span>
                                                <small class="text-muted d-block d-md-inline">{{ $section->sub_chapter_name }}</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="section-col">{{ $section->section_number }}</td>
                                    <td class="subsection-col">{{ $section->sub_section_number }}</td>
                                    <td class="section-name-col">{{ $section->name_of_the_section }}</td>
                                    <td class="actions-col">
                                        <div class="access-section">
                                            <button class="btn btn-sm btn-primary show-access-message" title="View Details">
                                                <i class="bi bi-eye"></i> <span class="d-none d-md-inline">View</span>
                                            </button>
                                            <div class="access-message collapse">
                                                <div class="card mt-2 border-warning">
                                                    <div class="card-body p-3">
                                                        <div class="d-flex align-items-center text-warning mb-2">
                                                            <i class="bi bi-lock-fill me-2"></i>
                                                            <strong>Access Required</strong>
                                                        </div>
                                                        <p class="mb-2 small">Registration required to view content.</p>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('login') }}" class="btn btn-outline-primary">
                                                                <i class="bi bi-box-arrow-in-right"></i> Login
                                                            </a>
                                                            <a href="{{ route('register') }}" class="btn btn-primary">
                                                                <i class="bi bi-person-plus"></i> Register
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile view (accordion) -->
                    <div class="d-md-none">
                        <div class="accordion chapter-accordion" id="publicChapterAccordion">
                            @php
                                // Group by chapter_name
                                $groupedByChapter = $allSections->groupBy('chapter_name');
                            @endphp

                            @foreach($groupedByChapter as $chapterName => $chapterSections)
                                <div class="accordion-item chapter-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#chapter-{{ Str::slug($chapterName) }}"
                                                aria-expanded="false">
                                            <div>
                                                <strong class="d-block">{{ $chapterName }}</strong>
                                                <small class="text-muted">{{ $chapterSections->count() }} sections</small>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="chapter-{{ Str::slug($chapterName) }}"
                                         class="accordion-collapse collapse"
                                         data-bs-parent="#publicChapterAccordion">
                                        <div class="accordion-body p-0">
                                            @php
                                                // Group sections by sub_chapter_name within this chapter
                                                $groupedBySubChapter = $chapterSections->groupBy('sub_chapter_name');
                                            @endphp

                                            @foreach($groupedBySubChapter as $subChapterName => $subChapterSections)
                                                @if($subChapterName)
                                                    <div class="sub-chapter-header">
                                                        <span class="sub-chapter-title">{{ $subChapterName }}</span>
                                                    </div>
                                                @endif

                                                <ul class="list-group list-group-flush">
                                                    @foreach($subChapterSections->sortBy(function($section) {
                                                        return (int)$section->section_number;
                                                    }) as $section)
                                                        <li class="list-group-item">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <div class="d-flex align-items-center mb-1">
                                                                        <span class="badge bg-light text-dark me-2">{{ $section->section_number }}</span>
                                                                        <span class="fw-medium">{{ $section->name_of_the_section }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="access-section">
                                                                    <button class="btn btn-sm btn-primary show-access-message" title="View Details">
                                                                        <i class="bi bi-eye"></i>
                                                                    </button>
                                                                    <div class="access-message collapse">
                                                                        <div class="card mt-2 border-warning">
                                                                            <div class="card-body p-3">
                                                                                <div class="d-flex align-items-center text-warning mb-2">
                                                                                    <i class="bi bi-lock-fill me-2"></i>
                                                                                    <strong>Access Required</strong>
                                                                                </div>
                                                                                <p class="mb-2 small">Registration required to view content.</p>
                                                                                <div class="btn-group btn-group-sm">
                                                                                    <a href="{{ route('login') }}" class="btn btn-outline-primary">
                                                                                        <i class="bi bi-box-arrow-in-right"></i> Login
                                                                                    </a>
                                                                                    <a href="{{ route('register') }}" class="btn btn-primary">
                                                                                        <i class="bi bi-person-plus"></i> Register
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 mt-3">
                        <div class="text-center text-md-start small">
                            Showing {{ $sections->firstItem() ?? 0 }} to {{ $sections->lastItem() ?? 0 }} of {{ $sections->total() }} entries
                        </div>
                        <div class="d-flex justify-content-center w-100 w-md-auto">
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
    // Initialize buttons to show access message
    const viewButtons = document.querySelectorAll('.show-access-message');
    const allMessages = document.querySelectorAll('.access-message');

    viewButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            // Hide all other messages first
            allMessages.forEach(msg => {
                if (msg !== this.nextElementSibling) {
                    msg.classList.remove('show');
                }
            });

            // Toggle this message
            const message = this.closest('.access-section').querySelector('.access-message');
            message.classList.toggle('show');

            // Prevent event bubbling to avoid triggering accordion
            e.stopPropagation();
        });
    });

    // Hide messages when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.access-section')) {
            allMessages.forEach(msg => msg.classList.remove('show'));
        }
    });

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

    // Completely custom accordion implementation to avoid conflicts
    const chapterAccordion = document.getElementById('publicChapterAccordion');

    // Wait for Bootstrap to be fully loaded before implementing our custom behavior
    setTimeout(() => {
        // First, get all accordion elements
        const accordionButtons = document.querySelectorAll('#publicChapterAccordion .accordion-button');
        const accordionItems = document.querySelectorAll('#publicChapterAccordion .accordion-collapse');

        // Remove all Bootstrap's built-in accordion functionality
        accordionButtons.forEach(button => {
            // Clone and replace to remove any event listeners
            const newButton = button.cloneNode(true);
            button.parentNode.replaceChild(newButton, button);
        });

        // Re-select all buttons after replacement
        const newAccordionButtons = document.querySelectorAll('#publicChapterAccordion .accordion-button');

        // Remove Bootstrap data attributes
        newAccordionButtons.forEach(button => {
            // Store the target ID before removing the attribute
            const targetSelector = button.getAttribute('data-bs-target');
            const targetId = targetSelector ? targetSelector.substring(1) : null;

            // Store as a custom attribute
            if (targetId) {
                button.setAttribute('data-target-id', targetId);
            }

            // Remove Bootstrap attributes
            button.removeAttribute('data-bs-toggle');
        });

        // Remove parent container references to allow independent operation
        accordionItems.forEach(item => {
            item.removeAttribute('data-bs-parent');
        });

        // Check if we have any saved open accordions
        const openAccordions = JSON.parse(sessionStorage.getItem('openPublicPenalCodeChapters')) || [];

        // Apply saved states
        openAccordions.forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.classList.add('show');
                const button = document.querySelector(`[data-target-id="${id}"]`) ||
                               document.querySelector(`[data-bs-target="#${id}"]`);
                if (button) button.classList.remove('collapsed');
            }
        });

        // Add our own click handlers
        newAccordionButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                // Get target ID from our custom attribute or the original bs attribute
                const targetId = this.getAttribute('data-target-id') ||
                                this.getAttribute('data-bs-target')?.substring(1);

                if (!targetId) return;

                const targetElement = document.getElementById(targetId);
                if (!targetElement) return;

                const isCurrentlyCollapsed = this.classList.contains('collapsed');

                // Toggle the accordion manually
                if (isCurrentlyCollapsed) {
                    // Expand
                    this.classList.remove('collapsed');
                    this.setAttribute('aria-expanded', 'true');
                    targetElement.classList.add('show');
                } else {
                    // Collapse
                    this.classList.add('collapsed');
                    this.setAttribute('aria-expanded', 'false');
                    targetElement.classList.remove('show');
                }

                // Update storage
                const currentOpen = JSON.parse(sessionStorage.getItem('openPublicPenalCodeChapters')) || [];

                if (!isCurrentlyCollapsed) {
                    // Add to open list (it was collapsed, now it's open)
                    if (!currentOpen.includes(targetId)) {
                        currentOpen.push(targetId);
                    }
                } else {
                    // Remove from open list (it was open, now it's collapsed)
                    const index = currentOpen.indexOf(targetId);
                    if (index > -1) {
                        currentOpen.splice(index, 1);
                    }
                }

                sessionStorage.setItem('openPublicPenalCodeChapters', JSON.stringify(currentOpen));

                // Stop event propagation to prevent default Bootstrap behavior
                e.preventDefault();
                e.stopPropagation();
            });
        });
    }, 300); // Short delay to ensure Bootstrap is fully initialized
});
</script>
@endpush

@push('styles')
<style>
.ad-space {
    min-height: 90px;
    background-color: #f8f9fa;
    border: 1px dashed #dee2e6;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Responsive table styles */
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

/* Sticky header */
.table-sticky-header {
    position: sticky;
    top: 0;
    background: white;
    z-index: 10;
    box-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

/* Mobile optimizations */
@media (max-width: 767px) {
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

    .chapter-info small {
        font-size: 0.7rem;
    }

    .table-responsive {
        border-radius: 0.25rem;
        overflow-x: auto;
    }

    .table th, .table td {
        padding: 0.5rem;
        font-size: 0.85rem;
    }

    .pagination {
        flex-wrap: wrap;
        justify-content: center;
    }

    .pagination .page-link {
        padding: 0.25rem 0.5rem;
        font-size: 0.85rem;
    }
}

.access-section {
    position: relative;
}

.access-message {
    position: absolute;
    top: 100%;
    right: 0;
    width: 250px;
    z-index: 1000;
    margin-top: 5px;
}

/* For mobile accordion view */
@media (max-width: 767px) {
    .list-group-item .access-message {
        right: -20px;
    }
}

.access-message .card {
    margin: 0;
    background: #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.access-message.collapse:not(.show) {
    display: none;
}

.access-message.collapse.show {
    display: block;
}

.access-message .btn-group {
    width: 100%;
}

.access-message .btn {
    flex: 1;
    white-space: nowrap;
    font-size: 0.8rem;
}

.access-message .btn i {
    font-size: 0.9rem;
}

/* Back to top button */
.back-to-top-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--bs-primary);
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

/* Chapter accordion styles for mobile view */
.chapter-accordion .accordion-button {
    background-color: #f8f9fa;
    color: #212529;
    padding: 0.75rem 1rem;
    display: flex;
    align-items: center;
    width: 100%;
    text-align: left;
}

.chapter-accordion .accordion-button:not(.collapsed) {
    background-color: #e6f0ff;
    color: #0066cc;
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

/* Sub-chapter styles */
.sub-chapter-header {
    background-color: rgba(0,0,0,0.03);
    padding: 0.5rem 1rem;
    border-bottom: 1px solid rgba(0,0,0,.125);
}

.sub-chapter-title {
    font-weight: 500;
    font-size: 0.9rem;
    color: #0066cc;
}

.chapter-item {
    margin-bottom: 0.75rem;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    border-radius: 0.25rem;
    overflow: hidden;
    border: 1px solid rgba(0,0,0,.125);
}
</style>
@endpush

@endsection
