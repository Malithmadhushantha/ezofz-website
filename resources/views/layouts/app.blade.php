<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="tech-scroll">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'EZofz.lk - Advanced tools and services for Sri Lankan public and private sector officers to streamline office work.')">
    <meta name="keywords" content="@yield('keywords', 'Sri Lanka, office tools, government, private sector, unicode typing, document conversion, office automation')">
    <meta name="author" content="EZofz.lk">

    <!-- Google AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6579653610544842" crossorigin="anonymous"></script>
    <!-- Canonical URL -->
    <link rel="canonical" href="https://ezofz.web.lk/" />

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
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('styles')

<style>
    :root {
        --primary-color: #3b82f6;
        --secondary-color: #64748b;
        --accent-color: #f59e0b;
        --success-color: #10b981;
        --danger-color: #ef4444;
        --tech-blue: #0066ff;
        --tech-cyan: #00d9ff;
        --tech-purple: #8a2be2;
        --tech-dark: #0a0e17;
        --tech-darker: #05070c;
        --tech-gray: #1a1f29;
    }

    body {
        font-family: 'Rajdhani', 'Inter', sans-serif;
        line-height: 1.6;
        background-color: var(--tech-dark);
        color: #e0e0e0;
        overflow-x: hidden;
        background-image:
            radial-gradient(circle at 10% 20%, rgba(0, 214, 255, 0.05) 0%, transparent 20%),
            radial-gradient(circle at 90% 70%, rgba(138, 43, 226, 0.05) 0%, transparent 20%),
            linear-gradient(to bottom, var(--tech-darker), var(--tech-dark));
    }

    /* Custom Cursor */
    #tech-cursor {
        position: fixed;
        width: 20px;
        height: 20px;
        border: 2px solid var(--tech-cyan);
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        transition: transform 0.1s ease, width 0.3s ease, height 0.3s ease;
        mix-blend-mode: difference;
    }

    #tech-cursor::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 4px;
        height: 4px;
        background: var(--tech-cyan);
        border-radius: 50%;
    }

    .cursor-dot {
        position: fixed;
        width: 6px;
        height: 6px;
        background: var(--tech-cyan);
        border-radius: 50%;
        pointer-events: none;
        z-index: 9998;
        transition: transform 0.2s ease;
    }

    .cursor-hover {
        transform: scale(2);
        background: rgba(0, 217, 255, 0.2);
        border: 1px solid var(--tech-cyan);
    }

    .cursor-click {
        transform: scale(0.8);
        background: rgba(0, 217, 255, 0.4);
    }

    /* Navigation Bar - Technical Style */
    .navbar {
        background: rgba(10, 14, 23, 0.8) !important;
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(0, 214, 255, 0.2);
        box-shadow: 0 0 15px rgba(0, 214, 255, 0.1);
        padding: 0.5rem 0;
        transition: all 0.3s ease;
    }

    .navbar.scrolled {
        background: rgba(5, 7, 12, 0.95) !important;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
    }

    .navbar-brand {
        font-weight: 700;
        font-size: 1.5rem;
        font-family: 'Orbitron', sans-serif;
        text-shadow: 0 0 10px var(--tech-cyan);
        position: relative;
        color: var(--tech-cyan) !important;
    }

    .navbar-brand::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--tech-cyan), transparent);
        transform: scaleX(0);
        transform-origin: center;
        transition: transform 0.5s ease;
    }

    .navbar-brand:hover::after {
        transform: scaleX(1);
    }

    .nav-link {
        font-weight: 500;
        position: relative;
        margin: 0 0.2rem;
        padding: 0.5rem 1rem !important;
        border-radius: 4px;
        transition: all 0.3s ease;
        font-family: 'Rajdhani', sans-serif;
        color: #e0e0e0 !important; /* Default visible color */
    }

    .nav-link::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: var(--tech-cyan);
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-link:hover::before,
    .nav-link.active::before {
        width: 80%;
    }

    .nav-link:hover,
    .nav-link.active {
        color: var(--tech-cyan) !important;
        text-shadow: 0 0 8px rgba(0, 217, 255, 0.5);
        background: rgba(0, 214, 255, 0.05);
    }

    .dropdown-menu {
        background: rgba(15, 20, 30, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 214, 255, 0.2);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        border-radius: 8px;
        overflow: hidden;
        transform: translateY(-10px);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, transform 0.3s ease, visibility 0s linear 0.3s;
    }

    .dropdown-menu.show {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
        transition: opacity 0.3s ease, transform 0.3s ease, visibility 0s linear;
        animation: digitalFadeIn 0.3s ease forwards;
        display: block !important;
    }

    .dropdown-menu:not(.show) {
        animation: glitchFadeOut 0.2s ease forwards;
        display: none !important;
    }

    /* Fallback for dropdown hover on mobile/touch devices */
    @media (hover: none) {
        .nav-item.dropdown:hover > .dropdown-menu {
            display: block !important;
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    }

    @keyframes digitalFadeIn {
        0% {
            opacity: 0;
            transform: translateY(-10px);
            box-shadow: 0 0 0 rgba(0, 214, 255, 0);
        }
        50% {
            opacity: 0.5;
            box-shadow: 0 0 10px rgba(0, 214, 255, 0.3);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
    }

    @keyframes glitchFadeOut {
        0% {
            opacity: 1;
            transform: translateY(0);
        }
        20% {
            transform: translateX(2px);
        }
        40% {
            transform: translateX(-2px);
        }
        60% {
            transform: translateX(1px);
        }
        80% {
            transform: translateX(-1px);
        }
        100% {
            opacity: 0;
            transform: translateY(-10px);
            visibility: hidden;
        }
    }

    .dropdown-item {
        color: #e0e0e0;
        transition: all 0.2s ease;
        position: relative;
        overflow: hidden;
    }

    .dropdown-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 214, 255, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .dropdown-item:hover::before {
        left: 100%;
    }

    .dropdown-item:hover {
        background: rgba(0, 214, 255, 0.05);
        color: var(--tech-cyan);
        padding-left: 1.5rem;
    }

    .navbar-toggler {
        border: 1px solid rgba(0, 214, 255, 0.3);
        padding: 0.25rem 0.5rem;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 2px rgba(0, 214, 255, 0.25);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0, 214, 255, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* Button Styles */
    .btn {
        border-radius: 4px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        z-index: 1;
        font-family: 'Rajdhani', sans-serif;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.7s ease;
        z-index: -1;
    }

    .btn:hover::before {
        left: 100%;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--tech-blue), var(--tech-purple));
        border: none;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.5);
    }

    .btn-outline-primary {
        border: 1px solid var(--tech-blue);
        color: var(--tech-blue);
        background: transparent;
    }

    .btn-outline-primary:hover {
        background: rgba(59, 130, 246, 0.1);
        box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
    }

    /* Grid Animation Background */
    .grid-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
        opacity: 0.1;
    }

    .grid-line {
        position: absolute;
        background: rgba(0, 214, 255, 0.1);
    }

    .grid-line.vertical {
        width: 1px;
        height: 100%;
        top: 0;
    }

    .grid-line.horizontal {
        height: 1px;
        width: 100%;
        left: 0;
    }

    /* Pulse Animation */
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(0, 214, 255, 0.4);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(0, 214, 255, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(0, 214, 255, 0);
        }
    }

    .pulse {
        animation: pulse 2s infinite;
    }

    /* Glitch Effect */
    @keyframes glitch {
        0% {
            transform: translate(0);
        }
        20% {
            transform: translate(-2px, 2px);
        }
        40% {
            transform: translate(-2px, -2px);
        }
        60% {
            transform: translate(2px, 2px);
        }
        80% {
            transform: translate(2px, -2px);
        }
        100% {
            transform: translate(0);
        }
    }

    .glitch:hover {
        animation: glitch 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
        text-shadow: 2px 0 rgba(255, 0, 0, 0.5), -2px 0 rgba(0, 255, 0, 0.5);
    }

    /* Scanline Effect */
    .scanline {
        position: relative;
        overflow: hidden;
    }

    .scanline::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--tech-cyan), transparent);
        animation: scan 3s linear infinite;
        opacity: 0.7;
    }

    @keyframes scan {
        0% {
            top: 0;
        }
        100% {
            top: 100%;
        }
    }

    /* Main Content */
    main {
        position: relative;
        z-index: 1;
    }

    /* Footer */
    .footer {
        background: var(--tech-darker);
        color: #d1d5db;
        border-top: 1px solid rgba(0, 214, 255, 0.2);
        position: relative;
        overflow: hidden;
    }

    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--tech-cyan), transparent);
    }

    .footer h6 {
        font-family: 'Orbitron', sans-serif;
        font-weight: 600;
        border-bottom: 1px solid rgba(0, 214, 255, 0.3);
        padding-bottom: 0.5rem;
        margin-bottom: 1rem;
        display: inline-block;
    }

    .footer a {
        transition: all 0.3s ease;
    }

    .footer a:hover {
        color: var(--tech-cyan) !important;
        text-shadow: 0 0 8px rgba(0, 217, 255, 0.5);
        padding-left: 5px;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .navbar-nav {
            background: rgba(15, 20, 30, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 214, 255, 0.2);
            border-radius: 8px;
            padding: 1rem;
            margin-top: 0.5rem;
        }

        .nav-link {
            margin: 0.2rem 0;
        }

        .dropdown-menu {
            background: rgba(20, 25, 35, 0.95);
            margin-left: 1rem;
        }
    }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Custom Cursor -->
    <div id="tech-cursor"></div>
    <div class="cursor-dot"></div>

    <!-- Grid Background -->
    <div class="grid-bg" id="gridBackground"></div>

    <div id="app" class="d-flex flex-column min-vh-100">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center glitch" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="EZofz.lk" height="40" class="me-2 pulse">
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
                            <a class="nav-link dropdown-toggle" href="#" id="databasesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Databases
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="databasesDropdown">
                                @auth
                                    <li><a class="dropdown-item" href="{{ route('penal-code.index') }}"><i class="bi bi-journal-text me-2"></i>Penal Code Database</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('penal-code.public') }}"><i class="bi bi-journal-text me-2"></i>Penal Code Database</a></li>
                                @endauth
                                @auth
                                    <li><a class="dropdown-item" href="{{ route('criminal-procedure-code.index') }}"><i class="bi bi-journal-text me-2"></i>Criminal Procedure Code Database</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('criminal-procedure-code.public') }}"><i class="bi bi-journal-text me-2"></i>Criminal Procedure Code Database</a></li>
                                @endauth
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="toolsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tools
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="toolsDropdown">
                                <li><a class="dropdown-item" href="{{ route('tools.unicode-typing') }}"><i class="bi bi-keyboard me-2"></i>Sinhala Unicode Typing</a></li>
                                <li><a class="dropdown-item" href="{{ route('tools.name-converter') }}"><i class="bi bi-person-badge me-2"></i>Full Name to Initial Converter</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="downloadsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Downloads
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="downloadsDropdown">
                                <li><a class="dropdown-item" href="{{ route('documents.law') }}"><i class="bi bi-file-text me-2"></i>Law Documents</a></li>
                                <li><a class="dropdown-item" href="{{ route('documents.police') }}"><i class="bi bi-shield me-2"></i>Police Documents</a></li>
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
        <main class="flex-grow-1 mt-5 pt-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer mt-5 scanline">
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
                        <p class="mb-0 text-light">Developed by <a href="#" class="text-light text-decoration-none">Malith Madhushantha</a></p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0 text-light">Made with <i class="bi bi-heart-fill text-danger"></i> in Sri Lanka</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Ensure Bootstrap is loaded -->
    <script>
        // Check if Bootstrap is loaded
        window.addEventListener('DOMContentLoaded', function() {
            if (typeof bootstrap === 'undefined') {
                console.error('Bootstrap JavaScript is not loaded. Attempting to reload...');
                var bootstrapScript = document.createElement('script');
                bootstrapScript.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js';
                bootstrapScript.integrity = 'sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL';
                bootstrapScript.crossOrigin = 'anonymous';
                document.head.appendChild(bootstrapScript);
            }
        });
    </script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Custom cursor implementation
        const cursor = document.getElementById('tech-cursor');
        const cursorDot = document.querySelector('.cursor-dot');

        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';

            setTimeout(() => {
                cursorDot.style.left = e.clientX + 'px';
                cursorDot.style.top = e.clientY + 'px';
            }, 100);
        });

        // Cursor effects on interactive elements
        const interactiveElements = document.querySelectorAll('a, button, .nav-link, .dropdown-item, .btn, [role="button"]');

        interactiveElements.forEach(element => {
            element.addEventListener('mouseenter', () => {
                cursor.classList.add('cursor-hover');
            });

            element.addEventListener('mouseleave', () => {
                cursor.classList.remove('cursor-hover');
            });

            element.addEventListener('mousedown', () => {
                cursor.classList.add('cursor-click');
            });

            element.addEventListener('mouseup', () => {
                cursor.classList.remove('cursor-click');
            });
        });

        // Navbar scroll effect
        const navbar = document.getElementById('mainNav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Create grid background
        function createGrid() {
            const gridBg = document.getElementById('gridBackground');
            const gridSize = 50;
            const width = window.innerWidth;
            const height = window.innerHeight;

            // Clear previous grid
            gridBg.innerHTML = '';

            // Create vertical lines
            for (let x = 0; x < width; x += gridSize) {
                const line = document.createElement('div');
                line.classList.add('grid-line', 'vertical');
                line.style.left = x + 'px';
                gridBg.appendChild(line);
            }

            // Create horizontal lines
            for (let y = 0; y < height; y += gridSize) {
                const line = document.createElement('div');
                line.classList.add('grid-line', 'horizontal');
                line.style.top = y + 'px';
                gridBg.appendChild(line);
            }
        }

        // Initialize grid and update on resize
        createGrid();
        window.addEventListener('resize', createGrid);

        // Add subtle animation to grid lines
        const gridLines = document.querySelectorAll('.grid-line');
        gridLines.forEach((line, index) => {
            line.style.opacity = 0.1 + Math.random() * 0.1;
            line.style.transition = 'opacity 2s ease-in-out';

            setInterval(() => {
                line.style.opacity = 0.1 + Math.random() * 0.1;
            }, 2000 + Math.random() * 2000);
        });

        // Initialize Bootstrap components properly
        document.addEventListener('DOMContentLoaded', function() {
            // First, make sure Bootstrap JavaScript is properly loaded
            if (typeof bootstrap === 'undefined') {
                console.error('Bootstrap JavaScript is not loaded properly.');

                // Fallback dropdown implementation
                setupFallbackDropdowns();
            } else {
                // Initialize all dropdowns using Bootstrap's native API
                var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
                var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
                    return new bootstrap.Dropdown(dropdownToggleEl, {
                        offset: [0, 10],
                        popperConfig: function(defaultConfig) {
                            return {...defaultConfig, placement: 'bottom-start'};
                        }
                    });
                });

                // Initialize all tooltips and popovers
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }

            // Setup navbar collapse behavior
            var navbarToggler = document.querySelector('.navbar-toggler');
            var navbarContent = document.querySelector('#navbarNav');
            if (navbarToggler && navbarContent) {
                var navbarCollapse = new bootstrap.Collapse(navbarContent, {
                    toggle: false
                });

                navbarToggler.addEventListener('click', function() {
                    navbarCollapse.toggle();
                });
            }
        });

        // Fallback dropdown function if Bootstrap JS is not loaded properly
        function setupFallbackDropdowns() {
            console.log('Using fallback dropdown implementation');

            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

            // Remove existing event listeners (if any)
            dropdownToggles.forEach(toggle => {
                const newToggle = toggle.cloneNode(true);
                toggle.parentNode.replaceChild(newToggle, toggle);
            });

            // Add click event listeners
            document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Close all other open dropdowns
                    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                        if (menu !== this.nextElementSibling) {
                            menu.classList.remove('show');
                            menu.previousElementSibling.setAttribute('aria-expanded', 'false');
                        }
                    });

                    // Toggle this dropdown
                    const dropdownMenu = this.nextElementSibling;
                    dropdownMenu.classList.toggle('show');
                    this.setAttribute('aria-expanded', dropdownMenu.classList.contains('show') ? 'true' : 'false');
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.matches('.dropdown-toggle') && !e.target.closest('.dropdown-menu')) {
                    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                        menu.classList.remove('show');
                        menu.previousElementSibling.setAttribute('aria-expanded', 'false');
                    });
                }
            });
        }
    </script>
    @stack('scripts')

    <!-- Final bootstrap dropdown initialization fallback -->
    <script>
        // This will run after everything else has loaded
        window.addEventListener('load', function() {
            // Double-check if Bootstrap dropdowns are working
            setTimeout(function() {
                const dropdownTest = document.querySelector('.dropdown-toggle');
                if (dropdownTest && !dropdownTest.hasAttribute('data-bs-initialized')) {
                    console.log('Adding fallback dropdown handlers');

                    // Add manual click handlers for dropdowns
                    document.querySelectorAll('.dropdown-toggle').forEach(function(dropdownToggle) {
                        dropdownToggle.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();

                            const dropdownMenu = this.nextElementSibling;
                            if (dropdownMenu && dropdownMenu.classList.contains('dropdown-menu')) {
                                // Close all other open dropdowns
                                document.querySelectorAll('.dropdown-menu.show').forEach(function(openMenu) {
                                    if (openMenu !== dropdownMenu) {
                                        openMenu.classList.remove('show');
                                    }
                                });

                                // Toggle current dropdown
                                dropdownMenu.classList.toggle('show');
                            }
                        });

                        // Mark as manually initialized
                        dropdownToggle.setAttribute('data-bs-initialized', 'true');
                    });

                    // Close dropdowns when clicking outside
                    document.addEventListener('click', function(e) {
                        if (!e.target.closest('.dropdown')) {
                            document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                                menu.classList.remove('show');
                            });
                        }
                    });
                }
            }, 1000); // Wait 1 second to make sure Bootstrap had a chance to initialize
        });
    </script>
</body>
</html>
