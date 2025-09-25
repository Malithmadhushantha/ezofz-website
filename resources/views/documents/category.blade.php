@extends('layouts.app')

@section('title', $category->name . ' Documents - EZofz.lk')
@section('description', 'Browse and download documents for the ' . $category->name . ' category from EZofz.lk.')
@section('keywords', $category->name . ' documents, downloads, Sri Lanka, forms')

@section('content')
<div class="container py-4 category-documents-page">
    <!-- Header -->
    <div class="row mb-4" data-aos="fade-up">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2 class="mb-0">
                    <i class="bi bi-folder2-open me-2 text-primary"></i>
                    {{ ucfirst($category->name) }} Documents
                </h2>
                <a href="{{ route('documents.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Back to Categories
                </a>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-primary px-3 py-2">
                    {{ $documents->count() }} {{ Str::plural('Document', $documents->count()) }}
                </span>
                <span class="text-muted">Category: {{ ucfirst($category->name) }}</span>
            </div>
        </div>
    </div>

    @if($documents->count())
        <!-- Mobile Card View (Hidden on Desktop) -->
        <div class="d-block d-lg-none">
            <div class="row g-3">
                @foreach($documents as $document)
                    <div class="col-12" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                        <div class="card document-mobile-card">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <h6 class="card-title mb-1 flex-grow-1">
                                        <i class="bi bi-file-earmark-text me-2 text-primary"></i>
                                        {{ $document->title }}
                                    </h6>
                                </div>

                                @if($document->description)
                                    <p class="card-text text-muted mb-2" style="font-size: 0.85rem;">
                                        {{ Str::limit($document->description, 80) }}
                                    </p>
                                @endif

                                <!-- File Type Badges -->
                                <div class="mb-2">
                                    @if($document->hasPdfFile())
                                        <span class="badge bg-danger me-1">
                                            <i class="bi bi-file-pdf me-1"></i>PDF
                                        </span>
                                    @endif
                                    @if($document->hasWordFile())
                                        <span class="badge bg-primary me-1">
                                            <i class="bi bi-file-word me-1"></i>Word
                                        </span>
                                    @endif
                                    @if($document->hasExcelFile())
                                        <span class="badge bg-success me-1">
                                            <i class="bi bi-file-excel me-1"></i>Excel
                                        </span>
                                    @endif
                                </div>

                                <!-- Download Buttons -->
                                <div class="d-grid gap-1">
                                    @if($document->hasPdfFile())
                                        <a href="{{ route('documents.download', ['document' => $document, 'type' => 'pdf']) }}"
                                           class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-download me-1"></i>Download PDF ({{ $document->getPdfFileSizeFormatted() }})
                                        </a>
                                    @endif
                                    @if($document->hasWordFile())
                                        <a href="{{ route('documents.download', ['document' => $document, 'type' => 'word']) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-download me-1"></i>Download Word ({{ $document->getWordFileSizeFormatted() }})
                                        </a>
                                    @endif
                                    @if($document->hasExcelFile())
                                        <a href="{{ route('documents.download', ['document' => $document, 'type' => 'excel']) }}"
                                           class="btn btn-sm btn-outline-success">
                                            <i class="bi bi-download me-1"></i>Download Excel ({{ $document->getExcelFileSizeFormatted() }})
                                        </a>
                                    @endif
                                </div>

                                <div class="mt-2 text-end">
                                    <small class="text-muted">{{ $document->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Desktop Table View (Hidden on Mobile) -->
        <div class="d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
            <div class="table-responsive">
                <table class="table table-hover align-middle desktop-documents-table">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 25%;">Title</th>
                            <th style="width: 35%;">Description</th>
                            <th style="width: 20%;">Available Files</th>
                            <th style="width: 12%;">Uploaded</th>
                            <th style="width: 8%;">Downloads</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $document)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-file-earmark-text me-2 text-primary"></i>
                                        <strong>{{ $document->title }}</strong>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-muted">{{ $document->description ?: 'No description' }}</span>
                                </td>
                                <td>
                                    <div class="d-flex flex-column gap-1">
                                        @if($document->hasPdfFile())
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="badge bg-danger">
                                                    <i class="bi bi-file-pdf me-1"></i>PDF
                                                </span>
                                                <small class="text-muted ms-2">{{ $document->getPdfFileSizeFormatted() }}</small>
                                            </div>
                                        @endif
                                        @if($document->hasWordFile())
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-file-word me-1"></i>Word
                                                </span>
                                                <small class="text-muted ms-2">{{ $document->getWordFileSizeFormatted() }}</small>
                                            </div>
                                        @endif
                                        @if($document->hasExcelFile())
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="badge bg-success">
                                                    <i class="bi bi-file-excel me-1"></i>Excel
                                                </span>
                                                <small class="text-muted ms-2">{{ $document->getExcelFileSizeFormatted() }}</small>
                                            </div>
                                        @endif
                                        @if(!$document->hasPdfFile() && !$document->hasWordFile() && !$document->hasExcelFile())
                                            <span class="text-muted">No files available</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $document->created_at->format('M d, Y') }}</small>
                                </td>
                                <td>
                                    <div class="btn-group-vertical btn-group-sm">
                                        @if($document->hasPdfFile())
                                            <a href="{{ route('documents.download', ['document' => $document, 'type' => 'pdf']) }}"
                                               class="btn btn-outline-danger btn-sm mb-1" title="Download PDF">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        @endif
                                        @if($document->hasWordFile())
                                            <a href="{{ route('documents.download', ['document' => $document, 'type' => 'word']) }}"
                                               class="btn btn-outline-primary btn-sm mb-1" title="Download Word">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        @endif
                                        @if($document->hasExcelFile())
                                            <a href="{{ route('documents.download', ['document' => $document, 'type' => 'excel']) }}"
                                               class="btn btn-outline-success btn-sm mb-1" title="Download Excel">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4" data-aos="fade-up" data-aos-delay="300">
            {{ $documents->links() }}
        </div>
    @else
        <div class="text-center py-5" data-aos="fade-up">
            <i class="bi bi-file-x display-1 text-muted mb-3"></i>
            <h4 class="text-muted mb-3">No Documents Found</h4>
            <p class="text-muted mb-4">No documents are available in the {{ $category->name }} category at this time.</p>
            <a href="{{ route('documents.index') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left me-2"></i>Browse All Categories
            </a>
        </div>
    @endif
