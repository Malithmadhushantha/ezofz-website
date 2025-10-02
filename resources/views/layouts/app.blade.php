<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="tech-scroll">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PWA Meta Tags -->
    <meta name="application-name" content="EZofz.lk">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="EZofz.lk">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="msapplication-TileColor" content="#0d6efd">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="theme-color" content="#0d6efd">

    <!-- Web App Manifest -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/icons/icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icons/icon-192x192.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icons/icon-72x72.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Enhanced SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'EZofz.lk - Advanced office tools for Sri Lankan officers: Sinhala unicode typing, name converter, ID card details, document downloads. Free tools for government and private sector.')">
    <meta name="keywords" content="@yield('keywords', 'Sri Lanka office tools, කාර්යාල මෙවලම්, Sinhala unicode typing, සිංහල යුනිකෝඩ්, name converter, නම් පරිවර්තකය, government forms, රජයේ ආකෘති, police documents, penal code, දණ්ඩ නීතිය, criminal procedure code, Sri Lankan officers')">
    <meta name="author" content="EZofz.lk">

    <!-- Additional SEO Meta Tags -->
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="revisit-after" content="1 day">
    <meta name="rating" content="general">
    <meta name="distribution" content="global">
    <meta name="language" content="English, Sinhala">

    <!-- Geo Tags for Sri Lanka -->
    <meta name="geo.region" content="LK">
    <meta name="geo.country" content="Sri Lanka">
    <meta name="geo.placename" content="Sri Lanka">
    <meta name="ICBM" content="7.8731, 80.7718">

    <!-- Additional Dublin Core Meta Tags -->
    <meta name="DC.title" content="@yield('title', 'EZofz.lk - Office Tools & Services')">
    <meta name="DC.description" content="@yield('description', 'Advanced office tools for Sri Lankan officers')">
    <meta name="DC.creator" content="EZofz.lk">
    <meta name="DC.language" content="en-LK, si-LK">
    <meta name="DC.coverage" content="Sri Lanka">
    <meta name="DC.type" content="Service">

    <!-- Google AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6579653610544842" crossorigin="anonymous"></script>
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Hreflang for multilingual support -->
    <link rel="alternate" hreflang="en-lk" href="{{ url()->current() }}" />
    <link rel="alternate" hreflang="si-lk" href="{{ url()->current() }}" />
    <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}" />

    <!-- Preconnect to external resources for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="//pagead2.googlesyndication.com">

    <!-- RSS Feed (if available) -->
    <link rel="alternate" type="application/rss+xml" title="EZofz.lk Updates" href="{{ url('/feed') }}" />

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title', 'EZofz.lk - Office Tools & Services')">
    <meta property="og:description" content="@yield('description', 'Advanced tools and services for Sri Lankan officers')">
    <meta property="og:image" content="{{ asset('images/banner_image.png') }}">
    <meta property="og:image:alt" content="EZofz.lk - Sri Lankan Office Tools Dashboard">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="EZofz.lk">
    <meta property="og:locale" content="en_LK">
    <meta property="og:locale:alternate" content="si_LK">

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

    <!-- Custom Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    @stack('head')

