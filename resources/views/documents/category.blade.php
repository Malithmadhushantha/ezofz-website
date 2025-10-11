@extends('layouts.app')

@section('title', $category->name . ' Documents - EZofz.lk')
@section('description', 'Browse and download documents for the ' . $category->name . ' category from EZofz.lk.')
@section('keywords', $category->name . ' documents, downloads, Sri Lanka, forms')

@section('content')
<div class="category-documents-page">
    <!-- Modern Hero Section -->
    <div class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-text" data-aos="fade-up">
                            <div class="category-icon mb-3">
                                @if($category->name === 'law')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                        <polyline points="14,2 14,8 20,8"/>
                                        <line x1="16" y1="13" x2="8" y2="13"/>
                                        <line x1="16" y1="17" x2="8" y2="17"/>
                                        <polyline points="10,9 9,9 8,9"/>
                                    </svg>
                                @elseif($category->name === 'police')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                        <path d="M9 12l2 2 4-4"/>
                                    </svg>
                                @else
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                                    </svg>
                                @endif
                            </div>
                            <h1 class="hero-title">
                                {{ ucfirst($category->name) }} <span class="gradient-text">Documents</span>
                            </h1>
                            <p class="hero-subtitle">
                                Access official {{ $category->name }} documents, forms, and templates
                            </p>
                            <div class="hero-stats">
                                <div class="stat-item">
                                    <span class="stat-number">{{ $documents->count() }}</span>
                                    <span class="stat-label">{{ Str::plural('Document', $documents->count()) }}</span>
                                </div>
                                <div class="stat-divider"></div>
                                <div class="stat-item">
                                    <span class="stat-label">Category</span>
                                    <span class="stat-value">{{ ucfirst($category->name) }}</span>
                                </div>
                            </div>
                            <a href="{{ route('documents.index') }}" class="back-btn" data-aos="fade-up" data-aos-delay="200">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="15,18 9,12 15,6"/>
                                </svg>
                                <span>Back to All Categories</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">

        @if($documents->count())
            <!-- Modern Document Grid -->
            <div class="documents-grid">
                <div class="row g-4">
                    @foreach($documents as $document)
                        <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                            <div class="document-card tech-card">
                                <div class="card-glow"></div>
                                <div class="card-body">
                                    <div class="document-icon mb-3">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                            <polyline points="14,2 14,8 20,8"/>
                                            <line x1="16" y1="13" x2="8" y2="13"/>
                                            <line x1="16" y1="17" x2="8" y2="17"/>
                                        </svg>
                                    </div>

                                    <h5 class="document-title">{{ $document->title }}</h5>

                                    @if($document->description)
                                        <p class="document-description">
                                            {{ Str::limit($document->description, 120) }}
                                        </p>
                                    @endif

                                    <!-- File Type Badges -->
                                    <div class="file-badges mb-3">
                                        @if($document->hasPdfFile())
                                            <span class="file-badge pdf">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                                    <polyline points="14,2 14,8 20,8"/>
                                                </svg>
                                                PDF
                                            </span>
                                        @endif
                                        @if($document->hasWordFile())
                                            <span class="file-badge word">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                                    <polyline points="14,2 14,8 20,8"/>
                                                    <line x1="10" y1="12" x2="14" y2="12"/>
                                                </svg>
                                                Word
                                            </span>
                                        @endif
                                        @if($document->hasExcelFile())
                                            <span class="file-badge excel">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                                    <line x1="9" y1="9" x2="15" y2="15"/>
                                                    <line x1="15" y1="9" x2="9" y2="15"/>
                                                </svg>
                                                Excel
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Download Section -->
                                    <div class="download-section">
                                        <div class="download-buttons">
                                            @if($document->hasPdfFile())
                                                <a href="{{ route('documents.download', ['document' => $document, 'type' => 'pdf']) }}"
                                                   class="download-btn pdf-btn">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                                        <polyline points="7,10 12,15 17,10"/>
                                                        <line x1="12" y1="15" x2="12" y2="3"/>
                                                    </svg>
                                                    <span>PDF</span>
                                                    <small>{{ $document->getPdfFileSizeFormatted() }}</small>
                                                </a>
                                            @endif
                                            @if($document->hasWordFile())
                                                <a href="{{ route('documents.download', ['document' => $document, 'type' => 'word']) }}"
                                                   class="download-btn word-btn">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                                        <polyline points="7,10 12,15 17,10"/>
                                                        <line x1="12" y1="15" x2="12" y2="3"/>
                                                    </svg>
                                                    <span>Word</span>
                                                    <small>{{ $document->getWordFileSizeFormatted() }}</small>
                                                </a>
                                            @endif
                                            @if($document->hasExcelFile())
                                                <a href="{{ route('documents.download', ['document' => $document, 'type' => 'excel']) }}"
                                                   class="download-btn excel-btn">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                                        <polyline points="7,10 12,15 17,10"/>
                                                        <line x1="12" y1="15" x2="12" y2="3"/>
                                                    </svg>
                                                    <span>Excel</span>
                                                    <small>{{ $document->getExcelFileSizeFormatted() }}</small>
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="document-meta">
                                        <span class="upload-date">{{ $document->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="card-border"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Pagination -->
            @if($documents->hasPages())
                <div class="pagination-wrapper text-center mt-5" data-aos="fade-up" data-aos-delay="300">
                    <div class="pagination-container">
                        {{ $documents->links() }}
                    </div>
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="empty-state" data-aos="fade-up">
                <div class="empty-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                        <line x1="8" y1="13" x2="16" y2="13"/>
                    </svg>
                </div>
                <h3 class="empty-title">No Documents Found</h3>
                <p class="empty-subtitle">
                    No documents are currently available in the {{ $category->name }} category.
                    Please check back later or browse other categories.
                </p>
                <a href="{{ route('documents.index') }}" class="empty-action-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15,18 9,12 15,6"/>
                    </svg>
                    <span>Browse All Categories</span>
                </a>
            </div>
        @endif
</div>

@push('styles')
<style>
/* ========== MODERN CATEGORY DOCUMENTS PAGE ========== */
:root {
    --primary-blue: #667eea;
    --secondary-blue: #764ba2;
    --accent-blue: #00d6ff;
    --tech-cyan: #00d6ff;
    --accent-color: #ffd700;
    --dark-bg: #0a0e17;
    --card-bg: rgba(15, 20, 30, 0.8);
}

.category-documents-page {
    font-family: 'Rajdhani', sans-serif;
    background: var(--dark-bg);
    min-height: 100vh;
    position: relative;
    overflow-x: hidden;
}

/* ========== HERO SECTION ========== */
.hero-section {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    position: relative;
    padding: 120px 0 80px;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Ccircle cx='30' cy='30' r='1'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
    animation: float 20s ease-in-out infinite;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(1px);
}

.hero-content {
    position: relative;
    z-index: 2;
}

.category-icon {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.category-icon svg {
    width: 40px;
    height: 40px;
    color: white;
}

.hero-title {
    font-family: 'Orbitron', sans-serif;
    font-size: 3.5rem;
    font-weight: 700;
    color: white;
    margin: 0;
    line-height: 1.2;
    text-shadow: 0 0 30px rgba(255, 255, 255, 0.3);
}

.gradient-text {
    background: linear-gradient(45deg, var(--accent-blue), var(--accent-color));
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    color: transparent;
}

.hero-subtitle {
    font-size: 1.3rem;
    color: rgba(255, 255, 255, 0.9);
    margin: 1rem 0 2rem;
    font-weight: 400;
}

.hero-stats {
    display: flex;
    align-items: center;
    gap: 2rem;
    margin-bottom: 2rem;
}

.stat-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--accent-color);
    font-family: 'Orbitron', sans-serif;
    text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
}

.stat-label {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.8);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-value {
    font-size: 1.1rem;
    color: white;
    font-weight: 600;
}

.stat-divider {
    width: 2px;
    height: 40px;
    background: linear-gradient(to bottom, transparent, rgba(255, 255, 255, 0.3), transparent);
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 12px 24px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    color: white;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.back-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.back-btn svg {
    width: 18px;
    height: 18px;
}

/* ========== DOCUMENT GRID ========== */
.documents-grid {
    margin-top: -40px;
    position: relative;
    z-index: 3;
}

.tech-card {
    background: var(--card-bg);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(0, 214, 255, 0.2);
    border-radius: 16px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    height: 100%;
}

.tech-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 214, 255, 0.2);
    border-color: rgba(0, 214, 255, 0.5);
}

