@extends('layouts.app')

@section('title', 'Privacy Policy - EZofz.lk')
@section('description', 'Privacy Policy for EZofz.lk - Learn how we collect, use, and protect your personal information on our platform.')
@section('keywords', 'privacy policy, data protection, EZofz.lk, Sri Lanka, user privacy, data security, cookies, personal information')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <!-- Hero Section -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <i class="bi bi-shield-lock text-primary me-3" style="font-size: 3rem;"></i>
                    <h1 class="display-4 fw-bold text-white mb-0">Privacy Policy</h1>
                </div>
                <p class="lead text-light mb-4">
                    Your privacy is important to us. This policy explains how EZofz.lk collects, uses, and protects your information.
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <span class="badge bg-primary px-3 py-2">Last Updated: {{ date('F j, Y') }}</span>
                    <span class="badge bg-info px-3 py-2">GDPR Compliant</span>
                    <span class="badge bg-success px-3 py-2">Sri Lankan Law</span>
                </div>
            </div>
        </div>

        <!-- Quick Navigation -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <div class="card bg-dark border-primary border-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-list-ul me-2"></i>Quick Navigation</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-md-6 col-lg-4">
                                <a href="#information-collection" class="btn btn-outline-primary btn-sm w-100 text-start">
                                    <i class="bi bi-collection me-2"></i>Information Collection
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <a href="#data-usage" class="btn btn-outline-primary btn-sm w-100 text-start">
                                    <i class="bi bi-gear me-2"></i>How We Use Data
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <a href="#data-sharing" class="btn btn-outline-primary btn-sm w-100 text-start">
                                    <i class="bi bi-share me-2"></i>Data Sharing
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <a href="#cookies" class="btn btn-outline-primary btn-sm w-100 text-start">
                                    <i class="bi bi-cookie me-2"></i>Cookies & Tracking
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <a href="#user-rights" class="btn btn-outline-primary btn-sm w-100 text-start">
                                    <i class="bi bi-person-check me-2"></i>Your Rights
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <a href="#contact" class="btn btn-outline-primary btn-sm w-100 text-start">
                                    <i class="bi bi-envelope me-2"></i>Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Introduction -->
                <section class="mb-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="card bg-dark border-primary">
                        <div class="card-body p-4">
                            <h2 class="text-primary mb-4"><i class="bi bi-info-circle me-2"></i>Introduction</h2>
                            <p class="text-light mb-3">
                                Welcome to EZofz.lk ("we," "our," or "us"). This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website <a href="{{ route('home') }}" class="text-primary">{{ url('/') }}</a> and use our services.
                            </p>
                            <p class="text-light mb-3">
                                EZofz.lk provides advanced tools and services for Sri Lankan public and private sector officers to streamline office work. We are committed to protecting your privacy and ensuring transparent data practices.
                            </p>
                            <div class="alert alert-info">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                <strong>Important:</strong> Please read this Privacy Policy carefully. By accessing or using our website, you acknowledge that you have read, understood, and agree to be bound by this Privacy Policy.
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Information Collection -->
                <section id="information-collection" class="mb-5" data-aos="fade-up" data-aos-delay="300">
                    <div class="card bg-dark border-primary">
                        <div class="card-body p-4">
                            <h2 class="text-primary mb-4"><i class="bi bi-collection me-2"></i>Information We Collect</h2>

                            <h4 class="text-white mb-3">Personal Information</h4>
                            <p class="text-light mb-3">We may collect personal information that you voluntarily provide, including:</p>
                            <ul class="text-light mb-4">
                                <li><strong>Account Information:</strong> Name, email address, password when you <a href="{{ route('register') }}" class="text-primary">register</a></li>
                                <li><strong>Profile Information:</strong> Professional details, organization information</li>
                                <li><strong>Contact Information:</strong> When you use our <a href="{{ route('contact') }}" class="text-primary">contact form</a></li>
                                <li><strong>Communication Data:</strong> Messages sent through our platform</li>
                            </ul>

                            <h4 class="text-white mb-3">Automatically Collected Information</h4>
                            <ul class="text-light mb-4">
                                <li><strong>Usage Data:</strong> Pages visited, time spent, features used</li>
                                <li><strong>Device Information:</strong> Browser type, operating system, screen resolution</li>
                                <li><strong>Location Data:</strong> IP address, general geographic location</li>
                                <li><strong>Log Data:</strong> Access times, error logs, performance data</li>
                            </ul>

                            <h4 class="text-white mb-3">Tool-Specific Data</h4>
                            <p class="text-light mb-3">When you use our tools, we may collect:</p>
                            <ul class="text-light">
                                <li><strong>Unicode Typing Tool:</strong> Text input for conversion (not stored)</li>
                                <li><strong>Name Converter:</strong> Names submitted for processing (not stored)</li>
                                <li><strong>ID Card Tool:</strong> ID numbers for validation (not stored)</li>
                                <li><strong>Database Searches:</strong> Search queries and preferences</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Data Usage -->
                <section id="data-usage" class="mb-5" data-aos="fade-up" data-aos-delay="400">
                    <div class="card bg-dark border-primary">
                        <div class="card-body p-4">
                            <h2 class="text-primary mb-4"><i class="bi bi-gear me-2"></i>How We Use Your Information</h2>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="border border-secondary rounded p-3 h-100">
                                        <h5 class="text-white"><i class="bi bi-tools text-primary me-2"></i>Service Provision</h5>
                                        <ul class="text-light mb-0">
                                            <li>Provide access to our tools and databases</li>
                                            <li>Process your requests and transactions</li>
                                            <li>Maintain user accounts and preferences</li>
                                            <li>Deliver personalized content</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="border border-secondary rounded p-3 h-100">
                                        <h5 class="text-white"><i class="bi bi-graph-up text-primary me-2"></i>Improvement</h5>
                                        <ul class="text-light mb-0">
                                            <li>Analyze usage patterns and trends</li>
                                            <li>Improve website performance</li>
                                            <li>Develop new features and services</li>
                                            <li>Fix bugs and technical issues</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="border border-secondary rounded p-3 h-100">
                                        <h5 class="text-white"><i class="bi bi-envelope text-primary me-2"></i>Communication</h5>
                                        <ul class="text-light mb-0">
                                            <li>Send service announcements</li>
                                            <li>Respond to inquiries and support requests</li>
                                            <li>Notify about updates and changes</li>
                                            <li>Send marketing communications (with consent)</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="border border-secondary rounded p-3 h-100">
                                        <h5 class="text-white"><i class="bi bi-shield text-primary me-2"></i>Security</h5>
                                        <ul class="text-light mb-0">
                                            <li>Protect against fraud and abuse</li>
                                            <li>Monitor for security threats</li>
                                            <li>Comply with legal obligations</li>
                                            <li>Enforce our terms of service</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Data Sharing -->
                <section id="data-sharing" class="mb-5" data-aos="fade-up" data-aos-delay="500">
                    <div class="card bg-dark border-primary">
                        <div class="card-body p-4">
                            <h2 class="text-primary mb-4"><i class="bi bi-share me-2"></i>Information Sharing and Disclosure</h2>

                            <div class="alert alert-success mb-4">
                                <i class="bi bi-check-circle me-2"></i>
                                <strong>We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described below:</strong>
                            </div>

                            <h4 class="text-white mb-3">Authorized Disclosures</h4>
                            <ul class="text-light mb-4">
                                <li><strong>Service Providers:</strong> Trusted partners who assist in operating our website (hosting, analytics, email services)</li>
                                <li><strong>Legal Requirements:</strong> When required by law, court order, or government request</li>
                                <li><strong>Safety Protection:</strong> To protect rights, property, or safety of EZofz.lk, users, or others</li>
                                <li><strong>Business Transfers:</strong> In connection with merger, acquisition, or sale of assets</li>
                            </ul>

                            <h4 class="text-white mb-3">Third-Party Services</h4>
                            <p class="text-light mb-3">We may integrate with third-party services:</p>
                            <ul class="text-light">
                                <li><strong>Google Analytics:</strong> Website traffic analysis (anonymized data)</li>
                                <li><strong>Google OAuth:</strong> Optional login authentication</li>
                                <li><strong>Cloud Hosting:</strong> Secure data storage and website delivery</li>
                                <li><strong>Email Services:</strong> Communication and notifications</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Cookies -->
                <section id="cookies" class="mb-5" data-aos="fade-up" data-aos-delay="600">
                    <div class="card bg-dark border-primary">
                        <div class="card-body p-4">
                            <h2 class="text-primary mb-4"><i class="bi bi-cookie me-2"></i>Cookies and Tracking Technologies</h2>

                            <p class="text-light mb-4">
                                EZofz.lk uses cookies and similar technologies to enhance your experience. You can manage your cookie preferences through our cookie consent banner.
                            </p>

                            <h4 class="text-white mb-3">Types of Cookies We Use</h4>
                            <div class="table-responsive">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr class="table-primary">
                                            <th>Cookie Type</th>
                                            <th>Purpose</th>
                                            <th>Duration</th>
                                            <th>Required</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Essential</strong></td>
                                            <td>Basic website functionality, security, login sessions</td>
                                            <td>Session/1 year</td>
                                            <td><span class="badge bg-danger">Required</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Analytics</strong></td>
                                            <td>Usage statistics, performance monitoring</td>
                                            <td>2 years</td>
                                            <td><span class="badge bg-success">Optional</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Preferences</strong></td>
                                            <td>User settings, language, theme preferences</td>
                                            <td>1 year</td>
                                            <td><span class="badge bg-success">Optional</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Marketing</strong></td>
                                            <td>Personalized content, advertising (if applicable)</td>
                                            <td>1 year</td>
                                            <td><span class="badge bg-success">Optional</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- User Rights -->
                <section id="user-rights" class="mb-5" data-aos="fade-up" data-aos-delay="700">
                    <div class="card bg-dark border-primary">
                        <div class="card-body p-4">
                            <h2 class="text-primary mb-4"><i class="bi bi-person-check me-2"></i>Your Rights and Choices</h2>

                            <p class="text-light mb-4">
                                You have several rights regarding your personal information. To exercise these rights, please <a href="{{ route('contact') }}" class="text-primary">contact us</a>.
                            </p>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="border border-secondary rounded p-3 h-100">
                                        <h5 class="text-white"><i class="bi bi-eye text-primary me-2"></i>Access</h5>
                                        <p class="text-light mb-0">Request a copy of the personal information we hold about you</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="border border-secondary rounded p-3 h-100">
                                        <h5 class="text-white"><i class="bi bi-pencil text-primary me-2"></i>Rectification</h5>
                                        <p class="text-light mb-0">Correct any inaccurate or incomplete personal information</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="border border-secondary rounded p-3 h-100">
                                        <h5 class="text-white"><i class="bi bi-trash text-primary me-2"></i>Erasure</h5>
                                        <p class="text-light mb-0">Request deletion of your personal information (right to be forgotten)</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="border border-secondary rounded p-3 h-100">
                                        <h5 class="text-white"><i class="bi bi-pause text-primary me-2"></i>Restrict Processing</h5>
                                        <p class="text-light mb-0">Limit how we use your personal information</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="border border-secondary rounded p-3 h-100">
                                        <h5 class="text-white"><i class="bi bi-download text-primary me-2"></i>Data Portability</h5>
                                        <p class="text-light mb-0">Receive your data in a structured, commonly used format</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="border border-secondary rounded p-3 h-100">
                                        <h5 class="text-white"><i class="bi bi-x-circle text-primary me-2"></i>Object</h5>
                                        <p class="text-light mb-0">Object to processing of your personal information for certain purposes</p>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-warning mt-4">
                                <i class="bi bi-clock me-2"></i>
                                <strong>Response Time:</strong> We will respond to your requests within 30 days of receipt.
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Data Security -->
                <section class="mb-5" data-aos="fade-up" data-aos-delay="800">
                    <div class="card bg-dark border-primary">
                        <div class="card-body p-4">
                            <h2 class="text-primary mb-4"><i class="bi bi-shield-lock me-2"></i>Data Security</h2>

                            <p class="text-light mb-4">
                                We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.
                            </p>

                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="text-center p-3 border border-secondary rounded">
                                        <i class="bi bi-lock text-primary mb-2" style="font-size: 2rem;"></i>
                                        <h6 class="text-white">Encryption</h6>
                                        <small class="text-light">Data encrypted in transit and at rest</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center p-3 border border-secondary rounded">
                                        <i class="bi bi-server text-primary mb-2" style="font-size: 2rem;"></i>
                                        <h6 class="text-white">Secure Hosting</h6>
                                        <small class="text-light">Industry-standard security protocols</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center p-3 border border-secondary rounded">
                                        <i class="bi bi-person-badge text-primary mb-2" style="font-size: 2rem;"></i>
                                        <h6 class="text-white">Access Control</h6>
                                        <small class="text-light">Limited authorized personnel access</small>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-info mt-4">
                                <i class="bi bi-info-circle me-2"></i>
                                <strong>Please Note:</strong> While we strive to protect your personal information, no method of transmission over the Internet or electronic storage is 100% secure.
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Contact Information -->
                <section id="contact" class="mb-5" data-aos="fade-up" data-aos-delay="900">
                    <div class="card bg-dark border-primary">
                        <div class="card-body p-4">
                            <h2 class="text-primary mb-4"><i class="bi bi-envelope me-2"></i>Contact Us</h2>

                            <p class="text-light mb-4">
                                If you have any questions about this Privacy Policy or our data practices, please contact us:
                            </p>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-geo-alt text-primary me-3 mt-1"></i>
                                        <div>
                                            <h6 class="text-white mb-1">Address</h6>
                                            <p class="text-light mb-0">Colombo, Sri Lanka</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-envelope text-primary me-3 mt-1"></i>
                                        <div>
                                            <h6 class="text-white mb-1">Email</h6>
                                            <a href="mailto:privacy@ezofz.lk" class="text-primary text-decoration-none">privacy@ezofz.lk</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-phone text-primary me-3 mt-1"></i>
                                        <div>
                                            <h6 class="text-white mb-1">Phone</h6>
                                            <a href="tel:+94707793037" class="text-primary text-decoration-none">+94 70 779 3037</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-whatsapp text-primary me-3 mt-1"></i>
                                        <div>
                                            <h6 class="text-white mb-1">WhatsApp</h6>
                                            <a href="https://wa.me/940707793037" target="_blank" class="text-primary text-decoration-none">Chat with us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                                    <i class="bi bi-envelope me-2"></i>Send Us a Message
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Policy Updates -->
                <section class="mb-5" data-aos="fade-up" data-aos-delay="1000">
                    <div class="card bg-dark border-warning">
                        <div class="card-body p-4">
                            <h2 class="text-warning mb-4"><i class="bi bi-arrow-clockwise me-2"></i>Policy Updates</h2>

                            <p class="text-light mb-3">
                                We may update this Privacy Policy from time to time. We will notify you of any changes by:
                            </p>
                            <ul class="text-light mb-4">
                                <li>Posting the new Privacy Policy on this page</li>
                                <li>Sending you an email notification (if you have an account)</li>
                                <li>Displaying a prominent notice on our <a href="{{ route('home') }}" class="text-warning">homepage</a></li>
                            </ul>

                            <div class="alert alert-warning">
                                <i class="bi bi-calendar-event me-2"></i>
                                <strong>Effective Date:</strong> This Privacy Policy was last updated on {{ date('F j, Y') }} and is effective immediately.
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Back to Top -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="1100">
                    <a href="#" class="btn btn-outline-primary" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">
                        <i class="bi bi-arrow-up me-2"></i>Back to Top
                    </a>
                    <div class="mt-3">
                        <a href="{{ route('home') }}" class="btn btn-primary me-2">
                            <i class="bi bi-house me-2"></i>Back to Home
                        </a>
                        <a href="{{ route('about') }}" class="btn btn-outline-primary">
                            <i class="bi bi-info-circle me-2"></i>About Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Smooth scrolling for anchor links */
html {
    scroll-behavior: smooth;
}

/* Enhanced card hover effects */
.card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 214, 255, 0.15);
}

/* Table styling */
.table-dark {
    --bs-table-bg: rgba(23, 26, 39, 0.8);
}

.table-dark th,
.table-dark td {
    border-color: rgba(0, 214, 255, 0.2);
}

/* Quick navigation buttons */
.btn-outline-primary:hover {
    transform: translateX(5px);
}

/* Alert customizations */
.alert {
    border-left: 4px solid;
    border-radius: 8px;
}

.alert-info {
    border-left-color: #0dcaf0;
}

.alert-success {
    border-left-color: #198754;
}

.alert-warning {
    border-left-color: #ffc107;
}

/* Responsive improvements */
@media (max-width: 768px) {
    .display-4 {
        font-size: 2.5rem;
    }

    .table-responsive {
        font-size: 0.9rem;
    }
}
</style>
@endsection
