@extends('layouts.app')

@section('title', 'Downloads - EZofz.lk')
@section('description', 'Browse and download official law and police documents, forms, and templates from EZofz.lk.')
@section('keywords', 'downloads, law documents, police documents, Sri Lanka, forms, templates')

@section('content')
<div class="container py-5 downloads-page">
    <!-- Categories Grid -->
    <div class="row g-4 mb-5">
        @foreach($categories as $category)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card h-100 shadow-hover border-0 category-card tech-card"
                     data-bs-toggle="collapse"
                     data-bs-target="#subcategories-{{ $category->id }}"
                     aria-expanded="false">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                        <div class="icon-wrapper mb-3">
                            @if($category->name === 'law')
                                <i class="bi bi-file-text display-4"></i>
                            @elseif($category->name === 'police')
                                <i class="bi bi-shield display-4"></i>
                            @else
                                <i class="bi bi-folder display-4"></i>
                            @endif
                        </div>
                        <h5 class="card-title mb-2">{{ ucfirst($category->name) }}</h5>
                        <p class="text-muted mb-0">
                            <span class="badge">
                                {{ $category->documents()->count() }} documents
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Subcategories Sections -->
    @foreach($categories as $category)
        <div class="collapse mb-4" id="subcategories-{{ $category->id }}">
            <div class="card border-0 shadow-sm tech-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ ucfirst($category->name) }} - Subcategories</h5>
                    <button type="button" class="btn-close" data-bs-toggle="collapse"
                            data-bs-target="#subcategories-{{ $category->id }}" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        @if($category->subcategories->count() > 0)
                            @foreach($category->subcategories as $subcategory)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="{{ $loop->index * 100 }}">
                                    <div class="card h-100 shadow-hover subcategory-card tech-card"
                                         data-bs-toggle="collapse"
                                         data-bs-target="#documents-{{ $subcategory->id }}"
                                         aria-expanded="false">
                                        <div class="card-body text-center p-4">
                                            <i class="bi bi-folder2-open mb-3 display-6"></i>
                                            <h6 class="card-title mb-2">{{ $subcategory->name }}</h6>
                                            <small class="text-muted">
                                                {{ $subcategory->documents->count() }} documents
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <p class="text-muted text-center mb-0">No subcategories found</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Documents for each subcategory -->
        @foreach($category->subcategories as $subcategory)
            <div class="collapse mb-4" id="documents-{{ $subcategory->id }}">
                <div class="card border-0 shadow-sm tech-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ $subcategory->name }} - Documents</h5>
                        <button type="button" class="btn-close" data-bs-toggle="collapse"
                                data-bs-target="#documents-{{ $subcategory->id }}" aria-label="Close"></button>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            @if($subcategory->documents->count() > 0)
                                @foreach($subcategory->documents as $document)
                                    <div class="col-12 col-sm-6 col-md-4 col-xl-3" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="{{ $loop->index * 100 }}">
                                        <div class="card h-100 shadow-hover document-card tech-card">
                                            <div class="card-body p-4">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="bi bi-file-earmark-text me-2"></i>
                                                    <h6 class="card-title mb-0 text-truncate">{{ $document->title }}</h6>
                                                </div>
                                                @if($document->description)
                                                    <p class="card-text small text-muted mb-3">
                                                        {{ Str::limit($document->description, 100) }}
                                                    </p>
                                                @endif

                                                <!-- Available File Types -->
                                                <div class="available-files mb-3">
                                                    <div class="d-flex flex-wrap gap-1 mb-2">
                                                        @if($document->hasPdfFile())
                                                            <span class="badge bg-danger file-badge">
                                                                <i class="bi bi-file-pdf me-1"></i>PDF
                                                            </span>
                                                        @endif
                                                        @if($document->hasWordFile())
                                                            <span class="badge bg-primary file-badge">
                                                                <i class="bi bi-file-word me-1"></i>Word
                                                            </span>
                                                        @endif
                                                        @if($document->hasExcelFile())
                                                            <span class="badge bg-success file-badge">
                                                                <i class="bi bi-file-excel me-1"></i>Excel
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- Download Buttons -->
                                                <div class="download-buttons d-grid gap-1">
                                                    @if($document->hasPdfFile())
                                                        <a href="{{ route('documents.download', ['document' => $document, 'type' => 'pdf']) }}"
                                                           class="btn btn-sm btn-outline-danger download-btn">
                                                            <i class="bi bi-download me-1"></i>Download PDF
                                                            <small class="d-block">{{ $document->getPdfFileSizeFormatted() }}</small>
                                                        </a>
                                                    @endif
                                                    @if($document->hasWordFile())
                                                        <a href="{{ route('documents.download', ['document' => $document, 'type' => 'word']) }}"
                                                           class="btn btn-sm btn-outline-primary download-btn">
                                                            <i class="bi bi-download me-1"></i>Download Word
                                                            <small class="d-block">{{ $document->getWordFileSizeFormatted() }}</small>
                                                        </a>
                                                    @endif
                                                    @if($document->hasExcelFile())
                                                        <a href="{{ route('documents.download', ['document' => $document, 'type' => 'excel']) }}"
                                                           class="btn btn-sm btn-outline-success download-btn">
                                                            <i class="bi bi-download me-1"></i>Download Excel
                                                            <small class="d-block">{{ $document->getExcelFileSizeFormatted() }}</small>
                                                        </a>
                                                    @endif

                                                    @if(!$document->hasPdfFile() && !$document->hasWordFile() && !$document->hasExcelFile())
                                                        <button class="btn btn-sm btn-outline-secondary" disabled>
                                                            <i class="bi bi-x-circle me-1"></i>No files available
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card-footer py-2 px-4">
                                                <small class="text-muted">
                                                    Added {{ $document->created_at->diffForHumans() }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="text-muted text-center mb-0">No documents found</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>

@push('styles')
<style>
    /* Scope styles to .downloads-page to prevent affecting navbar */
    .downloads-page .tech-card {
        background: rgba(15, 20, 30, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 214, 255, 0.2);
        box-shadow: 0 0 20px rgba(0, 214, 255, 0.1);
        border-radius: 12px;
        position: relative;
        overflow: hidden;
        padding: 1rem 1.5rem;
        transition: transform 0.3s ease;
        font-family: 'Rajdhani', sans-serif;
    }

    .downloads-page .tech-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 214, 255, 0.2);
    }

    /* Scanline effect for cards */
    .downloads-page .tech-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--tech-cyan), transparent);
        animation: scan 3s linear infinite;
        opacity: 0.7;
    }

    @keyframes scan {
        0% { top: 0; }
        100% { top: 100%; }
    }

    /* Icon wrapper styling */
    .downloads-page .icon-wrapper {
        transition: all 0.3s ease;
    }

    .downloads-page .tech-card:hover .icon-wrapper {
        transform: scale(1.1);
        filter: drop-shadow(0 0 8px rgba(0, 214, 255, 0.5));
    }

    /* Card-specific styling */
    .downloads-page .tech-card.category-card i {
        color: var(--tech-cyan);
    }

    .downloads-page .tech-card.category-card.law i {
        color: var(--accent-color); /* Yellow for law */
    }

    .downloads-page .tech-card.category-card.police i {
        color: #17a2b8; /* Cyan for police */
    }

    .downloads-page .tech-card.subcategory-card i,
    .downloads-page .tech-card.document-card i {
        color: var(--tech-cyan);
    }

    /* Card title and text */
    .downloads-page .card-title {
        font-family: 'Orbitron', sans-serif;
        color: #e0e0e0;
        text-shadow: 0 0 5px rgba(0, 214, 255, 0.3);
    }

    .downloads-page .card-text,
    .downloads-page .text-muted,
    .downloads-page small {
        color: #d1d5db !important;
        font-family: 'Rajdhani', sans-serif;
    }

    /* Badge styling */
    .downloads-page .badge {
        background: rgba(20, 25, 35, 0.9);
        color: var(--tech-cyan);
        border: 1px solid rgba(0, 214, 255, 0.3);
        transition: all 0.3s ease;
    }

    .downloads-page .badge:hover {
        background: rgba(0, 214, 255, 0.1);
        box-shadow: 0 0 8px rgba(0, 214, 255, 0.5);
    }

    /* Button styling */
    .downloads-page .btn-outline-primary {
        border-color: var(--tech-cyan);
        color: var(--tech-cyan);
        font-family: 'Rajdhani', sans-serif;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .downloads-page .btn-outline-primary:hover {
        background: rgba(0, 214, 255, 0.1);
        box-shadow: 0 0 10px rgba(0, 214, 255, 0.5);
        color: var(--tech-cyan);
    }

    .downloads-page .btn-outline-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 214, 255, 0.2), transparent);
        transition: left 0.7s ease;
    }

    .downloads-page .btn-outline-primary:hover::before {
        left: 100%;
    }

    /* Card header and footer styling */
    .downloads-page .card-header,
    .downloads-page .card-footer {
        background: rgba(10, 14, 23, 0.8);
        border-color: rgba(0, 214, 255, 0.2);
        color: #e0e0e0;
        font-family: 'Orbitron', sans-serif;
    }

    .downloads-page .btn-close {
        filter: invert(1) grayscale(100%) brightness(200%);
        transition: all 0.3s ease;
    }

    .downloads-page .btn-close:hover {
        filter: invert(1) grayscale(0%) brightness(100%) drop-shadow(0 0 5px var(--tech-cyan));
    }

    /* Collapse animation */
    .downloads-page .collapse {
        transition: opacity 0.3s ease, transform 0.3s ease, visibility 0s linear 0.3s;
        opacity: 0;
        transform: translateY(-10px);
        visibility: hidden;
    }

    .downloads-page .collapse.show {
        opacity: 1;
        transform: translateY(0);
        visibility: visible;
        animation: digitalFadeIn 0.3s ease forwards;
    }

    .downloads-page .collapse:not(.show) {
        animation: glitchFadeOut 0.2s ease forwards;
    }

    /* Parallax effect for card background */
    .downloads-page .tech-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 50% 50%, rgba(0, 214, 255, 0.1), transparent 70%);
        z-index: -1;
        transition: transform 0.5s ease;
    }

    /* Digital fade-in animation */
    @keyframes digitalFadeIn {
        0% {
            opacity: 0;
            transform: translateY(-10px);
            box-shadow: 0 0 0 rgba(0, 214, 255, 0);
        }
        50% {
            opacity: 0.5;
            box-shadow: 0 0 10px rgba(0, 214, 255, 0.3);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
    }

    /* Glitchy fade-out animation */
    @keyframes glitchFadeOut {
        0% {
            opacity: 1;
            transform: translateY(0);
        }
        20% {
            transform: translateX(2px);
        }
        40% {
            transform: translateX(-2px);
        }
        60% {
            transform: translateX(1px);
        }
        80% {
            transform: translateX(-1px);
        }
        100% {
            opacity: 0;
            transform: translateY(-10px);
            visibility: hidden;
        }
    }

    /* File badge styling */
    .downloads-page .file-badge {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
        border-radius: 0.375rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .downloads-page .file-badge:hover {
        transform: scale(1.05);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    /* Download button styling */
    .downloads-page .download-btn {
        text-align: left;
        border-radius: 8px;
        padding: 0.5rem 0.75rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        font-weight: 500;
    }

    .downloads-page .download-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .downloads-page .download-btn small {
        font-size: 0.7rem;
        opacity: 0.8;
        font-weight: 400;
    }

    /* File type specific colors */
    .downloads-page .btn-outline-danger:hover {
        background-color: rgba(220, 53, 69, 0.1);
        border-color: #dc3545;
        color: #dc3545;
    }

    .downloads-page .btn-outline-primary:hover {
        background-color: rgba(13, 110, 253, 0.1);
        border-color: #0d6efd;
        color: #0d6efd;
    }

    .downloads-page .btn-outline-success:hover {
        background-color: rgba(25, 135, 84, 0.1);
        border-color: #198754;
        color: #198754;
    }

    /* Mobile responsive grid adjustments */
    @media (max-width: 768px) {
        .downloads-page .col-xl-3 {
            max-width: 50%;
        }
    }

    @media (max-width: 576px) {
        .downloads-page .col-xl-3,
        .downloads-page .col-md-4,
        .downloads-page .col-sm-6 {
            max-width: 100%;
            flex: 0 0 100%;
        }

        .downloads-page .tech-card {
            padding: 1rem;
        }

        .downloads-page .card-title {
            font-size: 1.1rem;
        }

        .downloads-page .display-4,
        .downloads-page .display-6 {
            font-size: 2rem;
        }

        .downloads-page .card-body {
            padding: 1rem !important;
        }

        .downloads-page .download-btn {
            font-size: 0.8rem;
            padding: 0.4rem 0.6rem;
        }

        .downloads-page .download-btn small {
            font-size: 0.65rem;
        }

        .downloads-page .file-badge {
            font-size: 0.7rem;
            padding: 0.2rem 0.4rem;
        }

        /* Stack download buttons vertically on mobile */
        .downloads-page .download-buttons {
            gap: 0.5rem !important;
        }

        /* Reduce spacing on mobile */
        .downloads-page .available-files .d-flex {
            gap: 0.25rem !important;
        }
    }

    /* Ultra small screens */
    @media (max-width: 400px) {
        .downloads-page .download-btn {
            font-size: 0.75rem;
            padding: 0.35rem 0.5rem;
        }

        .downloads-page .file-badge {
            font-size: 0.65rem;
        }

        .downloads-page .card-body {
            padding: 0.75rem !important;
        }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Parallax effect for tech-card within .downloads-page
    document.addEventListener('mousemove', (e) => {
        const cards = document.querySelectorAll('.downloads-page .tech-card');
        cards.forEach(card => {
            const rect = card.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            const moveX = (e.clientX - centerX) / 50;
            const moveY = (e.clientY - centerY) / 50;

            card.style.setProperty('--parallax-x', `${moveX}px`);
            card.style.setProperty('--parallax-y', `${moveY}px`);
            const after = card.querySelector('::after');
            if (after) {
                after.style.transform = `translate(${moveX}px, ${moveY}px)`;
            }
        });
    });

    // Close other subcategories when opening a new one
    const categoryCards = document.querySelectorAll('.downloads-page .category-card');
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const target = this.dataset.bsTarget;
            document.querySelectorAll('.downloads-page .collapse').forEach(collapse => {
                if (collapse.id !== target.substring(1)) {
                    bootstrap.Collapse.getInstance(collapse)?.hide();
                }
            });
        });
    });

    // Close other document lists when opening a new one
    const subcategoryCards = document.querySelectorAll('.downloads-page .subcategory-card');
    subcategoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const target = this.dataset.bsTarget;
            document.querySelectorAll('.downloads-page .collapse').forEach(collapse => {
                if (collapse.id !== target.substring(1)) {
                    bootstrap.Collapse.getInstance(collapse)?.hide();
                }
            });
        });
    });
});
</script>
@endpush
@endsection
