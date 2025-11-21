@extends('layouts.app')

@section('body-class', 'sldrc-page')

@section('title', 'SLDRC App - Digital Vehicle Management for Sri Lankan Drivers | Ezofz Technology')
@section('meta_description', 'Transform your vehicle record-keeping with SLDRC App. Digital trip management, fuel tracking, maintenance scheduling for Sri Lankan drivers. Download now on Google Play. Developed by Ezofz Technology Solutions.')
@section('meta_keywords', 'SLDRC App, vehicle management, Sri Lankan drivers, trip tracking, fuel management, digital records, Ezofz Technology, mobile app, Flutter, Firebase, vehicle maintenance')

@section('content')
<!-- App Banner Section -->
<section class="app-banner">
    <div class="banner-overlay"></div>
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <div class="banner-content">
                    <div class="company-badge">
                        <span class="badge-text">Developed by</span>
                        <strong>Ezofz Technology Solutions</strong>
                    </div>
                    <h1 class="banner-title">SLDRC App</h1>
                    <h2 class="banner-subtitle">Digital Vehicle Management for Sri Lankan Drivers</h2>
                    <p class="banner-description">
                        Transform your vehicle record-keeping with our comprehensive digital solution.
                        Manage trips, track fuel consumption, monitor service schedules, and maintain
                        complete vehicle records - all in one professional mobile application.
                    </p>
                    <div class="banner-stats">
                        <div class="stat-item">
                            <div class="stat-number">10K+</div>
                            <div class="stat-label">Downloads</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">4.8★</div>
                            <div class="stat-label">Rating</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">99%</div>
                            <div class="stat-label">Uptime</div>
                        </div>
                    </div>
                    <div class="banner-buttons">
                        <a href="#download" class="btn-download">
                            <i class="bi bi-google-play"></i>
                            <div class="btn-content">
                                <small>Get it on</small>
                                <strong>Google Play</strong>
                            </div>
                        </a>
                        <a href="#features" class="btn-learn-more">
                            <i class="bi bi-play-circle"></i>
                            <span>Watch Demo</span>
                        </a>
                    </div>
                    <!-- Add proper spacing below buttons -->
                    <div class="banner-spacing"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-phone">
                    <div class="phone-mockup">
                        <div class="phone-screen">
                            <div class="app-interface">
                                <div class="app-header">
                                    <div class="status-bar">
                                        <span>9:41</span>
                                        <div class="status-indicators">
                                            <span>📶</span>
                                            <span>📶</span>
                                            <span>🔋</span>
                                        </div>
                                    </div>
                                    <div class="app-title-bar">
                                        <h4>SLDRC Dashboard</h4>
                                        <div class="profile-icon">👤</div>
                                    </div>
                                </div>
                                <div class="app-content">
                                    <div class="dashboard-widget">
                                        <div class="widget-icon">🚗</div>
                                        <div class="widget-text">
                                            <div class="widget-title">Today's Distance</div>
                                            <div class="widget-value">45.2 km</div>
                                        </div>
                                    </div>
                                    <div class="dashboard-widget">
                                        <div class="widget-icon">⛽</div>
                                        <div class="widget-text">
                                            <div class="widget-title">Fuel Efficiency</div>
                                            <div class="widget-value">12.5 km/L</div>
                                        </div>
                                    </div>
                                    <div class="quick-actions">
                                        <div class="action-btn primary">🚀 Start Trip</div>
                                        <div class="action-btn secondary">⛽ Add Fuel</div>
                                    </div>
                                    <div class="bottom-nav">
                                        <div class="nav-item active">🏠</div>
                                        <div class="nav-item">🚗</div>
                                        <div class="nav-item">📊</div>
                                        <div class="nav-item">⚙️</div>
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

<!-- Features Section -->
<section class="features">
    <div class="container">
        <div class="section-title">
            <h2>Comprehensive Vehicle Management</h2>
            <p>Everything you need to digitally manage your vehicle records, replacing traditional paper-based systems with modern, efficient solutions.</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🚗</div>
                <h3>Trip Management</h3>
                <p>Record and track all your trips with detailed information including start/end locations, distance traveled, time, and places visited. Complete trip history at your fingertips.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">⛽</div>
                <h3>Fuel Tracking</h3>
                <p>Monitor fuel consumption, calculate efficiency, track fuel orders, and analyze fuel usage patterns. Never lose track of your fuel expenses again.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Vehicle Analytics</h3>
                <p>Get detailed reports and analytics on your vehicle performance, including odometer tracking, maintenance schedules, and efficiency metrics.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🔧</div>
                <h3>Service Management</h3>
                <p>Track service history, schedule maintenance, monitor oil changes, and receive reminders for upcoming service requirements.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">📱</div>
                <h3>Multi-Vehicle Support</h3>
                <p>Manage multiple vehicles from a single account. Each vehicle maintains its own complete record system with individual tracking and reporting.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🌐</div>
                <h3>Bilingual Support</h3>
                <p>Full support for both English and Sinhala languages, making it accessible for all Sri Lankan drivers with seamless language switching.</p>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    /* App Banner Section */
.app-banner {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
    overflow: hidden;
    color: white;
    min-height: 100vh;
    display: flex;
    align-items: center;
    margin-top: 0;
    padding-top: 0;
}

.banner-spacing {
    margin-bottom: 60px;
    height: 20px;
}

.banner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.3);
    z-index: 1;
}

.app-banner .container {
    position: relative;
    z-index: 2;
    padding-top: 70px; /* Account for fixed navigation */
}

.company-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: 50px;
    padding: 8px 20px;
    margin-bottom: 30px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.company-badge .badge-text {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
    margin-right: 8px;
}

.company-badge strong {
    color: #fbbf24;
    font-weight: 700;
}

.banner-title {
    font-size: 4rem;
    font-weight: 800;
    margin-bottom: 15px;
    background: linear-gradient(135deg, #ffffff, #fbbf24);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.banner-subtitle {
    font-size: 1.8rem;
    margin-bottom: 25px;
    font-weight: 300;
    opacity: 0.9;
}

.banner-description {
    font-size: 1.2rem;
    line-height: 1.7;
    margin-bottom: 40px;
    opacity: 0.85;
    max-width: 500px;
}

.banner-stats {
    display: flex;
    gap: 40px;
    margin-bottom: 40px;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 2.2rem;
    font-weight: 700;
    color: #fbbf24;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.8;
    margin-top: 5px;
}

.banner-buttons {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.btn-download {
    background: linear-gradient(135deg, #10b981, #059669);
    border: none;
    padding: 15px 25px;
    border-radius: 12px;
    color: white;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 600;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
    transform: translateY(0);
}

.btn-download:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4);
    color: white;
}

.btn-download i {
    font-size: 1.5rem;
}

.btn-download small {
    display: block;
    font-size: 0.8rem;
    opacity: 0.8;
}

.btn-learn-more {
    padding: 15px 25px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 12px;
    color: white;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
}

.btn-learn-more:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
    color: white;
}

/* Phone Mockup */
.banner-phone {
    text-align: center;
    padding-top: 50px;
}

.phone-mockup {
    position: relative;
    width: 300px;
    height: 600px;
    margin: 0 auto;
    background: #1f2937;
    border-radius: 35px;
    padding: 20px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
    transform: perspective(1000px) rotateY(-15deg) rotateX(5deg);
}

.phone-screen {
    width: 100%;
    height: 100%;
    border-radius: 25px;
    overflow: hidden;
    background: #000;
    position: relative;
}

/* App Interface Mockup */
.app-interface {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.app-header {
    background: rgba(255, 255, 255, 0.95);
    padding: 8px 15px;
    backdrop-filter: blur(10px);
}

.status-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.7rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 8px;
}

.status-indicators {
    display: flex;
    gap: 3px;
    font-size: 0.6rem;
}

.app-title-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.app-title-bar h4 {
    font-size: 0.9rem;
    margin: 0;
    color: #1f2937;
    font-weight: 700;
}

.profile-icon {
    width: 20px;
    height: 20px;
    background: #667eea;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.7rem;
}

