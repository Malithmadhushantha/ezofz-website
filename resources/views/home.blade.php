@extends('layouts.app')

@section('title', 'EZofz.lk - Advanced Office Tools for Sri Lankan Officers')
@section('description', 'Streamline your office work with our advanced tools including Sinhala unicode typing, name converters, and document downloads for Sri Lankan public and private sector officers.')

@push('styles')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        --dark-bg: #0f1419;
        --card-bg: rgba(255, 255, 255, 0.95);
        --text-light: #8892b0;
        --border-color: rgba(255, 255, 255, 0.1);
    }

    body {
        background: linear-gradient(135deg, #0a0f1c 0%, #1a1f35 50%, #0f1419 100%);
        min-height: 100vh;
        position: relative;
        color: white;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background:
            radial-gradient(circle at 20% 50%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(120, 119, 198, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 40% 80%, rgba(64, 224, 208, 0.1) 0%, transparent 50%);
        pointer-events: none;
        z-index: -1;
    }

    body::after {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image:
            linear-gradient(90deg, rgba(102, 126, 234, 0.1) 1px, transparent 1px),
            linear-gradient(0deg, rgba(102, 126, 234, 0.1) 1px, transparent 1px);
        background-size: 50px 50px;
        pointer-events: none;
        z-index: -1;
        animation: gridMove 20s linear infinite;
    }

    @keyframes gridMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    .hero-section {
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(5px);
    }

    .hero-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            linear-gradient(90deg, transparent 0%, rgba(102, 126, 234, 0.5) 50%, transparent 100%),
            linear-gradient(45deg, transparent 0%, rgba(64, 224, 208, 0.3) 50%, transparent 100%);
        background-size: 400px 2px, 500px 1px;
        background-repeat: no-repeat;
        animation: heroTechLines 5s ease-in-out infinite;
        z-index: 1;
    }

    @keyframes heroTechLines {
        0%, 100% {
            background-position: -400px 30%, -500px 70%;
            opacity: 0;
        }
        50% {
            background-position: calc(100% + 400px) 30%, calc(100% + 500px) 70%;
            opacity: 1;
        }
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #ffffff 0%, #e0e6ff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1.5rem;
        text-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .hero-subtitle {
        font-size: 1.3rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 2rem;
        font-weight: 300;
    }

    .hero-image {
        position: relative;
        transform: perspective(1000px) rotateY(-15deg) rotateX(10deg);
        transition: all 0.6s ease;
        filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.3));
    }

    .hero-image:hover {
        transform: perspective(1000px) rotateY(-5deg) rotateX(5deg) scale(1.05);
    }

    .tools-section {
        padding: 100px 0;
        background: rgba(15, 25, 40, 0.6);
        backdrop-filter: blur(20px);
        border-top: 1px solid rgba(102, 126, 234, 0.3);
        border-bottom: 1px solid rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
    }

    .tools-section::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent 0%, rgba(64, 224, 208, 0.6) 50%, transparent 100%);
        animation: toolsLine 4s ease-in-out infinite;
    }

    @keyframes toolsLine {
        0%, 100% {
            transform: translateX(-100%);
            opacity: 0;
        }
        50% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .section-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: white;
        text-align: center;
        margin-bottom: 1rem;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .section-subtitle {
        color: rgba(255, 255, 255, 0.8);
        text-align: center;
        font-size: 1.2rem;
        margin-bottom: 4rem;
        font-weight: 300;
    }

    .tool-card {
        background: rgba(15, 25, 40, 0.9);
        border: none;
        border-radius: 20px;
        padding: 2rem;
        height: 100%;
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(20px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(102, 126, 234, 0.2);
    }

    .tool-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-gradient);
        transform: scaleX(0);
        transition: transform 0.4s ease;
    }

    .tool-card:hover::before {
        transform: scaleX(1);
    }

    .tool-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
        border-color: rgba(102, 126, 234, 0.6);
    }

    .tool-icon {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
    }

    .tool-icon::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: inherit;
        opacity: 0.1;
        border-radius: 50%;
    }

    .tool-card:hover .tool-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .tool-icon.primary { background: var(--primary-gradient); }
    .tool-icon.success { background: var(--success-gradient); }
    .tool-icon.warning { background: var(--warning-gradient); }

    .tool-card h4 {
        font-weight: 600;
        color: #ffffff;
        margin-bottom: 1rem;
        font-size: 1.4rem;
    }

    .tool-card p {
        color: #cbd5e0;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    .tool-btn {
        padding: 12px 30px;
        border-radius: 50px;
        border: none;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    .tool-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .tool-btn:hover::before {
        left: 100%;
    }

    .tool-btn.primary {
        background: var(--primary-gradient);
        color: white;
    }

    .tool-btn.success {
        background: var(--success-gradient);
        color: white;
    }

    .tool-btn.warning {
        background: var(--warning-gradient);
        color: white;
    }

    .features-section {
        padding: 100px 0;
        background: rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
    }

    .features-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            linear-gradient(135deg, transparent 0%, rgba(102, 126, 234, 0.05) 50%, transparent 100%),
            linear-gradient(-45deg, transparent 0%, rgba(64, 224, 208, 0.05) 50%, transparent 100%);
        background-size: 300px 300px, 400px 400px;
        animation: featuresBg 8s ease-in-out infinite;
    }

    @keyframes featuresBg {
        0%, 100% {
            background-position: 0% 0%, 100% 100%;
        }
        50% {
            background-position: 100% 100%, 0% 0%;
        }
    }

    .feature-image {
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        transition: transform 0.4s ease;
    }

    .feature-image:hover {
        transform: scale(1.02);
    }

    .feature-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: rgba(15, 25, 40, 0.6);
        border-radius: 15px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(102, 126, 234, 0.2);
        transition: all 0.3s ease;
    }

    .feature-item:hover {
        background: rgba(15, 25, 40, 0.8);
        transform: translateX(10px);
        border-color: rgba(102, 126, 234, 0.5);
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.5rem;
        flex-shrink: 0;
    }

    .feature-content h5 {
        color: white;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .feature-content p {
        color: #a0aec0;
        margin: 0;
        line-height: 1.6;
    }

    .cta-section {
        padding: 100px 0;
        background: var(--primary-gradient);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
    }

    .cta-section::after {
        content: '';
        position: absolute;
        top: 20%;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.6) 50%, transparent 100%);
        animation: ctaLine 3s ease-in-out infinite;
    }

    @keyframes ctaLine {
        0%, 100% {
            transform: translateX(-100%);
            opacity: 0;
        }
        50% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .cta-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .cta-btn {
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 600;
        margin: 0 10px;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .cta-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .ad-section {
        margin: 4rem 0;
        padding: 2rem;
    }

    .ad-placeholder {
        background: rgba(15, 25, 40, 0.9);
        border-radius: 15px;
        padding: 3rem;
        text-align: center;
        border: 2px dashed rgba(102, 126, 234, 0.3);
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        color: #cbd5e0;
    }

    .ad-placeholder:hover {
        border-color: rgba(102, 126, 234, 0.6);
        background: rgba(15, 25, 40, 0.95);
    }

    .ad-placeholder i {
        color: #667eea !important;
    }

    .ad-placeholder p {
        color: #a0aec0 !important;
    }

    /* Animation Classes */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .floating {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 20px rgba(102, 126, 234, 0.5); }
        50% { box-shadow: 0 0 40px rgba(102, 126, 234, 0.8); }
    }

    .glow-pulse {
        animation: pulse-glow 2s ease-in-out infinite;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .hero-image {
            transform: none;
        }

        .feature-item {
            flex-direction: column;
            text-align: center;
        }

        .feature-icon {
            margin: 0 auto 1rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="hero-content">
                    <h1 class="hero-title">Advanced Office Tools</h1>
                    <p class="hero-subtitle">Streamline your office work with cutting-edge tools designed specifically for Sri Lankan officers</p>
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg cta-btn glow-pulse">
                            <i class="bi bi-rocket-takeoff me-2"></i>Start Your Journey
                        </a>
                    @else
                        <a href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : route('dashboard') }}" class="btn btn-light btn-lg cta-btn glow-pulse">
                            <i class="bi bi-speedometer2 me-2"></i>Access Dashboard
                        </a>
                    @endguest
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="text-center">
                    <img src="{{ asset('images/banner_image.png') }}" alt="Office Tools" class="hero-image img-fluid rounded-3 floating">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tools Section -->
<section id="tools" class="tools-section">
    <div class="container">
        <div data-aos="fade-up">
            <h2 class="section-title">Powerful Tools at Your Fingertips</h2>
            <p class="section-subtitle">Enhance your productivity with our professionally crafted tools</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="tool-card">
                    <div class="tool-icon primary">
                        <i class="bi bi-keyboard fs-1 text-white"></i>
                    </div>
                    <h4>Sinhala Unicode Typing</h4>
                    <p>Type in Sinhala using advanced unicode converter with intelligent prediction and auto-correction capabilities.</p>
                    <a href="#" class="tool-btn primary">
                        <i class="bi bi-arrow-right me-2"></i>Try Now
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="tool-card">
                    <div class="tool-icon success">
                        <i class="bi bi-person-badge fs-1 text-white"></i>
                    </div>
                    <h4>Name Converter</h4>
                    <p>Convert full names to initials format commonly used in Sri Lankan official documents with precision.</p>
                    <a href="#" class="tool-btn success">
                        <i class="bi bi-arrow-right me-2"></i>Convert Now
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="tool-card">
                    <div class="tool-icon warning">
                        <i class="bi bi-download fs-1 text-white"></i>
                    </div>
                    <h4>Document Downloads</h4>
                    <p>Access law documents, police forms, and other essential documents for your office needs instantly.</p>
                    <a href="{{ route('documents.index') }}" class="tool-btn warning">
                        <i class="bi bi-arrow-right me-2"></i>Browse Downloads
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="{{ asset('images/what_is_this_web.png') }}" alt="Features" class="img-fluid feature-image">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="ps-lg-5 mt-5 mt-lg-0">
                    <h2 class="section-title text-start">Why Choose EZofz.lk?</h2>

                    <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-icon">
                            <i class="bi bi-geo-alt-fill text-white"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Sri Lankan Focused</h5>
                            <p>Specifically designed for Sri Lankan government and private sector requirements with local expertise.</p>
                        </div>
                    </div>

                    <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-icon">
                            <i class="bi bi-lightning-fill text-white"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Fast & Reliable</h5>
                            <p>Lightning-fast tools that work seamlessly across all devices with 99.9% uptime guarantee.</p>
                        </div>
                    </div>

                    <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check text-white"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Secure & Private</h5>
                            <p>Your data is protected with enterprise-grade security measures and encrypted connections.</p>
                        </div>
                    </div>

                    @guest
                        <div class="mt-4" data-aos="fade-up" data-aos-delay="400">
                            <a href="{{ route('register') }}" class="btn btn-light btn-lg cta-btn">
                                <i class="bi bi-person-plus me-2"></i>Join EZofz.lk Today
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h2 class="display-6 fw-bold mb-3 text-white">Ready to Streamline Your Work?</h2>
            <p class="lead mb-5 text-white opacity-90">Join thousands of Sri Lankan professionals already using EZofz.lk</p>
            @guest
                <a href="{{ route('register') }}" class="cta-btn btn btn-light btn-lg">
                    <i class="bi bi-person-plus me-2"></i>Get Started Free
                </a>
                <a href="{{ route('about') }}" class="cta-btn btn btn-outline-light btn-lg">
                    <i class="bi bi-info-circle me-2"></i>Learn More
                </a>
            @else
                <a href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : route('dashboard') }}" class="cta-btn btn btn-light btn-lg">
                    <i class="bi bi-speedometer2 me-2"></i>Go to Dashboard
                </a>
            @endguest
        </div>
    </div>
</section>

<!-- Google AdSense Banner -->
<div class="container ad-section">
    <div class="ad-placeholder" data-aos="fade-up">
        <i class="bi bi-megaphone fs-1 text-muted mb-3"></i>
        <p class="text-muted mb-0">Advertisement Space</p>
    </div>
</div>
@endsection
