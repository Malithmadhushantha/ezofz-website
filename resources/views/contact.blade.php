@extends('layouts.app')

@section('title', 'Contact Us - EZofz.lk')
@section('description', 'Get in touch with EZofz.lk team. We are here to help with your office automation needs.')

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

    /* Match the website theme */
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

    .developer-section {
        padding: 100px 0;
        background: #ffffff;
        position: relative;
    }

    .developer-profile {
        background: #ffffff;
        border: none;
        border-radius: 15px;
        padding: 3rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(102, 126, 234, 0.1);
    }

    .developer-profile::before {
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

    .developer-profile:hover::before {
        transform: scaleX(1);
    }

    .profile-image {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        border: 4px solid var(--primary-blue);
        box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
    }

    .profile-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .profile-image:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 40px rgba(37, 99, 235, 0.3);
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

    .tech-badge {
        display: inline-block;
        padding: 8px 16px;
        background: #f8fafc;
        border: 1px solid rgba(102, 126, 234, 0.2);
        border-radius: 20px;
        margin: 5px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        color: #4a5568;
    }

    .tech-badge::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
        transition: left 0.5s;
    }

    .tech-badge:hover::before {
        left: 100%;
    }

    .tech-badge:hover {
        border-color: var(--primary-blue);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(37, 99, 235, 0.2);
        background: #ffffff;
        color: var(--primary-blue);
    }

    /* Contact Form */
    .contact-form {
        background: #ffffff;
        border: none;
        border-radius: 15px;
        padding: 3rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(102, 126, 234, 0.1);
    }

    .contact-form::before {
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

    .contact-form:hover::before {
        transform: scaleX(1);
    }

    .form-control {
        background: #f8fafc;
        border: 1px solid rgba(102, 126, 234, 0.2);
        border-radius: 8px;
        padding: 15px 20px;
        color: #2d3748;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        background: #ffffff;
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25);
        color: #2d3748;
    }

    .form-control::placeholder {
        color: #a0aec0;
    }

    .form-label {
        color: #4a5568;
        font-weight: 600;
        margin-bottom: 10px;
    }

    /* Contact Info Card */
    .contact-info {
        background: #ffffff;
        border: none;
        border-radius: 15px;
        padding: 2rem;
        height: 100%;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(102, 126, 234, 0.1);
    }

    .contact-item {
        display: flex;
        align-items: center;
        padding: 1rem;
        margin-bottom: 1rem;
        background: #f8fafc;
        border-radius: 12px;
        border: 1px solid rgba(102, 126, 234, 0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .contact-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--primary-gradient);
        opacity: 0.05;
        transition: left 0.5s;
    }

    .contact-item:hover::before {
        left: 100%;
    }

    .contact-item:hover {
        transform: translateY(-3px);
        border-color: var(--primary-blue);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.2);
        background: #ffffff;
    }

    .contact-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        position: relative;
        transition: all 0.3s ease;
    }

    .contact-item:hover .contact-icon {
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
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

    .tech-btn {
        background: var(--primary-gradient);
        border: none;
        border-radius: 50px;
        padding: 15px 40px;
        color: white;
        font-weight: 600;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .tech-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .tech-btn:hover::before {
        left: 100%;
    }

    .tech-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
    }

    /* Text Styles */
    .developer-profile h2 {
        color: #2d3748;
        font-weight: 700;
    }

    .developer-profile h4 {
        color: var(--primary-blue);
        font-weight: 600;
    }

    .developer-profile p {
        color: #718096;
        line-height: 1.6;
    }

    .contact-item h6 {
        color: #2d3748;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .contact-item p {
        color: var(--primary-blue);
        margin: 0;
        font-weight: 500;
    }

    /* Services Section */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .service-card {
        background: #ffffff;
        border: none;
        border-radius: 15px;
        padding: 2rem;
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(102, 126, 234, 0.1);
        height: 100%;
    }

    .service-card::before {
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

    .service-card:hover::before {
        transform: scaleX(1);
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        border-color: rgba(102, 126, 234, 0.3);
    }

    .service-icon {
        width: 70px;
        height: 70px;
        background: var(--primary-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 1.8rem;
        color: white;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .service-icon::before {
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

    .service-card:hover .service-icon {
        transform: scale(1.05) rotate(3deg);
    }

    .service-card h5 {
        color: #2d3748;
        font-weight: 600;
        margin-bottom: 0.8rem;
        font-size: 1.2rem;
        text-align: center;
    }

    .service-card p {
        color: #718096;
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .service-features {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .service-features li {
        color: #718096;
        padding: 0.5rem 0;
        border-bottom: 1px solid rgba(102, 126, 234, 0.1);
        transition: all 0.3s ease;
        position: relative;
        padding-left: 1.5rem;
        font-size: 0.9rem;
    }

    .service-features li::before {
        content: '▸';
        position: absolute;
        left: 0;
        color: var(--primary-blue);
        transition: all 0.3s ease;
    }

    .service-card:hover .service-features li::before {
        transform: translateX(3px);
        color: var(--tech-purple);
    }

    .service-features li:last-child {
        border-bottom: none;
    }

    /* Animations */
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
        .developer-section {
            padding: 80px 0;
        }

        .section-title {
            font-size: 2.2rem;
        }

        .developer-profile,
        .contact-form,
        .contact-info {
            padding: 2rem;
        }

        .profile-image {
            width: 150px;
            height: 150px;
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .service-card {
            padding: 1.5rem;
        }

        .service-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
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
        .developer-section {
            padding: 60px 0;
        }

        .developer-profile,
        .contact-form,
        .contact-info {
            padding: 1.5rem;
        }

        .profile-image {
            width: 120px;
            height: 120px;
        }

        .service-card {
            padding: 1rem;
        }

        .service-icon {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }
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
                    <h1 class="page-title">Contact Us</h1>
                    <p class="page-subtitle">Get in touch with our team. We're here to help with your office automation needs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Developer Profile Section -->
<section class="developer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title" data-aos="fade-up">Meet the Developer</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Passionate about creating innovative digital solutions</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="developer-profile" data-aos="fade-up" data-aos-delay="200">
                    <!-- Centered Profile Image -->
                    <div class="row justify-content-center mb-5">
                        <div class="col-lg-3 col-md-4 col-6 text-center">
                            <div class="profile-image mx-auto">
                                <img src="{{ asset('images/malith_madhushantha.jpg') }}" alt="Malith Madhushantha Profile">
                            </div>
                        </div>
                    </div>

                    <!-- Centered Text Content -->
                    <div class="row justify-content-center mb-5">
                        <div class="col-lg-8 text-center">
                            <h2 class="mb-3 fw-bold">Malith Madhushantha</h2>
                            <h4 class="mb-4">Full-Stack Developer</h4>
                            <p class="mb-4">
                                Passionate technology professional dedicated to creating innovative digital solutions.
                                Specializing in comprehensive development services from concept to deployment,
                                transforming ideas into powerful, user-friendly applications.
                            </p>
                        </div>
                    </div>

                    <!-- Services Section -->
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="text-center mb-4">
                                <h5 class="mb-3" style="color: var(--primary-blue);">🎯 Other Services I Provide</h5>
                            </div>
                            <div class="services-grid">
                                <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                                    <div class="service-icon">
                                        <i class="bi bi-palette"></i>
                                    </div>
                                    <h5>Logo Design</h5>
                                    <p>Creative brand identity design that captures your vision</p>
                                    <ul class="service-features">
                                        <li>Professional Logo Creation</li>
                                        <li>Brand Identity Package</li>
                                        <li>Multiple Format Delivery</li>
                                    </ul>
                                </div>

                                <div class="service-card" data-aos="fade-up" data-aos-delay="400">
                                    <div class="service-icon">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>
                                    <h5>Calendar Design</h5>
                                    <p>Custom calendar designs for business and personal use</p>
                                    <ul class="service-features">
                                        <li>Corporate Calendar Design</li>
                                        <li>Event Planning Calendars</li>
                                        <li>Print & Digital Formats</li>
                                    </ul>
                                </div>

                                <div class="service-card" data-aos="fade-up" data-aos-delay="500">
                                    <div class="service-icon">
                                        <i class="bi bi-globe"></i>
                                    </div>
                                    <h5>Website Development</h5>
                                    <p>Modern, responsive websites built with latest technologies</p>
                                    <ul class="service-features">
                                        <li>Responsive Web Design</li>
                                        <li>E-commerce Solutions</li>
                                        <li>SEO Optimization</li>
                                    </ul>
                                </div>

                                <div class="service-card" data-aos="fade-up" data-aos-delay="600">
                                    <div class="service-icon">
                                        <i class="bi bi-database"></i>
                                    </div>
                                    <h5>Database Development</h5>
                                    <p>Robust database solutions for data management and analytics</p>
                                    <ul class="service-features">
                                        <li>Database Design & Architecture</li>
                                        <li>Data Migration Services</li>
                                        <li>Performance Optimization</li>
                                    </ul>
                                </div>

                                <div class="service-card" data-aos="fade-up" data-aos-delay="700">
                                    <div class="service-icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                    <h5>Mobile App Development</h5>
                                    <p>Cross-platform mobile applications for iOS and Android</p>
                                    <ul class="service-features">
                                        <li>Native & Cross-Platform Apps</li>
                                        <li>UI/UX Design</li>
                                        <li>App Store Deployment</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tech Expertise Section -->
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-8 text-center">
                            <h5 class="mb-3" style="color: #10b981;">⚡ Technical Expertise</h5>
                            <div class="tech-badges" data-aos="fade-up" data-aos-delay="800">
                                <span class="tech-badge">PHP</span>
                                <span class="tech-badge">Laravel</span>
                                <span class="tech-badge">MySQL</span>
                                <span class="tech-badge">JavaScript</span>
                                <span class="tech-badge">React.js</span>
                                <span class="tech-badge">Node.js</span>
                                <span class="tech-badge">MongoDB</span>
                                <span class="tech-badge">Flutter</span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Details -->
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-8">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="contact-item" data-aos="fade-right" data-aos-delay="900">
                                        <div class="contact-icon">
                                            <i class="bi bi-phone text-white"></i>
                                        </div>
                                        <div>
                                            <h6>Phone</h6>
                                            <p>+94 71 980 3639</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-item" data-aos="fade-left" data-aos-delay="1000">
                                        <div class="contact-icon">
                                            <i class="bi bi-geo-alt text-white"></i>
                                        </div>
                                        <div>
                                            <h6>Location</h6>
                                            <p>Puttalam, Saliyawewa, Sri Lanka</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title" data-aos="fade-up">Get In Touch</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Ready to start your next project? Let's discuss how we can help.</p>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
                <div class="contact-form">
                    <h3 class="fw-bold mb-4 text-center">
                        <i class="bi bi-envelope me-2"></i>Send us a Message
                    </h3>
                    <form id="contactForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">
                                    <i class="bi bi-person me-2"></i>First Name
                                </label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter first name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">
                                    <i class="bi bi-person-fill me-2"></i>Last Name
                                </label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter last name" required>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">
                                    <i class="bi bi-envelope me-2"></i>Email Address
                                </label>
                                <input type="email" class="form-control" id="email" placeholder="your.email@example.com" required>
                            </div>
                            <div class="col-12">
                                <label for="subject" class="form-label">
                                    <i class="bi bi-chat-square-text me-2"></i>Subject
                                </label>
                                <input type="text" class="form-control" id="subject" placeholder="What's this about?" required>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">
                                    <i class="bi bi-code-slash me-2"></i>Message
                                </label>
                                <textarea class="form-control" id="message" rows="5" placeholder="Type your message here..." required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="tech-btn w-100">
                                    <i class="bi bi-rocket-takeoff me-2"></i>Launch Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
                <div class="contact-info">
                    <h4 class="fw-bold mb-4 text-center">
                        <i class="bi bi-info-circle me-2"></i>Contact Information
                    </h4>

                    <div class="contact-item mb-3">
                        <div class="contact-icon">
                            <i class="bi bi-envelope text-white"></i>
                        </div>
                        <div>
                            <h6>Primary Email</h6>
                            <p>info@ezofz.lk</p>
                        </div>
                    </div>

                    <div class="contact-item mb-3">
                        <div class="contact-icon">
                            <i class="bi bi-shield-check text-white"></i>
                        </div>
                        <div>
                            <h6>Security Contact</h6>
                            <p>security@ezofz.lk</p>
                        </div>
                    </div>

                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="bi bi-headset text-white"></i>
                        </div>
                        <div>
                            <h6>Tech Support</h6>
                            <p>support@ezofz.lk</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <h5 class="fw-bold mb-3" style="color: #f59e0b;">⏰ Support Hours</h5>
                        <div class="rounded-3 p-3 border" style="background: #f8fafc; border-color: rgba(102, 126, 234, 0.1) !important;">
                            <div class="d-flex justify-content-between mb-2" style="color: #4a5568;">
                                <span>Monday - Friday</span>
                                <span style="color: #10b981;">24/7 Online</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2" style="color: #4a5568;">
                                <span>Weekend Support</span>
                                <span style="color: #f59e0b;">Limited</span>
                            </div>
                            <div class="d-flex justify-content-between" style="color: #4a5568;">
                                <span>Emergency Line</span>
                                <span style="color: #10b981;">Always Active</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form submission
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            // Show loading state
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Sending...';
            submitBtn.disabled = true;

            // Simulate form submission (replace with actual submission logic)
            setTimeout(() => {
                alert('Message sent successfully! 🚀');
                this.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
    }

    // Smooth hover effects for cards
    const cards = document.querySelectorAll('.service-card, .contact-item, .tech-badge');

    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            if (this.classList.contains('service-card')) {
                this.style.transform = 'translateY(-5px)';
            } else if (this.classList.contains('contact-item')) {
                this.style.transform = 'translateY(-3px)';
            } else if (this.classList.contains('tech-badge')) {
                this.style.transform = 'translateY(-2px)';
            }
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
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
    document.querySelectorAll('.service-card, .contact-item, .tech-badge').forEach(el => {
        observer.observe(el);
    });

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
});
</script>
@endpush
@endsection