.card-glow {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--tech-cyan), transparent);
    animation: glow 3s ease-in-out infinite;
}

@keyframes glow {
    0%, 100% { opacity: 0.3; }
    50% { opacity: 1; }
}

.card-body {
    padding: 2rem;
    position: relative;
    z-index: 2;
}

.document-icon {
    width: 60px;
    height: 60px;
    background: rgba(0, 214, 255, 0.1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(0, 214, 255, 0.3);
}

.document-icon svg {
    width: 30px;
    height: 30px;
    color: var(--tech-cyan);
}

.document-title {
    font-family: 'Orbitron', sans-serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: #e0e0e0;
    margin: 1rem 0 0.5rem;
    line-height: 1.3;
}

.document-description {
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.95rem;
    line-height: 1.5;
    margin-bottom: 1.5rem;
}

/* File Badges */
.file-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.file-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    padding: 0.4rem 0.8rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.file-badge svg {
    width: 14px;
    height: 14px;
}

.file-badge.pdf {
    background: rgba(220, 53, 69, 0.1);
    border: 1px solid rgba(220, 53, 69, 0.3);
    color: #dc3545;
}

.file-badge.word {
    background: rgba(13, 110, 253, 0.1);
    border: 1px solid rgba(13, 110, 253, 0.3);
    color: #0d6efd;
}

.file-badge.excel {
    background: rgba(25, 135, 84, 0.1);
    border: 1px solid rgba(25, 135, 84, 0.3);
    color: #198754;
}

.file-badge:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

/* Download Section */
.download-section {
    margin-top: auto;
}

.download-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.download-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.05);
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.download-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.5s ease;
}

