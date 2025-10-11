@extends('layouts.app')

@section('title', 'Downloads - EZofz.lk')
@section('description', 'Browse and download official law and police documents, forms, and templates from EZofz.lk.')
@section('keywords', 'downloads, law documents, police documents, Sri Lanka, forms, templates')

@section('content')
<div class="downloads-page-new">
    <!-- Clean Header Section -->
    <section class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="header-content">
                        <h1 class="page-title">Document Downloads</h1>
                        <p class="page-description">Access official Sri Lankan government documents, forms, and templates organized by category for easy navigation.</p>

                        <!-- Quick Stats -->
                        <div class="quick-stats">
                            <div class="stat-box">
                                <span class="stat-number">{{ $categories->sum(function($category) { return $category->documents()->count(); }) }}</span>
                                <span class="stat-text">Total Documents</span>
                            </div>
                            <div class="stat-box">
                                <span class="stat-number">{{ $categories->count() }}</span>
                                <span class="stat-text">Categories</span>
                            </div>
                            <div class="stat-box">
                                <span class="stat-number">{{ $categories->sum(function($category) { return $category->subcategories->count(); }) }}</span>
                                <span class="stat-text">Subcategories</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="header-illustration">
                        <div class="document-stack">
                            <div class="doc-item doc-1"></div>
                            <div class="doc-item doc-2"></div>
                            <div class="doc-item doc-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="main-content">
        <!-- Section Separator -->
        <div class="section-separator"></div>
        <div class="container">
            <!-- Category Navigation -->
            <div class="category-navigation">
                <h2 class="section-title">Browse Categories</h2>
                <div class="category-tabs">
                    @foreach($categories as $category)
                        <button class="category-tab {{ $loop->first ? 'active' : '' }}"
                                data-category="{{ $category->id }}"
                                data-aos="fade-up"
                                data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="tab-icon">
                                @if($category->name === 'law')
                                    <i class="fas fa-balance-scale" style="display: inline-block; width: 24px; height: 24px; font-size: 24px;"></i>
                                @elseif($category->name === 'police')
                                    <i class="fas fa-shield-alt" style="display: inline-block; width: 24px; height: 24px; font-size: 24px;"></i>
                                @else
                                    <i class="fas fa-folder" style="display: inline-block; width: 24px; height: 24px; font-size: 24px;"></i>
                                @endif
                            </div>
                            <div class="tab-content">
                                <h3 class="tab-title">{{ ucfirst($category->name) }}</h3>
                                <span class="tab-count">{{ $category->documents()->count() }} documents</span>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Content Sections for Each Category -->
            @foreach($categories as $category)
                <div class="category-content {{ $loop->first ? 'active' : '' }}" id="category-{{ $category->id }}">
                    <div class="content-header">
                        <h3 class="content-title">{{ ucfirst($category->name) }} Documents</h3>
                        <p class="content-description">
                            @if($category->name === 'law')
                                Access legal documents, court forms, and official legal paperwork
                            @elseif($category->name === 'police')
                                Download police forms, reports, and administrative documents
                            @else
                                Browse official government documents and forms
                            @endif
                        </p>
                    </div>

                    @if($category->subcategories->count() > 0)
                        <!-- Subcategories Grid -->
                        <div class="subcategories-wrapper">
                            @foreach($category->subcategories as $subcategory)
                                <div class="subcategory-section" data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}">
                                    <div class="subcategory-header">
                                        <div class="subcategory-info">
                                            <h4 class="subcategory-title">{{ $subcategory->name }}</h4>
                                            <span class="document-counter">{{ $subcategory->documents->count() }} {{ Str::plural('document', $subcategory->documents->count()) }}</span>
                                        </div>
                                        @if($subcategory->documents->count() > 0)
                                            <button class="expand-btn" data-subcategory="{{ $subcategory->id }}">
                                                <i class="fas fa-chevron-down" style="display: inline-block; font-size: 16px;"></i>
                                            </button>
                                        @endif
                                    </div>

                                    @if($subcategory->documents->count() > 0)
                                        <div class="documents-list" id="documents-{{ $subcategory->id }}">
                                            @foreach($subcategory->documents as $document)
                                                <div class="document-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                                    <div class="document-info">
                                                        <div class="document-header">
                                                            <h5 class="document-title">{{ $document->title }}</h5>
                                                            <div class="document-badges">
                                                                @if($document->hasPdfFile())
                                                                    <span class="format-badge pdf">PDF</span>
                                                                @endif
                                                                @if($document->hasWordFile())
                                                                    <span class="format-badge word">WORD</span>
                                                                @endif
                                                                @if($document->hasExcelFile())
                                                                    <span class="format-badge excel">EXCEL</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @if($document->description)
                                                            <p class="document-description">{{ Str::limit($document->description, 100) }}</p>
                                                        @endif
                                                        <div class="document-meta">
                                                            <span class="upload-date">
                                                                <i class="far fa-calendar-alt" style="display: inline-block; font-size: 14px; margin-right: 0.5rem;"></i>
                                                                Added {{ $document->created_at->diffForHumans() }}
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="document-actions">
                                                        @if($document->hasPdfFile())
                                                            <a href="{{ route('documents.download', ['document' => $document, 'type' => 'pdf']) }}"
                                                               class="download-link pdf" title="Download PDF">
                                                                <i class="fas fa-file-pdf" style="display: inline-block; font-size: 18px; margin-right: 0.75rem;"></i>
                                                                <span>PDF</span>
                                                                <small>{{ $document->getPdfFileSizeFormatted() }}</small>
                                                            </a>
                                                        @endif
                                                        @if($document->hasWordFile())
                                                            <a href="{{ route('documents.download', ['document' => $document, 'type' => 'word']) }}"
                                                               class="download-link word" title="Download Word">
                                                                <i class="fas fa-file-word" style="display: inline-block; font-size: 18px; margin-right: 0.75rem;"></i>
                                                                <span>Word</span>
                                                                <small>{{ $document->getWordFileSizeFormatted() }}</small>
                                                            </a>
                                                        @endif
                                                        @if($document->hasExcelFile())
                                                            <a href="{{ route('documents.download', ['document' => $document, 'type' => 'excel']) }}"
                                                               class="download-link excel" title="Download Excel">
                                                                <i class="fas fa-file-excel" style="display: inline-block; font-size: 18px; margin-right: 0.75rem;"></i>
                                                                <span>Excel</span>
                                                                <small>{{ $document->getExcelFileSizeFormatted() }}</small>
                                                            </a>
                                                        @endif

                                                        @if(!$document->hasPdfFile() && !$document->hasWordFile() && !$document->hasExcelFile())
                                                            <div class="no-files">
                                                                <i class="fas fa-exclamation-circle" style="display: inline-block; font-size: 16px; margin-right: 0.5rem;"></i>
                                                                <span>No files available</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="empty-subcategory">
                                            <i class="fas fa-inbox" style="display: inline-block; font-size: 3rem; margin-bottom: 1rem;"></i>
                                            <p>No documents available in this subcategory</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Empty Category State -->
                        <div class="empty-category">
                            <div class="empty-illustration">
                                <i class="fas fa-folder-open" style="display: inline-block; font-size: 4rem; margin-bottom: 1.5rem;"></i>
                            </div>
                            <h4>No Subcategories Available</h4>
                            <p>This category doesn't have any subcategories or documents yet.</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
