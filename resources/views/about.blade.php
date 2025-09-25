@extends('layouts.app')

@section('title', 'About Us - EZofz.lk')
@section('description', 'Learn about EZofz.lk and our mission to provide advanced office tools and services for Sri Lankan professionals.')

@push('styles')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        --accent-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        --dark-bg: #0f1419;
        --card-bg: rgba(255, 255, 255, 0.95);
        --text-light: #8892b0;
        --border-color: rgba(255, 255, 255, 0.1);
        --glass-bg: rgba(255, 255, 255, 0.1);
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

    .hero-header {
        padding: 120px 0 80px;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
    }

    .hero-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(102, 126, 234, 0.1) 50%, transparent 70%);
        animation: shimmer 3s ease-in-out infinite;
    }

    /* Animated Tech Lines */
    .hero-header::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            linear-gradient(90deg, transparent 0%, rgba(102, 126, 234, 0.5) 50%, transparent 100%),
            linear-gradient(45deg, transparent 0%, rgba(64, 224, 208, 0.3) 50%, transparent 100%);
        background-size: 200px 2px, 300px 1px;
        background-repeat: no-repeat;
        animation: techLines 4s ease-in-out infinite;
    }

    @keyframes techLines {
        0%, 100% {
            background-position: -200px 20%, -300px 80%;
            opacity: 0;
        }
        50% {
            background-position: calc(100% + 200px) 20%, calc(100% + 300px) 80%;
            opacity: 1;
        }
    }

    @keyframes shimmer {
        0%, 100% { transform: translateX(-100%); }
        50% { transform: translateX(100%); }
    }

    .page-title {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #ffffff 0%, #e0e6ff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1.5rem;
        text-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 2;
    }

    .page-subtitle {
        font-size: 1.3rem;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 300;
        position: relative;
        z-index: 2;
    }

    .content-section {
        padding: 80px 0;
        position: relative;
    }

    .mission-vision-card {
        background: rgba(15, 25, 40, 0.9);
        border-radius: 25px;
        padding: 0;
        overflow: hidden;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(102, 126, 234, 0.3);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }

    .mission-vision-card::before {
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

    .mission-vision-card:hover::before {
        transform: scaleX(1);
    }

    .mission-vision-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 35px 70px rgba(0, 0, 0, 0.4);
        border-color: rgba(102, 126, 234, 0.6);
    }

    .card-content {
        padding: 3rem;
    }

    .card-image {
        position: relative;
        overflow: hidden;
        height: 300px;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        font-weight: bold;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .card-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(2px);
    }

    .card-image.mission {
        background: var(--primary-gradient);
    }

    .card-image.vision {
        background: var(--success-gradient);
    }

    .section-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 1.5rem;
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 3px;
        background: var(--primary-gradient);
        border-radius: 2px;
    }

    .section-text {
        color: #cbd5e0;
        line-height: 1.8;
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
    }

    .offerings-section {
        background: rgba(15, 25, 40, 0.6);
        backdrop-filter: blur(20px);
        border-radius: 30px;
        padding: 4rem 3rem;
        margin: 4rem 0;
        border: 1px solid rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
    }

    .offerings-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent, rgba(102, 126, 234, 0.1), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .offerings-section:hover::before {
        opacity: 1;
    }

    .offerings-section::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent 0%, rgba(64, 224, 208, 0.6) 50%, transparent 100%);
        animation: horizontalLine 3s ease-in-out infinite;
    }

    @keyframes horizontalLine {
        0%, 100% {
            transform: translateX(-100%);
            opacity: 0;
        }
        50% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    /* Testimonials Section Styles */
    .testimonials-section {
        background: rgba(15, 25, 40, 0.6);
        backdrop-filter: blur(20px);
        border-radius: 30px;
        padding: 4rem 3rem;
        margin: 4rem 0;
        border: 1px solid rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
    }

    .testimonials-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        text-align: center;
        margin-bottom: 3rem;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .testimonials-carousel-container {
        position: relative;
        height: 300px;
        overflow: hidden;
        margin-bottom: 2rem;
        border-radius: 20px;
        background: rgba(0, 0, 0, 0.2);
    }

    .testimonials-carousel {
        display: flex;
        animation: scrollTestimonials 20s linear infinite;
        height: 100%;
    }

    .testimonial-item {
        min-width: 350px;
        max-width: 350px;
        margin-right: 2rem;
        background: rgba(15, 25, 40, 0.9);
        border-radius: 20px;
        padding: 2rem;
        border: 1px solid rgba(102, 126, 234, 0.3);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .testimonial-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
        border-color: rgba(102, 126, 234, 0.6);
    }

    .testimonial-header {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .testimonial-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        position: relative;
        overflow: hidden;
        border: 2px solid rgba(102, 126, 234, 0.3);
        transition: all 0.3s ease;
    }

    .testimonial-avatar:hover {
        border-color: rgba(102, 126, 234, 0.6);
        transform: scale(1.05);
    }

    .testimonial-avatar-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .testimonial-avatar-initials {
        width: 100%;
        height: 100%;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .testimonial-user-info h6 {
        color: white;
        margin-bottom: 0.25rem;
        font-weight: 600;
    }

    .testimonial-date {
        color: var(--text-light);
        font-size: 0.8rem;
    }

    .testimonial-rating {
        margin-bottom: 1rem;
    }

    .testimonial-rating .star {
        color: #ffd700;
        font-size: 1rem;
        margin-right: 2px;
    }

    .testimonial-rating .star.empty {
        color: #444;
    }

    .testimonial-content {
        color: #cbd5e0;
        line-height: 1.6;
        font-style: italic;
        flex-grow: 1;
    }

    @keyframes scrollTestimonials {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    .testimonials-carousel:hover {
        animation-play-state: paused;
    }

    /* Modal Styles - Now for Inline Form */
    .testimonial-form-container {
        max-width: 700px;
        margin: 0 auto;
        animation: slideDown 0.3s ease-out;
    }

    .testimonial-form-card {
        background: rgba(15, 25, 40, 0.95);
        border: 1px solid rgba(102, 126, 234, 0.3);
        border-radius: 20px;
        backdrop-filter: blur(20px);
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .testimonial-form-header {
        display: flex;
        justify-content: between;
        align-items: center;
        margin-bottom: 1.5rem;
        border-bottom: 1px solid rgba(102, 126, 234, 0.3);
        padding-bottom: 1rem;
    }

    .testimonial-form-header h5 {
        color: white;
        margin: 0;
        flex-grow: 1;
    }

    .btn-close-custom {
        background: none;
        border: none;
        color: #cbd5e0;
        font-size: 1.5rem;
        cursor: pointer;
        transition: color 0.2s ease;
        padding: 0;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .btn-close-custom:hover {
        color: white;
        background: rgba(255, 255, 255, 0.1);
    }

    .testimonial-form-footer {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 1.5rem;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-20px);
        }
    }

    .testimonial-form-container.hiding {
        animation: slideUp 0.3s ease-out forwards;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(102, 126, 234, 0.3);
        color: white;
        border-radius: 10px;
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(102, 126, 234, 0.6);
        color: white;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .form-label {
        color: #cbd5e0;
        font-weight: 500;
    }

    .rating-input {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .rating-input .star-btn {
        background: none;
        border: none;
        color: #444;
        font-size: 1.5rem;
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .rating-input .star-btn:hover,
    .rating-input .star-btn.active {
        color: #ffd700;
    }

    .btn-close {
        filter: invert(1);
    }

    .offerings-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        text-align: center;
        margin-bottom: 3rem;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .offering-item {
        text-align: center;
        padding: 2rem 1rem;
        transition: all 0.3s ease;
        border-radius: 20px;
        position: relative;
    }

    .offering-item:hover {
        background: rgba(102, 126, 234, 0.1);
        transform: translateY(-5px);
    }

    .offering-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        position: relative;
        transition: all 0.4s ease;
    }

    .offering-icon.tools { background: var(--primary-gradient); }
    .offering-icon.documents { background: var(--success-gradient); }
    .offering-icon.support { background: var(--warning-gradient); }

    .offering-item:hover .offering-icon {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .offering-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: white;
        margin-bottom: 1rem;
    }

    .offering-text {
        color: #a0aec0;
        line-height: 1.6;
    }

    .cta-section {
        background: rgba(15, 25, 40, 0.9);
        backdrop-filter: blur(20px);
        border-radius: 25px;
        padding: 4rem 3rem;
        text-align: center;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--accent-gradient);
        transform: scaleX(0);
        transition: transform 0.4s ease;
    }

    .cta-section:hover::before {
        transform: scaleX(1);
    }

    .cta-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 1.5rem;
    }

    .cta-text {
        font-size: 1.2rem;
        color: #cbd5e0;
        margin-bottom: 2.5rem;
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

    .cta-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .cta-btn:hover::before {
        left: 100%;
    }

    .cta-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }

    .cta-btn.primary {
        background: var(--primary-gradient);
        color: white;
        border: none;
    }

    .cta-btn.outline {
        background: transparent;
        color: #667eea;
        border: 2px solid #667eea;
    }

    .cta-btn.outline:hover {
        background: var(--primary-gradient);
        color: white;
        border-color: transparent;
    }

    /* Floating Animation */
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

    /* Parallax Effect */
    .parallax-element {
        transition: transform 0.1s ease-out;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .page-title {
            font-size: 2.5rem;
        }

        .page-subtitle {
            font-size: 1.1rem;
        }

        .hero-header {
            padding: 80px 0 60px;
        }

        .content-section {
            padding: 60px 0;
        }

        .card-content {
            padding: 2rem;
        }

        .offerings-section {
            padding: 3rem 2rem;
            margin: 3rem 0;
        }

        .testimonials-section {
            padding: 3rem 2rem;
            margin: 3rem 0;
        }

        .testimonials-carousel-container {
            height: 250px;
        }

        .testimonial-item {
            min-width: 280px;
            max-width: 280px;
            padding: 1.5rem;
        }

        .cta-section {
            padding: 3rem 2rem;
        }

        .cta-btn {
            display: block;
            margin: 10px 0;
            text-align: center;
        }
    }

    @media (max-width: 576px) {
        .testimonials-carousel-container {
            height: 280px;
        }

        .testimonial-item {
            min-width: 250px;
            max-width: 250px;
            padding: 1rem;
        }

        .testimonial-avatar {
            width: 40px;
            height: 40px;
        }

        .testimonial-avatar-initials {
            font-size: 1rem;
        }

        .testimonial-form-card {
            padding: 1.5rem;
        }

        .testimonial-form-footer {
            flex-direction: column;
        }

        .testimonial-form-footer .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
    }

    ::-webkit-scrollbar-thumb {
        background: var(--primary-gradient);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--secondary-gradient);
    }
</style>
@endpush

@section('content')
<!-- Hero Header -->
<div class="hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="text-center" data-aos="fade-up">
                    <h1 class="page-title">About EZofz.lk</h1>
                    <p class="page-subtitle">Empowering Sri Lankan professionals with cutting-edge office tools and solutions</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container content-section">
    <div class="row">
        <div class="col-lg-10 mx-auto">

            <!-- Mission Section -->
            <div class="row align-items-center mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="mission-vision-card floating">
                           <img src="{{ asset('images/mission.png') }}" alt="Mission Image" class="hero-image img-fluid rounded-3 floating">
                        <div class="card-content">
                            <div class="text-center">
                                <i class="bi bi-bullseye text-primary fs-2 mb-3"></i>
                                <p class="text-light">Streamlining office work with innovative solutions</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="ps-lg-4">
                        <h2 class="section-title">Our Mission</h2>
                        <p class="section-text">EZofz.lk was founded with a simple yet powerful mission: to streamline office work for professionals across Sri Lanka's public and private sectors. We understand the unique challenges faced by Sri Lankan officers and have developed specialized tools to address these needs.</p>
                        <p class="section-text">Our platform combines modern technology with local requirements, creating solutions that are both powerful and relevant to the Sri Lankan context.</p>
                        <div class="d-flex align-items-center mt-4">
                            <div class="bg-primary bg-opacity-20 rounded-circle p-2 me-3">
                                <i class="bi bi-check-circle-fill text-primary"></i>
                            </div>
                            <span class="text-light">Tailored for Sri Lankan professionals</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vision Section -->
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-lg-2" data-aos="fade-left">
                    <div class="mission-vision-card floating" style="animation-delay: 0.5s;">
                        <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&h=300&q=80" alt="Our Vision" class="img-fluid" style="width: 100%; height: 300px; object-fit: cover;">
                        <div class="card-content">
                            <div class="text-center">
                                <i class="bi bi-globe-asia-australia text-success fs-2 mb-3"></i>
                                <p class="text-light">Leading digital transformation in Sri Lanka</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1" data-aos="fade-right">
                    <div class="pe-lg-4">
                        <h2 class="section-title">Our Vision</h2>
                        <p class="section-text">We envision a Sri Lanka where every professional has access to the tools they need to work efficiently and effectively. By bridging the gap between traditional office practices and modern digital solutions, we aim to contribute to the country's digital transformation.</p>
                        <p class="section-text">Our goal is to become the go-to platform for office automation and productivity tools tailored specifically for the Sri Lankan market.</p>
                        <div class="d-flex align-items-center mt-4">
                            <div class="bg-success bg-opacity-20 rounded-circle p-2 me-3">
                                <i class="bi bi-arrow-up-circle-fill text-success"></i>
                            </div>
                            <span class="text-light">Driving digital transformation</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- What We Offer Section -->
            <div class="offerings-section" data-aos="fade-up">
                <h2 class="offerings-title">What We Offer</h2>
                <div class="row g-4">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="offering-item">
                            <div class="offering-icon tools">
                                <i class="bi bi-tools text-white fs-2"></i>
                            </div>
                            <h5 class="offering-title">Advanced Tools</h5>
                            <p class="offering-text">Unicode typing, name converters, and more specialized utilities designed for efficiency and accuracy.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="offering-item">
                            <div class="offering-icon documents">
                                <i class="bi bi-download text-white fs-2"></i>
                            </div>
                            <h5 class="offering-title">Document Library</h5>
                            <p class="offering-text">Essential documents, forms, and templates for your office needs, all in one accessible location.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="offering-item">
                            <div class="offering-icon support">
                                <i class="bi bi-headset text-white fs-2"></i>
                            </div>
                            <h5 class="offering-title">Local Support</h5>
                            <p class="offering-text">Dedicated support team that understands Sri Lankan requirements and provides personalized assistance.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonials Section -->
            <div id="testimonials" class="testimonials-section" data-aos="fade-up">
                <h2 class="testimonials-title">What Our Users Say</h2>
                <div class="testimonials-carousel-container">
                    <div class="testimonials-carousel" id="testimonialsCarousel">
                        <!-- Featured testimonials will be loaded here via AJAX -->
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('testimonials.index') }}" class="btn btn-outline-primary btn-lg me-3">
                        <i class="bi bi-chat-quote me-2"></i>View All Testimonials
                    </a>
                    @auth
                        <button class="btn btn-primary btn-lg" id="toggleTestimonialForm">
                            <i class="bi bi-plus-circle me-2"></i>Add Your Review
                        </button>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-person-plus me-2"></i>Login to Add Review
                        </a>
                    @endauth
                </div>

                <!-- Inline Testimonial Form -->
                @auth
                <div id="testimonialFormContainer" class="testimonial-form-container mt-4" style="display: none;">
                    <div class="testimonial-form-card">
                        <div class="testimonial-form-header">
                            <h5><i class="bi bi-chat-quote me-2"></i>Share Your Experience</h5>
                            <button type="button" class="btn-close-custom" id="closeTestimonialForm">×</button>
                        </div>
                        <form id="testimonialForm">
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating *</label>
                                <div class="rating-input" id="ratingInput">
                                    <button type="button" class="star-btn" data-rating="1">
                                        <i class="bi bi-star-fill"></i>
                                    </button>
                                    <button type="button" class="star-btn" data-rating="2">
                                        <i class="bi bi-star-fill"></i>
                                    </button>
                                    <button type="button" class="star-btn" data-rating="3">
                                        <i class="bi bi-star-fill"></i>
                                    </button>
                                    <button type="button" class="star-btn" data-rating="4">
                                        <i class="bi bi-star-fill"></i>
                                    </button>
                                    <button type="button" class="star-btn" data-rating="5">
                                        <i class="bi bi-star-fill"></i>
                                    </button>
                                </div>
                                <input type="hidden" id="ratingValue" name="rating" required>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Your Review *</label>
                                <textarea class="form-control" id="content" name="content" rows="4"
                                          placeholder="Share your experience with EZofz.lk..."
                                          maxlength="1000" required></textarea>
                                <div class="form-text text-muted">
                                    <span id="charCount">0</span>/1000 characters
                                </div>
                            </div>

                            <div class="testimonial-form-footer">
                                <button type="button" class="btn btn-secondary" id="cancelTestimonial">Cancel</button>
                                <button type="button" class="btn btn-primary" id="submitTestimonial">
                                    <i class="bi bi-send me-2"></i>Submit Review
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endauth
            </div>

            <!-- CTA Section -->
            <div class="cta-section glow-pulse" data-aos="fade-up">
                <h2 class="cta-title">Ready to Get Started?</h2>
                <p class="cta-text">Join thousands of professionals who trust EZofz.lk for their office needs.</p>
                <div class="cta-buttons">
                    @guest
                        <a href="{{ route('register') }}" class="cta-btn primary">
                            <i class="bi bi-person-plus me-2"></i>Sign Up Now
                        </a>
                    @endguest
                    <a href="{{ route('contact') }}" class="cta-btn outline">
                        <i class="bi bi-envelope me-2"></i>Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Load featured testimonials
    function loadFeaturedTestimonials() {
        fetch('/api/testimonials/featured')
            .then(response => response.json())
            .then(testimonials => {
                const carousel = document.getElementById('testimonialsCarousel');
                if (testimonials.length === 0) {
                    carousel.innerHTML = `
                        <div class="d-flex align-items-center justify-content-center w-100">
                            <div class="text-center text-muted">
                                <i class="bi bi-chat-quote fs-1 mb-3"></i>
                                <p>No testimonials yet. Be the first to share your experience!</p>
                            </div>
                        </div>
                    `;
                    return;
                }

                function createTestimonialHTML(testimonial) {
                    // Generate initials from user name if not provided
                    const generateInitials = (name) => {
                        if (!name) return 'U';
                        const names = name.trim().split(' ');
                        let initials = '';
                        names.forEach(n => {
                            if (n.length > 0) initials += n.charAt(0).toUpperCase();
                        });
                        return initials.substring(0, 2) || 'U';
                    };

                    const userInitials = testimonial.user.initials || generateInitials(testimonial.user.name);
                    const avatarUrl = testimonial.user.avatar_url || (testimonial.user.avatar ? `/storage/${testimonial.user.avatar}` : null);

                    const avatarHTML = avatarUrl ?
                        `<img src="${avatarUrl}" alt="${testimonial.user.name}" class="testimonial-avatar-image" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                         <div class="testimonial-avatar-initials" style="display: none;">${userInitials}</div>` :
                        `<div class="testimonial-avatar-initials">${userInitials}</div>`;

                    return `
                        <div class="testimonial-item">
                            <div class="testimonial-header">
                                <div class="testimonial-avatar">
                                    ${avatarHTML}
                                </div>
                                <div class="testimonial-user-info">
                                    <h6>${testimonial.user.name}</h6>
                                    <div class="testimonial-date">${new Date(testimonial.created_at).toLocaleDateString()}</div>
                                </div>
                            </div>
                            <div class="testimonial-rating">
                                ${Array.from({length: 5}, (_, i) =>
                                    `<i class="bi bi-star-fill star ${i < testimonial.rating ? '' : 'empty'}"></i>`
                                ).join('')}
                            </div>
                            <div class="testimonial-content">
                                "${testimonial.content}"
                            </div>
                        </div>
                    `;
                }

                carousel.innerHTML = testimonials.map(createTestimonialHTML).join('') +
                                   testimonials.map(createTestimonialHTML).join(''); // Duplicate for seamless scroll
            })
            .catch(error => {
                console.error('Error loading testimonials:', error);
            });
    }

    // Rating functionality
    @auth
    document.addEventListener('DOMContentLoaded', function() {
        const toggleFormBtn = document.getElementById('toggleTestimonialForm');
        const formContainer = document.getElementById('testimonialFormContainer');
        const closeFormBtn = document.getElementById('closeTestimonialForm');
        const cancelBtn = document.getElementById('cancelTestimonial');
        const starButtons = document.querySelectorAll('.star-btn');
        const ratingValue = document.getElementById('ratingValue');
        const contentTextarea = document.getElementById('content');
        const charCount = document.getElementById('charCount');
        const submitButton = document.getElementById('submitTestimonial');

        // Show/hide form functionality
        function showForm() {
            formContainer.style.display = 'block';
            formContainer.classList.remove('hiding');
            // Scroll to form
            setTimeout(() => {
                formContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 100);
        }

        function hideForm() {
            formContainer.classList.add('hiding');
            setTimeout(() => {
                formContainer.style.display = 'none';
                formContainer.classList.remove('hiding');
                // Reset form
                resetForm();
            }, 300);
        }

        function resetForm() {
            document.getElementById('testimonialForm').reset();
            ratingValue.value = '';
            charCount.textContent = '0';
            starButtons.forEach(btn => btn.classList.remove('active'));
        }

        // Event listeners for form toggle
        toggleFormBtn.addEventListener('click', showForm);
        closeFormBtn.addEventListener('click', hideForm);
        cancelBtn.addEventListener('click', hideForm);

        // Star rating functionality
        starButtons.forEach(button => {
            button.addEventListener('click', function() {
                const rating = parseInt(this.getAttribute('data-rating'));
                ratingValue.value = rating;

                starButtons.forEach((btn, index) => {
                    if (index < rating) {
                        btn.classList.add('active');
                    } else {
                        btn.classList.remove('active');
                    }
                });
            });

            button.addEventListener('mouseenter', function() {
                const rating = parseInt(this.getAttribute('data-rating'));
                starButtons.forEach((btn, index) => {
                    if (index < rating) {
                        btn.classList.add('active');
                    } else {
                        btn.classList.remove('active');
                    }
                });
            });
        });

        document.getElementById('ratingInput').addEventListener('mouseleave', function() {
            const currentRating = parseInt(ratingValue.value) || 0;
            starButtons.forEach((btn, index) => {
                if (index < currentRating) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        });

        // Character count
        contentTextarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });

        // Submit testimonial
        submitButton.addEventListener('click', function() {
            const rating = ratingValue.value;
            const content = contentTextarea.value.trim();

            if (!rating) {
                alert('Please select a rating.');
                return;
            }

            if (!content) {
                alert('Please write your review.');
                return;
            }

            const submitBtn = this;
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="spinner-border spinner-border-sm me-2"></i>Submitting...';
            submitBtn.disabled = true;

            fetch('/testimonials', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    rating: parseInt(rating),
                    content: content
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Hide form
                    hideForm();

                    // Show success message
                    alert(data.message);

                    // Reload testimonials after a short delay
                    setTimeout(() => {
                        loadFeaturedTestimonials();
                    }, 1000);
                } else {
                    alert('Error: ' + (data.message || 'Failed to submit testimonial'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while submitting your testimonial.');
            })
            .finally(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    });
    @endauth

    // Load testimonials when page loads
    document.addEventListener('DOMContentLoaded', function() {
        loadFeaturedTestimonials();
    });

    // Parallax effect for mission/vision cards
    document.addEventListener('mousemove', function(e) {
        const cards = document.querySelectorAll('.mission-vision-card');
        const mouseX = e.clientX;
        const mouseY = e.clientY;

        cards.forEach(card => {
            const rect = card.getBoundingClientRect();
            const cardCenterX = rect.left + rect.width / 2;
            const cardCenterY = rect.top + rect.height / 2;

            const deltaX = (mouseX - cardCenterX) * 0.01;
            const deltaY = (mouseY - cardCenterY) * 0.01;

            card.style.transform = `translateY(-10px) scale(1.02) rotateX(${-deltaY}deg) rotateY(${deltaX}deg)`;
        });
    });

    // Reset card transforms when mouse leaves
    document.addEventListener('mouseleave', function() {
        const cards = document.querySelectorAll('.mission-vision-card');
        cards.forEach(card => {
            card.style.transform = '';
        });
    });

    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    // Observe all animated elements
    document.querySelectorAll('[data-aos]').forEach(el => {
        observer.observe(el);
    });
</script>
@endpush
@endsection
