@extends('layouts.app')

@section('title', 'About Us - EZofz.lk')
@section('description', 'Learn about EZofz.lk and our mission to provide advanced office tools and services for Sri Lankan professionals.')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="text-center mb-5" data-aos="fade-up">
                <h1 class="display-4 fw-bold text-primary mb-4">About EZofz.lk</h1>
                <p class="lead">Empowering Sri Lankan professionals with cutting-edge office tools and solutions</p>
            </div>

            <div class="row align-items-center mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="https://via.placeholder.com/500x300/3b82f6/ffffff?text=Our+Mission" alt="Our Mission" class="img-fluid rounded-3">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h2 class="fw-bold mb-3">Our Mission</h2>
                    <p class="mb-4">EZofz.lk was founded with a simple yet powerful mission: to streamline office work for professionals across Sri Lanka's public and private sectors. We understand the unique challenges faced by Sri Lankan officers and have developed specialized tools to address these needs.</p>
                    <p>Our platform combines modern technology with local requirements, creating solutions that are both powerful and relevant to the Sri Lankan context.</p>
                </div>
            </div>

            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-lg-2" data-aos="fade-left">
                    <img src="https://via.placeholder.com/500x300/10b981/ffffff?text=Our+Vision" alt="Our Vision" class="img-fluid rounded-3">
                </div>
                <div class="col-lg-6 order-lg-1" data-aos="fade-right">
                    <h2 class="fw-bold mb-3">Our Vision</h2>
                    <p class="mb-4">We envision a Sri Lanka where every professional has access to the tools they need to work efficiently and effectively. By bridging the gap between traditional office practices and modern digital solutions, we aim to contribute to the country's digital transformation.</p>
                    <p>Our goal is to become the go-to platform for office automation and productivity tools tailored specifically for the Sri Lankan market.</p>
                </div>
            </div>

            <div class="bg-light rounded-3 p-5 mb-5" data-aos="fade-up">
                <h2 class="text-center fw-bold mb-4">What We Offer</h2>
                <div class="row g-4">
                    <div class="col-md-4 text-center">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-tools text-primary fs-4"></i>
                        </div>
                        <h5>Advanced Tools</h5>
                        <p class="text-muted">Unicode typing, name converters, and more specialized utilities.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-download text-success fs-4"></i>
                        </div>
                        <h5>Document Library</h5>
                        <p class="text-muted">Essential documents, forms, and templates for your office needs.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-headset text-warning fs-4"></i>
                        </div>
                        <h5>Local Support</h5>
                        <p class="text-muted">Dedicated support team that understands Sri Lankan requirements.</p>
                    </div>
                </div>
            </div>

            <div class="text-center" data-aos="fade-up">
                <h2 class="fw-bold mb-4">Ready to Get Started?</h2>
                <p class="lead mb-4">Join thousands of professionals who trust EZofz.lk for their office needs.</p>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg me-3">
                        <i class="bi bi-person-plus me-2"></i>Sign Up Now
                    </a>
                @endguest
                <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg">
                    <i class="bi bi-envelope me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
