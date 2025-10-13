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
        --primary-blue: #2563eb;
        --tech-blue: #667eea;
        --tech-purple: #764ba2;
    }

    /* Match the home page styling */
    body {
        background: #ffffff !important;
        min-height: 100vh;
        position: relative;
        color: #2d3748 !important;
    }

    /* Hero Section - Match home page */
    .hero-section {
        padding: 120px 0 80px !important;
        position: relative;
        overflow: hidden;
        min-height: 60vh !important;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.1);
        pointer-events: none;
        z-index: 1;
    }

    .hero-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
            linear-gradient(0deg, transparent 0%, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 60px 60px;
        opacity: 0.3;
        animation: heroGrid 25s linear infinite;
        pointer-events: none;
        z-index: 2;
    }

    @keyframes heroGrid {
        0% { transform: translate(0, 0); }
        100% { transform: translate(60px, 60px); }
    }

    .hero-content {
        position: relative;
        z-index: 10;
        text-align: center;
        color: white;
        padding: 2rem 0;
    }

    .page-title {
        font-size: 4rem !important;
        font-weight: 800 !important;
        color: #ffffff !important;
        margin-bottom: 1.5rem !important;
        line-height: 1.1 !important;
        letter-spacing: -0.02em !important;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
        position: relative;
        z-index: 2;
    }

    .page-subtitle {
        font-size: 1.4rem;
        color: rgba(255, 255, 255, 0.95);
        margin-bottom: 2rem;
        font-weight: 400;
        line-height: 1.6;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        position: relative;
        z-index: 2;
    }

    /* Content Sections */
    .content-section {
        padding: 100px 0;
        background: #f8fafc;
        position: relative;
    }

    .mission-vision-card {
        background: #ffffff;
        border: none;
        border-radius: 15px;
        padding: 0;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(102, 126, 234, 0.1);
        position: relative;
        height: 100%;
    }

    .mission-vision-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--primary-gradient);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .mission-vision-card:hover::before {
        transform: scaleX(1);
    }

    .mission-vision-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        border-color: rgba(102, 126, 234, 0.3);
    }

    .card-content {
        padding: 2rem;
    }

    .card-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .card-icon::before {
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

    .mission-vision-card:hover .card-icon {
        transform: scale(1.05) rotate(3deg);
    }

    .card-icon.mission {
        background: var(--primary-gradient);
    }

    .card-icon.vision {
        background: var(--success-gradient);
    }

    .section-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #2d3748;
        text-align: center;
        margin-bottom: 1rem;
    }

    .section-subtitle {
        color: #718096;
        text-align: center;
        font-size: 1.2rem;
        margin-bottom: 4rem;
        font-weight: 300;
    }

    .card-title {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.8rem;
        font-size: 1.4rem;
        text-align: center;
    }

    .card-text {
        color: #718096;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    /* Offerings Section */
    .offerings-section {
        padding: 100px 0;
        background: #ffffff;
        border-top: 1px solid rgba(102, 126, 234, 0.1);
        border-bottom: 1px solid rgba(102, 126, 234, 0.1);
        position: relative;
        overflow: hidden;
    }

    .offerings-section::before {
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

    .offering-card {
        background: #ffffff;
        border: none;
        border-radius: 15px;
        padding: 1.5rem;
        height: 100%;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(102, 126, 234, 0.1);
        text-align: center;
    }

    .offering-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--primary-gradient);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .offering-card:hover::before {
        transform: scaleX(1);
    }

    .offering-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        border-color: rgba(102, 126, 234, 0.3);
    }

    /* Testimonials Section */
    .testimonials-section {
        padding: 100px 0;
        background: #f8fafc;
        position: relative;
        overflow: hidden;
    }

    .testimonials-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #2d3748;
        text-align: center;
        margin-bottom: 1rem;
    }

    .testimonials-carousel-container {
        position: relative;
        height: 300px;
        overflow: hidden;
        margin-bottom: 2rem;
        border-radius: 15px;
        background: rgba(102, 126, 234, 0.05);
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
        background: #ffffff;
        border-radius: 15px;
        padding: 1.5rem;
        border: 1px solid rgba(102, 126, 234, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .testimonial-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        border-color: rgba(102, 126, 234, 0.3);
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
        color: #2d3748;
        margin-bottom: 0.25rem;
        font-weight: 600;
    }

    .testimonial-date {
        color: #718096;
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
        color: #718096;
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
        background: #ffffff;
        border: 1px solid rgba(102, 126, 234, 0.1);
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .testimonial-form-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        border-bottom: 1px solid rgba(102, 126, 234, 0.1);
        padding-bottom: 1rem;
    }

    .testimonial-form-header h5 {
        color: #2d3748;
        margin: 0;
        flex-grow: 1;
    }

    .btn-close-custom {
        background: none;
        border: none;
        color: #718096;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.2s ease;
        padding: 0;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .btn-close-custom:hover {
        color: #2d3748;
        background: rgba(102, 126, 234, 0.1);
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
        background: #f8fafc;
        border: 1px solid rgba(102, 126, 234, 0.2);
        color: #2d3748;
        border-radius: 8px;
    }

    .form-control:focus {
        background: #ffffff;
        border-color: var(--primary-blue);
        color: #2d3748;
        box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25);
    }

    .form-control::placeholder {
        color: #a0aec0;
    }

    .form-label {
        color: #4a5568;
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

    .offering-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .offering-icon::before {
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

    .offering-card:hover .offering-icon {
        transform: scale(1.05) rotate(3deg);
    }

    .offering-icon.tools { background: var(--primary-gradient); }
    .offering-icon.documents { background: var(--success-gradient); }
    .offering-icon.support { background: var(--warning-gradient); }

    .offering-title {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.8rem;
        font-size: 1.2rem;
        text-align: center;
    }

    .offering-text {
        color: #718096;
        line-height: 1.5;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
        text-align: center;
    }

    /* CTA Section */
    .cta-section {
        padding: 100px 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        text-align: center;
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
        background: rgba(0, 0, 0, 0.1);
        pointer-events: none;
        z-index: 1;
    }

    .cta-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
            linear-gradient(0deg, transparent 0%, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 60px 60px;
        opacity: 0.3;
        animation: heroGrid 25s linear infinite;
        pointer-events: none;
        z-index: 2;
    }

    .cta-content {
        position: relative;
        z-index: 10;
    }

    .cta-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 1.5rem;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .cta-text {
        font-size: 1.4rem;
        color: rgba(255, 255, 255, 0.95);
        margin-bottom: 2.5rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .cta-btn {
        padding: 15px 30px;
        border-radius: 50px;
        font-weight: 600;
        margin: 0 10px 10px;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: 2px solid transparent;
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
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        text-decoration: none;
    }

    .cta-btn.primary {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border-color: rgba(255, 255, 255, 0.3);
    }

    .cta-btn.primary:hover {
        background: rgba(255, 255, 255, 0.3);
        border-color: rgba(255, 255, 255, 0.5);
        color: white;
    }

    .cta-btn.outline {
        background: transparent;
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.5);
    }

    .cta-btn.outline:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border-color: rgba(255, 255, 255, 0.8);
    }

    /* Buttons */
    .btn-primary {
        background: var(--primary-blue);
        border: none;
        border-radius: 50px;
        padding: 12px 24px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: #1d4ed8;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.25);
    }

    .btn-outline-primary {
        border: 2px solid var(--primary-blue);
        color: var(--primary-blue);
        background: transparent;
        border-radius: 50px;
        padding: 10px 22px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background: var(--primary-blue);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.25);
    }

    .btn-outline-success {
        border: 2px solid #10b981;
        color: #10b981;
        background: transparent;
        border-radius: 50px;
        padding: 8px 16px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-outline-success:hover {
        background: #10b981;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.25);
    }

    .btn-sm.rounded-pill {
        font-size: 0.875rem;
        padding: 8px 20px;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .section-title {
            font-size: 2.5rem;
        }

        .page-title {
            font-size: 3.5rem !important;
        }
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2.8rem !important;
        }

        .page-subtitle {
            font-size: 1.2rem;
        }

        .hero-section {
            padding: 100px 0 60px !important;
            min-height: 50vh !important;
        }

        .content-section,
        .offerings-section,
        .testimonials-section,
        .cta-section {
            padding: 80px 0;
        }

        .section-title {
            font-size: 2.2rem;
        }

        .card-content {
            padding: 1.5rem;
        }

        .testimonials-carousel-container {
            height: 250px;
        }

        .testimonial-item {
            min-width: 280px;
            max-width: 280px;
            padding: 1.5rem;
        }

        .cta-title {
            font-size: 2.2rem;
        }

        .cta-text {
            font-size: 1.2rem;
        }

        .cta-btn {
            display: block;
            margin: 10px auto;
            max-width: 300px;
            text-align: center;
        }
    }

    @media (max-width: 576px) {
        .page-title {
            font-size: 2.2rem !important;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .hero-section {
            padding: 80px 0 40px !important;
        }

        .content-section,
        .offerings-section,
        .testimonials-section,
        .cta-section {
            padding: 60px 0;
        }

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
            gap: 0.5rem;
        }

        .testimonial-form-footer .btn {
            width: 100%;
        }

        .cta-title {
            font-size: 1.8rem;
        }

        .cta-text {
            font-size: 1.1rem;
        }
    }

    /* Smooth animations */
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

    .animate-in {
        animation: fadeInUp 0.6s ease-out;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(102, 126, 234, 0.1);
    }

    ::-webkit-scrollbar-thumb {
        background: var(--primary-gradient);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--primary-blue);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="hero-content" data-aos="fade-up">
                    <h1 class="page-title">About EZofz.lk</h1>
                    <p class="page-subtitle">Empowering Sri Lankan professionals with cutting-edge office tools and solutions</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title" data-aos="fade-up">Our Story</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Building the future of office productivity in Sri Lanka</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Mission Card -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="mission-vision-card h-100">
                    <div class="card-content">
                        <div class="card-icon mission">
                            <i class="bi bi-bullseye text-white fs-2"></i>
                        </div>
                        <h3 class="card-title">Our Mission</h3>
                        <p class="card-text">EZofz.lk was founded with a simple yet powerful mission: to streamline office work for professionals across Sri Lanka's public and private sectors. We understand the unique challenges faced by Sri Lankan officers and have developed specialized tools to address these needs.</p>
                        <p class="card-text">Our platform combines modern technology with local requirements, creating solutions that are both powerful and relevant to the Sri Lankan context.</p>
                        <div class="d-flex align-items-center justify-content-center mt-4">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                <span class="text-muted">Tailored for Sri Lankan professionals</span>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="#offerings" class="btn btn-outline-primary btn-sm rounded-pill">
                                <i class="bi bi-arrow-down me-2"></i>Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vision Card -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="mission-vision-card h-100">
                    <div class="card-content">
                        <div class="card-icon vision">
                            <i class="bi bi-globe-asia-australia text-white fs-2"></i>
                        </div>
                        <h3 class="card-title">Our Vision</h3>
                        <p class="card-text">We envision a Sri Lanka where every professional has access to the tools they need to work efficiently and effectively. By bridging the gap between traditional office practices and modern digital solutions, we aim to contribute to the country's digital transformation.</p>
                        <p class="card-text">Our goal is to become the go-to platform for office automation and productivity tools tailored specifically for the Sri Lankan market.</p>
                        <div class="d-flex align-items-center justify-content-center mt-4">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-arrow-up-circle-fill text-success me-2"></i>
                                <span class="text-muted">Driving digital transformation</span>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="#testimonials" class="btn btn-outline-success btn-sm rounded-pill">
                                <i class="bi bi-people me-2"></i>User Reviews
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Offer Section -->
<section id="offerings" class="offerings-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title" data-aos="fade-up">What We Offer</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Comprehensive solutions for modern office needs</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="offering-card h-100">
                    <div class="offering-icon tools">
                        <i class="bi bi-tools text-white fs-2"></i>
                    </div>
                    <h4 class="offering-title">Advanced Tools</h4>
                    <p class="offering-text">Unicode typing, name converters, and more specialized utilities designed for efficiency and accuracy in office work.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="offering-card h-100">
                    <div class="offering-icon documents">
                        <i class="bi bi-download text-white fs-2"></i>
                    </div>
                    <h4 class="offering-title">Document Library</h4>
                    <p class="offering-text">Essential documents, forms, and templates for your office needs, all in one accessible location.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="offering-card h-100">
                    <div class="offering-icon support">
                        <i class="bi bi-headset text-white fs-2"></i>
                    </div>
                    <h4 class="offering-title">Local Support</h4>
                    <p class="offering-text">Dedicated support team that understands Sri Lankan requirements and provides personalized assistance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="testimonials-title" data-aos="fade-up">What Our Users Say</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Real feedback from professionals across Sri Lanka</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
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
                <div id="testimonialFormContainer" class="testimonial-form-container mt-5" style="display: none;">
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
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="cta-content" data-aos="fade-up">
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
</section>

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

        // Add smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add entrance animations on scroll
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

        // Observe elements for animations
        document.querySelectorAll('.mission-vision-card, .offering-card, .testimonial-item').forEach(el => {
            observer.observe(el);
        });
    });

    // Subtle hover effects for cards
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.mission-vision-card, .offering-card');

        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
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