</div>

@push('styles')
<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
/* ========== FONT AWESOME ICON FIXES ========== */
.fas, .far, .fab {
    font-family: "Font Awesome 6 Free", "Font Awesome 6 Pro", "Font Awesome 5 Free", "Font Awesome 5 Pro" !important;
    display: inline-block !important;
    font-style: normal !important;
    font-variant: normal !important;
    text-rendering: auto !important;
    -webkit-font-smoothing: antialiased !important;
}

.fas {
    font-weight: 900 !important;
}

.far {
    font-weight: 400 !important;
}

.fab {
    font-weight: 400 !important;
}

/* Ensure icons are visible */
.tab-icon i,
.expand-btn i,
.download-link i,
.upload-date i,
.no-files i,
.empty-illustration i,
.empty-subcategory i {
    opacity: 1 !important;
    visibility: visible !important;
    color: currentColor !important;
}

/* ========== NEW ELEGANT DOWNLOADS PAGE ========== */
:root {
    --primary-color: #2563eb;
    --secondary-color: #1e40af;
    --accent-color: #3b82f6;
    --success-color: #10b981;
    --warning-color: #f59e0b;
    --error-color: #ef4444;
    --text-primary: #1f2937;
    --text-secondary: #6b7280;
    --text-light: #9ca3af;
    --border-color: #e5e7eb;
    --bg-light: #f8fafc;
    --bg-white: #ffffff;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.downloads-page-new {
    min-height: 100vh;
    font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    position: relative;
    display: flex;
    flex-direction: column;
}

