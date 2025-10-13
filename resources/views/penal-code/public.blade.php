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
                    <div class="table-responsive">
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
                                @foreach($sections as $section)
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
</style>
@endpush

@endsection
