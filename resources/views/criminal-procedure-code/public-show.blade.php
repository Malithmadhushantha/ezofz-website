@extends('layouts.app')

@section('title', 'Section ' . $section->section_number . ' - Sri Lanka Criminal Procedure Code')
@section('meta_description', 'Read and explore Section ' . $section->section_number . ' of the Sri Lankan Criminal Procedure Code: ' . $section->name_of_the_section)
@section('meta_keywords', 'Sri Lanka Criminal Procedure Code, Section ' . $section->section_number . ', ' . $section->name_of_the_section . ', legal information')

@section('content')
<div class="container my-4">
    <!-- Google Ads -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="ad-space text-center">
                <!-- Google AdSense Code -->
                {{-- Add your Google AdSense code here --}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('criminal-procedure-code.public') }}">Criminal Procedure Code</a></li>
                    <li class="breadcrumb-item active">Section {{ $section->section_number }}</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-8">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-journal-text me-2"></i>Section {{ $section->section_number }}
                            @if($section->sub_section_number)
                            ({{ $section->sub_section_number }})
                            @endif
                        </h5>
                    </div>
                </div>
                <div class="card-body">
                    <h4>{{ $section->name_of_the_section }}</h4>

                    <div class="section-chapter text-muted mb-3">
                        <small>
                            <strong>Chapter:</strong> {{ $section->chapter_name }}
                            @if($section->sub_chapter_name)
                            <br><strong>Sub-chapter:</strong> {{ $section->sub_chapter_name }}
                            @endif
                        </small>
                    </div>

                    <div class="section-content">
                        <h6 class="text-primary">Content Preview</h6>
                        <p class="preview-text">
                            {{ Str::limit($section->section_content, 200) }}
                        </p>
                        <div class="access-message card border-warning mt-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center text-warning mb-2">
                                    <i class="bi bi-lock-fill me-2"></i>
                                    <strong>Full Access Required</strong>
                                </div>
                                <p class="mb-3">Create an account to view the complete content of Section {{ $section->section_number }}, including full text, explanations, amendments, and the ability to save notes.</p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href="{{ route('login') }}" class="btn btn-outline-primary">
                                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                                    </a>
                                    <a href="{{ route('register') }}" class="btn btn-primary">
                                        <i class="bi bi-person-plus me-1"></i> Register for Free
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>About This Section</h5>
                </div>
                <div class="card-body">
                    <p>This is a public preview of Section {{ $section->section_number }} of the Criminal Procedure Code. For full access to:</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                            <i class="bi bi-file-text text-primary me-2"></i> Complete section text
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="bi bi-journal-richtext text-primary me-2"></i> Illustrations & explanations
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="bi bi-clock-history text-primary me-2"></i> Amendment history
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="bi bi-sticky text-primary me-2"></i> Personal note-taking
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="bi bi-star text-primary me-2"></i> Save favorite sections
                        </li>
                    </ul>
                    <div class="d-grid mt-3">
                        <a href="{{ route('register') }}" class="btn btn-success">
                            <i class="bi bi-person-plus me-2"></i> Sign Up For Free
                        </a>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-search me-2"></i>Find Other Sections</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('criminal-procedure-code.public') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search sections...">
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                    <a href="{{ route('criminal-procedure-code.public') }}" class="btn btn-outline-secondary w-100">
                        <i class="bi bi-arrow-left me-1"></i> Back to All Sections
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

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

.preview-text {
    font-style: italic;
    color: #555;
}

.section-content {
    position: relative;
}

.access-message {
    background-color: rgba(255, 255, 255, 0.95);
}

.list-group-item {
    background: transparent;
    border-left: none;
    border-right: none;
}
</style>
@endpush
@endsection