/* ========== PAGE HEADER ========== */
.page-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    padding: 120px 0 80px;
    margin-top: -80px;
    padding-top: 160px;
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='20' cy='20' r='2'/%3E%3C/g%3E%3C/svg%3E") repeat;
    animation: drift 30s linear infinite;
}

@keyframes drift {
    0% { transform: translateX(0) translateY(0); }
    100% { transform: translateX(-40px) translateY(-40px); }
}

.header-content {
    position: relative;
    z-index: 2;
}

.page-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
    line-height: 1.1;
    background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 100%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

.page-description {
    font-size: 1.25rem;
    opacity: 0.9;
    line-height: 1.6;
    margin-bottom: 2.5rem;
    max-width: 500px;
}

.quick-stats {
    display: flex;
    gap: 2rem;
    margin-top: 2rem;
}

.stat-box {
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    padding: 1.5rem 2rem;
    border-radius: 16px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: var(--transition);
}

.stat-box:hover {
    transform: translateY(-2px);
    background: rgba(255, 255, 255, 0.15);
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    display: block;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-text {
    font-size: 0.875rem;
    opacity: 0.8;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Header Illustration */
.header-illustration {
    position: relative;
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.document-stack {
    position: relative;
    width: 200px;
    height: 250px;
}

.doc-item {
    position: absolute;
    width: 160px;
    height: 200px;
    background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
    border-radius: 12px;
    box-shadow: var(--shadow-lg);
    border: 2px solid rgba(255, 255, 255, 0.8);
}

.doc-item::before {
    content: '';
    position: absolute;
    top: 20px;
    left: 20px;
    right: 20px;
    height: 8px;
    background: linear-gradient(90deg, var(--primary-color) 0%, var(--accent-color) 100%);
    border-radius: 4px;
}

.doc-item::after {
    content: '';
    position: absolute;
    top: 40px;
    left: 20px;
    right: 40px;
    height: 4px;
    background: #e5e7eb;
    border-radius: 2px;
    box-shadow: 0 12px 0 #e5e7eb, 0 24px 0 #e5e7eb;
}

.doc-1 {
    transform: rotate(-5deg) translateY(10px);
    z-index: 1;
    animation: float1 6s ease-in-out infinite;
}

.doc-2 {
    transform: rotate(3deg) translateY(-5px) translateX(15px);
    z-index: 2;
    animation: float2 6s ease-in-out infinite 2s;
}

.doc-3 {
    transform: rotate(-2deg) translateX(30px);
    z-index: 3;
    animation: float3 6s ease-in-out infinite 4s;
}

@keyframes float1 {
    0%, 100% { transform: rotate(-5deg) translateY(10px); }
    50% { transform: rotate(-3deg) translateY(5px); }
}

@keyframes float2 {
    0%, 100% { transform: rotate(3deg) translateY(-5px) translateX(15px); }
    50% { transform: rotate(5deg) translateY(-10px) translateX(15px); }
}

@keyframes float3 {
    0%, 100% { transform: rotate(-2deg) translateX(30px); }
    50% { transform: rotate(0deg) translateX(30px) translateY(-5px); }
}

/* ========== MAIN CONTENT ========== */
.main-content {
    padding: 4rem 0;
    position: relative;
    z-index: 2;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    margin-top: 0;
}

.section-separator {
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--border-color), transparent);
    margin-bottom: 2rem;
    width: 100%;
}

.section-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
    text-align: center;
}

/* ========== CATEGORY NAVIGATION ========== */
.category-navigation {
    margin-bottom: 3rem;
    position: relative;
    z-index: 3;
}

.category-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: center;
    margin-top: 2rem;
}

.category-tab {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.5rem 2rem;
    background: var(--bg-white);
    border: 2px solid var(--border-color);
    border-radius: 16px;
    cursor: pointer;
    transition: var(--transition);
    box-shadow: var(--shadow-sm);
    min-width: 200px;
}

.category-tab:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    border-color: var(--accent-color);
}

.category-tab.active {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    border-color: var(--primary-color);
    box-shadow: var(--shadow-lg);
}

.tab-icon {
    width: 50px;
    height: 50px;
    background: var(--bg-light);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: var(--primary-color);
    transition: var(--transition);
}

.category-tab.active .tab-icon {
    background: rgba(255, 255, 255, 0.2);
    color: white;
}

.tab-content {
    flex: 1;
}

.tab-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin: 0 0 0.25rem 0;
    text-transform: capitalize;
}

