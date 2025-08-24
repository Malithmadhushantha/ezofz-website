<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'EZofz.lk - Advanced tools and services for Sri Lankan public and private sector officers to streamline office work.')">
    <meta name="keywords" content="@yield('keywords', 'Sri Lanka, office tools, government, private sector, unicode typing, document conversion, office automation')">
    <meta name="author" content="EZofz.lk">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title', 'EZofz.lk - Office Tools & Services')">
    <meta property="og:description" content="@yield('description', 'Advanced tools and services for Sri Lankan officers')">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'EZofz.lk - Office Tools & Services')">
    <meta name="twitter:description" content="@yield('description', 'Advanced tools and services for Sri Lankan officers')">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">

    <title>@yield('title', 'EZofz.lk - Office Tools & Services')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Inter:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
    :root {
        --primary-color: #3b82f6;
        --secondary-color: #64748b;
        --accent-color: #f59e0b;
        --success-color: #10b981;
        --danger-color: #ef4444;
    }
    body {
        font-family: 'Inter', sans-serif;
        line-height: 1.6;
    }
    .navbar-brand {
        font-weight: 700;
        font-size: 1.5rem;
    }
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
    .tool-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    .tool-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    .admin-sidebar {
        background: linear-gradient(180deg, #1f2937 0%, #111827 100%);
        min-height: 100vh;
    }
    .admin-sidebar .nav-link {
        color: #d1d5db;
        transition: all 0.3s ease;
    }
    .admin-sidebar .nav-link:hover {
        color: #fff;
        background-color: rgba(59, 130, 246, 0.1);
    }
    .admin-sidebar .nav-link.active {
        background-color: #3b82f6;
        color: #fff;
    }
    .btn-primary {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        border: none;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.4);
    }
    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
    }
    .navbar-nav .dropdown-menu {
        border: none;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        border-radius: 0.5rem;
    }
    .footer {
        background: #1f2937;
        color: #d1d5db;
    }
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
    .fade-in-up {
        animation: fadeInUp 0.8s ease-out;
    }
    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 2rem;
        }
        .admin-sidebar {
            min-height: auto;
        }
    }
    </style>
    @stack('styles')
</head>
<body>
    <div id="app">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="EZofz.lk" height="40" class="me-2">
                    <span class="text-primary">EZofz.lk</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="toolsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tools
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="toolsDropdown">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-keyboard me-2"></i>Sinhala Unicode Typing</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person-badge me-2"></i>Full Name to Initial Converter</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="downloadsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Downloads
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="downloadsDropdown">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-file-text me-2"></i>Law Documents</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-shield me-2"></i>Police Documents</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        @guest
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    @if(Auth::user()->isAdmin())
                                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Admin Dashboard</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-house-door me-2"></i>Dashboard</a></li>
                                    @endif
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer mt-5">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('images/logo.png') }}" alt="EZofz.lk" height="40" class="me-2">
                            <h5 class="mb-0 text-white">EZofz.lk</h5>
                        </div>
                        <p class="text-light">Advanced tools and services for Sri Lankan public and private sector officers to streamline office work.</p>
                        <div class="d-flex gap-3">
                            <a href="#" class="text-light"><i class="bi bi-facebook fs-5"></i></a>
                            <a href="#" class="text-light"><i class="bi bi-twitter fs-5"></i></a>
                            <a href="#" class="text-light"><i class="bi bi-linkedin fs-5"></i></a>
                            <a href="#" class="text-light"><i class="bi bi-youtube fs-5"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h6 class="text-white mb-3">Quick Links</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}" class="text-light text-decoration-none">Home</a></li>
                            <li><a href="{{ route('about') }}" class="text-light text-decoration-none">About Us</a></li>
                            <li><a href="{{ route('contact') }}" class="text-light text-decoration-none">Contact</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h6 class="text-white mb-3">Tools</h6>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light text-decoration-none">Unicode Typing</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Name Converter</a></li>
                            <li><a href="#" class="text-light text-decoration-none">More Tools</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h6 class="text-white mb-3">Downloads</h6>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light text-decoration-none">Law Documents</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Police Documents</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Forms</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h6 class="text-white mb-3">Contact Info</h6>
                        <ul class="list-unstyled text-light">
                            <li><i class="bi bi-geo-alt me-2"></i>Colombo, Sri Lanka</li>
                            <li><i class="bi bi-envelope me-2"></i>info@ezofz.lk</li>
                            <li><i class="bi bi-phone me-2"></i>+94 XX XXX XXXX</li>
                        </ul>
                    </div>
                </div>
                <hr class="my-4 text-light">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0 text-light">&copy; 2024 EZofz.lk. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0 text-light">Made with <i class="bi bi-heart-fill text-danger"></i> in Sri Lanka</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS Bundle (with Popper) -->
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    </script>
    @stack('scripts')
</body>
</html>