.download-btn:hover::before {
    left: 100%;
}

.download-btn svg {
    width: 16px;
    height: 16px;
}

.download-btn span {
    font-weight: 600;
}

.download-btn small {
    margin-left: auto;
    opacity: 0.7;
    font-size: 0.75rem;
}

.download-btn.pdf-btn:hover {
    border-color: #dc3545;
    background: rgba(220, 53, 69, 0.1);
    color: #dc3545;
}

.download-btn.word-btn:hover {
    border-color: #0d6efd;
    background: rgba(13, 110, 253, 0.1);
    color: #0d6efd;
}

.download-btn.excel-btn:hover {
    border-color: #198754;
    background: rgba(25, 135, 84, 0.1);
    color: #198754;
}

.download-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

.document-meta {
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.upload-date {
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.85rem;
}

.card-border {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--tech-cyan), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.tech-card:hover .card-border {
    opacity: 1;
}

/* ========== PAGINATION ========== */
.pagination-wrapper {
    margin-top: 3rem;
}

.pagination-container {
    display: inline-block;
    padding: 1rem 2rem;
    background: var(--card-bg);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(0, 214, 255, 0.2);
    border-radius: 12px;
}

/* ========== EMPTY STATE ========== */
.empty-state {
    text-align: center;
    padding: 5rem 2rem;
    background: var(--card-bg);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(0, 214, 255, 0.2);
    border-radius: 16px;
    margin-top: -40px;
    position: relative;
    z-index: 3;
}

.empty-icon {
    width: 120px;
    height: 120px;
    background: rgba(0, 214, 255, 0.1);
    border-radius: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    border: 1px solid rgba(0, 214, 255, 0.3);
}

.empty-icon svg {
    width: 60px;
    height: 60px;
    color: var(--tech-cyan);
}

.empty-title {
    font-family: 'Orbitron', sans-serif;
    font-size: 2rem;
    font-weight: 600;
    color: #e0e0e0;
    margin-bottom: 1rem;
}

.empty-subtitle {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 2rem;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

.empty-action-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 12px 24px;
    background: linear-gradient(45deg, var(--primary-blue), var(--secondary-blue));
    border: none;
    border-radius: 8px;
    color: white;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.empty-action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    color: white;
}

.empty-action-btn svg {
    width: 18px;
    height: 18px;
}

/* ========== RESPONSIVE DESIGN ========== */
@media (max-width: 1200px) {
    .hero-title {
        font-size: 3rem;
    }

    .documents-grid .col-lg-4 {
        flex: 0 0 50%;
        max-width: 50%;
    }
}

@media (max-width: 768px) {
    .hero-section {
        padding: 80px 0 60px;
    }

    .hero-title {
        font-size: 2.5rem;
    }

    .hero-subtitle {
        font-size: 1.1rem;
    }

    .hero-stats {
        flex-direction: column;
        gap: 1rem;
    }

    .stat-item {
        flex-direction: row;
        gap: 0.5rem;
    }

    .stat-number {
        font-size: 2rem;
    }

    .stat-divider {
        display: none;
    }

    .category-icon {
        width: 60px;
        height: 60px;
    }

    .category-icon svg {
        width: 30px;
        height: 30px;
    }

    .card-body {
        padding: 1.5rem;
    }

    .document-title {
        font-size: 1.1rem;
    }

    .download-btn {
        padding: 0.6rem 0.8rem;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 2rem;
    }

    .hero-subtitle {
        font-size: 1rem;
    }

    .back-btn {
        padding: 10px 16px;
        font-size: 0.9rem;
    }

    .card-body {
        padding: 1rem;
    }

    .documents-grid .col-md-6 {
        flex: 0 0 100%;
        max-width: 100%;
    }

    .download-buttons {
        gap: 0.3rem;
    }

    .download-btn {
        padding: 0.5rem 0.7rem;
        font-size: 0.85rem;
    }

    .file-badge {
        padding: 0.3rem 0.6rem;
        font-size: 0.7rem;
    }

    .empty-state {
        padding: 3rem 1rem;
    }

    .empty-icon {
        width: 80px;
        height: 80px;
    }

    .empty-icon svg {
        width: 40px;
        height: 40px;
    }

    .empty-title {
        font-size: 1.5rem;
    }
}

/* ========== ANIMATIONS ========== */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.tech-card {
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
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    }

    // Download button interactions
    const downloadButtons = document.querySelectorAll('.download-btn');
    downloadButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const fileType = this.href.includes('type=pdf') ? 'PDF' :
                           this.href.includes('type=word') ? 'Word' :
                           this.href.includes('type=excel') ? 'Excel' : 'Unknown';

            console.log(`Downloading ${fileType} file:`, this.href);

            // Add visual feedback
            const originalHTML = this.innerHTML;
            const spinner = `
                <svg class="spinner" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 12a9 9 0 11-6.219-8.56"/>
                </svg>
                <span>Downloading...</span>
            `;
            this.innerHTML = spinner;
            this.style.pointerEvents = 'none';

            // Add spinner animation
            const spinnerSvg = this.querySelector('.spinner');
            if (spinnerSvg) {
                spinnerSvg.style.animation = 'spin 1s linear infinite';
            }

            // Reset after 3 seconds
            setTimeout(() => {
                this.innerHTML = originalHTML;
                this.style.pointerEvents = 'auto';
            }, 3000);
        });
    });

    // Tech card hover effects
    const techCards = document.querySelectorAll('.tech-card');
    techCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Parallax effect for hero section
    const hero = document.querySelector('.hero-section');
    if (hero) {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = scrolled * 0.5;
            hero.style.transform = `translateY(${parallax}px)`;
        });
    }

    // File badge hover animations
    const fileBadges = document.querySelectorAll('.file-badge');
    fileBadges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) rotate(2deg)';
        });

        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });
    });

    // Smooth scroll for back button
    const backBtn = document.querySelector('.back-btn');
    if (backBtn) {
        backBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.history.back();
        });
    }

    // Add glow effect on card hover
    techCards.forEach(card => {
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            this.style.setProperty('--mouse-x', x + 'px');
            this.style.setProperty('--mouse-y', y + 'px');
        });
    });
});

// Add spinner keyframes
const style = document.createElement('style');
style.textContent = `
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .tech-card::after {
        content: '';
        position: absolute;
        width: 2px;
        height: 2px;
        background: radial-gradient(circle, var(--tech-cyan) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
        left: var(--mouse-x, 0);
        top: var(--mouse-y, 0);
        transform: translate(-50%, -50%);
    }

    .tech-card:hover::after {
        opacity: 1;
        box-shadow: 0 0 20px var(--tech-cyan);
    }
`;
document.head.appendChild(style);
</script>
@endpush
@endsection
