@extends('layouts.app')

@section('title', 'Police Documents - EZofz.lk')
@section('description', 'Browse and download official police documents from EZofz.lk.')
@section('keywords', 'police documents, downloads, Sri Lanka, police, forms')

@section('content')
<div class="police-documents-page min-vh-100">
    <div class="container-fluid px-3 px-lg-4 py-3">

        <!-- Header Section -->
        <div class="row mb-3" data-aos="fade-up">
            <div class="col-12">
                <div class="header-card">
                    <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                        <div class="header-info">
                            <h1 class="page-title mb-2">
                                <i class="bi bi-shield-check me-3"></i>Police Documents
                                @if(isset($subcategoryModel))
                                    <small class="subcategory-title">/ {{ $subcategoryModel->name }}</small>
                                @endif
                            </h1>
                            <p class="page-subtitle mb-0">Browse and download official police documents and forms</p>
                        </div>
                        <div class="header-stats d-flex gap-2">
                            <span class="stat-badge">
                                <i class="bi bi-files me-1"></i>
                                {{ $documents->total() }} Documents
                            </span>
                            @if($subcategories->count())
                                <span class="stat-badge">
                                    <i class="bi bi-folder2-open me-1"></i>
                                    {{ $subcategories->count() }} Categories
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="row mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12">
                <ul class="nav nav-pills document-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('documents.law') }}">
                            <i class="bi bi-scale me-2"></i>Law Documents
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('documents.police') }}">
                            <i class="bi bi-shield-check me-2"></i>Police Documents
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Subcategories Filter (if available) -->
        @if($subcategories->count())
            <div class="row mb-4" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <div class="subcategory-filter">
                        <h6 class="filter-title mb-2">
                            <i class="bi bi-funnel me-2"></i>Filter by Category
                        </h6>
                        <div class="subcategory-buttons">
                            <a href="{{ route('documents.police') }}"
                               class="subcategory-btn {{ !isset($subcategoryModel) ? 'active' : '' }}"
                               data-subcategory="all">
                                <i class="bi bi-grid-3x3-gap me-1"></i>All Categories
                                <span class="count">{{ $documents->total() }}</span>
                            </a>
                            @foreach($subcategories as $subcategory)
                                <a href="{{ route('documents.police.subcategory', $subcategory->id) }}"
                                   class="subcategory-btn {{ isset($subcategoryModel) && $subcategoryModel->id == $subcategory->id ? 'active' : '' }}"
                                   data-subcategory="{{ $subcategory->id }}">
                                    <i class="bi bi-folder me-1"></i>{{ $subcategory->name }}
                                    <span class="count">{{ $subcategory->documents->count() }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($documents->count())
            <!-- Documents Grid -->
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-12">
                    <div class="documents-grid" id="documentsContainer">
                        @foreach($documents as $document)
                            <div class="document-card"
                                 data-subcategory="{{ $document->subcategory_id ?? 'none' }}"
                                 data-aos="fade-up"
                                 data-aos-delay="{{ $loop->index * 50 }}">

                                <!-- Document Header -->
                                <div class="document-header">
                                    <div class="document-icon">
                                        <i class="bi bi-shield-fill"></i>
                                    </div>
                                    <div class="document-meta">
                                        <h5 class="document-title">{{ $document->title }}</h5>
                                        @if($document->subcategory)
                                            <span class="document-category">
                                                <i class="bi bi-folder me-1"></i>{{ $document->subcategory->name }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Document Description -->
                                @if($document->description)
                                    <div class="document-description">
                                        <p>{{ Str::limit($document->description, 120) }}</p>
                                    </div>
                                @endif

                                <!-- Available Files -->
                                <div class="document-files">
                                    <h6 class="files-title">
                                        <i class="bi bi-download me-2"></i>Available Downloads
                                    </h6>
                                    <div class="files-grid">
                                        @if($document->hasPdfFile())
                                            <a href="{{ route('documents.download', ['document' => $document, 'type' => 'pdf']) }}"
                                               class="file-download pdf-file" data-file-type="PDF">
                                                <div class="file-icon">
                                                    <i class="bi bi-file-pdf"></i>
                                                </div>
                                                <div class="file-info">
                                                    <span class="file-type">PDF</span>
                                                    <span class="file-size">{{ $document->getPdfFileSizeFormatted() }}</span>
                                                </div>
                                                <div class="download-icon">
                                                    <i class="bi bi-arrow-down-circle"></i>
                                                </div>
                                            </a>
                                        @endif

                                        @if($document->hasWordFile())
                                            <a href="{{ route('documents.download', ['document' => $document, 'type' => 'word']) }}"
                                               class="file-download word-file" data-file-type="Word">
                                                <div class="file-icon">
                                                    <i class="bi bi-file-word"></i>
                                                </div>
                                                <div class="file-info">
                                                    <span class="file-type">Word</span>
                                                    <span class="file-size">{{ $document->getWordFileSizeFormatted() }}</span>
                                                </div>
                                                <div class="download-icon">
                                                    <i class="bi bi-arrow-down-circle"></i>
                                                </div>
                                            </a>
                                        @endif

                                        @if($document->hasExcelFile())
                                            <a href="{{ route('documents.download', ['document' => $document, 'type' => 'excel']) }}"
                                               class="file-download excel-file" data-file-type="Excel">
                                                <div class="file-icon">
                                                    <i class="bi bi-file-excel"></i>
                                                </div>
                                                <div class="file-info">
                                                    <span class="file-type">Excel</span>
                                                    <span class="file-size">{{ $document->getExcelFileSizeFormatted() }}</span>
                                                </div>
                                                <div class="download-icon">
                                                    <i class="bi bi-arrow-down-circle"></i>
                                                </div>
                                            </a>
                                        @endif

                                        @if(!$document->hasPdfFile() && !$document->hasWordFile() && !$document->hasExcelFile())
                                            <div class="no-files">
                                                <i class="bi bi-exclamation-triangle me-2"></i>
                                                No files available
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Document Footer -->
                                <div class="document-footer">
                                    <div class="upload-date">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ $document->created_at->format('M d, Y') }}
                                    </div>
                                    <div class="time-ago">
                                        {{ $document->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            @if($documents->hasPages())
                <div class="row mt-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-12">
                        <div class="pagination-wrapper">
                            {{ $documents->links() }}
                        </div>
                    </div>
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="row" data-aos="fade-up">
                <div class="col-12">
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="bi bi-shield-x"></i>
                        </div>
                        <h4 class="empty-title">No Police Documents Found</h4>
                        <p class="empty-description">
                            No police documents are available at this time. Please check back later or browse our other document categories.
                        </p>
                        <div class="empty-actions">
                            <a href="{{ route('documents.law') }}" class="btn btn-primary">
                                <i class="bi bi-scale me-2"></i>Browse Law Documents
                            </a>
                            <a href="{{ route('documents.index') }}" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left me-2"></i>All Categories
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Adsense Ad -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="ad-container">
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-xxxxxxxxxxxxxxxx"
                         data-ad-slot="xxxxxxxxxx"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
/* Police Documents Page Styles */
.police-documents-page {
    font-family: 'Inter', 'Segoe UI', sans-serif;
    background: linear-gradient(135deg,
        rgba(10, 14, 23, 0.95) 0%,
        rgba(5, 7, 12, 0.98) 50%,
        rgba(10, 14, 23, 0.95) 100%);
    min-height: 100vh;
    color: #e2e8f0;
}

/* Header Card */
.police-documents-page .header-card {
    background: rgba(15, 23, 42, 0.9);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

.police-documents-page .page-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #60a5fa;
    margin: 0;
    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.police-documents-page .subcategory-title {
    font-size: 1.5rem;
    font-weight: 400;
    color: #94a3b8;
    opacity: 0.8;
}

.police-documents-page .page-subtitle {
    font-size: 1.1rem;
    color: #94a3b8;
    margin: 0;
}

.police-documents-page .header-stats {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.police-documents-page .stat-badge {
    background: rgba(59, 130, 246, 0.1);
    color: #60a5fa;
    border: 1px solid rgba(59, 130, 246, 0.3);
    padding: 0.5rem 1rem;
    border-radius: 12px;
    font-size: 0.9rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    white-space: nowrap;
}

/* Navigation */
.police-documents-page .document-nav {
    background: rgba(15, 23, 42, 0.6);
    padding: 0.5rem;
    border-radius: 12px;
    border: 1px solid rgba(59, 130, 246, 0.2);
}

.police-documents-page .document-nav .nav-link {
    color: #94a3b8;
    border-radius: 8px;
    padding: 0.75rem 1.5rem;
    margin: 0 0.25rem;
    transition: all 0.3s ease;
    border: none;
    font-weight: 500;
}

.police-documents-page .document-nav .nav-link:hover {
    color: #60a5fa;
    background: rgba(59, 130, 246, 0.1);
}

.police-documents-page .document-nav .nav-link.active {
    color: #ffffff;
    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

/* Subcategory Filter */
.police-documents-page .subcategory-filter {
    background: rgba(15, 23, 42, 0.7);
    border-radius: 12px;
    padding: 1.5rem;
    border: 1px solid rgba(59, 130, 246, 0.2);
}

.police-documents-page .filter-title {
    color: #60a5fa;
    margin-bottom: 1rem;
    font-weight: 600;
}

.police-documents-page .subcategory-buttons {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.police-documents-page .subcategory-btn {
    background: rgba(30, 41, 59, 0.8);
    color: #94a3b8;
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 8px;
    padding: 0.5rem 1rem;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
}

.police-documents-page .subcategory-btn:hover {
    background: rgba(59, 130, 246, 0.1);
    color: #60a5fa;
    border-color: rgba(59, 130, 246, 0.4);
    text-decoration: none;
}

.police-documents-page .subcategory-btn.active {
    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
    color: #ffffff;
    border-color: #60a5fa;
}

.police-documents-page .subcategory-btn .count {
    background: rgba(255, 255, 255, 0.2);
    padding: 0.2rem 0.4rem;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 600;
}

/* Documents Grid */
.police-documents-page .documents-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.police-documents-page .document-card {
    background: rgba(15, 23, 42, 0.9);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 16px;
    padding: 1.5rem;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.police-documents-page .document-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #60a5fa 0%, #3b82f6 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.police-documents-page .document-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(59, 130, 246, 0.2);
    border-color: rgba(59, 130, 246, 0.4);
}

.police-documents-page .document-card:hover::before {
    opacity: 1;
}

/* Document Header */
.police-documents-page .document-header {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1rem;
}

.police-documents-page .document-icon {
    background: rgba(59, 130, 246, 0.1);
    color: #60a5fa;
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.police-documents-page .document-meta {
    flex: 1;
}

.police-documents-page .document-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #f8fafc;
    margin: 0 0 0.5rem 0;
    line-height: 1.4;
}

.police-documents-page .document-category {
    background: rgba(59, 130, 246, 0.1);
    color: #60a5fa;
    padding: 0.25rem 0.75rem;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: 500;
    border: 1px solid rgba(59, 130, 246, 0.3);
}

/* Document Description */
.police-documents-page .document-description {
    margin-bottom: 1.5rem;
}

.police-documents-page .document-description p {
    color: #94a3b8;
    line-height: 1.6;
    margin: 0;
}

/* Files Section */
.police-documents-page .document-files {
    margin-bottom: 1rem;
}

.police-documents-page .files-title {
    color: #cbd5e1;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.police-documents-page .files-grid {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.police-documents-page .file-download {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(30, 41, 59, 0.6);
    border-radius: 12px;
    border: 1px solid transparent;
    transition: all 0.3s ease;
    text-decoration: none;
    color: inherit;
}

.police-documents-page .file-download:hover {
    transform: translateX(4px);
    text-decoration: none;
    color: inherit;
}

.police-documents-page .file-download.pdf-file {
    border-color: rgba(239, 68, 68, 0.3);
}

.police-documents-page .file-download.pdf-file:hover {
    background: rgba(239, 68, 68, 0.1);
    border-color: rgba(239, 68, 68, 0.5);
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
}

.police-documents-page .file-download.word-file {
    border-color: rgba(59, 130, 246, 0.3);
}

.police-documents-page .file-download.word-file:hover {
    background: rgba(59, 130, 246, 0.1);
    border-color: rgba(59, 130, 246, 0.5);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
}

.police-documents-page .file-download.excel-file {
    border-color: rgba(34, 197, 94, 0.3);
}

.police-documents-page .file-download.excel-file:hover {
    background: rgba(34, 197, 94, 0.1);
    border-color: rgba(34, 197, 94, 0.5);
    box-shadow: 0 4px 12px rgba(34, 197, 94, 0.2);
}

.police-documents-page .file-icon {
    font-size: 1.5rem;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
}

.police-documents-page .pdf-file .file-icon {
    color: #ef4444;
    background: rgba(239, 68, 68, 0.1);
}

.police-documents-page .word-file .file-icon {
    color: #3b82f6;
    background: rgba(59, 130, 246, 0.1);
}

.police-documents-page .excel-file .file-icon {
    color: #22c55e;
    background: rgba(34, 197, 94, 0.1);
}

.police-documents-page .file-info {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.police-documents-page .file-type {
    font-weight: 600;
    color: #f8fafc;
    margin-bottom: 0.25rem;
}

.police-documents-page .file-size {
    font-size: 0.8rem;
    color: #94a3b8;
}

.police-documents-page .download-icon {
    font-size: 1.25rem;
    color: #94a3b8;
    transition: all 0.3s ease;
}

.police-documents-page .file-download:hover .download-icon {
    color: #f8fafc;
    transform: scale(1.1);
}

.police-documents-page .no-files {
    text-align: center;
    padding: 2rem 1rem;
    color: #64748b;
    font-style: italic;
}

/* Document Footer */
.police-documents-page .document-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    border-top: 1px solid rgba(59, 130, 246, 0.1);
    font-size: 0.85rem;
}

.police-documents-page .upload-date {
    color: #94a3b8;
    font-weight: 500;
}

.police-documents-page .time-ago {
    color: #64748b;
}

/* Empty State */
.police-documents-page .empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: rgba(15, 23, 42, 0.7);
    border-radius: 16px;
    border: 2px dashed rgba(59, 130, 246, 0.3);
}

.police-documents-page .empty-icon {
    font-size: 4rem;
    color: #64748b;
    margin-bottom: 1.5rem;
}

.police-documents-page .empty-title {
    color: #cbd5e1;
    margin-bottom: 1rem;
}

.police-documents-page .empty-description {
    color: #94a3b8;
    margin-bottom: 2rem;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

.police-documents-page .empty-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

/* Pagination */
.police-documents-page .pagination-wrapper {
    display: flex;
    justify-content: center;
    padding: 2rem 0;
}

.police-documents-page .pagination-wrapper .pagination {
    background: rgba(15, 23, 42, 0.8);
    border-radius: 12px;
    padding: 0.5rem;
    border: 1px solid rgba(59, 130, 246, 0.2);
}

.police-documents-page .pagination-wrapper .page-link {
    background: transparent;
    border: none;
    color: #94a3b8;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    margin: 0 0.25rem;
}

.police-documents-page .pagination-wrapper .page-link:hover {
    background: rgba(59, 130, 246, 0.1);
    color: #60a5fa;
}

.police-documents-page .pagination-wrapper .page-item.active .page-link {
    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
    color: #ffffff;
    border-color: #60a5fa;
}

/* Ad Container */
.police-documents-page .ad-container {
    background: rgba(15, 23, 42, 0.5);
    border-radius: 12px;
    padding: 1.5rem;
    border: 1px solid rgba(59, 130, 246, 0.1);
    text-align: center;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .police-documents-page .documents-grid {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    }
}

@media (max-width: 768px) {
    .police-documents-page .page-title {
        font-size: 2rem;
    }

    .police-documents-page .header-card {
        padding: 1.5rem;
    }

    .police-documents-page .documents-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .police-documents-page .document-card {
        padding: 1.25rem;
    }

    .police-documents-page .subcategory-buttons {
        justify-content: center;
    }

    .police-documents-page .header-stats {
        justify-content: center;
    }

    .police-documents-page .document-footer {
        flex-direction: column;
        gap: 0.5rem;
        text-align: center;
    }
}

@media (max-width: 576px) {
    .police-documents-page .page-title {
        font-size: 1.75rem;
    }

    .police-documents-page .header-card {
        padding: 1rem;
    }

    .police-documents-page .document-card {
        padding: 1rem;
    }

    .police-documents-page .document-header {
        gap: 0.75rem;
    }

    .police-documents-page .document-icon {
        width: 40px;
        height: 40px;
        font-size: 1.25rem;
    }

    .police-documents-page .document-title {
        font-size: 1.1rem;
    }

    .police-documents-page .file-download {
        padding: 0.75rem;
        gap: 0.75rem;
    }

    .police-documents-page .file-icon {
        width: 32px;
        height: 32px;
        font-size: 1.25rem;
    }
}

/* Animation for filtering */
.police-documents-page .document-card.hidden {
    opacity: 0;
    transform: scale(0.8);
    pointer-events: none;
}

.police-documents-page .document-card.visible {
    opacity: 1;
    transform: scale(1);
    pointer-events: auto;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Subcategory Filtering
    const subcategoryButtons = document.querySelectorAll('.subcategory-btn');
    const documentCards = document.querySelectorAll('.document-card');

    subcategoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            subcategoryButtons.forEach(btn => btn.classList.remove('active'));

            // Add active class to clicked button
            this.classList.add('active');

            const selectedSubcategory = this.getAttribute('data-subcategory');

            // Filter documents
            documentCards.forEach(card => {
                const cardSubcategory = card.getAttribute('data-subcategory');

                if (selectedSubcategory === 'all' ||
                    cardSubcategory === selectedSubcategory ||
                    (selectedSubcategory === 'none' && cardSubcategory === 'none')) {
                    card.classList.remove('hidden');
                    card.classList.add('visible');
                } else {
                    card.classList.add('hidden');
                    card.classList.remove('visible');
                }
            });

            // Smooth scroll to documents section
            document.getElementById('documentsContainer').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    });

    // Download functionality with enhanced feedback
    const downloadButtons = document.querySelectorAll('.file-download');

    downloadButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const fileType = this.getAttribute('data-file-type');
            const documentTitle = this.closest('.document-card').querySelector('.document-title').textContent;

            console.log(`Downloading Police ${fileType} file: ${documentTitle}`);

            // Add download animation
            const downloadIcon = this.querySelector('.download-icon i');
            const originalClass = downloadIcon.className;

            downloadIcon.className = 'bi bi-arrow-down-circle-fill';
            this.style.transform = 'translateX(8px)';

            // Create download notification
            const notification = document.createElement('div');
            notification.innerHTML = `
                <div style="position: fixed; top: 20px; right: 20px; z-index: 9999;
                           background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
                           color: white; padding: 1rem 1.5rem; border-radius: 12px;
                           box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
                           animation: slideInRight 0.3s ease-out;">
                    <i class="bi bi-download me-2"></i>
                    Downloading ${fileType} file...
                </div>
            `;
            document.body.appendChild(notification);

            // Reset animation after delay
            setTimeout(() => {
                downloadIcon.className = originalClass;
                this.style.transform = '';
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 2000);
        });

        // Hover effect for download buttons
        button.addEventListener('mouseenter', function() {
            this.querySelector('.download-icon').style.transform = 'scale(1.2) rotate(10deg)';
        });

        button.addEventListener('mouseleave', function() {
            this.querySelector('.download-icon').style.transform = 'scale(1) rotate(0deg)';
        });
    });

    // Add CSS animation for notifications
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    `;
    document.head.appendChild(style);

    // Initialize AOS if available
    if (typeof AOS !== 'undefined') {
        AOS.refresh();
    }

    // Lazy loading for better performance
    if ('IntersectionObserver' in window) {
        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });

        documentCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease-out';
            cardObserver.observe(card);
        });
    }
});
</script>
@endpush
@endsection