</div>

@push('styles')
<style>
/* Category documents page specific styles */
.category-documents-page {
    font-family: 'Rajdhani', sans-serif;
}

.category-documents-page .document-mobile-card {
    background: rgba(15, 20, 30, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(0, 214, 255, 0.2);
    border-radius: 12px;
    transition: all 0.3s ease;
}

.category-documents-page .document-mobile-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 214, 255, 0.15);
    border-color: rgba(0, 214, 255, 0.4);
}

.category-documents-page .desktop-documents-table {
    background: rgba(15, 20, 30, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    overflow: hidden;
}

.category-documents-page .desktop-documents-table thead th {
    background: rgba(10, 14, 23, 0.9);
    border: none;
    color: #e0e0e0;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.category-documents-page .desktop-documents-table tbody tr {
    background: rgba(20, 25, 35, 0.6);
    border: none;
    transition: all 0.3s ease;
}

.category-documents-page .desktop-documents-table tbody tr:hover {
    background: rgba(0, 214, 255, 0.1);
    transform: scale(1.01);
}

.category-documents-page .desktop-documents-table td {
    border: none;
    color: #d1d5db;
    vertical-align: middle;
    padding: 1rem 0.75rem;
}

.category-documents-page .badge {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 0.375rem;
    font-weight: 600;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.category-documents-page .btn {
    border-radius: 6px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.category-documents-page .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

/* Mobile specific improvements */
@media (max-width: 991.98px) {
    .category-documents-page .document-mobile-card .btn {
        font-size: 0.8rem;
        padding: 0.4rem 0.6rem;
    }

    .category-documents-page .badge {
        font-size: 0.7rem;
        padding: 0.2rem 0.4rem;
    }
}

@media (max-width: 576px) {
    .category-documents-page .document-mobile-card .btn {
        font-size: 0.75rem;
        padding: 0.35rem 0.5rem;
    }

    .category-documents-page .card-body {
        padding: 1rem !important;
    }

    .category-documents-page h2 {
        font-size: 1.5rem;
    }

    .category-documents-page .d-flex.align-items-center.justify-content-between {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 1rem;
    }

    .category-documents-page .d-flex.align-items-center.gap-3 {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 0.5rem !important;
    }
}

/* Animation improvements */
.category-documents-page .document-mobile-card,
.category-documents-page .desktop-documents-table {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Download button hover effects */
.category-documents-page .btn-outline-danger:hover {
    background-color: rgba(220, 53, 69, 0.1);
    border-color: #dc3545;
    color: #dc3545;
}

.category-documents-page .btn-outline-primary:hover {
    background-color: rgba(13, 110, 253, 0.1);
    border-color: #0d6efd;
    color: #0d6efd;
}

.category-documents-page .btn-outline-success:hover {
    background-color: rgba(25, 135, 84, 0.1);
    border-color: #198754;
    color: #198754;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add download tracking
    const downloadButtons = document.querySelectorAll('a[href*="download"]');
    downloadButtons.forEach(button => {
        button.addEventListener('click', function() {
            const fileType = this.href.includes('type=pdf') ? 'PDF' :
                           this.href.includes('type=word') ? 'Word' :
                           this.href.includes('type=excel') ? 'Excel' : 'Unknown';

            console.log(`Downloading ${fileType} file:`, this.href);

            // Add visual feedback
            const originalHTML = this.innerHTML;
            this.innerHTML = '<i class="bi bi-spinner-border spinner-border-sm me-1"></i>Downloading...';
            this.disabled = true;

            // Reset after 2 seconds
            setTimeout(() => {
                this.innerHTML = originalHTML;
                this.disabled = false;
            }, 2000);
        });
    });

    // Add hover effects to mobile cards
    const mobileCards = document.querySelectorAll('.document-mobile-card');
    mobileCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endpush
@endsection
