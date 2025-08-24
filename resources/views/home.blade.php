@extends('layouts.app')

@section('title', 'EZofz.lk - Advanced Office Tools for Sri Lankan Officers')
@section('description', 'Streamline your office work with our advanced tools including Sinhala unicode typing, name converters, and document downloads for Sri Lankan public and private sector officers.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-left">
                <div class="text-center">
                    <img src="https://via.placeholder.com/500x400/4f46e5/ffffff?text=Office+Tools" alt="Office Tools" class="img-fluid rounded-3 shadow-lg">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tools Section -->
<section id="tools" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold text-primary mb-3">Powerful Tools at Your Fingertips</h2>
            <p class="lead text-muted">Enhance your productivity with our professionally crafted tools</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card tool-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                            <i class="bi bi-keyboard fs-1 text-primary"></i>
                        </div>
                        <h4 class="card-title mb-3">Sinhala Unicode Typing</h4>
                        <p class="card-text text-muted mb-4">Type in Sinhala using advanced unicode converter with intelligent prediction and auto-correction.</p>
                        <a href="#" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-arrow-right me-2"></i>Try Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card tool-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                            <i class="bi bi-person-badge fs-1 text-success"></i>
                        </div>
                        <h4 class="card-title mb-3">Name Converter</h4>
                        <p class="card-text text-muted mb-4">Convert full names to initials format commonly used in Sri Lankan official documents.</p>
                        <a href="#" class="btn btn-success btn-lg w-100">
                            <i class="bi bi-arrow-right me-2"></i>Convert Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card tool-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                            <i class="bi bi-download fs-1 text-warning"></i>
                        </div>
                        <h4 class="card-title mb-3">Document Downloads</h4>
                        <p class="card-text text-muted mb-4">Access law documents, police forms, and other essential documents for your office needs.</p>
                        <a href="#" class="btn btn-warning btn-lg w-100">
                            <i class="bi bi-arrow-right me-2"></i>Browse Downloads
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="https://via.placeholder.com/600x400/10b981/ffffff?text=Advanced+Features" alt="Features" class="img-fluid rounded-3">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="ps-lg-5 mt-5 mt-lg-0">
                    <h2 class="display-6 fw-bold mb-4">Why Choose EZofz.lk?</h2>
                    <div class="mb-4">
                        <div class="d-flex mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="bi bi-check-circle-fill text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-2">Sri Lankan Focused</h5>
                                <p class="text-muted">Specifically designed for Sri Lankan government and private sector requirements.</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="bi bi-lightning-fill text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-2">Fast & Reliable</h5>
                                <p class="text-muted">Lightning-fast tools that work seamlessly across all devices.</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="bi bi-shield-check text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-2">Secure & Private</h5>
                                <p class="text-muted">Your data is protected with enterprise-grade security measures.</p>
                            </div>
                        </div>
                    </div>
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-person-plus me-2"></i>Join EZofz.lk Today
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center" data-aos="fade-up">
        <h2 class="display-6 fw-bold mb-3">Ready to Streamline Your Work?</h2>
        <p class="lead mb-4">Join thousands of Sri Lankan professionals already using EZofz.lk</p>
        @guest
            <a href="{{ route('register') }}" class="btn btn-light btn-lg me-3">
                <i class="bi bi-person-plus me-2"></i>Get Started Free
            </a>
            <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">
                <i class="bi bi-info-circle me-2"></i>Learn More
            </a>
        @else
            <a href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : route('dashboard') }}" class="btn btn-light btn-lg">
                <i class="bi bi-speedometer2 me-2"></i>Go to Dashboard
            </a>
        @endguest
    </div>
</section>

<!-- Google AdSense Banner -->
<div class="container my-4">
    <div class="text-center">
        <!-- Replace with actual AdSense code -->
        <div class="bg-light p-4 rounded">
            <p class="text-muted mb-0"><i class="bi bi-megaphone"></i> Advertisement Space</p>
        </div>
    </div>
</div>
@endsection