.tab-count {
    font-size: 0.875rem;
    opacity: 0.7;
}

/* ========== CATEGORY CONTENT ========== */
.category-content {
    display: none;
}

.category-content.active {
    display: block;
    animation: fadeInUp 0.5s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.content-header {
    text-align: center;
    margin-bottom: 3rem;
    padding: 2rem;
    background: var(--bg-white);
    border-radius: 20px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-color);
}

.content-title {
    font-size: 1.875rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.content-description {
    font-size: 1.125rem;
    color: var(--text-secondary);
    max-width: 600px;
    margin: 0 auto;
}

/* ========== SUBCATEGORIES ========== */
.subcategories-wrapper {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.subcategory-section {
    background: var(--bg-white);
    border-radius: 20px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-color);
    overflow: hidden;
    transition: var(--transition);
}

.subcategory-section:hover {
    box-shadow: var(--shadow-md);
}

.subcategory-header {
    padding: 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-bottom: 1px solid var(--border-color);
}

.subcategory-info {
    flex: 1;
}

.subcategory-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0 0 0.5rem 0;
}

.document-counter {
    color: var(--text-secondary);
    font-size: 0.875rem;
    background: var(--bg-light);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    display: inline-block;
}

.expand-btn {
    width: 48px;
    height: 48px;
    border: 2px solid var(--border-color);
    background: var(--bg-white);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition);
    color: var(--text-secondary);
}

.expand-btn:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    transform: scale(1.1);
}

.expand-btn.active {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    transform: rotate(180deg);
}

/* ========== DOCUMENTS LIST ========== */
.documents-list {
    display: none;
    padding: 0 2rem 2rem;
}

.documents-list.active {
    display: block;
    animation: slideDown 0.4s ease-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        max-height: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        max-height: 1000px;
        transform: translateY(0);
    }
}

.document-item {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 2rem;
    border: 1px solid var(--border-color);
    border-radius: 16px;
    margin-bottom: 1rem;
    background: var(--bg-white);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.document-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
    transform: scaleY(0);
    transition: var(--transition);
}

.document-item:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
    border-color: var(--accent-color);
}

.document-item:hover::before {
    transform: scaleY(1);
}

.document-info {
    flex: 1;
    margin-right: 2rem;
}

.document-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
}

.document-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0;
    line-height: 1.4;
    flex: 1;
    margin-right: 1rem;
}

.document-badges {
    display: flex;
    gap: 0.5rem;
    flex-shrink: 0;
}

.format-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.format-badge.pdf {
    background: rgba(239, 68, 68, 0.1);
    color: var(--error-color);
    border: 1px solid rgba(239, 68, 68, 0.2);
}

.format-badge.word {
    background: rgba(37, 99, 235, 0.1);
    color: var(--primary-color);
    border: 1px solid rgba(37, 99, 235, 0.2);
}

.format-badge.excel {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success-color);
    border: 1px solid rgba(16, 185, 129, 0.2);
}

.document-description {
    color: var(--text-secondary);
    line-height: 1.6;
    margin-bottom: 1rem;
}

.document-meta {
    display: flex;
    align-items: center;
    color: var(--text-light);
    font-size: 0.875rem;
}

.upload-date i {
    margin-right: 0.5rem;
}

/* ========== DOWNLOAD ACTIONS ========== */
.document-actions {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    min-width: 200px;
}

.download-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.875rem 1.25rem;
    background: var(--bg-light);
    border: 2px solid var(--border-color);
    border-radius: 12px;
    text-decoration: none;
    color: var(--text-primary);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.download-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.download-link:hover::before {
    left: 100%;
}

.download-link:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    text-decoration: none;
    color: white;
}

.download-link.pdf:hover {
    background: var(--error-color);
    border-color: var(--error-color);
}

.download-link.word:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

.download-link.excel:hover {
    background: var(--success-color);
    border-color: var(--success-color);
}

.download-link i {
    font-size: 1.125rem;
    margin-right: 0.75rem;
}

.download-link span {
    font-weight: 600;
    flex: 1;
}

.download-link small {
    opacity: 0.7;
    font-size: 0.75rem;
}

/* No Files State */
.no-files {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
    background: var(--bg-light);
    border: 2px dashed var(--border-color);
    border-radius: 12px;
    color: var(--text-light);
    font-style: italic;
}

.no-files i {
    margin-right: 0.5rem;
}

