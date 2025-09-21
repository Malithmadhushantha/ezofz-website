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
        --dark-bg: #0a0e1a;
        --card-bg: rgba(255, 255, 255, 0.95);
        --glass-bg: rgba(255, 255, 255, 0.1);
        --text-light: #8892b0;
        --border-color: rgba(255, 255, 255, 0.2);
        --neon-blue: #00d4ff;
        --neon-purple: #b794f6;
    }

    * {
        cursor: none;
    }

    body {
        background: var(--dark-bg);
        color: white;
        position: relative;
        overflow-x: hidden;
    }

    /* Custom Cursor */
    .cursor {
        width: 20px;
        height: 20px;
        border: 2px solid var(--neon-blue);
        border-radius: 50%;
        position: fixed;
        pointer-events: none;
        z-index: 9999;
        transition: all 0.1s ease;
        mix-blend-mode: difference;
    }

    .cursor::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 4px;
        height: 4px;
        background: var(--neon-blue);
        border-radius: 50%;
        transition: all 0.1s ease;
    }

    .cursor.active {
        transform: scale(2);
        border-color: var(--neon-purple);
    }

    .cursor.active::before {
        background: var(--neon-purple);
    }

    /* Matrix Rain Background */
    .matrix-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
        opacity: 0.1;
    }

    /* Animated Background */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background:
            radial-gradient(circle at 20% 50%, rgba(0, 212, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(183, 148, 246, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 40% 80%, rgba(102, 126, 234, 0.1) 0%, transparent 50%);
        pointer-events: none;
        z-index: -1;
        animation: float-bg 20s ease-in-out infinite;
    }

    @keyframes float-bg {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(20px, -20px) rotate(1deg); }
        66% { transform: translate(-10px, 10px) rotate(-1deg); }
    }

    /* Header Section */
    .hero-section {
        padding: 120px 0 80px;
        position: relative;
        background: var(--primary-gradient);
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
        backdrop-filter: blur(10px);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .glitch-text {
        font-size: 3.5rem;
        font-weight: 800;
        text-transform: uppercase;
        position: relative;
        color: white;
        letter-spacing: 3px;
    }

    .glitch-text::before,
    .glitch-text::after {
        content: attr(data-text);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        animation: glitch 2s infinite;
    }

    .glitch-text::before {
        color: #ff0040;
        z-index: -1;
        animation-delay: -0.3s;
    }

    .glitch-text::after {
        color: #00ff40;
        z-index: -2;
        animation-delay: -0.6s;
    }

    @keyframes glitch {
        0%, 100% {
            transform: translate(0);
        }
        10% {
            transform: translate(-2px, -1px);
        }
        20% {
            transform: translate(2px, 1px);
        }
        30% {
            transform: translate(-1px, 2px);
        }
        40% {
            transform: translate(1px, -2px);
        }
        50% {
            transform: translate(-2px, 1px);
        }
        60% {
            transform: translate(2px, -1px);
        }
        70% {
            transform: translate(-1px, -2px);
        }
        80% {
            transform: translate(1px, 2px);
        }
        90% {
            transform: translate(-2px, -1px);
        }
    }

    /* Developer Profile Section */
    .developer-profile {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border-color);
        border-radius: 25px;
        padding: 3rem;
        margin: -50px 0 80px;
        position: relative;
        overflow: hidden;
    }

    .developer-profile::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-gradient);
        transform: scaleX(0);
        transition: transform 1s ease;
    }

    .developer-profile:hover::before {
        transform: scaleX(1);
    }

    .profile-image {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        border: 4px solid var(--neon-blue);
        box-shadow: 0 0 30px rgba(0, 212, 255, 0.5);
        transition: all 0.5s ease;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: white;
    }

    .profile-image:hover {
        transform: scale(1.05) rotate(5deg);
        box-shadow: 0 0 50px rgba(0, 212, 255, 0.8);
    }

    .tech-badge {
        display: inline-block;
        padding: 8px 16px;
        background: var(--glass-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        margin: 5px;
        font-size: 0.9rem;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .tech-badge::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 212, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .tech-badge:hover::before {
        left: 100%;
    }

    .tech-badge:hover {
        border-color: var(--neon-blue);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 212, 255, 0.3);
    }

    /* Contact Form */
    .contact-form {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border-color);
        border-radius: 25px;
        padding: 3rem;
        position: relative;
        overflow: hidden;
    }

    .contact-form::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: var(--primary-gradient);
        border-radius: 25px;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .contact-form:hover::before {
        opacity: 0.3;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 15px;
        padding: 15px 20px;
        color: white;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.1);
        border-color: var(--neon-blue);
        box-shadow: 0 0 20px rgba(0, 212, 255, 0.3);
        color: white;
    }

    .form-control::placeholder {
        color: var(--text-light);
    }

    .form-label {
        color: white;
        font-weight: 600;
        margin-bottom: 10px;
    }

    /* Contact Info Card */
    .contact-info {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border-color);
        border-radius: 25px;
        padding: 2rem;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .contact-item {
        display: flex;
        align-items: center;
        padding: 1rem;
        margin-bottom: 1rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        border: 1px solid var(--border-color);
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
        opacity: 0.1;
        transition: left 0.5s;
    }

    .contact-item:hover::before {
        left: 100%;
    }

    .contact-item:hover {
        transform: translateX(10px);
        border-color: var(--neon-blue);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
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
    }

    .contact-icon::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: var(--neon-blue);
        border-radius: 50%;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .contact-item:hover .contact-icon::before {
        opacity: 1;
    }

    /* Buttons */
    .tech-btn {
        background: var(--primary-gradient);
        border: none;
        border-radius: 50px;
        padding: 15px 40px;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
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
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
    }

    /* Animations */
    @keyframes float-in {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-in {
        animation: float-in 0.8s ease-out;
    }

    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 20px rgba(0, 212, 255, 0.5); }
        50% { box-shadow: 0 0 40px rgba(0, 212, 255, 0.8); }
    }

    .pulse-glow {
        animation: pulse-glow 2s ease-in-out infinite;
    }

    /* Services Section */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .service-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 2rem;
        position: relative;
        overflow: hidden;
        transition: all 0.5s ease;
        cursor: pointer;
        transform-style: preserve-3d;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--primary-gradient);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .service-card:hover {
        transform: translateY(-10px) rotateX(5deg);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        border-color: var(--neon-blue);
    }

    .service-card:hover::before {
        opacity: 0.1;
    }

    .service-icon {
        width: 80px;
        height: 80px;
        background: var(--primary-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: white;
        position: relative;
        animation: float-icon 3s ease-in-out infinite;
    }

    .service-icon::before {
        content: '';
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        background: var(--neon-blue);
        border-radius: 50%;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .service-card:hover .service-icon::before {
        opacity: 0.3;
    }

    @keyframes float-icon {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .service-card h5 {
        color: white;
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 1.25rem;
    }

    .service-card p {
        color: var(--text-light);
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .service-features {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .service-features li {
        color: var(--text-light);
        padding: 0.5rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
        position: relative;
        padding-left: 1.5rem;
    }

    .service-features li::before {
        content: '▸';
        position: absolute;
        left: 0;
        color: var(--neon-blue);
        transition: transform 0.3s ease;
    }

    .service-card:hover .service-features li::before {
        transform: translateX(5px);
        color: var(--neon-purple);
    }

    .service-features li:last-child {
        border-bottom: none;
    }

    /* Staggered Animation for Service Cards */
    .service-card:nth-child(1) { animation-delay: 0.1s; }
    .service-card:nth-child(2) { animation-delay: 0.2s; }
    .service-card:nth-child(3) { animation-delay: 0.3s; }
    .service-card:nth-child(4) { animation-delay: 0.4s; }
    .service-card:nth-child(5) { animation-delay: 0.5s; }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(50px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .service-card.animate-in {
        animation: slideInUp 0.8s ease-out forwards;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .glitch-text {
            font-size: 2.5rem;
            letter-spacing: 1px;
        }

        .developer-profile,
        .contact-form {
            padding: 2rem;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            font-size: 3rem;
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
</style>
@endpush

@section('content')
<!-- Custom Cursor -->
<div class="cursor"></div>

<!-- Matrix Background Canvas -->
<canvas class="matrix-bg" id="matrixCanvas"></canvas>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="glitch-text" data-text="CONTACT" data-aos="fade-down">CONTACT</h1>
            <p class="lead mt-4" data-aos="fade-up" data-aos-delay="200">
                Connect with the Developer • Innovate Together
            </p>
        </div>
    </div>
</section>

<div class="container">
    <!-- Developer Profile Section -->
    <section class="developer-profile" data-aos="fade-up" data-aos-delay="300">
        <!-- Centered Profile Image -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-3 col-md-4 col-6 text-center">
                <div class="profile-image mx-auto pulse-glow">
                    <img src="{{ asset('images/malith_madhushantha.jpg') }}" alt="Malith Madhushantha Profile" class="w-100 h-100 object-fit-cover rounded-circle">
                </div>
            </div>
        </div>

        <!-- Centered Text Content -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="mb-3 fw-bold">
                    <span class="text-gradient">Developer Profile</span>
                </h2>
                <h4 class="text-info mb-4">Malith Madhushantha - Full-Stack Developer</h4>
                <p class="mb-4 text-light">
                    Passionate technology professional dedicated to creating innovative digital solutions.
                    Specializing in comprehensive development services from concept to deployment,
                    transforming ideas into powerful, user-friendly applications.
                </p>
            </div>
        </div>

        <!-- Centered Services Section -->
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="text-center mb-4">
                    <h5 class="text-warning mb-3">🎯 Other Services I Provide</h5>
                </div>
                <div class="services-grid">
                    <div class="service-card animate-in">
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

                    <div class="service-card animate-in">
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

                    <div class="service-card animate-in">
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

                    <div class="service-card animate-in">
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

                    <div class="service-card animate-in">
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

        <!-- Centered Tech Expertise Section -->
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8 text-center">
                <h5 class="text-success mb-3">⚡ Technical Expertise</h5>
                <div class="tech-badges">
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

        <!-- Centered Contact Details -->
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="contact-details">
                    <div class="contact-item mb-3">
                        <div class="contact-icon">
                            <i class="bi bi-phone text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 text-white">Phone</h6>
                            <p class="mb-0 text-info">+94 71 980 3639</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="bi bi-geo-alt text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 text-white">Location</h6>
                            <p class="mb-0 text-info">Puttalam, Saliyawewa, Sri Lanka</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5">
        <div class="row g-5">
            <div class="col-lg-8" data-aos="fade-right">
                <div class="contact-form">
                    <h3 class="fw-bold mb-4 text-center">
                        <i class="bi bi-terminal me-2"></i>Initiate Communication Protocol
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

            <div class="col-lg-4" data-aos="fade-left">
                <div class="contact-info">
                    <h4 class="fw-bold mb-4 text-center">
                        <i class="bi bi-wifi me-2"></i>Connection Points
                    </h4>

                    <div class="contact-item mb-3">
                        <div class="contact-icon">
                            <i class="bi bi-envelope text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 text-white">Primary Email</h6>
                            <p class="mb-0 text-info">info@ezofz.lk</p>
                        </div>
                    </div>

                    <div class="contact-item mb-3">
                        <div class="contact-icon">
                            <i class="bi bi-shield-check text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 text-white">Security Contact</h6>
                            <p class="mb-0 text-info">security@ezofz.lk</p>
                        </div>
                    </div>

                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="bi bi-headset text-white"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 text-white">Tech Support</h6>
                            <p class="mb-0 text-info">support@ezofz.lk</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <h5 class="fw-bold mb-3 text-warning">⏰ System Uptime</h5>
                        <div class="bg-dark rounded-3 p-3 border" style="border-color: var(--border-color) !important;">
                            <div class="d-flex justify-content-between mb-2 text-light">
                                <span>Monday - Friday</span>
                                <span class="text-success">24/7 Online</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2 text-light">
                                <span>Weekend Support</span>
                                <span class="text-warning">Limited</span>
                            </div>
                            <div class="d-flex justify-content-between text-light">
                                <span>Emergency Line</span>
                                <span class="text-success">Always Active</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
// Custom Cursor
document.addEventListener('DOMContentLoaded', function() {
    const cursor = document.querySelector('.cursor');
    const links = document.querySelectorAll('a, button, .form-control, .tech-badge');

    document.addEventListener('mousemove', e => {
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
    });

    links.forEach(link => {
        link.addEventListener('mouseenter', () => {
            cursor.classList.add('active');
        });

        link.addEventListener('mouseleave', () => {
            cursor.classList.remove('active');
        });
    });

    // Matrix Rain Effect
    const canvas = document.getElementById('matrixCanvas');
    const ctx = canvas.getContext('2d');

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const matrix = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789@#$%^&*()*&^%+-/~{[|`]}";
    const matrixArray = matrix.split("");

    const fontSize = 16;
    const columns = canvas.width / fontSize;

    const drops = [];
    for(let x = 0; x < columns; x++) {
        drops[x] = 1;
    }

    function draw() {
        ctx.fillStyle = 'rgba(10, 14, 26, 0.04)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        ctx.fillStyle = '#00d4ff';
        ctx.font = fontSize + 'px monospace';

        for(let i = 0; i < drops.length; i++) {
            const text = matrixArray[Math.floor(Math.random() * matrixArray.length)];
            ctx.fillText(text, i * fontSize, drops[i] * fontSize);

            if(drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
                drops[i] = 0;
            }
            drops[i]++;
        }
    }

    setInterval(draw, 50);

    // Form submission
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // Add your form submission logic here
        alert('Message sent successfully! 🚀');
    });

    // Service Cards Animation on Scroll
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -50px 0px'
    };

    const serviceObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0) scale(1)';
                }, index * 100); // Staggered animation
            }
        });
    }, observerOptions);

    // Initialize service cards
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach((card, index) => {
        // Set initial state
        card.style.opacity = '0';
        card.style.transform = 'translateY(50px) scale(0.9)';
        card.style.transition = 'all 0.8s ease-out';

        // Observe for intersection
        serviceObserver.observe(card);

        // Add hover effects
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) rotateX(5deg) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) rotateX(0deg) scale(1)';
        });
    });

    // Animate tech badges on scroll
    const techBadges = document.querySelectorAll('.tech-badge');
    const badgeObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'slideInUp 0.6s ease-out forwards';
            }
        });
    }, observerOptions);

    techBadges.forEach((badge, index) => {
        badge.style.animationDelay = `${index * 0.1}s`;
        badgeObserver.observe(badge);
    });

    // Window resize handler
    window.addEventListener('resize', function() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
});
</script>
@endsection