<style>
    /* Additional tech-themed variables */
    :root {
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
        z-index: 1040;
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
        z-index: 1039;
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
        border: 2px solid rgba(0, 214, 255, 0.6);
        padding: 0.4rem 0.6rem;
        border-radius: 8px;
        background: rgba(0, 214, 255, 0.1);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
        position: relative;
        z-index: 1050;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 3px rgba(0, 214, 255, 0.4);
        border-color: rgba(0, 214, 255, 0.8);
    }

    .navbar-toggler:hover {
        background: rgba(0, 214, 255, 0.2);
        border-color: rgba(0, 214, 255, 0.8);
        transform: scale(1.05);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0, 214, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='3' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        width: 1.5em;
        height: 1.5em;
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

    /* Navbar Collapse Animation */
    .navbar-collapse {
        transition: all 0.3s ease-in-out;
    }

    .navbar-collapse:not(.show) {
        display: none;
    }

    .navbar-collapse.show {
        display: block;
        animation: slideDown 0.3s ease-in-out;
    }

    @keyframes slideDown {
        0% {
            opacity: 0;
            transform: translateY(-10px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Mobile Navbar Enhancements for Better Visibility */
    @media (max-width: 991.98px) {
        .navbar {
            backdrop-filter: blur(20px);
            background: rgba(23, 26, 39, 0.95) !important;
            border-bottom: 2px solid rgba(0, 214, 255, 0.3);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.3);
        }

        .navbar-toggler {
            border: 3px solid rgba(0, 214, 255, 0.8) !important;
            background: rgba(0, 214, 255, 0.2) !important;
            box-shadow: 0 4px 15px rgba(0, 214, 255, 0.3), inset 0 0 10px rgba(0, 214, 255, 0.1);
            padding: 0.5rem 0.7rem !important;
            border-radius: 10px !important;
        }

        .navbar-toggler:not(.collapsed) {
            background: rgba(0, 214, 255, 0.3) !important;
            border-color: rgba(0, 214, 255, 1) !important;
            box-shadow: 0 4px 20px rgba(0, 214, 255, 0.5), inset 0 0 15px rgba(0, 214, 255, 0.2);
        }

        .navbar-toggler-icon {
            filter: drop-shadow(0 0 8px rgba(0, 214, 255, 0.8));
            width: 1.6em !important;
            height: 1.6em !important;
        }

        .navbar-brand {
            text-shadow: 0 0 15px rgba(0, 214, 255, 0.6);
        }

        .navbar-collapse {
            background: rgba(23, 26, 39, 0.98);
            border-radius: 10px;
            margin-top: 1rem;
            padding: 1rem;
            border: 1px solid rgba(0, 214, 255, 0.3);
        }

        /* Mobile dropdown improvements */
        .navbar-nav .dropdown-menu {
            background: rgba(15, 20, 30, 0.98) !important;
            border: 1px solid rgba(0, 214, 255, 0.4) !important;
            margin-left: 1rem !important;
            margin-top: 0.5rem !important;
            border-radius: 8px !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4) !important;
        }

        .navbar-nav .dropdown-menu.show {
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateY(0) !important;
            position: static !important;
        }

        .navbar-nav .dropdown-item {
            padding: 0.75rem 1rem !important;
            color: #e0e0e0 !important;
            transition: all 0.2s ease !important;
        }

        .navbar-nav .dropdown-item:hover,
        .navbar-nav .dropdown-item:focus {
            background: rgba(0, 214, 255, 0.1) !important;
            color: var(--tech-cyan) !important;
            padding-left: 1.5rem !important;
        }

        /* Mobile nav link improvements */
        .navbar-nav .nav-link {
            padding: 0.75rem 1rem !important;
            margin: 0.25rem 0 !important;
            border-radius: 6px !important;
            transition: all 0.2s ease !important;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            background: rgba(0, 214, 255, 0.1) !important;
            transform: translateX(5px) !important;
        }

        /* Dropdown toggle arrow animation */
        .navbar-nav .dropdown-toggle::after {
            transition: transform 0.2s ease !important;
        }

        .navbar-nav .dropdown-toggle[aria-expanded="true"]::after {
            transform: rotate(180deg) !important;
        }
    }

    .navbar-toggler {
        transition: all 0.3s ease;
    }

    .navbar-toggler.collapsed {
        transform: rotate(0deg);
    }

    .navbar-toggler:not(.collapsed) {
        transform: rotate(180deg);
    }

    /* WhatsApp Floating Button */
    .whatsapp-float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 20px;
        right: 20px;
        background-color: #25d366;
        color: white;
        border-radius: 50px;
        text-align: center;
        font-size: 24px;
        box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        animation: pulse-whatsapp 2s infinite;
    }

    .whatsapp-float:hover {
        background-color: #128c7e;
        color: white;
        transform: scale(1.1);
        box-shadow: 0 6px 25px rgba(37, 211, 102, 0.6);
        text-decoration: none;
    }

    .whatsapp-float i {
        margin-top: 2px;
    }

    @keyframes pulse-whatsapp {
        0% {
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
        }
        50% {
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.7), 0 0 0 10px rgba(37, 211, 102, 0.1);
        }
        100% {
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
        }
    }

    /* WhatsApp tooltip */
    .whatsapp-float::before {
        content: 'Contact us on WhatsApp';
        position: absolute;
        right: 70px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 12px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        font-family: 'Rajdhani', sans-serif;
    }

    .whatsapp-float::after {
        content: '';
        position: absolute;
        right: 60px;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-left: 6px solid rgba(0, 0, 0, 0.8);
        border-top: 6px solid transparent;
        border-bottom: 6px solid transparent;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .whatsapp-float:hover::before,
    .whatsapp-float:hover::after {
        opacity: 1;
        visibility: visible;
    }

    /* Responsive adjustments for WhatsApp button */
    @media (max-width: 768px) {
        .whatsapp-float {
            width: 55px;
            height: 55px;
            bottom: 15px;
            right: 15px;
            font-size: 22px;
        }

        .whatsapp-float::before {
            content: 'WhatsApp';
            right: 65px;
            font-size: 11px;
            padding: 6px 10px;
        }

        .whatsapp-float::after {
            right: 55px;
        }
    }

    @media (max-width: 576px) {
        .whatsapp-float {
            width: 50px;
            height: 50px;
            bottom: 10px;
            right: 10px;
            font-size: 20px;
        }

        .whatsapp-float::before {
            right: 60px;
        }

        .whatsapp-float::after {
            right: 50px;
        }
    }

    /* Cookie Consent Banner */
    .cookie-consent {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(10, 14, 23, 0.95);
        backdrop-filter: blur(10px);
        border-top: 2px solid var(--tech-cyan);
        padding: 1rem;
        z-index: 9999;
        transform: translateY(100%);
        transition: transform 0.5s ease-in-out;
        box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.3);
    }

    .cookie-consent.show {
        transform: translateY(0);
    }

    .cookie-consent-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: between;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .cookie-consent-text {
        flex: 1;
        color: #e0e0e0;
        font-size: 0.95rem;
        line-height: 1.5;
        min-width: 250px;
    }

    .cookie-consent-text h6 {
        color: var(--tech-cyan);
        margin-bottom: 0.5rem;
        font-weight: 600;
        font-family: 'Orbitron', sans-serif;
    }

    .cookie-consent-text p {
        margin-bottom: 0;
        color: #cbd5e0;
    }

    .cookie-consent-text a {
        color: var(--tech-cyan);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .cookie-consent-text a:hover {
        color: white;
        text-shadow: 0 0 8px rgba(0, 217, 255, 0.5);
    }

    .cookie-consent-actions {
        display: flex;
        gap: 0.75rem;
        align-items: center;
        flex-shrink: 0;
    }

    .cookie-btn {
        padding: 0.5rem 1.25rem;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Rajdhani', sans-serif;
        position: relative;
        overflow: hidden;
    }

    .cookie-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .cookie-btn:hover::before {
        left: 100%;
    }

    .cookie-btn-accept {
        background: linear-gradient(135deg, var(--tech-blue), var(--tech-cyan));
        color: white;
        box-shadow: 0 2px 10px rgba(0, 214, 255, 0.3);
    }

    .cookie-btn-accept:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 214, 255, 0.5);
    }

    .cookie-btn-decline {
        background: transparent;
        color: #cbd5e0;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .cookie-btn-decline:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border-color: rgba(255, 255, 255, 0.5);
    }

    .cookie-btn-settings {
        background: transparent;
        color: var(--tech-cyan);
        border: 1px solid var(--tech-cyan);
        font-size: 0.8rem;
        padding: 0.4rem 1rem;
    }

    .cookie-btn-settings:hover {
        background: rgba(0, 214, 255, 0.1);
        box-shadow: 0 0 10px rgba(0, 214, 255, 0.3);
    }

    /* Cookie Icon Animation */
    .cookie-icon {
        margin-right: 0.5rem;
        animation: cookieRotate 3s ease-in-out infinite;
    }

    @keyframes cookieRotate {
        0%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(-5deg); }
        75% { transform: rotate(5deg); }
    }

    /* Responsive Cookie Banner */
    @media (max-width: 768px) {
        .cookie-consent {
            padding: 1rem 0.75rem;
        }

        .cookie-consent-content {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }

        .cookie-consent-text {
            min-width: auto;
        }

        .cookie-consent-actions {
            flex-direction: column;
            width: 100%;
        }

        .cookie-btn {
            width: 100%;
            padding: 0.75rem;
        }

        .cookie-btn-settings {
            order: 3;
            margin-top: 0.5rem;
        }
    }

    @media (max-width: 576px) {
        .cookie-consent-text h6 {
            font-size: 1rem;
        }

        .cookie-consent-text p {
            font-size: 0.85rem;
        }
    }

    /* Navbar Avatar Styles */
    .navbar-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgba(0, 214, 255, 0.3);
        transition: all 0.3s ease;
    }

    .navbar-avatar:hover {
        border-color: var(--tech-cyan);
        box-shadow: 0 0 8px rgba(0, 214, 255, 0.4);
    }

    .navbar-avatar-placeholder {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
        font-weight: 600;
        color: white;
        border: 2px solid rgba(0, 214, 255, 0.3);
        transition: all 0.3s ease;
    }

    .navbar-avatar-placeholder:hover {
        border-color: var(--tech-cyan);
        box-shadow: 0 0 8px rgba(0, 214, 255, 0.4);
        transform: scale(1.05);
    }

    .navbar-username {
        color: #e0e0e0;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    #userDropdown:hover .navbar-username {
        color: var(--tech-cyan);
    }

    /* Mobile navbar avatar adjustments */
    @media (max-width: 991.98px) {
        .navbar-avatar,
        .navbar-avatar-placeholder {
            width: 28px;
            height: 28px;
            font-size: 0.75rem;
        }

        .navbar-username {
            font-size: 0.9rem;
        }
    }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Custom Cursor -->
    <div id="tech-cursor"></div>
    <div class="cursor-dot"></div>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/940707793037?text=Hello%20EZofz.web.lk!%20I%20would%20like%20to%20know%20more%20about%20your%20services."
       class="whatsapp-float"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Contact us on WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Cookie Consent Banner -->
    <div id="cookieConsent" class="cookie-consent">
        <div class="cookie-consent-content">
            <div class="cookie-consent-text">
                <h6><i class="bi bi-shield-check cookie-icon"></i>We Value Your Privacy</h6>
                <p>We use cookies to enhance your browsing experience, provide personalized content, and analyze our traffic. By clicking "Accept All", you consent to our use of cookies. <a href="#" onclick="showCookieSettings()">Cookie Settings</a> | <a href="#" target="_blank">Privacy Policy</a></p>
            </div>
            <div class="cookie-consent-actions">
                <button class="cookie-btn cookie-btn-accept" onclick="acceptAllCookies()">
                    <i class="bi bi-check-circle me-1"></i>Accept All
                </button>
                <button class="cookie-btn cookie-btn-decline" onclick="declineAllCookies()">
                    <i class="bi bi-x-circle me-1"></i>Decline
                </button>
                <button class="cookie-btn cookie-btn-settings" onclick="showCookieSettings()">
                    <i class="bi bi-gear me-1"></i>Settings
                </button>
            </div>
        </div>
    </div>

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
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                                    <li><a class="dropdown-item" href="{{ route('police.directory') }}"><i class="bi bi-shield-check me-2"></i>Police Station Directory</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="toolsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tools
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="toolsDropdown">
                                <li><a class="dropdown-item" href="{{ route('tools.unicode-typing') }}"><i class="bi bi-keyboard me-2"></i>Sinhala Unicode Typing</a></li>
                                <li><a class="dropdown-item" href="{{ route('tools.name-converter') }}"><i class="bi bi-person-badge me-2"></i>Full Name to Initial Converter</a></li>
                                <li><a class="dropdown-item" href="{{ route('tools.sl-idcard-details') }}"><i class="bi bi-credit-card-2-front me-2"></i>SL ID Card Details & Converter</a></li>
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
                                    @if(Auth::user()->avatar)
                                        <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" class="navbar-avatar me-2" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="navbar-avatar-placeholder me-2" style="display: none;">
                                            {{ Auth::user()->initials }}
                                        </div>
                                    @else
                                        <div class="navbar-avatar-placeholder me-2">
                                            {{ Auth::user()->initials }}
                                        </div>
                                    @endif
                                    <span class="navbar-username">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    @if(Auth::user()->isAdmin())
                                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Admin Dashboard</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-house-door me-2"></i>Dashboard</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="bi bi-person-lines-fill me-2"></i>My Profile</a></li>
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
                            <li><a href="{{ route('privacy') }}" class="text-light text-decoration-none">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h6 class="text-white mb-3">Tools</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('tools.unicode-typing') }}" class="text-light text-decoration-none">Unicode Typing</a></li>
                            <li><a href="{{ route('tools.name-converter') }}" class="text-light text-decoration-none">Name Converter</a></li>
                            <li><a href="{{ route('tools.sl-idcard-details') }}" class="text-light text-decoration-none">ID Card Details</a></li>
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
                            <li><i class="bi bi-phone me-2"></i>+94 70 779 3037</li>
                        </ul>
                    </div>
                </div>
                <hr class="my-4 text-light">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0 text-light">&copy; 2025 EZofz.lk. All rights reserved.</p>
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
            // Initialize mobile-responsive navigation system
            initMobileNavigation();
        });

        function initMobileNavigation() {
            console.log('Initializing mobile navigation system...');

            let navbarToggler = document.querySelector('.navbar-toggler');
            const navbarContent = document.querySelector('#navbarNav');
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

            if (!navbarToggler || !navbarContent) return;

            // 1. Setup navbar collapse/expand functionality and get updated reference
            navbarToggler = setupNavbarToggle(navbarToggler, navbarContent);

            // 2. Setup dropdown functionality for mobile and desktop
            setupDropdownToggles(dropdownToggles, navbarContent);

            // 3. Setup click outside to close (use updated toggler reference)
            setupOutsideClickHandler(navbarContent, navbarToggler);

            // 4. Setup nav link clicks (use updated toggler reference)
            setupNavLinkClicks(navbarContent, navbarToggler);
        }        function setupNavbarToggle(navbarToggler, navbarContent) {
            // Remove existing listeners by cloning
            const newToggler = navbarToggler.cloneNode(true);
            navbarToggler.parentNode.replaceChild(newToggler, navbarToggler);

            // Update the reference to the new toggler
            const updatedToggler = document.querySelector('.navbar-toggler');

            updatedToggler.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const isExpanded = navbarContent.classList.contains('show');

                if (isExpanded) {
                    collapseNavbar(navbarContent, updatedToggler);
                } else {
                    expandNavbar(navbarContent, updatedToggler);
                }

                console.log('Navbar toggled:', !isExpanded ? 'expanded' : 'collapsed');
            });

            // Return the updated toggler reference
            return updatedToggler;
        }

        function setupDropdownToggles(dropdownToggles, navbarContent) {
            dropdownToggles.forEach(function(toggle) {
                // Remove existing listeners by cloning
                const newToggle = toggle.cloneNode(true);
                toggle.parentNode.replaceChild(newToggle, toggle);

                newToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const isMobile = window.innerWidth < 992;
                    const dropdown = this.nextElementSibling;
                    const isDropdownOpen = dropdown && dropdown.classList.contains('show');

                    console.log('Dropdown clicked:', this.textContent.trim(), 'isMobile:', isMobile, 'isOpen:', isDropdownOpen);

                    if (isMobile) {
                        // On mobile: keep navbar open, just toggle dropdown
                        handleMobileDropdown(this, dropdown, navbarContent);
                    } else {
                        // On desktop: use normal dropdown behavior
                        handleDesktopDropdown(this, dropdown);
                    }
                });
            });
        }

        function handleMobileDropdown(toggle, dropdown, navbarContent) {
            if (!dropdown || !dropdown.classList.contains('dropdown-menu')) return;

            // Ensure navbar stays open
            if (!navbarContent.classList.contains('show')) {
                const currentToggler = document.querySelector('.navbar-toggler');
                expandNavbar(navbarContent, currentToggler);
            }

            // Close all other dropdowns first
            document.querySelectorAll('.dropdown-menu.show').forEach(function(otherMenu) {
                if (otherMenu !== dropdown) {
                    otherMenu.classList.remove('show');
                    const otherToggle = otherMenu.previousElementSibling;
                    if (otherToggle) {
                        otherToggle.setAttribute('aria-expanded', 'false');
                        otherToggle.classList.add('collapsed');
                    }
                }
            });

            // Toggle current dropdown
            const isOpen = dropdown.classList.contains('show');
            if (isOpen) {
                dropdown.classList.remove('show');
                toggle.setAttribute('aria-expanded', 'false');
                toggle.classList.add('collapsed');
            } else {
                dropdown.classList.add('show');
                toggle.setAttribute('aria-expanded', 'true');
                toggle.classList.remove('collapsed');
            }

            console.log('Mobile dropdown toggled:', toggle.textContent.trim(), !isOpen ? 'opened' : 'closed');
        }        function handleDesktopDropdown(toggle, dropdown) {
            if (!dropdown || !dropdown.classList.contains('dropdown-menu')) return;

            // Close all other dropdowns
            document.querySelectorAll('.dropdown-menu.show').forEach(function(otherMenu) {
                if (otherMenu !== dropdown) {
                    otherMenu.classList.remove('show');
                    const otherToggle = otherMenu.previousElementSibling;
                    if (otherToggle) {
                        otherToggle.setAttribute('aria-expanded', 'false');
                    }
                }
            });

            // Toggle current dropdown
            const isOpen = dropdown.classList.contains('show');
            dropdown.classList.toggle('show');
            toggle.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');
        }

        function setupOutsideClickHandler(navbarContent, navbarToggler) {
            document.addEventListener('click', function(e) {
                const clickedInsideNavbar = e.target.closest('.navbar');
                const clickedOnDropdown = e.target.closest('.dropdown-menu');
                const clickedOnToggle = e.target.closest('.dropdown-toggle');

                if (!clickedInsideNavbar) {
                    // Clicked completely outside navbar - close everything
                    const currentToggler = document.querySelector('.navbar-toggler');
                    collapseNavbar(navbarContent, currentToggler);
                    closeAllDropdowns();
                } else if (!clickedOnDropdown && !clickedOnToggle) {
                    // Clicked inside navbar but not on dropdown - close dropdowns only
                    closeAllDropdowns();
                }
            });
        }        function setupNavLinkClicks(navbarContent, navbarToggler) {
            const navLinks = navbarContent.querySelectorAll('.nav-link:not(.dropdown-toggle)');
            navLinks.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    const isMobile = window.innerWidth < 992;
                    if (isMobile) {
                        // On mobile, close navbar when clicking regular nav links
                        setTimeout(function() {
                            const currentToggler = document.querySelector('.navbar-toggler');
                            collapseNavbar(navbarContent, currentToggler);
                        }, 150); // Small delay for better UX
                    }
                });
            });
        }

        function expandNavbar(navbarContent, navbarToggler) {
            navbarContent.classList.add('show');
            navbarToggler.setAttribute('aria-expanded', 'true');
            navbarToggler.classList.remove('collapsed');
        }

        function collapseNavbar(navbarContent, navbarToggler) {
            navbarContent.classList.remove('show');
            navbarToggler.setAttribute('aria-expanded', 'false');
            navbarToggler.classList.add('collapsed');
            // Also close all dropdowns when collapsing navbar
            closeAllDropdowns();
        }

        function closeAllDropdowns() {
            document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                menu.classList.remove('show');
                const toggle = menu.previousElementSibling;
                if (toggle && toggle.classList.contains('dropdown-toggle')) {
                    toggle.setAttribute('aria-expanded', 'false');
                    toggle.classList.add('collapsed');
                }
            });
        }

        // Window resize handler to close dropdowns appropriately
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                const isMobile = window.innerWidth < 992;
                if (!isMobile) {
                    // On desktop, close navbar but keep dropdowns functional
                    const navbarContent = document.querySelector('#navbarNav');
                    const navbarToggler = document.querySelector('.navbar-toggler');
                    if (navbarContent && navbarToggler) {
                        collapseNavbar(navbarContent, navbarToggler);
                    }
                }
            }, 250);
        });

        // Add debugging function to help troubleshoot
        function debugNavbarState() {
            const toggler = document.querySelector('.navbar-toggler');
            const content = document.querySelector('#navbarNav');
            console.log('Navbar Debug:', {
                togglerExists: !!toggler,
                contentExists: !!content,
                isExpanded: content?.classList.contains('show'),
                togglerExpanded: toggler?.getAttribute('aria-expanded'),
                togglerCollapsed: toggler?.classList.contains('collapsed')
            });
        }

        // Make debug function available globally for testing
        window.debugNavbarState = debugNavbarState;
    </script>

    <!-- Cookie Consent JavaScript -->
    <script>
        // Cookie Consent Functionality
        class CookieConsent {
            constructor() {
                this.cookieName = 'ezofz_cookie_consent';
                this.consentBanner = document.getElementById('cookieConsent');
                this.init();
            }

            init() {
                // Check if user has already given consent
                if (!this.hasConsent()) {
                    this.showBanner();
                }
            }

            hasConsent() {
                return localStorage.getItem(this.cookieName) !== null;
            }

            showBanner() {
                if (this.consentBanner) {
                    setTimeout(() => {
                        this.consentBanner.classList.add('show');
                    }, 1000); // Show after 1 second delay
                }
            }

            hideBanner() {
                if (this.consentBanner) {
                    this.consentBanner.classList.remove('show');
                    setTimeout(() => {
                        this.consentBanner.style.display = 'none';
                    }, 500);
                }
            }

            acceptAll() {
                this.setConsent({
                    necessary: true,
                    analytics: true,
                    marketing: true,
                    preferences: true
                });
                this.hideBanner();
                this.initializeAllCookies();
                console.log('All cookies accepted');
            }

            declineAll() {
                this.setConsent({
                    necessary: true, // Always necessary
                    analytics: false,
                    marketing: false,
                    preferences: false
                });
                this.hideBanner();
                console.log('Non-essential cookies declined');
            }

            setConsent(preferences) {
                const consentData = {
                    timestamp: new Date().toISOString(),
                    preferences: preferences,
                    version: '1.0'
                };
                localStorage.setItem(this.cookieName, JSON.stringify(consentData));

                // Set cookie for server-side detection
                document.cookie = `${this.cookieName}=accepted; path=/; max-age=${365 * 24 * 60 * 60}; SameSite=Lax`;
            }

            getConsent() {
                const consent = localStorage.getItem(this.cookieName);
                return consent ? JSON.parse(consent) : null;
            }

            initializeAllCookies() {
                // Initialize Google Analytics or other tracking scripts here
                if (this.getConsent()?.preferences?.analytics) {
                    this.initGoogleAnalytics();
                }

                if (this.getConsent()?.preferences?.marketing) {
                    this.initMarketingCookies();
                }
            }

            initGoogleAnalytics() {
                // Add your Google Analytics initialization here
                console.log('Google Analytics initialized');

                // Example: Load Google Analytics
                /*
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
                ga('create', 'YOUR-TRACKING-ID', 'auto');
                ga('send', 'pageview');
                */
            }

            initMarketingCookies() {
                // Add your marketing cookies/pixels here
                console.log('Marketing cookies initialized');

                // Example: Facebook Pixel, Google Ads, etc.
            }

            showSettings() {
                // For now, show a simple alert. You can enhance this with a modal
                alert('Cookie settings panel will be implemented here. For now, you can:\n\n' +
                      '• Accept All - Enables all features\n' +
                      '• Decline - Only necessary cookies\n' +
                      '• Contact us for specific preferences');
            }
        }

        // Initialize cookie consent when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            window.cookieConsent = new CookieConsent();
        });

        // Global functions for button clicks
        function acceptAllCookies() {
            window.cookieConsent.acceptAll();
        }

        function declineAllCookies() {
            window.cookieConsent.declineAll();
        }

        function showCookieSettings() {
            window.cookieConsent.showSettings();
        }

        // Check if user wants to reset cookie preferences (for testing)
        if (window.location.search.includes('reset-cookies')) {
            localStorage.removeItem('ezofz_cookie_consent');
            document.cookie = 'ezofz_cookie_consent=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            console.log('Cookie preferences reset');
        }
    </script>

    <!-- Bootstrap JavaScript Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- AOS Animation JavaScript -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>

    @stack('scripts')

    <!-- PWA Service Worker Registration -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js')
                    .then(function(registration) {
                        console.log('ServiceWorker registration successful with scope: ', registration.scope);

                        // Check for updates
                        registration.addEventListener('updatefound', function() {
                            const newWorker = registration.installing;
                            newWorker.addEventListener('statechange', function() {
                                if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                                    // New update available
                                    if (confirm('A new version is available. Reload to update?')) {
                                        window.location.reload();
                                    }
                                }
                            });
                        });
                    })
                    .catch(function(err) {
                        console.log('ServiceWorker registration failed: ', err);
                    });
            });
        }

        // PWA Install Prompt
        let deferredPrompt;

        window.addEventListener('beforeinstallprompt', function(e) {
            console.log('beforeinstallprompt fired');
            e.preventDefault();
            deferredPrompt = e;

            // Show install button or banner
            showInstallPromotion();
        });

        function showInstallPromotion() {
            // Create install button if it doesn't exist
            if (!document.getElementById('pwa-install-btn')) {
                const installBtn = document.createElement('button');
                installBtn.id = 'pwa-install-btn';
                installBtn.innerHTML = '<i class="fas fa-download me-1"></i> Install App';
                installBtn.className = 'btn btn-primary btn-sm position-fixed';
                installBtn.style.cssText = 'bottom: 20px; right: 20px; z-index: 1000; border-radius: 25px;';

                installBtn.addEventListener('click', function() {
                    if (deferredPrompt) {
                        deferredPrompt.prompt();
                        deferredPrompt.userChoice.then(function(choiceResult) {
                            if (choiceResult.outcome === 'accepted') {
                                console.log('User accepted the install prompt');
                            } else {
                                console.log('User dismissed the install prompt');
                            }
                            deferredPrompt = null;
                            installBtn.remove();
                        });
                    }
                });

                document.body.appendChild(installBtn);

                // Auto-hide after 10 seconds
                setTimeout(function() {
                    if (installBtn && installBtn.parentNode) {
                        installBtn.remove();
                    }
                }, 10000);
            }
        }

        // Handle successful installation
        window.addEventListener('appinstalled', function(evt) {
            console.log('App was installed successfully');
            // Remove install button if it exists
            const installBtn = document.getElementById('pwa-install-btn');
            if (installBtn) {
                installBtn.remove();
            }
        });
    </script>
</body>
</html>