.app-content {
    flex: 1;
    padding: 15px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.dashboard-widget {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 12px;
    padding: 12px;
    display: flex;
    align-items: center;
    gap: 10px;
    backdrop-filter: blur(10px);
}

.widget-icon {
    font-size: 1.5rem;
    width: 30px;
    text-align: center;
}

.widget-text {
    flex: 1;
}

.widget-title {
    font-size: 0.7rem;
    color: #64748b;
    font-weight: 500;
    margin-bottom: 2px;
}

.widget-value {
    font-size: 1rem;
    font-weight: 700;
    color: #1f2937;
}

.quick-actions {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
    margin-top: 10px;
}

.action-btn {
    padding: 10px;
    border-radius: 10px;
    text-align: center;
    font-size: 0.7rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.action-btn.primary {
    background: #10b981;
    color: white;
}

.action-btn.secondary {
    background: rgba(255, 255, 255, 0.9);
    color: #667eea;
    border: 1px solid rgba(102, 126, 234, 0.3);
}

.bottom-nav {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 5px;
    margin-top: auto;
    background: rgba(255, 255, 255, 0.9);
    padding: 8px;
    border-radius: 12px;
    backdrop-filter: blur(10px);
}

.nav-item {
    text-align: center;
    padding: 8px;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.nav-item.active {
    background: #667eea;
    filter: grayscale(0%);
}

.nav-item:not(.active) {
    filter: grayscale(100%);
    opacity: 0.6;
}

/* Screenshot Gallery */
.screenshots-gallery {
    padding: 100px 0;
    background: #f8fafc;
    overflow: hidden;
}

.screenshot-carousel-wrapper {
    margin-top: 60px;
    overflow: hidden;
    position: relative;
    width: 100%;
}

.screenshot-carousel {
    display: flex;
    gap: 30px;
    animation: scrollLeft 30s linear infinite;
    width: fit-content;\n    will-change: transform;
}

.screenshot-item {
    text-align: center;
    transition: all 0.3s ease;
    flex-shrink: 0;
    width: 250px;
}

.screenshot-item:hover {
    transform: translateY(-10px);
    animation-play-state: paused;
}

.screenshot-carousel:hover {
    animation-play-state: paused;
}

@keyframes scrollLeft {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

.screenshot-phone {
    width: 220px;
    height: 440px;
    margin: 0 auto 20px;
    background: #1f2937;
    border-radius: 25px;
    padding: 15px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.screenshot-item:hover .screenshot-phone {
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    transform: scale(1.05);
}

.screenshot-phone img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 15px;
}

.screenshot-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #e2e8f0, #cbd5e1);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    color: #64748b;
    font-size: 0.9rem;
    text-align: center;
    padding: 20px;
}

.screenshot-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 8px;
}

.screenshot-desc {
    font-size: 0.9rem;
    color: #64748b;
    line-height: 1.5;
}

        /* Features Section */
        .features {
            padding: 100px 0;
            background: white;
            position: relative;
        }

        .features::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.3), transparent);
        }

        .section-title {
            text-align: center;
            margin-bottom: 80px;
        }

        .section-title h2 {
            font-size: 3rem;
            color: #1E40AF;
            margin-bottom: 20px;
        }

        .section-title p {
            font-size: 1.3rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-bottom: 60px;
        }

        .feature-card {
            background: #f8fafc;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #1E40AF, #3B82F6);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2rem;
            color: white;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            color: #1E40AF;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #666;
            line-height: 1.8;
        }

        /* Screenshots Section */
        .screenshots {
            padding: 100px 0;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        }

        .screenshots-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .screenshot {
            text-align: center;
        }

        .screenshot img {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .screenshot h4 {
            color: #1E40AF;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .screenshot p {
            color: #666;
            font-size: 0.95rem;
        }

        /* Benefits Section */
        .benefits {
            padding: 100px 0;
            background: white;
        }

        .benefits-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 40px;
            margin-top: 60px;
        }

        .benefit {
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }

        .benefit-icon {
            width: 50px;
            height: 50px;
            background: #10B981;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .benefit-content h4 {
            color: #1E40AF;
            font-size: 1.3rem;
            margin-bottom: 10px;
        }

        .benefit-content p {
            color: #666;
            line-height: 1.7;
        }

        /* Tech Stack */
        .tech-stack {
            padding: 100px 0;
            background: #1E40AF;
            color: white;
        }

        .tech-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-top: 60px;
        }

        .tech-item {
            text-align: center;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .tech-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-5px);
        }

        .tech-item h4 {
            font-size: 1.4rem;
            margin-bottom: 15px;
        }

        .tech-item p {
            opacity: 0.8;
            line-height: 1.6;
        }

        /* CTA Section */
        .cta {
            padding: 100px 0;
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
            text-align: center;
        }

        .cta h2 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 1.3rem;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        /* Footer */
        .footer {
            background: #1f2937;
            color: white;
            padding: 60px 0 30px;
            text-align: center;
        }

        .footer-content {
            margin-bottom: 30px;
        }

        .footer h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: #3B82F6;
        }

        .footer p {
            opacity: 0.8;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 30px;
            opacity: 0.6;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2.5rem;
            }

            .header .subtitle {
                font-size: 1.2rem;
            }

            .section-title h2 {
                font-size: 2.2rem;
            }

            .features-grid,
            .benefits-list {
                grid-template-columns: 1fr;
            }

            .download-buttons {
                flex-direction: column;
                align-items: center;
            }

            .cta h2 {
                font-size: 2.2rem;
            }
        }

        .placeholder-img {
            background: linear-gradient(135deg, #e2e8f0, #cbd5e1);
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            color: #64748b;
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        /* Header section styles for legacy compatibility */
        .header {
            display: none; /* Hide duplicate header */
        }
    </style>

<!-- Screenshots Gallery Section -->
<section class="screenshots-gallery" id="screenshots">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="display-4 fw-bold mb-4">Beautiful & Intuitive Interface</h2>
            <p class="lead text-muted">Designed with Material Design 3 principles for a professional, government-grade user experience</p>
        </div>

        <div class="screenshot-carousel-wrapper">
            <div class="screenshot-carousel">
                <!-- First set of screenshots -->
                <div class="screenshot-item">
                    <div class="screenshot-phone">
                        <img src="{{ asset('images/sldrc_app/dashboard.jpg') }}" alt="SLDRC App Dashboard" class="img-fluid">
                    </div>
                    <h4 class="screenshot-title">Smart Dashboard</h4>
                    <p class="screenshot-desc">Quick overview of all your vehicles, recent trips, and key statistics in one place</p>
                </div>

                <div class="screenshot-item">
                    <div class="screenshot-phone">
                        <img src="{{ asset('images/sldrc_app/trip_recording.jpg') }}" alt="SLDRC App Trip Recording" class="img-fluid">
                    </div>
                    <h4 class="screenshot-title">Trip Recording</h4>
                    <p class="screenshot-desc">Easy trip recording with automatic calculations and detailed logging capabilities</p>
                </div>

                <div class="screenshot-item">
                    <div class="screenshot-phone">
                        <img src="{{ asset('images/sldrc_app/vehicle_management.jpg') }}" alt="SLDRC App Vehicle Management" class="img-fluid">
                    </div>
                    <h4 class="screenshot-title">Vehicle Management</h4>
                    <p class="screenshot-desc">Complete vehicle profiles with registration details, specifications, and current status</p>
                </div>

                <div class="screenshot-item">
                    <div class="screenshot-phone">
                        <img src="{{ asset('images/sldrc_app/data_history.jpg') }}" alt="SLDRC App Data History" class="img-fluid">
                    </div>
                    <h4 class="screenshot-title">Data History</h4>
                    <p class="screenshot-desc">Access a comprehensive history of all your vehicle data, trips, and maintenance records for easy reference and analysis</p>
                </div>

                <div class="screenshot-item">
                    <div class="screenshot-phone">
                        <img src="{{ asset('images/sldrc_app/detailed_reports.jpg') }}" alt="SLDRC App Detailed Reports" class="img-fluid">
                    </div>
                    <h4 class="screenshot-title">Detailed Reports</h4>
                    <p class="screenshot-desc">Comprehensive analytics and reporting for informed decision making</p>
                </div>

                <!-- Duplicate set for seamless looping -->
                <div class="screenshot-item">
                    <div class="screenshot-phone">
                        <img src="{{ asset('images/sldrc_app/dashboard.jpg') }}" alt="SLDRC App Dashboard" class="img-fluid">
                    </div>
                    <h4 class="screenshot-title">Smart Dashboard</h4>
                    <p class="screenshot-desc">Quick overview of all your vehicles, recent trips, and key statistics in one place</p>
                </div>

                <div class="screenshot-item">
                    <div class="screenshot-phone">
                        <img src="{{ asset('images/sldrc_app/trip_recording.jpg') }}" alt="SLDRC App Trip Recording" class="img-fluid">
                    </div>
                    <h4 class="screenshot-title">Trip Recording</h4>
                    <p class="screenshot-desc">Easy trip recording with automatic calculations and detailed logging capabilities</p>
                </div>

                <div class="screenshot-item">
                    <div class="screenshot-phone">
                        <img src="{{ asset('images/sldrc_app/vehicle_management.jpg') }}" alt="SLDRC App Vehicle Management" class="img-fluid">
                    </div>
                    <h4 class="screenshot-title">Vehicle Management</h4>
                    <p class="screenshot-desc">Complete vehicle profiles with registration details, specifications, and current status</p>
                </div>

                <div class="screenshot-item">
                    <div class="screenshot-phone">
                        <img src="{{ asset('images/sldrc_app/data_history.jpg') }}" alt="SLDRC App Data History" class="img-fluid">
                    </div>
                    <h4 class="screenshot-title">Data History</h4>
                    <p class="screenshot-desc">Access a comprehensive history of all your vehicle data, trips, and maintenance records for easy reference and analysis</p>
                </div>

                <div class="screenshot-item">
                    <div class="screenshot-phone">
                        <img src="{{ asset('images/sldrc_app/detailed_reports.jpg') }}" alt="SLDRC App Detailed Reports" class="img-fluid">
                    </div>
                    <h4 class="screenshot-title">Detailed Reports</h4>
                    <p class="screenshot-desc">Comprehensive analytics and reporting for informed decision making</p>
                </div>
            </div>
        </div>
</section>

    <!-- Benefits Section -->
    <section class="benefits">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose SLDRC App?</h2>
                <p>Discover the advantages of switching to digital vehicle management</p>
            </div>

            <div class="benefits-list">
                <div class="benefit">
                    <div class="benefit-icon">📋</div>
                    <div class="benefit-content">
                        <h4>Replace Paper Records</h4>
                        <p>Eliminate the hassle of maintaining physical logbooks and paper records. Everything is stored securely in the cloud with automatic backups.</p>
                    </div>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">🎯</div>
                    <div class="benefit-content">
                        <h4>Accurate Calculations</h4>
                        <p>Automatic fuel efficiency calculations, distance tracking, and expense monitoring ensure precise record-keeping without manual errors.</p>
                    </div>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">💰</div>
                    <div class="benefit-content">
                        <h4>Cost Savings</h4>
                        <p>Track and optimize fuel consumption, monitor maintenance costs, and identify areas for cost reduction through detailed analytics.</p>
                    </div>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">🔒</div>
                    <div class="benefit-content">
                        <h4>Secure & Reliable</h4>
                        <p>Enterprise-grade security with Firebase backend, user authentication, and data encryption. Your records are safe and accessible anytime.</p>
                    </div>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">⚡</div>
                    <div class="benefit-content">
                        <h4>Real-time Sync</h4>
                        <p>All data synchronizes in real-time across devices. Access your vehicle records from anywhere with an internet connection.</p>
                    </div>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">🎨</div>
                    <div class="benefit-content">
                        <h4>Professional Design</h4>
                        <p>Government-suitable aesthetic with clean, professional interface designed for both individual drivers and institutional use.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tech Stack Section -->
    <section class="tech-stack">
        <div class="container">
            <div class="section-title">
                <h2>Built with Modern Technology</h2>
                <p>Powered by industry-leading technologies for performance, reliability, and scalability</p>
            </div>

            <div class="tech-grid">
                <div class="tech-item">
                    <h4>Flutter</h4>
                    <p>Cross-platform mobile framework for smooth, native-like performance on both Android and iOS</p>
                </div>

                <div class="tech-item">
                    <h4>Firebase</h4>
                    <p>Google's backend platform providing authentication, real-time database, and cloud storage</p>
                </div>

                <div class="tech-item">
                    <h4>Material Design 3</h4>
                    <p>Latest design system from Google ensuring modern, accessible, and beautiful user interfaces</p>
                </div>

                <div class="tech-item">
                    <h4>Cloud Firestore</h4>
                    <p>NoSQL database with real-time synchronization and offline support for seamless data access</p>
                </div>

                <div class="tech-item">
                    <h4>Firebase Auth</h4>
                    <p>Secure user authentication with multiple sign-in methods and enterprise-grade security</p>
                </div>

                <div class="tech-item">
                    <h4>Dart Language</h4>
                    <p>Modern, efficient programming language optimized for mobile and web development</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How to Use Guide -->
    <section class="features" style="background: #f0f9ff;">
        <div class="container">
            <div class="section-title">
                <h2>How to Use SLDRC App</h2>
                <h3 style="color: #dc2626; margin-bottom: 15px;">SLDRC යෙදුම භාවිතා කරන්නේ කොහොමද?</h3>
                <p>Follow this comprehensive guide to get started with digital vehicle management</p>
                <p style="color: #059669; font-size: 1.1rem;">ඩිජිටල් වාහන කළමනාකරණය ආරම්භ කිරීම සඳහා මෙම මාර්ගෝපදේශය අනුගමනය කරන්න</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📝</div>
                    <h3>Step 1: Registration</h3>
                    <h4 style="color: #dc2626;">පියවර 1: ලියාපදිංචි කිරීම</h4>
                    <p><strong>English:</strong><br>
                       • Download and install the app<br>
                       • Create account with email/phone<br>
                       • Complete your profile information<br>
                       • Add rank and regiment details<br><br>
                       <strong>සිංහල:</strong><br>
                       • යෙදුම බාගත කර ස්ථාපනය කරන්න<br>
                       • ඊමේල්/දුරකථනයෙන් ගිණුමක් සාදන්න<br>
                       • ඔබගේ පැතිකඩ තොරතුරු සම්පුර්ණ කරන්න<br>
                       • නිලය සහ රෙජිමේන්තු විස්තර එක් කරන්න</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🚗</div>
                    <h3>Step 2: Add Your Vehicle</h3>
                    <h4 style="color: #dc2626;">පියවර 2: ඔබගේ වාහනය එක් කරන්න</h4>
                    <p><strong>English:</strong><br>
                       • Go to "My Vehicles" section<br>
                       • Click "Add Vehicle" button<br>
                       • Enter registration number<br>
                       • Add make, model, and year<br>
                       • Set current odometer reading<br><br>
                       <strong>සිංහල:</strong><br>
                       • "මගේ වාහන" කොටසට යන්න<br>
                       • "වාහනය එක් කරන්න" බොත්තම ක්ලික් කරන්න<br>
                       • ලියාපදිංචි අංකය ඇතුළත් කරන්න<br>
                       • නිෂ්පාදකයා, ආකෘතිය සහ වර්ෂය එක් කරන්න<br>
                       • වර්තමාන ඕඩෝමීටර් කියවීම සකසන්න</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📍</div>
                    <h3>Step 3: Record Your First Trip</h3>
                    <h4 style="color: #dc2626;">පියවර 3: ඔබගේ පළමු ගමන සටහන් කරන්න</h4>
                    <p><strong>English:</strong><br>
                       • Tap "Add New Trip" on dashboard<br>
                       • Select your vehicle<br>
                       • Enter start location and time<br>
                       • Record places visited (optional)<br>
                       • Complete trip with end details<br><br>
                       <strong>සිංහල:</strong><br>
                       • ඩෑෂ්බෝඩ්හි "නව ගමනක් එක් කරන්න" ස්පර්ශ කරන්න<br>
                       • ඔබගේ වාහනය තෝරන්න<br>
                       • ආරම්භක ස්ථානය සහ වේලාව ඇතුළත් කරන්න<br>
                       • පිනිසුරු ගිය ස්ථාන සටහන් කරන්න (විකල්ප)<br>
                       • අවසාන විස්තර සමඟ ගමන සම්පූර්ණ කරන්න</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">⛽</div>
                    <h3>Step 4: Track Fuel Usage</h3>
                    <h4 style="color: #dc2626;">පියවර 4: ඉන්ධන භාවිතය නිරීක්ෂණය කරන්න</h4>
                    <p><strong>English:</strong><br>
                       • Navigate to "Fuel Calculation"<br>
                       • Add fuel records when refueling<br>
                       • Enter quantity and cost<br>
                       • View efficiency reports (km/L)<br>
                       • Track monthly fuel expenses<br><br>
                       <strong>සිංහල:</strong><br>
                       • "ඉන්ධන ගණනය කිරීම" වෙත යන්න<br>
                       • ඉන්ධන පිරවීමේදී ඉන්ධන වාර්තා එක් කරන්න<br>
                       • ප්‍රමාණය සහ වියදම ඇතුළත් කරන්න<br>
                       • කාර්යක්ෂමතා වාර්තා බලන්න (km/L)<br>
                       • මාසික ඉන්ධන වියදම් නිරීක්ෂණය කරන්න</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🔧</div>
                    <h3>Step 5: Manage Maintenance</h3>
                    <h4 style="color: #dc2626;">පියවර 5: නඩත්තු කළමනාකරණය</h4>
                    <p><strong>English:</strong><br>
                       • Access "Service Status" section<br>
                       • Schedule regular maintenance<br>
                       • Set oil change reminders<br>
                       • Record service history<br>
                       • Track maintenance costs<br><br>
                       <strong>සිංහල:</strong><br>
                       • "සේවා තත්ත්වය" කොටස ප්‍රවේශ කරන්න<br>
                       • නිතිපතා නඩත්තු කාලසටහන්<br>
                       • තෙල් වෙනස් කිරීමේ සිහිකැඳවීම් සකසන්න<br>
                       • සේවා ඉතිහාසය සටහන් කරන්න<br>
                       • නඩත්තු වියදම් නිරීක්ෂණය කරන්න</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Step 6: View Reports & Analytics</h3>
                    <h4 style="color: #dc2626;">පියවර 6: වාර්තා සහ විශ්ලේෂණ බලන්න</h4>
                    <p><strong>English:</strong><br>
                       • Go to "Reports" tab<br>
                       • View monthly trip summaries<br>
                       • Analyze fuel efficiency trends<br>
                       • Check cost breakdowns<br>
                       • Export data for official use<br><br>
                       <strong>සිංහල:</strong><br>
                       • "වාර්තා" ටැබ්ගේට යන්න<br>
                       • මාසික ගමන් සාරාංශ බලන්න<br>
                       • ඉන්ධන කාර්යක්ෂමතා ප්‍රවණතා විශ්ලේෂණය කරන්න<br>
                       • වියදම් බෙදීම් පරීක්ෂා කරන්න<br>
                       • නිල භාවිතය සඳහා දත්ත අපනයනය කරන්න</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tips & Best Practices -->
    <section class="benefits" style="background: #f0fdf4;">
        <div class="container">
            <div class="section-title">
                <h2>Tips & Best Practices</h2>
                <h3 style="color: #dc2626; margin-bottom: 15px;">ඉඟි සහ හොඳම පිළිවෙත්</h3>
                <p>Get the most out of your SLDRC App experience</p>
                <p style="color: #059669;">ඔබගේ SLDRC යෙදුම් අත්දැකීමෙන් උපරිමයක් ලබා ගන්න</p>
            </div>

            <div class="benefits-list">
                <div class="benefit">
                    <div class="benefit-icon">⏰</div>
                    <div class="benefit-content">
                        <h4>Record Trips Immediately</h4>
                        <h5 style="color: #dc2626;">ගමන් වහාම සටහන් කරන්න</h5>
                        <p><strong>English:</strong> Always record your trips as soon as you start and complete them. This ensures accuracy and prevents data loss.<br><br>
                        <strong>සිංහල:</strong> ඔබ ආරම්භ කර ඒවා සම්පූර්ණ කළ වහාම ඔබගේ ගමන් සැමවිටම සටහන් කරන්න. මෙය නිවැරදිකම සහතික කරන අතර දත්ත අහිමි වීම වළක්වයි.</p>
                    </div>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">🔄</div>
                    <div class="benefit-content">
                        <h4>Regular Data Backup</h4>
                        <h5 style="color: #dc2626;">නිත්‍ය දත්ත සිම්කරණය</h5>
                        <p><strong>English:</strong> Your data is automatically synced to the cloud, but ensure you have a stable internet connection for regular updates.<br><br>
                        <strong>සිංහල:</strong> ඔබගේ දත්ත ස්වයංක්‍රීයව වලාකුළට සමමුහුර්ත කෙරේ, නමුත් නිතිපතා යාවත්කාලීන කිරීම් සඳහා ස්ථායී අන්තර්ජාල සම්බන්ධතාවයක් ඇති බව සහතික කරන්න.</p>
                    </div>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">📱</div>
                    <div class="benefit-content">
                        <h4>Use Offline Mode</h4>
                        <h5 style="color: #dc2626;">නොබැඳි ප්‍රකාරය භාවිතා කරන්න</h5>
                        <p><strong>English:</strong> The app works offline too! Record your trips without internet and sync when connection is restored.<br><br>
                        <strong>සිංහල:</strong> යෙදුම නොබැඳිව ද ක්‍රියා කරයි! අන්තර්ජාලය නොමැතිව ඔබගේ ගමන් සටහන් කර සම්බන්ධතාවය ප්‍රතිෂ්ඨාපනය වූ විට සමමුහුර්ත කරන්න.</p>
                    </div>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">📈</div>
                    <div class="benefit-content">
                        <h4>Monitor Efficiency Trends</h4>
                        <h5 style="color: #dc2626;">කාර්යක්ෂමතා ප්‍රවණතා නිරීක්ෂණය කරන්න</h5>
                        <p><strong>English:</strong> Regularly check your fuel efficiency reports to identify patterns and optimize your driving habits.<br><br>
                        <strong>සිංහල:</strong> රටාවන් හඳුනාගෙන ඔබගේ රිය පැදවීමේ පුරුදු ප්‍රශස්ත කිරීම සඳහා ඔබගේ ඉන්ධන කාර්යක්ෂමතා වාර්තා නිතිපතා පරීක්ෂා කරන්න.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Troubleshooting Guide -->
    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2>Troubleshooting Guide</h2>
                <h3 style="color: #dc2626; margin-bottom: 15px;">ගැටලු විසඳීමේ මාර්ගෝපදේශය</h3>
                <p>Common issues and their solutions</p>
                <p style="color: #059669;">පොදු ගැටලු සහ ඒවායේ විසඳුම්</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🔐</div>
                    <h3>Login Issues</h3>
                    <h4 style="color: #dc2626;">පුරන ගැටලු</h4>
                    <p><strong>English:</strong> Forgot password? Use "Reset Password" option. For new accounts, check your email for verification link.<br><br>
                    <strong>සිංහල:</strong> මුරපදය අමතකද? "මුරපදය නැවත සකසන්න" විකල්පය භාවිතා කරන්න. නව ගිණුම් සඳහා, සත්‍යාපන සබැඳිය සඳහා ඔබගේ ඊමේල් පරීක්ෂා කරන්න.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📶</div>
                    <h3>Sync Problems</h3>
                    <h4 style="color: #dc2626;">සමමුහුර්ත කිරීමේ ගැටලු</h4>
                    <p><strong>English:</strong> Ensure stable internet connection. If data isn't syncing, try logging out and back in.<br><br>
                    <strong>සිංහල:</strong> ස්ථායී අන්තර්ජාල සම්බන්ධතාවයක් සහතික කරන්න. දත්ත සමමුහුර්ත නොවන්නේ නම්, ඉවත්ව යාම සහ ආපසු පුරන්න උත්සාහ කරන්න.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🚗</div>
                    <h3>Vehicle Not Showing</h3>
                    <h4 style="color: #dc2626;">වාහනය නොපෙන්වයි</h4>
                    <p><strong>English:</strong> Check if vehicle is properly added in "My Vehicles" section. Refresh the app if needed.<br><br>
                    <strong>සිංහල:</strong> "මගේ වාහන" කොටසේ වාහනය නිසි ලෙස එක් කර ඇති දැයි පරීක්ෂා කරන්න. අවශ්‍ය නම් යෙදුම නැවුම් කරන්න.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Missing Reports</h3>
                    <h4 style="color: #dc2626;">අස්ථානගත වාර්තා</h4>
                    <p><strong>English:</strong> Reports are generated based on recorded trips. Ensure you have completed trips for the selected period.<br><br>
                    <strong>සිංහල:</strong> වාර්තා සාදනු ලබන්නේ සටහන් කරන ලද ගමන් මත පදනම්වයි. තෝරාගත් කාල සීමාව සඳහා ඔබ සම්පූර්ණ කරන ලද ගමන් ඇති බව සහතික කරන්න.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features List -->
    <section class="features" style="background: #f8fafc;">
        <div class="container">
            <div class="section-title">
                <h2>Complete Feature Set</h2>
                <p>Every tool you need for comprehensive vehicle management</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📍</div>
                    <h3>Trip Recording</h3>
                    <p>• Start and end location tracking<br>
                       • Distance calculation<br>
                       • Time logging<br>
                       • Places visited documentation<br>
                       • Trip completion status</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🚙</div>
                    <h3>Vehicle Profiles</h3>
                    <p>• Registration number management<br>
                       • Make and model details<br>
                       • Year and specifications<br>
                       • Current odometer reading<br>
                       • Fuel tank capacity</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">⛽</div>
                    <h3>Fuel Management</h3>
                    <p>• Fuel consumption tracking<br>
                       • Efficiency calculations (km/L)<br>
                       • Fuel order management<br>
                       • Cost analysis<br>
                       • Usage patterns</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🔧</div>
                    <h3>Maintenance</h3>
                    <p>• Service schedule tracking<br>
                       • Oil change reminders<br>
                       • Maintenance history<br>
                       • Cost monitoring<br>
                       • Service provider details</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Reports & Analytics</h3>
                    <p>• Monthly trip summaries<br>
                       • Fuel efficiency reports<br>
                       • Cost analysis<br>
                       • Usage statistics<br>
                       • Custom date ranges</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">👤</div>
                    <h3>User Management</h3>
                    <p>• Secure user profiles<br>
                       • Regiment/organization details<br>
                       • Role-based access<br>
                       • Profile customization<br>
                       • Data privacy controls</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="benefits" style="background: #fefce8;">
        <div class="container">
            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
                <h3 style="color: #dc2626; margin-bottom: 15px;">නිතර අසන ප්‍රශ්න</h3>
                <p>Get answers to common questions about SLDRC App</p>
                <p style="color: #059669;">SLDRC යෙදුම ගැන පොදු ප්‍රශ්නවලට පිළිතුරු ලබා ගන්න</p>
            </div>

            <div class="benefits-list">
                <div class="benefit">
                    <div class="benefit-icon">❓</div>
                    <div class="benefit-content">
                        <h4>Is the app free to use?</h4>
                        <h5 style="color: #dc2626;">යෙදුම භාවිතා කිරීම නොමිලේද?</h5>
                        <p><strong>English:</strong> Yes, SLDRC App is completely free for all Sri Lankan drivers. No hidden charges or subscription fees.<br><br>
                        <strong>සිංහල:</strong> ඔව්, SLDRC යෙදුම සියලුම ශ්‍රී ලංකේය රියදුරන් සඳහා සම්පූර්ණයෙන්ම නොමිලේ. සැඟවුණු ගාස්තු හෝ දායකත්ව ගාස්තු නැත.</p>
                    </div>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">🔒</div>
                    <div class="benefit-content">
                        <h4>Is my data secure?</h4>
                        <h5 style="color: #dc2626;">මගේ දත්ත ආරක්ෂිතද?</h5>
                        <p><strong>English:</strong> Absolutely! We use Firebase security with encryption and secure authentication. Your data is stored safely in Google's cloud infrastructure.<br><br>
                        <strong>සිංහල:</strong> නියත වශයෙන්ම! අපි සංකේතනය සහ ආරක්ෂිත සත්‍යාපනය සහිත Firebase ආරක්ෂාව භාවිතා කරමු. ඔබගේ දත්ත ගූගල්හි වලාකුළු යටිතල ව්‍යුහයේ ආරක්ෂිතව ගබඩා කර ඇත.</p>
                    </div>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">📱</div>
                    <div class="benefit-content">
                        <h4>Can I use it on multiple devices?</h4>
                        <h5 style="color: #dc2626;">මට එය බහු උපාංගවල භාවිතා කළ හැකිද?</h5>
                        <p><strong>English:</strong> Yes! Log in with the same account on any device. Your data syncs automatically across all devices.<br><br>
                        <strong>සිංහල:</strong> ඔව්! ඕනෑම උපාංගයක එකම ගිණුම සමඟ පුරන්න. ඔබගේ දත්ත සියලුම උපාංග හරහා ස්වයංක්‍රීයව සමමුහුර්ත වේ.</p>
                    </div>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">🌐</div>
                    <div class="benefit-content">
                        <h4>Works without internet?</h4>
                        <h5 style="color: #dc2626;">අන්තර්ජාලය නොමැතිව ක්‍රියා කරයිද?</h5>
                        <p><strong>English:</strong> Yes! Record trips offline and sync when internet is available. Perfect for areas with poor connectivity.<br><br>
                        <strong>සිංහල:</strong> ඔව්! නොබැඳිව ගමන් සටහන් කර අන්තර්ජාලය ලබා ගත හැකි විට සමමුහුර්ත කරන්න. දුර්වල සම්බන්ධතාවයක් ඇති ප්‍රදේශ සඳහා පරිපූර්ණයි.</p>
                    </div>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">🚗</div>
                    <div class="benefit-content">
                        <h4>How many vehicles can I add?</h4>
                        <h5 style="color: #dc2626;">මට වාහන කීයක් එක් කළ හැකිද?</h5>
                        <p><strong>English:</strong> There's no limit! Add as many vehicles as you need. Each vehicle has its own separate records and analytics.<br><br>
                        <strong>සිංහල:</strong> සීමාවක් නැත! ඔබට අවශ්‍ය තරම් වාහන එක් කරන්න. සෑම වාහනයකටම තමන්ගේම වෙනම වාර්තා සහ විශ්ලේෂණ ඇත.</p>
                    </div>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">📞</div>
                    <div class="benefit-content">
                        <h4>Need help or support?</h4>
                        <h5 style="color: #dc2626;">උදව් හෝ සහය අවශ්‍යද?</h5>
                        <p><strong>English:</strong> Visit the "Help & Support" section in the app for tutorials and contact information. We're here to help!<br><br>
                        <strong>සිංහල:</strong> නිබන්ධන සහ සම්බන්ධතා තොරතුරු සඳහා යෙදුමේ "උදව් සහ සහාය" කොටස පිවිසෙන්න. අපි උදව් කිරීමට මෙහි සිටිමු!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Getting Started Guide -->
    <section class="features" style="background: #ecfdf5;">
        <div class="container">
            <div class="section-title">
                <h2>Quick Start Guide</h2>
                <h3 style="color: #dc2626; margin-bottom: 15px;">ඉක්මන් ආරම්භක මාර්ගෝපදේශය</h3>
                <p>Get up and running in just 5 minutes</p>
                <p style="color: #059669;">මිනිත්තු 5කින් ආරම්භ කර ක්‍රියාත්මක කරගන්න</p>
            </div>

            <div class="features-grid">
                <div class="feature-card" style="border-left: 4px solid #22c55e;">
                    <div class="feature-icon" style="background: linear-gradient(135deg, #22c55e, #16a34a);">1</div>
                    <h3>Download & Install</h3>
                    <h4 style="color: #dc2626;">බාගත කර ස්ථාපනය කරන්න</h4>
                    <p><strong>English:</strong> Search "SLDRC App" in Google Play Store and install<br>
                    <strong>සිංහල:</strong> ගූගල් ප්ලේ ස්ටෝරයේ "SLDRC App" සොයා ස්ථාපනය කරන්න</p>
                </div>

                <div class="feature-card" style="border-left: 4px solid #3b82f6;">
                    <div class="feature-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">2</div>
                    <h3>Create Account</h3>
                    <h4 style="color: #dc2626;">ගිණුමක් සාදන්න</h4>
                    <p><strong>English:</strong> Sign up with your email or phone number<br>
                    <strong>සිංහල:</strong> ඔබගේ ඊමේල් හෝ දුරකථන අංකය සමඟ ලියාපදිංචි වන්න</p>
                </div>

                <div class="feature-card" style="border-left: 4px solid #f59e0b;">
                    <div class="feature-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">3</div>
                    <h3>Add Vehicle Info</h3>
                    <h4 style="color: #dc2626;">වාහන තොරතුරු එක් කරන්න</h4>
                    <p><strong>English:</strong> Enter your vehicle registration and details<br>
                    <strong>සිංහල:</strong> ඔබගේ වාහන ලියාපදිංචිය සහ විස්තර ඇතුළත් කරන්න</p>
                </div>

                <div class="feature-card" style="border-left: 4px solid #ef4444;">
                    <div class="feature-icon" style="background: linear-gradient(135deg, #ef4444, #dc2626);">4</div>
                    <h3>Start Recording</h3>
                    <h4 style="color: #dc2626;">සටහන් කිරීම ආරම්භ කරන්න</h4>
                    <p><strong>English:</strong> Begin your first trip recording immediately<br>
                    <strong>සිංහල:</strong> ඔබගේ පළමු ගමන සටහන් කිරීම වහාම ආරම්භ කරන්න</p>
                </div>
            </div>
        </div>
    </section>

    <!-- System Requirements -->
    <section class="tech-stack" style="background: #1e293b;">
        <div class="container">
            <div class="section-title">
                <h2 style="color: white;">System Requirements</h2>
                <h3 style="color: #fbbf24; margin-bottom: 15px;">පද්ධති අවශ්‍යතා</h3>
                <p style="color: #e2e8f0;">Minimum requirements for optimal app performance</p>
                <p style="color: #a7f3d0;">උපරිම යෙදුම් කාර්ය සාධනය සඳහා අවම අවශ්‍යතා</p>
            </div>

            <div class="tech-grid">
                <div class="tech-item">
                    <h4>📱 Android Devices</h4>
                    <p><strong>English:</strong><br>
                    • Android 6.0 (API level 23) or higher<br>
                    • 2GB RAM minimum<br>
                    • 100MB storage space<br><br>
                    <strong>සිංහල:</strong><br>
                    • Android 6.0 (API level 23) හෝ ඉහළ<br>
                    • අවම RAM 2GB<br>
                    • ගබඩා ඉඩ 100MB</p>
                </div>

                <div class="tech-item">
                    <h4>🍎 iOS Devices</h4>
                    <p><strong>English:</strong><br>
                    • iOS 11.0 or later<br>
                    • Compatible with iPhone, iPad<br>
                    • Coming Soon!<br><br>
                    <strong>සිංහල:</strong><br>
                    • iOS 11.0 හෝ පසුව<br>
                    • iPhone, iPad සමඟ ගැළපේ<br>
                    • ඉක්මනින් එනවා!</p>
                </div>

                <div class="tech-item">
                    <h4>🌐 Internet Connection</h4>
                    <p><strong>English:</strong><br>
                    • Optional for basic use<br>
                    • Required for cloud sync<br>
                    • Works offline too<br><br>
                    <strong>සිංහල:</strong><br>
                    • මූලික භාවිතය සඳහා විකල්ප<br>
                    • වලාකුළු සමමුහුර්ත කිරීම සඳහා අවශ්‍ය<br>
                    • නොබැඳිව ද ක්‍රියා කරයි</p>
                </div>

                <div class="tech-item">
                    <h4>🔋 Battery Usage</h4>
                    <p><strong>English:</strong><br>
                    • Optimized for low battery usage<br>
                    • Background sync minimal<br>
                    • Efficient performance<br><br>
                    <strong>සිංහල:</strong><br>
                    • අඩු බැටරි භාවිතය සඳහා ප්‍රශස්ත<br>
                    • පසුබිම් සමමුහුර්තකරණය අවම<br>
                    • කාර්යක්ෂම කාර්ය සාධනය</p>
                </div>
            </div>
        </div>
    </section>

<!-- Company Section -->
<section class="company-section" style="background: #1e293b; color: white; padding: 100px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="company-content">
                    <h2 class="display-4 fw-bold mb-4">Proudly Developed by<br><span style="color: #fbbf24;">Ezofz Technology Solutions</span></h2>
                    <p class="lead mb-4">We are a leading technology company in Sri Lanka, specializing in innovative mobile applications and digital solutions. Our team of expert developers is committed to creating world-class applications that solve real-world problems.</p>
                    <div class="company-features">
                        <div class="feature-item mb-3">
                            <i class="bi bi-check-circle-fill text-success me-3"></i>
                            <span>5+ Years of Mobile App Development Experience</span>
                        </div>
                        <div class="feature-item mb-3">
                            <i class="bi bi-check-circle-fill text-success me-3"></i>
                            <span>50+ Successful Projects Delivered</span>
                        </div>
                        <div class="feature-item mb-3">
                            <i class="bi bi-check-circle-fill text-success me-3"></i>
                            <span>24/7 Customer Support & Maintenance</span>
                        </div>
                        <div class="feature-item mb-3">
                            <i class="bi bi-check-circle-fill text-success me-3"></i>
                            <span>ISO Certified Development Processes</span>
                        </div>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-outline-light btn-lg mt-3">
                        <i class="bi bi-arrow-right me-2"></i>Visit Our Main Website
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <div class="company-logo-large" style="background: rgba(255,255,255,0.1); border-radius: 20px; padding: 60px; backdrop-filter: blur(10px);">
                        <h1 style="font-size: 4rem; color: #fbbf24; margin-bottom: 20px;">Ezofz</h1>
                        <h3 style="color: #e2e8f0;">Technology Solutions</h3>
                        <p style="margin-top: 20px; opacity: 0.8;">Innovating for a Digital Future</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Download Section -->
<section class="download-section" id="download" style="background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 100px 0;">
    <div class="container text-center">
        <h2 class="display-4 fw-bold mb-4">Ready to Go Digital?</h2>
        <h3 style="color: #fbbf24; margin-bottom: 20px;">ඩිජිටල්ට යාමට සූදානම්ද?</h3>
        <p class="lead mb-4">Join thousands of Sri Lankan drivers who have already made the switch to digital vehicle management</p>
        <p style="color: #a7f3d0; margin-bottom: 50px;">ඩිජිටල් වාහන කළමනාකරණය වෙත මාරුවීම දැනටමත් කර ඇති දහස් ගණන් ශ්‍රී ලංකේය රියදුරන්ට සම්බන්ධ වන්න</p>

        <div class="download-options">
            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <a href="#" class="btn btn-light btn-lg w-100 py-3" style="color: #059669; font-weight: 600;">
                        <i class="bi bi-google-play fs-4 me-2"></i>
                        <div>
                            <small>Get it on</small><br>
                            <strong>Google Play Store</strong>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#" class="btn btn-outline-light btn-lg w-100 py-3" style="opacity: 0.7;">
                        <i class="bi bi-apple fs-4 me-2"></i>
                        <div>
                            <small>Coming Soon</small><br>
                            <strong>App Store</strong>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="download-info mt-4">
            <p><i class="bi bi-shield-check me-2"></i>100% Safe & Secure</p>
            <p><i class="bi bi-download me-2"></i>Free Download - No Hidden Costs</p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer style="background: #1f2937; color: white; padding: 60px 0 30px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h3 class="fw-bold mb-3">SLDRC App</h3>
                <p class="mb-3">Digital Vehicle Management for Sri Lankan Drivers</p>
                <p class="text-muted">Developed with ❤️ by Ezofz Technology Solutions for the Sri Lankan driving community</p>
            </div>
            <div class="col-lg-4 mb-4">
                <h5 class="fw-bold mb-3">Key Features</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Paperless record management</li>
                    <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Real-time synchronization</li>
                    <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Bilingual support (English/Sinhala)</li>
                    <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Professional interface</li>
                    <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Secure cloud storage</li>
                </ul>
            </div>
            <div class="col-lg-4 mb-4">
                <h5 class="fw-bold mb-3">Company</h5>
                <p><strong>Ezofz Technology Solutions</strong></p>
                <p class="text-muted">Leading technology company specializing in innovative mobile applications and digital solutions.</p>
                <div class="mt-3">
                    <a href="{{ route('home') }}" class="text-warning text-decoration-none">
                        <i class="bi bi-globe me-2"></i>Visit Our Website
                    </a>
                </div>
            </div>
        </div>

        <hr class="border-secondary my-4">

        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-muted">&copy; {{ date('Y') }} Ezofz Technology Solutions. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0 text-muted">Built with <i class="bi bi-heart-fill text-danger"></i> using Flutter & Firebase</p>
            </div>
        </div>
    </div>
</footer>

@push('styles')
<style>
/* Additional responsive styles */
@media (max-width: 768px) {
    .banner-title {
        font-size: 2.8rem;
        margin-bottom: 20px;
    }

    .banner-subtitle {
        font-size: 1.5rem;
        margin-bottom: 30px;
    }

    .banner-stats {
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 35px;
    }

    .banner-buttons {
        justify-content: center;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .btn-download, .btn-learn-more {
        width: 100%;
        max-width: 320px;
        justify-content: center;
        padding: 16px 20px;
    }

    .banner-description {
        font-size: 1.1rem;
        text-align: center;
        margin-bottom: 35px;
    }

    .phone-mockup {
        width: 250px;
        height: 500px;
        transform: none;
    }

    .app-content {
        padding: 10px;
        gap: 8px;
    }

    .dashboard-widget {
        padding: 10px;
    }

    .widget-title {
        font-size: 0.6rem;
    }

    .widget-value {
        font-size: 0.9rem;
    }

    .screenshot-carousel {
        animation-duration: 20s;
        gap: 20px;
    }

    .screenshot-item {
        width: 200px;
    }

    .screenshot-phone {
        width: 180px;
        height: 360px;
    }

    .screenshot-carousel-wrapper {
        margin-top: 40px;
    }

    .screenshot-item:hover {
        transform: translateY(-5px) !important;
    }

    .company-badge {
        text-align: center;
    }

    .banner-description {
        max-width: 100%;
    }
}

@media (max-width: 576px) {
    .app-banner {
        min-height: 100vh;
        padding: 0;
    }

    .app-banner .container {
        padding-top: 80px; /* Account for mobile navigation */
    }

    .banner-spacing {
        margin-bottom: 40px;
        height: 10px;
    }

    .banner-title {
        font-size: 2rem;
    }

    .banner-subtitle {
        font-size: 1.2rem;
    }

    .stat-number {
        font-size: 1.8rem;
    }

    .banner-stats {
        gap: 15px;
    }

    .stat-item {
        min-width: 80px;
    }
}

.section-title {
    margin-bottom: 80px;
}

.section-title h2 {
    color: #1e293b;
    margin-bottom: 20px;
}

/* Feature cards styling */
.features {
    padding: 100px 0;
    background: white;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 40px;
    margin-bottom: 60px;
}

@media (max-width: 768px) {
    .features-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
}

.feature-card {
    background: #f8fafc;
    padding: 40px;
    border-radius: 20px;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
    height: 100%;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border-color: #667eea;
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
    font-size: 2rem;
    color: white;
    transition: all 0.3s ease;
}

.feature-card:hover .feature-icon {
    transform: scale(1.1);
}

.feature-card h3 {
    font-size: 1.5rem;
    color: #1e293b;
    margin-bottom: 15px;
    font-weight: 600;
}

.feature-card p {
    color: #64748b;
    line-height: 1.8;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* App Badge Animation */
.company-badge {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(255, 187, 36, 0.4);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(255, 187, 36, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(255, 187, 36, 0);
    }
}

/* Parallax effect for banner */
.app-banner {
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
}

@media (max-width: 768px) {
    .app-banner {
        background-attachment: scroll;
    }
}
</style>
@endpush

@push('styles')
<style>
/* Fix navigation bar issues on SLDRC page */
body.sldrc-page .modern-navbar {
    /* Prevent navigation color changes */
    background: rgba(255, 255, 255, 0.95) !important;
    backdrop-filter: blur(20px) !important;
    -webkit-backdrop-filter: blur(20px) !important;
    border-bottom: 1px solid rgba(37, 99, 235, 0.1) !important;
    box-shadow: 0 4px 32px rgba(0, 0, 0, 0.1) !important;

    /* Prevent size increases and maintain fixed dimensions */
    height: 70px !important;
    padding: 8px 0 !important;
    width: 100% !important;
    max-width: 100vw !important;
    left: 0 !important;
    right: 0 !important;
    overflow: visible !important;

    /* Ensure proper z-index hierarchy */
    z-index: 9999 !important;
    position: fixed !important;
    top: 0 !important;
    box-sizing: border-box !important;
}

body.sldrc-page .modern-navbar.scrolled {
    background: rgba(255, 255, 255, 0.98) !important;
    box-shadow: 0 8px 40px rgba(0, 0, 0, 0.15) !important;
    border-bottom-color: rgba(37, 99, 235, 0.2) !important;
}

/* Fix navigation container to prevent overflow */
body.sldrc-page .nav-container {
    max-width: 100% !important;
    width: 100% !important;
    margin: 0 !important;
    padding: 0 1rem !important;
    height: 70px !important;
    overflow: visible !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    box-sizing: border-box !important;
}

/* Prevent auth buttons from going off-screen */
body.sldrc-page .nav-actions {
    display: flex !important;
    align-items: center !important;
    gap: 12px !important;
    flex-shrink: 0 !important;
    min-width: auto !important;
    overflow: visible !important;
}

body.sldrc-page .auth-buttons {
    display: flex !important;
    align-items: center !important;
    gap: 6px !important;
    flex-wrap: nowrap !important;
    min-width: auto !important;
    overflow: visible !important;
    margin-right: 0 !important;
}

body.sldrc-page .btn-auth {
    padding: 6px 12px !important;
    font-size: 0.8rem !important;
    white-space: nowrap !important;
    flex-shrink: 0 !important;
    border-radius: 6px !important;
}

/* Fix navigation menu positioning */
body.sldrc-page .nav-menu {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    flex: 1 !important;
    max-width: none !important;
    overflow: visible !important;
}

body.sldrc-page .nav-items {
    display: flex !important;
    align-items: center !important;
    gap: 0.5rem !important;
    flex-wrap: nowrap !important;
    overflow: visible !important;
}

body.sldrc-page .nav-link {
    padding: 8px 12px !important;
    font-size: 0.85rem !important;
    white-space: nowrap !important;
}

/* Override main content margins for SLDRC page */
body.sldrc-page main {
    margin-top: 0 !important;
    padding-top: 0 !important;
}

/* Fix body positioning */
body.sldrc-page {
    padding-top: 0 !important;
    margin-top: 0 !important;
    overflow-x: hidden !important;
}

/* ========== MOBILE NAVIGATION FIXES ========== */
/* Prevent duplicate elements in mobile navigation */
body.sldrc-page .mobile-nav-overlay .mobile-nav-header .mobile-brand {
    /* Ensure logo appears only once */
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
}

body.sldrc-page .mobile-nav-overlay .mobile-nav-header .mobile-brand img {
    /* Prevent logo duplication */
    display: block !important;
    width: auto !important;
    height: 32px !important;
}

body.sldrc-page .mobile-auth-section {
    /* Ensure auth buttons appear only once */
    padding: 20px 24px 24px !important;
    border-top: 1px solid rgba(37, 99, 235, 0.1) !important;
    background: rgba(37, 99, 235, 0.02) !important;
    width: 100% !important;
    box-sizing: border-box !important;
    margin-top: auto !important;
    flex-shrink: 0 !important;
}

body.sldrc-page .mobile-auth-btn {
    /* Prevent button duplication */
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
    padding: 12px 20px !important;
    border-radius: 8px !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
}

body.sldrc-page .mobile-auth-btn.login {
    color: var(--primary-blue) !important;
    border: 2px solid var(--primary-blue) !important;
    background: transparent !important;
}

body.sldrc-page .mobile-auth-btn.register {
    color: white !important;
    background: linear-gradient(135deg, var(--primary-blue), var(--accent-color)) !important;
    border: 2px solid transparent !important;
}

/* Ensure mobile navigation content doesn't duplicate */
body.sldrc-page .mobile-nav-content {
    background: rgba(255, 255, 255, 0.98) !important;
    backdrop-filter: blur(20px) !important;
    -webkit-backdrop-filter: blur(20px) !important;
}

/* Ensure mobile navigation items have correct colors */
body.sldrc-page .mobile-nav-item {
    color: var(--text-dark) !important;
    border-bottom: 1px solid rgba(37, 99, 235, 0.05) !important;
}

body.sldrc-page .mobile-nav-item svg {
    color: var(--primary-blue) !important;
}

body.sldrc-page .mobile-nav-item:hover,
body.sldrc-page .mobile-nav-item.active {
    background: rgba(37, 99, 235, 0.05) !important;
    color: var(--primary-blue) !important;
}

/* Mobile navigation header styling */
body.sldrc-page .mobile-nav-header {
    background: rgba(37, 99, 235, 0.02) !important;
    border-bottom: 1px solid rgba(37, 99, 235, 0.1) !important;
}

body.sldrc-page .mobile-brand span {
    color: var(--text-dark) !important;
    font-weight: 600 !important;
}

/* Fix mobile menu positioning and z-index */
body.sldrc-page .mobile-nav-overlay {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
    z-index: 99999 !important; /* Higher than navbar */
    background: rgba(0, 0, 0, 0.8) !important;
    backdrop-filter: blur(8px) !important;
}

/* Prevent SLDRC page styles from affecting mobile toggle */
body.sldrc-page .mobile-toggle {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 40px !important;
    height: 40px !important;
    cursor: pointer !important;
    z-index: 10000 !important;
}

body.sldrc-page .hamburger {
    display: flex !important;
    flex-direction: column !important;
    gap: 4px !important;
}

body.sldrc-page .hamburger span {
    display: block !important;
    width: 20px !important;
    height: 2px !important;
    background: var(--primary-blue) !important;
    transition: all 0.3s ease !important;
}

/* Mobile navigation group styling */
body.sldrc-page .mobile-nav-group-header {
    color: var(--text-dark) !important;
    border-bottom: 1px solid rgba(37, 99, 235, 0.05) !important;
}

body.sldrc-page .mobile-nav-group-header svg {
    color: var(--primary-blue) !important;
}

body.sldrc-page .mobile-nav-subitem {
    color: var(--text-light) !important;
    background: rgba(37, 99, 235, 0.02) !important;
}

body.sldrc-page .mobile-nav-subitem:hover {
    background: rgba(37, 99, 235, 0.05) !important;
    color: var(--primary-blue) !important;
}

/* Mobile responsiveness improvements */
@media (max-width: 768px) {
    body.sldrc-page .modern-navbar {
        padding: 8px 16px !important;
    }

    body.sldrc-page .nav-container {
        padding: 0 !important;
    }

    body.sldrc-page .mobile-nav-menu {
        padding: 20px !important;
        max-height: calc(100vh - 80px) !important;
        overflow-y: auto !important;
    }

    /* Hide desktop navigation elements on mobile to prevent duplication */
    body.sldrc-page .nav-menu {
        display: none !important;
    }

    body.sldrc-page .nav-actions {
        display: none !important;
    }

    body.sldrc-page .auth-buttons {
        display: none !important;
    }

    /* Ensure mobile toggle is visible */
    body.sldrc-page .mobile-toggle {
        display: flex !important;
    }
}

@media (min-width: 769px) {
    /* Hide mobile navigation on desktop */
    body.sldrc-page .mobile-nav-overlay {
        display: none !important;
    }

    body.sldrc-page .mobile-toggle {
        display: none !important;
    }
}

/* Ensure proper section spacing */
body.sldrc-page .features,
body.sldrc-page .benefits,
body.sldrc-page .tech-stack {
    padding: 80px 0 !important;
}

/* Fix screenshot carousel positioning */
body.sldrc-page .screenshots-gallery {
    padding: 80px 0 !important;
    overflow: hidden !important;
}

/* Ensure banner is properly positioned without interfering with navigation */
body.sldrc-page .app-banner {
    margin-top: 0 !important;
    position: relative;
    z-index: 1 !important; /* Lower than navigation */
    padding-top: 90px !important; /* Add padding to account for navigation */
    min-height: calc(100vh - 20px) !important;
    display: flex !important;
    align-items: center !important;
}

/* Ensure no top spacing on the page */
body.sldrc-page {
    padding-top: 0 !important;
}

/* Responsive navigation fixes */
@media (max-width: 1200px) {
    body.sldrc-page .nav-container {
        padding: 0 1.5rem !important;
    }

    body.sldrc-page .nav-menu {
        gap: 0.25rem !important;
    }

    body.sldrc-page .nav-link {
        padding: 10px 12px !important;
        font-size: 0.9rem !important;
    }
}

@media (max-width: 1024px) {
    body.sldrc-page .modern-navbar {
        height: 60px !important;
        padding: 10px 16px !important;
    }

    body.sldrc-page .nav-container {
        height: 60px !important;
        padding: 0 1rem !important;
    }

    body.sldrc-page .app-banner {
        margin-top: -60px !important;
        padding-top: 60px !important;
    }
}

@media (max-width: 768px) {
    body.sldrc-page .modern-navbar {
        padding: 8px 0 !important;
        height: 65px !important;
    }

    body.sldrc-page .nav-container {
        height: 65px !important;
        padding: 0 0.75rem !important;
        width: 100% !important;
    }

    body.sldrc-page .app-banner {
        padding-top: 85px !important;
        margin-top: 0 !important;
    }

    body.sldrc-page .nav-menu {
        display: none !important;
    }

    body.sldrc-page .mobile-toggle {
        display: flex !important;
    }
}@media (max-width: 576px) {
    body.sldrc-page .modern-navbar {
        padding: 8px 0 !important;
        height: 60px !important;
    }

    body.sldrc-page .nav-container {
        height: 60px !important;
        padding: 0 0.5rem !important;
        width: 100% !important;
    }

    body.sldrc-page .app-banner {
        padding-top: 80px !important;
        margin-top: 0 !important;
    }

    body.sldrc-page .btn-auth {
        padding: 4px 8px !important;
        font-size: 0.75rem !important;
    }

    body.sldrc-page .nav-link {
        padding: 6px 8px !important;
        font-size: 0.8rem !important;
    }

    body.sldrc-page .brand-text {
        font-size: 1.2rem !important;
    }
}\n\n/* Force the banner to be properly positioned */
body.sldrc-page .app-banner {
    display: block !important;
    order: -1;
}
</style>
@endpush\n\n@endsection
