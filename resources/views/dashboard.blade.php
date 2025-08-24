@extends('layouts.app')

@section('title', 'User Dashboard - EZofz.lk')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div data-aos="fade-right">
                    <h1 class="display-5 fw-bold text-primary">Welcome back, {{ Auth::user()->name }}!</h1>
                    <p class="lead text-muted">Access your tools and manage your account</p>
                </div>
                <div data-aos="fade-left">
                    <div class="bg-primary bg-opacity-10 rounded-circle p-4">
                        <i class="bi bi-person-circle text-primary" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card tool-card h-100">
                <div class="card-body text-center p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <i class="bi bi-keyboard fs-1 text-primary"></i>
                    </div>
                    <h4 class="card-title mb-3">Sinhala Unicode Typing</h4>
                    <p class="card-text text-muted mb-4">Advanced Sinhala typing tool with intelligent suggestions.</p>
                    <a href="#" class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-arrow-right me-2"></i>Start Typing
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
                    <p class="card-text text-muted mb-4">Convert names to official Sri Lankan format.</p>
                    <a href="#" class="btn btn-success btn-lg w-100">
                        <i class="bi bi-arrow-right me-2"></i>Convert Names
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
                    <h4 class="card-title mb-3">Downloads</h4>
                    <p class="card-text text-muted mb-4">Access documents, forms, and templates.</p>
                    <a href="#" class="btn btn-warning btn-lg w-100">
                        <i class="bi bi-arrow-right me-2"></i>Browse Downloads
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-8" data-aos="fade-up">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-activity me-2"></i>Recent Activity</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">No recent activity to show. Start using our tools to see your activity here.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4" data-aos="fade-up">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="bi bi-person me-2"></i>Account Info</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Member since:</strong> {{ Auth::user()->created_at->format('M d, Y') }}</p>
                    <hr>
                    <a href="#" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-pencil me-2"></i>Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