/* ========== EMPTY STATES ========== */
.empty-category,
.empty-subcategory {
    text-align: center;
    padding: 4rem 2rem;
    background: var(--bg-white);
    border-radius: 20px;
    border: 1px solid var(--border-color);
}

.empty-illustration i {
    font-size: 4rem;
    color: var(--text-light);
    margin-bottom: 1.5rem;
}

.empty-category h4,
.empty-subcategory h4 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.empty-category p,
.empty-subcategory p {
    color: var(--text-secondary);
    margin: 0;
}

/* ========== RESPONSIVE DESIGN ========== */
@media (max-width: 1024px) {
    .page-title {
        font-size: 3rem;
    }

    .category-tabs {
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    }

    .document-item {
        flex-direction: column;
    }

    .document-info {
        margin-right: 0;
        margin-bottom: 1.5rem;
    }

    .document-actions {
        min-width: unset;
        width: 100%;
    }
}

@media (max-width: 768px) {
    .page-header {
        padding: 100px 0 60px;
        padding-top: 140px;
        position: relative;
    }

    .page-title {
        font-size: 2.5rem;
    }

    .page-description {
        font-size: 1.125rem;
    }

    .quick-stats {
        flex-direction: column;
        gap: 1rem;
    }

    .stat-box {
        padding: 1rem 1.5rem;
    }

    .header-illustration {
        display: none;
    }

    .main-content {
        padding: 2rem 0;
    }

    .category-tabs {
        flex-direction: column;
        align-items: center;
    }

    .category-tab {
        width: 100%;
        max-width: 300px;
    }

    .subcategory-header {
        padding: 1.5rem;
    }

    .document-item {
        padding: 1.5rem;
    }

    .document-actions {
        flex-direction: row;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .download-link {
        flex: 1;
        min-width: calc(50% - 0.25rem);
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
    }
}

@media (max-width: 576px) {
    .page-title {
        font-size: 2rem;
    }

    .quick-stats {
        margin-top: 1.5rem;
    }

    .stat-box {
        padding: 0.75rem 1rem;
    }

    .stat-number {
        font-size: 1.5rem;
    }

    .document-header {
        flex-direction: column;
        gap: 1rem;
    }

    .document-badges {
        align-self: flex-start;
    }

    .download-link {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
        min-width: 100%;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS if available
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 600,
            once: true,
            offset: 50,
            easing: 'ease-out-cubic'
        });
    }

    // Category Tab Functionality
    const categoryTabs = document.querySelectorAll('.category-tab');
    const categoryContents = document.querySelectorAll('.category-content');

    categoryTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const categoryId = this.dataset.category;

            // Remove active class from all tabs and contents
            categoryTabs.forEach(t => t.classList.remove('active'));
            categoryContents.forEach(c => c.classList.remove('active'));

            // Add active class to clicked tab and corresponding content
            this.classList.add('active');
            document.getElementById(`category-${categoryId}`).classList.add('active');

            // Add click feedback
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });

    // Subcategory Expand/Collapse Functionality
    const expandBtns = document.querySelectorAll('.expand-btn');

    expandBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const subcategoryId = this.dataset.subcategory;
            const documentsList = document.getElementById(`documents-${subcategoryId}`);
            const icon = this.querySelector('i');

            if (documentsList.classList.contains('active')) {
                // Collapse
                documentsList.classList.remove('active');
                this.classList.remove('active');
                icon.style.transform = 'rotate(0deg)';
            } else {
                // Expand - First close all other open sections
                document.querySelectorAll('.documents-list.active').forEach(list => {
                    list.classList.remove('active');
                });
                document.querySelectorAll('.expand-btn.active').forEach(activeBtn => {
                    activeBtn.classList.remove('active');
                    activeBtn.querySelector('i').style.transform = 'rotate(0deg)';
                });

                // Then open the clicked one
                documentsList.classList.add('active');
                this.classList.add('active');
                icon.style.transform = 'rotate(180deg)';
            }

            // Add button feedback
            this.style.transform = 'scale(1.1)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });

    // Enhanced Download Link Interactions
    const downloadLinks = document.querySelectorAll('.download-link');

    downloadLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const fileType = this.href.includes('type=pdf') ? 'PDF' :
                           this.href.includes('type=word') ? 'Word' :
                           this.href.includes('type=excel') ? 'Excel' : 'Unknown';

            console.log(`Initiating ${fileType} download:`, this.href);

            // Add download feedback
            const originalContent = this.innerHTML;
            const loadingContent = `
                <i class="fas fa-spinner fa-spin"></i>
                <span>Downloading...</span>
                <small>Please wait</small>
            `;

            this.innerHTML = loadingContent;
            this.style.pointerEvents = 'none';

            // Reset after download starts
            setTimeout(() => {
                this.innerHTML = originalContent;
                this.style.pointerEvents = 'auto';

                // Show success feedback
                const successContent = `
                    <i class="fas fa-check-circle"></i>
                    <span>Downloaded!</span>
                    <small>Complete</small>
                `;
                this.innerHTML = successContent;

                // Reset to original after success message
                setTimeout(() => {
                    this.innerHTML = originalContent;
                }, 2000);
            }, 1500);
        });

        // Hover effects
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.02)';
        });

        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Smooth scroll behavior for category switches
    function smoothScrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Document item hover effects
    const documentItems = document.querySelectorAll('.document-item');

    documentItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });

        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Format badge interactions
    const formatBadges = document.querySelectorAll('.format-badge');

    formatBadges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
        });

        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // Add loading states for better UX
    let isLoading = false;

    function showGlobalLoading() {
        if (isLoading) return;
        isLoading = true;

        const loader = document.createElement('div');
        loader.id = 'global-loader';
        loader.innerHTML = `
            <div class="loader-content">
                <div class="loader-spinner"></div>
                <p>Loading documents...</p>
            </div>
        `;
        loader.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            backdrop-filter: blur(5px);
        `;

        document.body.appendChild(loader);

        setTimeout(() => {
            loader.remove();
            isLoading = false;
        }, 1000);
    }

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    // Observe all document items and subcategory sections
    document.querySelectorAll('.document-item, .subcategory-section').forEach(el => {
        observer.observe(el);
    });

    // Keyboard navigation support
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            // Close all expanded sections
            document.querySelectorAll('.documents-list.active').forEach(list => {
                list.classList.remove('active');
            });
            document.querySelectorAll('.expand-btn.active').forEach(btn => {
                btn.classList.remove('active');
                btn.querySelector('i').style.transform = 'rotate(0deg)';
            });
        }

        // Arrow key navigation for category tabs
        if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
            const activeTab = document.querySelector('.category-tab.active');
            const tabs = Array.from(categoryTabs);
            const currentIndex = tabs.indexOf(activeTab);

            let newIndex;
            if (e.key === 'ArrowLeft') {
                newIndex = currentIndex > 0 ? currentIndex - 1 : tabs.length - 1;
            } else {
                newIndex = currentIndex < tabs.length - 1 ? currentIndex + 1 : 0;
            }

            tabs[newIndex].click();
            tabs[newIndex].focus();
        }
    });

    // Add focus styles for accessibility
    categoryTabs.forEach(tab => {
        tab.setAttribute('tabindex', '0');
        tab.addEventListener('focus', function() {
            this.style.outline = '2px solid var(--primary-color)';
            this.style.outlineOffset = '2px';
        });

        tab.addEventListener('blur', function() {
            this.style.outline = 'none';
        });

        tab.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });

    expandBtns.forEach(btn => {
        btn.setAttribute('tabindex', '0');
        btn.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });

    // Smooth scroll behavior enhancement
    function smoothScrollBehavior() {
        document.documentElement.style.scrollBehavior = 'smooth';
    }

    // Initialize smooth scrolling
    smoothScrollBehavior();

    // Initialize tooltips if available
    if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }

    console.log('Downloads page initialized successfully');
});

// Add CSS for animations and loader
const additionalStyles = document.createElement('style');
additionalStyles.textContent = `
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

    @keyframes slideDown {
        from {
            opacity: 0;
            max-height: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            max-height: 1000px;
            transform: translateY(0);
        }
    }

    .animate-in {
        animation: fadeInUp 0.6s ease-out;
    }

    .loader-content {
        text-align: center;
        color: var(--text-primary);
    }

    .loader-spinner {
        width: 40px;
        height: 40px;
        border: 3px solid var(--border-color);
        border-top: 3px solid var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 1rem;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Smooth transitions for all interactive elements */
    .category-tab,
    .expand-btn,
    .download-link,
    .document-item,
    .format-badge {
        transition: var(--transition);
    }

    /* Focus states for better accessibility */
    .category-tab:focus,
    .expand-btn:focus,
    .download-link:focus {
        outline: 2px solid var(--primary-color);
        outline-offset: 2px;
    }
`;

document.head.appendChild(additionalStyles);
</script>
@endpush
@endsection
