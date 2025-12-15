<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile-specific meta tags for better performance -->
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-touch-fullscreen" content="yes">

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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

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
    /* Professional Office Theme Variables */
    :root {
        --primary-blue: #2563eb;
        --primary-light: #3b82f6;
        --secondary-blue: #1e40af;
        --accent-color: #0ea5e9;
        --success-color: #059669;
        --warning-color: #d97706;
        --danger-color: #dc2626;
        --light-gray: #f8fafc;
        --medium-gray: #e2e8f0;
        --dark-gray: #334155;
        --text-dark: #1e293b;
        --text-light: #64748b;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        line-height: 1.6;
        background-color: #ffffff;
        color: var(--text-dark);
        overflow-x: hidden;
        background-image:
            linear-gradient(135deg, rgba(37, 99, 235, 0.02) 0%, transparent 50%),
            linear-gradient(45deg, rgba(59, 130, 246, 0.02) 0%, transparent 50%);
    }    /* Professional Focus Indicators */
    .focus-ring:focus {
        outline: 2px solid var(--primary-blue);
        outline-offset: 2px;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    /* Smooth transitions for better UX */
    * {
        transition: color 0.2s ease, background-color 0.2s ease, border-color 0.2s ease,
                   box-shadow 0.2s ease, transform 0.2s ease;
    }

    /* Professional hover effects */
    .hover-lift:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .hover-glow:hover {
        box-shadow: 0 0 0 1px var(--primary-blue), 0 4px 16px rgba(37, 99, 235, 0.15);
    }

    /* ========== MODERN ULTRA RESPONSIVE NAVIGATION BAR ========== */

    /* Base Navigation Container */
    .modern-navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 20px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(37, 99, 235, 0.1);
        box-shadow: 0 4px 32px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        height: 70px;
        box-sizing: border-box;
        overflow: visible;
        max-width: 100vw;
    }

    .nav-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
    }

    .modern-navbar.scrolled {
        background: rgba(255, 255, 255, 0.98);
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.15);
        border-bottom-color: rgba(37, 99, 235, 0.2);
    }

    .nav-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 70px;
    }

    /* Brand Logo with Advanced Animation */
    .nav-brand .brand-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .brand-icon {
        position: relative;
        margin-right: 12px;
    }

    .brand-img {
        height: 42px;
        width: auto;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        filter: drop-shadow(0 2px 8px rgba(37, 99, 235, 0.2));
    }

    .brand-glow {
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, var(--primary-blue), var(--accent-color), var(--primary-blue));
        border-radius: 50%;
        opacity: 0;
        filter: blur(8px);
        transition: opacity 0.4s ease;
        z-index: -1;
    }

    .brand-link:hover .brand-img {
        transform: scale(1.1) rotate(2deg);
        filter: drop-shadow(0 4px 16px rgba(37, 99, 235, 0.4));
    }

    .brand-link:hover .brand-glow {
        opacity: 0.6;
        animation: brandPulse 2s ease-in-out infinite;
    }

    .brand-text {
        font-size: 1.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        transition: all 0.3s ease;
    }

    @keyframes brandPulse {
        0%, 100% { transform: scale(1); opacity: 0.6; }
        50% { transform: scale(1.1); opacity: 0.8; }
    }

    /* Desktop Navigation Menu */
    .nav-menu {
        display: flex;
        align-items: center;
        flex: 1;
        justify-content: center;
    }

    .nav-items {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-item {
        position: relative;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 12px 16px;
        text-decoration: none;
        color: var(--text-dark);
        font-weight: 500;
        font-size: 0.95rem;
        border-radius: 12px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        background: transparent;
    }

    .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-color));
        opacity: 0;
        border-radius: 12px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transform: scale(0.8);
        z-index: -1;
    }

    .nav-link:hover::before,
    .nav-item.active .nav-link::before {
        opacity: 0.1;
        transform: scale(1);
    }

    .nav-link:hover,
    .nav-item.active .nav-link {
        color: var(--primary-blue);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.15);
    }

    .nav-icon {
        width: 20px;
        height: 20px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .nav-icon svg {
        width: 100%;
        height: 100%;
        stroke: currentColor;
    }

    .nav-link:hover .nav-icon,
    .nav-item.active .nav-icon {
        transform: scale(1.1);
        filter: drop-shadow(0 2px 4px rgba(37, 99, 235, 0.3));
    }

    .nav-text {
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .nav-indicator {
        position: absolute;
        bottom: -2px;
        left: 50%;
        width: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-blue), var(--accent-color));
        border-radius: 2px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transform: translateX(-50%);
    }

    .nav-link:hover .nav-indicator,
    .nav-item.active .nav-indicator {
        width: 80%;
    }

    /* Dropdown Styles */
    .dropdown-trigger {
        cursor: pointer;
    }

    .nav-arrow {
        width: 16px;
        height: 16px;
        transition: all 0.3s ease;
        margin-left: 4px;
    }

    .dropdown-trigger:hover .nav-arrow,
    .dropdown-trigger[aria-expanded="true"] .nav-arrow {
        transform: rotate(180deg);
    }

    .dropdown-menu {
        position: absolute;
        top: calc(100% + 12px);
        left: 50%;
        transform: translateX(-50%) translateY(-10px);
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(37, 99, 235, 0.1);
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        min-width: 280px;
        z-index: 1000;
    }

    .dropdown-menu.show {
        opacity: 1;
        visibility: visible;
        pointer-events: all;
        transform: translateX(-50%) translateY(0);
    }

    .dropdown-content {
        padding: 16px;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        text-decoration: none;
        color: var(--text-dark);
        border-radius: 10px;
        transition: all 0.3s ease;
        margin-bottom: 4px;
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
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-color));
        transition: all 0.4s ease;
        z-index: -1;
    }

    .dropdown-item:hover::before {
        left: 0;
    }

    .dropdown-item:hover {
        color: white;
        transform: translateX(4px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
    }

    .item-icon {
        width: 20px;
        height: 20px;
        flex-shrink: 0;
    }

    .item-icon svg {
        width: 100%;
        height: 100%;
        stroke: currentColor;
    }

    .item-content {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .item-title {
        font-weight: 600;
        font-size: 0.95rem;
    }

    .item-desc {
        font-size: 0.8rem;
        opacity: 0.7;
    }

    .dropdown-divider {
        height: 1px;
        background: rgba(37, 99, 235, 0.1);
        margin: 8px 0;
        border: none;
    }

    /* User Actions and Authentication */
    .nav-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-shrink: 0;
        min-width: 0;
    }

    .auth-buttons {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: nowrap;
        min-width: 0;
    }

    .btn-auth {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85rem;
        border-radius: 10px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        white-space: nowrap;
        flex-shrink: 0;
    }

    .btn-auth svg {
        width: 18px;
        height: 18px;
    }

    .btn-login {
        color: var(--primary-blue);
        border: 2px solid var(--primary-blue);
        background: transparent;
    }

    .btn-login:hover {
        background: var(--primary-blue);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
    }

    .btn-register {
        color: white;
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-color));
        border: 2px solid transparent;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
    }

    .btn-register:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(37, 99, 235, 0.4);
        color: white;
    }

    .user-menu {
        position: relative;
    }

    .user-trigger {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 8px 16px;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: rgba(37, 99, 235, 0.05);
        border: 1px solid rgba(37, 99, 235, 0.1);
    }

    .user-trigger:hover {
        background: rgba(37, 99, 235, 0.1);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.15);
    }

    .user-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid rgba(37, 99, 235, 0.2);
        transition: all 0.3s ease;
    }

    .user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .avatar-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-color));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
    }

    .user-info {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .user-name {
        font-weight: 600;
        font-size: 0.9rem;
        color: var(--text-dark);
    }

    .user-role {
        font-size: 0.75rem;
        color: var(--text-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .user-dropdown {
        right: 0;
        left: auto;
        transform: translateX(0) translateY(-10px);
        min-width: 220px;
    }

    .user-dropdown.show {
        transform: translateX(0) translateY(0);
    }

    .logout-item:hover {
        background: linear-gradient(135deg, #ef4444, #dc2626) !important;
    }

    .logout-item:hover::before {
        display: none;
    }

    /* Mobile Navigation */
    .mobile-toggle {
        display: none;
        flex-direction: column;
        cursor: pointer;
        padding: 8px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .hamburger {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .hamburger span {
        width: 24px;
        height: 3px;
        background: var(--primary-blue);
        border-radius: 2px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transform-origin: center;
    }

    .mobile-toggle:hover .hamburger span {
        background: var(--accent-color);
    }

    .mobile-toggle.active .hamburger span:nth-child(1) {
        transform: rotate(45deg) translate(6px, 6px);
    }

    .mobile-toggle.active .hamburger span:nth-child(2) {
        opacity: 0;
        transform: scale(0);
    }

    .mobile-toggle.active .hamburger span:nth-child(3) {
        transform: rotate(-45deg) translate(6px, -6px);
    }

    .mobile-nav-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        z-index: 10000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
    }

    .mobile-nav-overlay.show {
        opacity: 1;
        visibility: visible;
    }

    .mobile-nav-content {
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        width: 85vw;
        max-width: 400px;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        transform: translateX(100%);
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        overflow-y: auto;
        overflow-x: hidden;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        height: 100vh;
    }

    .mobile-nav-overlay.show .mobile-nav-content {
        transform: translateX(0);
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .btn:active {
        transform: translateY(0);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        border: none;
        color: white;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.25);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, var(--secondary-blue) 0%, var(--primary-blue) 100%);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.35);
        color: white;
    }

    .btn-outline-primary {
        border: 2px solid var(--primary-blue);
        color: var(--primary-blue);
        background: transparent;
        font-weight: 600;
    }

    .btn-outline-primary:hover {
        background: var(--primary-blue);
        color: white;
        border-color: var(--primary-blue);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.25);
    }

    /* Mobile Navigation Content */
    .mobile-nav-header {
        padding: 16px 20px;
        border-bottom: 1px solid rgba(37, 99, 235, 0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: rgba(37, 99, 235, 0.05);
        width: 100%;
        box-sizing: border-box;
        min-height: 64px;
        position: sticky;
        top: 0;
        z-index: 1001;
        flex-shrink: 0;
    }

    .mobile-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--primary-blue);
    }

    .mobile-brand img {
        height: 32px;
        width: auto;
    }

    .mobile-nav-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--primary-blue);
    }

    .mobile-close {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(37, 99, 235, 0.1);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .mobile-close:hover {
        background: rgba(37, 99, 235, 0.2);
        transform: rotate(90deg);
    }

    .mobile-nav-menu {
        padding: 0;
        width: 100%;
        box-sizing: border-box;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .mobile-nav-items {
        padding: 0;
        width: 100%;
        box-sizing: border-box;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .mobile-nav-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 18px 24px;
        text-decoration: none;
        color: var(--text-dark);
        font-weight: 600;
        font-size: 1.1rem;
        border-bottom: 1px solid rgba(37, 99, 235, 0.05);
        transition: all 0.3s ease;
        width: 100%;
        box-sizing: border-box;
        min-height: 60px;
    }

    .mobile-nav-item svg {
        width: 22px;
        height: 22px;
        color: var(--primary-blue);
    }

    .mobile-nav-item:hover,
    .mobile-nav-item.active {
        background: rgba(37, 99, 235, 0.05);
        color: var(--primary-blue);
        padding-left: 32px;
    }

    .mobile-auth-section {
        padding: 20px 24px 24px;
        border-top: 1px solid rgba(37, 99, 235, 0.1);
        background: rgba(37, 99, 235, 0.02);
        width: 100%;
        box-sizing: border-box;
        margin-top: auto;
        flex-shrink: 0;
    }

    .mobile-user-info {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
        padding: 16px;
        background: rgba(37, 99, 235, 0.05);
        border-radius: 12px;
    }

    .mobile-auth-buttons {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .mobile-auth-buttons .btn-auth {
        justify-content: center;
        padding: 14px 20px;
        font-size: 1rem;
    }

    .mobile-auth-section {
        padding: 20px;
        border-top: 1px solid rgba(37, 99, 235, 0.1);
        margin-top: 20px;
    }

    .mobile-auth-btn {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 16px 20px;
        margin-bottom: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        justify-content: center;
        width: 100%;
        box-sizing: border-box;
        min-height: 56px;
    }

    .mobile-auth-btn svg {
        width: 20px;
        height: 20px;
    }

    .mobile-auth-btn.login {
        color: var(--primary-blue);
        border: 2px solid var(--primary-blue);
        background: transparent;
    }

    .mobile-auth-btn.login:hover {
        background: var(--primary-blue);
        color: white;
    }

    .mobile-auth-btn.register {
        color: white;
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-color));
        border: 2px solid transparent;
    }

    .mobile-auth-btn.register:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        color: white;
    }

    /* Mobile User Section */
    .mobile-user-section {
        padding: 20px;
        border-top: 1px solid rgba(37, 99, 235, 0.1);
        margin-top: 20px;
    }

    .mobile-user-info {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 20px;
        padding: 16px;
        background: rgba(37, 99, 235, 0.05);
        border-radius: 12px;
    }

    .mobile-user-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid rgba(37, 99, 235, 0.2);
    }

    .mobile-user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .mobile-avatar-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-color));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .mobile-user-details {
        flex: 1;
    }

    .mobile-user-name {
        display: block;
        font-weight: 600;
        font-size: 1.1rem;
        color: var(--text-dark);
        margin-bottom: 4px;
    }

    .mobile-user-role {
        font-size: 0.85rem;
        color: var(--text-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .mobile-user-actions {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .mobile-user-action {
        display: flex;
        align-items: center;
        padding: 12px 16px;
        text-decoration: none;
        color: var(--text-dark);
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.3s ease;
        background: rgba(37, 99, 235, 0.05);
    }

    .mobile-user-action:hover {
        background: rgba(37, 99, 235, 0.1);
        color: var(--primary-blue);
        transform: translateX(5px);
    }

    .mobile-user-action.logout {
        color: #ef4444;
        background: rgba(239, 68, 68, 0.05);
    }

    .mobile-user-action.logout:hover {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
    }

    /* Mobile Navigation Groups (Dropdowns) */
    .mobile-nav-group {
        border-bottom: 1px solid rgba(37, 99, 235, 0.05);
    }

    .mobile-nav-group-header {
        display: flex;
        align-items: center;
        padding: 18px 24px;
        cursor: pointer;
        font-weight: 600;
        font-size: 1.1rem;
        color: var(--text-dark);
        transition: all 0.3s ease;
        background: transparent;
        width: 100%;
        box-sizing: border-box;
        min-height: 60px;
        border-bottom: 1px solid rgba(37, 99, 235, 0.05);
    }

    .mobile-nav-group-header:hover {
        background: rgba(37, 99, 235, 0.05);
        color: var(--primary-blue);
    }

    .mobile-nav-group-header.active {
        background: rgba(37, 99, 235, 0.1);
        color: var(--primary-blue);
    }

    .mobile-nav-icon {
        width: 22px;
        height: 22px;
        margin-right: 16px;
        color: var(--primary-blue);
    }

    .mobile-nav-icon svg {
        width: 100%;
        height: 100%;
    }

    .mobile-arrow {
        margin-left: auto;
        width: 16px;
        height: 16px;
        transition: transform 0.3s ease;
        color: var(--text-light);
    }

    .mobile-nav-group-header.active .mobile-arrow {
        transform: rotate(90deg);
        color: var(--primary-blue);
    }

    .mobile-nav-group-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        background: rgba(37, 99, 235, 0.02);
    }

    .mobile-nav-group-content.show {
        max-height: 300px;
    }

    .mobile-nav-subitem {
        display: block;
        padding: 12px 24px 12px 62px;
        text-decoration: none;
        color: var(--text-dark);
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.3s ease;
        border-left: 3px solid transparent;
    }

    .mobile-nav-subitem:hover {
        background: rgba(37, 99, 235, 0.05);
        color: var(--primary-blue);
        border-left-color: var(--primary-blue);
        padding-left: 66px;
    }

    /* Navigation consistency fix */
    .modern-navbar {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(20px) !important;
        -webkit-backdrop-filter: blur(20px) !important;
    }

    /* Ensure proper page content positioning */
    body {
        margin: 0;
        padding: 0;
    }

    main {
        margin-top: 0 !important;
        padding-top: 0 !important;
    }

    /* Special handling for SLDRC app page */
    .app-banner + * {
        margin-top: 0;
    }

    .modern-navbar.scrolled {
        background: rgba(255, 255, 255, 0.98) !important;
    }

    /* Modern Navigation Responsive Design */
    @media (max-width: 1200px) {
        .nav-actions {
            gap: 8px;
        }

        .auth-buttons {
            gap: 6px;
        }

        .btn-auth {
            padding: 6px 12px;
            font-size: 0.8rem;
            gap: 4px;
        }

        .btn-auth svg {
            width: 16px;
            height: 16px;
        }
    }

    @media (max-width: 1024px) {
        .nav-menu {
            display: none;
        }

        .mobile-toggle {
            display: flex;
        }

        .nav-actions .auth-buttons {
            display: none;
        }

        .nav-actions .user-menu {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .modern-navbar {
            padding: 12px 16px;
        }

        .brand-logo {
            font-size: 1.3rem;
        }

        .logo-text {
            font-size: 1.3rem;
        }

        .mobile-nav-content {
            width: 90vw;
            max-width: 350px;
        }

        .mobile-nav-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100vw;
            height: 100vh;
        }
    }

    @media (max-width: 480px) {
        .modern-navbar {
            padding: 10px 12px;
        }

        .brand-logo {
            font-size: 1.2rem;
        }

        .logo-text {
            font-size: 1.2rem;
        }

        .mobile-nav-content {
            width: 95vw;
            max-width: 320px;
        }

        .mobile-nav-item {
            padding: 16px 20px;
            font-size: 1rem;
            min-height: 56px;
        }

        .mobile-nav-group-header {
            padding: 16px 20px;
            font-size: 1rem;
            min-height: 56px;
        }

        .mobile-auth-btn {
            padding: 14px 16px;
            font-size: 1rem;
            min-height: 52px;
        }

        .mobile-auth-section {
            padding: 16px 20px 20px;
        }
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
        background: linear-gradient(to right, transparent, var(--accent-blue), transparent);
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
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        color: white;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
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
        background: linear-gradient(90deg, transparent, var(--accent-blue), transparent);
    }

    .footer h6 {
        font-family: 'Inter', sans-serif;
        font-weight: 700;
        border-bottom: 2px solid var(--accent-blue);
        padding-bottom: 0.75rem;
        margin-bottom: 1.5rem;
        display: inline-block;
        color: white;
        font-size: 1.1rem;
    }

    .footer a {
        transition: all 0.3s ease;
        color: rgba(255, 255, 255, 0.85);
        font-weight: 500;
    }

    .footer a:hover {
        color: white !important;
        text-shadow: 0 2px 8px rgba(255, 255, 255, 0.3);
        padding-left: 5px;
        transform: translateX(2px);
    }

    /* Mobile-First Responsive Navigation */
    .navbar-collapse {
        transition: all 0.3s ease;
        overflow: visible;
    }

    .navbar-collapse:not(.show) {
        display: none !important;
    }

    .navbar-collapse.show {
        display: block !important;
        animation: mobileSlideDown 0.4s ease forwards;
        visibility: visible !important;
        opacity: 1 !important;
    }

    @keyframes mobileSlideDown {
        0% {
            opacity: 0;
            transform: translateY(-15px);
            max-height: 0;
        }
        100% {
            opacity: 1;
            transform: translateY(0);
            max-height: 500px;
        }
    }

    /* Professional Mobile & Desktop Navigation */

    /* Desktop Navigation (Default) */
    .navbar-nav {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
    }

    .navbar-nav .nav-item {
        margin: 0 0.25rem;
        display: block !important;
        visibility: visible !important;
    }

    .navbar-nav .nav-link {
        display: block !important;
        padding: 0.75rem 1rem;
        color: var(--text-dark) !important;
        text-decoration: none;
        transition: all 0.3s ease;
        border-radius: 6px;
        font-weight: 500;
        visibility: visible !important;
        opacity: 1 !important;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: var(--primary-blue) !important;
        background: rgba(37, 99, 235, 0.08);
    }

    /* Desktop/Large Screen Navigation Visibility Fix */
    @media (min-width: 992px) {
        .navbar-collapse {
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        .navbar-nav {
            display: flex !important;
            flex-direction: row !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        .navbar-nav .nav-item {
            display: block !important;
            visibility: visible !important;
        }

        .navbar-nav .nav-link {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
    }

    /* Mobile Navigation Optimization */
    @media (max-width: 991.98px) {
        .navbar {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-bottom: 1px solid var(--medium-gray);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            padding: 0.5rem 0;
        }

        .navbar-brand {
            font-size: 1.4rem;
            font-weight: 700;
        }

        .navbar-toggler {
            border: 2px solid var(--primary-blue);
            background: rgba(37, 99, 235, 0.1);
            border-radius: 8px;
            padding: 0.5rem 0.75rem;
            min-width: 44px;
            min-height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.25);
            border-color: var(--primary-blue);
            outline: none;
        }

        .navbar-toggler:hover {
            background: rgba(37, 99, 235, 0.15);
            border-color: var(--secondary-blue);
        }

        .navbar-toggler:not(.collapsed) {
            background: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .navbar-toggler:not(.collapsed) .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23ffffff' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2.5' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Mobile Navigation Menu Container */
        .navbar-collapse {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--medium-gray);
            border-top: none;
            border-radius: 0 0 12px 12px;
            margin-top: 0.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
        }

        .navbar-nav {
            padding: 1rem;
            flex-direction: column;
            width: 100%;
        }

        .navbar-nav .nav-item {
            margin: 0.25rem 0;
            width: 100%;
        }

        .navbar-nav .nav-link {
            padding: 0.875rem 1rem;
            margin: 0;
            border-radius: 8px;
            color: var(--text-dark);
            font-weight: 500;
            font-size: 1rem;
            min-height: 44px;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus,
        .navbar-nav .nav-link.active {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        /* Mobile Dropdown Styling */
        .navbar-nav .dropdown-menu {
            position: static;
            display: none;
            width: 100%;
            margin: 0.5rem 0 0.5rem 1rem;
            background: var(--light-gray);
            border: 1px solid var(--medium-gray);
            border-radius: 8px;
            box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.06);
            padding: 0.5rem;
            float: none;
            transform: none;
        }

        .navbar-nav .dropdown-menu.show {
            display: block;
            animation: dropdownSlideDown 0.3s ease forwards;
        }

        .navbar-nav .dropdown-item {
            padding: 0.75rem 1rem;
            color: var(--text-dark);
            border-radius: 6px;
            margin: 0.125rem 0;
            font-weight: 500;
            min-height: 44px;
            display: flex;
            align-items: center;
            transition: all 0.25s ease;
        }

        .navbar-nav .dropdown-item:hover,
        .navbar-nav .dropdown-item:focus {
            background: var(--primary-blue);
            color: white;
            transform: translateX(4px);
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.25);
        }

        /* Dropdown Toggle Arrow */
        .navbar-nav .dropdown-toggle::after {
            margin-left: auto;
            transition: transform 0.3s ease;
        }

        .navbar-nav .dropdown-toggle[aria-expanded="true"]::after {
            transform: rotate(180deg);
        }

        /* User Profile Mobile Adjustments */
        .navbar-nav .dropdown-toggle .navbar-avatar,
        .navbar-nav .dropdown-toggle .navbar-avatar-placeholder {
            width: 28px;
            height: 28px;
            font-size: 0.75rem;
        }

        .navbar-username {
            font-size: 0.9rem;
            margin-left: 0.5rem;
        }

        /* Login/Register Buttons on Mobile */
        .navbar-nav .btn {
            width: 100%;
            margin: 0.25rem 0;
            justify-content: center;
        }
    }

    @keyframes dropdownSlideDown {
        0% {
            opacity: 0;
            max-height: 0;
            padding-top: 0;
            padding-bottom: 0;
        }
        100% {
            opacity: 1;
            max-height: 300px;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
    }

    /* Small Mobile Devices (iPhone SE, etc.) */
    @media (max-width: 576px) {
        .navbar {
            padding: 0.4rem 0;
        }

        .navbar-brand {
            font-size: 1.2rem;
        }

        .navbar-nav .nav-link {
            padding: 0.75rem 0.875rem !important;
            font-size: 0.95rem;
        }

        .navbar-nav .dropdown-item {
            padding: 0.625rem 0.875rem !important;
            font-size: 0.9rem;
        }
    }

    /* Tablet Landscape */
    @media (max-width: 991.98px) and (orientation: landscape) {
        .navbar-collapse {
            max-height: 60vh;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch; /* iOS smooth scrolling */
        }
    }

    /* Fix for iOS Safari viewport issues */
    @supports (-webkit-touch-callout: none) {
        .navbar-collapse {
            min-height: 0;
        }

        /* iOS Safari address bar height fix */
        body {
            min-height: 100vh;
            min-height: -webkit-fill-available;
        }

        html {
            height: -webkit-fill-available;
        }
    }

    /* Prevent text selection on navigation elements */
    .navbar-nav,
    .navbar-toggler,
    .dropdown-toggle {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -webkit-tap-highlight-color: transparent;
    }

    /* Smooth scrolling for all devices */
    html {
        scroll-behavior: smooth;
        -webkit-text-size-adjust: 100%;
    }

    /* Fix for Android Chrome viewport */
    @media screen and (max-device-width: 767px) {
        html {
            -webkit-text-size-adjust: none;
        }
    }

    /* Better touch targets for mobile */
    @media (max-width: 991.98px) {
        .nav-link,
        .dropdown-item,
        .navbar-toggler {
            -webkit-tap-highlight-color: rgba(37, 99, 235, 0.1);
            tap-highlight-color: rgba(37, 99, 235, 0.1);
        }

        /* Ensure clickable elements have adequate spacing */
        .navbar-nav .nav-item + .nav-item {
            margin-top: 0.25rem;
        }

        /* Improve dropdown visibility on small screens */
        .navbar-nav .dropdown-menu {
            max-height: 250px;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* Fix for iOS momentum scrolling */
        .navbar-collapse {
            -webkit-overflow-scrolling: touch;
        }
    }

    /* High DPI displays optimization */
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .navbar-toggler-icon {
            transform: scale(0.9);
        }
    }

    /* Dark mode consideration for mobile devices */
    @media (prefers-color-scheme: dark) {
        @media (max-width: 991.98px) {
            .navbar {
                background: rgba(30, 41, 59, 0.98) !important;
            }

            .navbar-collapse {
                background: rgba(30, 41, 59, 0.98);
                border-color: rgba(100, 116, 139, 0.3);
            }
        }
    }

    /* Accessibility improvements for mobile */
    @media (max-width: 991.98px) {
        /* Focus indicators for keyboard navigation */
        .navbar-nav .nav-link:focus,
        .navbar-nav .dropdown-item:focus,
        .navbar-toggler:focus {
            outline: 2px solid var(--primary-blue);
            outline-offset: 2px;
        }

        /* Better contrast for touched elements */
        .navbar-nav .nav-link:active,
        .navbar-nav .dropdown-item:active {
            background: var(--secondary-blue) !important;
        }
    }

    /* Animation performance optimization */
    .navbar-collapse,
    .dropdown-menu,
    .nav-link,
    .dropdown-item {
        will-change: transform, opacity;
        transform: translateZ(0); /* Force hardware acceleration */
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
        font-family: 'Inter', sans-serif;
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
        border-top: 2px solid var(--primary-blue);
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
        color: var(--primary-blue);
        margin-bottom: 0.5rem;
        font-weight: 600;
        font-family: 'Inter', sans-serif;
    }

    .cookie-consent-text p {
        margin-bottom: 0;
        color: var(--medium-gray);
    }

    .cookie-consent-text a {
        color: var(--primary-blue);
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
        font-family: 'Inter', sans-serif;
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
        background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
        color: white;
        box-shadow: 0 2px 10px rgba(59, 130, 246, 0.3);
    }

    .cookie-btn-accept:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.5);
    }

    .cookie-btn-decline {
        background: transparent;
        color: var(--medium-gray);
        border: 1px solid var(--light-gray);
    }

    .cookie-btn-decline:hover {
        background: var(--light-gray);
        color: var(--text-dark);
        border-color: var(--medium-gray);
    }

    .cookie-btn-settings {
        background: transparent;
        color: var(--primary-blue);
        border: 1px solid var(--primary-blue);
        font-size: 0.8rem;
        padding: 0.4rem 1rem;
    }

    .cookie-btn-settings:hover {
        background: rgba(59, 130, 246, 0.1);
        box-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
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
        border: 2px solid rgba(59, 130, 246, 0.3);
        transition: all 0.3s ease;
    }

    .navbar-avatar:hover {
        border-color: var(--primary-blue);
        box-shadow: 0 0 8px rgba(59, 130, 246, 0.4);
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
        border: 2px solid var(--primary-blue);
        transition: all 0.3s ease;
    }

    .navbar-avatar-placeholder:hover {
        border-color: var(--secondary-blue);
        box-shadow: 0 0 8px rgba(59, 130, 246, 0.4);
        transform: scale(1.05);
    }

    .navbar-username {
        color: var(--text-dark);
        font-weight: 500;
        transition: color 0.3s ease;
    }

    #userDropdown:hover .navbar-username {
        color: var(--primary-blue);
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
<body class="@yield('body-class')">
    <!-- Custom Cursor -->

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
        <!-- Modern Ultra Responsive Navigation Bar -->
        <nav class="modern-navbar" id="modernNav">
            <div class="nav-container">
                <!-- Brand Logo with Advanced Animation -->
                <div class="nav-brand">
                    <a href="{{ route('home') }}" class="brand-link">
                        <div class="brand-icon">
                            <img src="{{ asset('images/logo.png') }}" alt="EZofz.lk" class="brand-img">
                            <div class="brand-glow"></div>
                        </div>
                        <span class="brand-text">.lk</span>
                    </a>
                </div>

                <!-- Desktop Navigation Menu -->
                <div class="nav-menu" id="navMenu">
                    <div class="nav-items">
                        <!-- Home -->
                        <div class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="nav-link">
                                <div class="nav-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                        <polyline points="9,22 9,12 15,12 15,22"/>
                                    </svg>
                                </div>
                                <span class="nav-text">Home</span>
                                <div class="nav-indicator"></div>
                            </a>
                        </div>

                        <!-- Library Dropdown -->
                        <div class="nav-item dropdown">
                            <div class="nav-link dropdown-trigger" data-dropdown="library">
                                <div class="nav-icon" aria-hidden="true">
                                    <!-- Restored "Library / Book" icon (accessible, uses currentColor) -->
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" role="img" aria-label="Library">
                                        <path d="M3 6.5A2.5 2.5 0 0 1 5.5 4H20" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M3 6.5v11A2.5 2.5 0 0 0 5.5 20H20" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M3 6.5c0-1.38 1.12-2.5 2.5-2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 4v16" stroke-linecap="round" stroke-linejoin="round" opacity="0.6"/>
                                        <path d="M20 4v16" stroke-linecap="round" stroke-linejoin="round" opacity="0.6"/>
                                    </svg>
                                </div>
                                <span class="nav-text">Library</span>
                                <div class="nav-arrow">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="6,9 12,15 18,9"/>
                                    </svg>
                                </div>
                                <div class="nav-indicator"></div>
                            </div>
                            <div class="dropdown-menu" id="library-dropdown">
                                <div class="dropdown-content">
                                    <a href="{{ Auth::check() ? route('penal-code.index') : route('penal-code.public') }}" class="dropdown-item">
                                        <div class="item-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                                <polyline points="14,2 14,8 20,8"/>
                                                <line x1="16" y1="13" x2="8" y2="13"/>
                                                <line x1="16" y1="17" x2="8" y2="17"/>
                                                <polyline points="10,9 9,9 8,9"/>
                                            </svg>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Penal Code Library</span>
                                            <span class="item-desc">{{ Auth::check() ? 'Enhanced features & notes' : 'Legal references and sections' }}</span>
                                        </div>
                                    </a>
                                    <a href="{{ Auth::check() ? route('criminal-procedure-code.index') : route('criminal-procedure-code.public') }}" class="dropdown-item">
                                        <div class="item-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                                <polyline points="14,2 14,8 20,8"/>
                                                <line x1="16" y1="13" x2="8" y2="13"/>
                                                <line x1="16" y1="17" x2="8" y2="17"/>
                                            </svg>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Criminal Procedure Code</span>
                                            <span class="item-desc">{{ Auth::check() ? 'Enhanced features & notes' : 'Court procedures and processes' }}</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('police.directory') }}" class="dropdown-item">
                                        <div class="item-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                            </svg>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Police Directory</span>
                                            <span class="item-desc">Station contacts and info</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Tools Dropdown -->
                        <div class="nav-item dropdown">
                            <div class="nav-link dropdown-trigger" data-dropdown="tools">
                                <div class="nav-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                                    </svg>
                                </div>
                                <span class="nav-text">Tools</span>
                                <div class="nav-arrow">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="6,9 12,15 18,9"/>
                                    </svg>
                                </div>
                                <div class="nav-indicator"></div>
                            </div>
                            <div class="dropdown-menu" id="tools-dropdown">
                                <div class="dropdown-content">
                                    <a href="{{ route('tools.unicode-typing') }}" class="dropdown-item">
                                        <div class="item-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <rect x="2" y="4" width="20" height="16" rx="2"/>
                                                <path d="M6 8h.001M10 8h.001M14 8h.001M18 8h.001M8 12h.001M12 12h.001M16 12h.001M6 16h.001"/>
                                            </svg>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Sinhala Unicode Typing</span>
                                            <span class="item-desc">Type in Sinhala easily</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('tools.name-converter') }}" class="dropdown-item">
                                        <div class="item-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                                <circle cx="12" cy="7" r="4"/>
                                            </svg>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Name Converter</span>
                                            <span class="item-desc">Full name to initials</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('tools.sl-idcard-details') }}" class="dropdown-item">
                                        <div class="item-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                                                <line x1="8" y1="21" x2="16" y2="21"/>
                                                <line x1="12" y1="17" x2="12" y2="21"/>
                                            </svg>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">ID Card Details</span>
                                            <span class="item-desc">SL ID verification tool</span>
                                        </div>
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a href="{{ route('sldrc.app') }}" class="dropdown-item">
                                        <div class="item-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                                                <line x1="8" y1="21" x2="16" y2="21"/>
                                                <line x1="12" y1="17" x2="12" y2="21"/>
                                                <path d="M7 8h10M7 12h10"/>
                                            </svg>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">SLDRC App</span>
                                            <span class="item-desc">Vehicle management app</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Downloads Dropdown -->
                        <div class="nav-item dropdown">
                            <div class="nav-link dropdown-trigger" data-dropdown="downloads">
                                <div class="nav-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                        <polyline points="7,10 12,15 17,10"/>
                                        <line x1="12" y1="15" x2="12" y2="3"/>
                                    </svg>
                                </div>
                                <span class="nav-text">Downloads</span>
                                <div class="nav-arrow">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="6,9 12,15 18,9"/>
                                    </svg>
                                </div>
                                <div class="nav-indicator"></div>
                            </div>
                            <div class="dropdown-menu" id="downloads-dropdown">
                                <div class="dropdown-content">
                                    <a href="{{ route('documents.index') }}" class="dropdown-item">
                                        <div class="item-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M3 7v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2H5a2 2 0 0 0-2-2V7z"/>
                                                <path d="M8 21l0-12"/>
                                                <path d="M16 21l0-12"/>
                                            </svg>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">All Downloads</span>
                                            <span class="item-desc">Browse all documents</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('documents.law') }}" class="dropdown-item">
                                        <div class="item-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                                <polyline points="14,2 14,8 20,8"/>
                                            </svg>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Law Documents</span>
                                            <span class="item-desc">Legal forms and papers</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('documents.police') }}" class="dropdown-item">
                                        <div class="item-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                            </svg>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-title">Police Documents</span>
                                            <span class="item-desc">Official police forms</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>



                        <!-- About -->
                        <div class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                            <a href="{{ route('about') }}" class="nav-link">
                                <div class="nav-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"/>
                                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                                        <line x1="12" y1="17" x2="12.01" y2="17"/>
                                    </svg>
                                </div>
                                <span class="nav-text">About</span>
                                <div class="nav-indicator"></div>
                            </a>
                        </div>

                        <!-- Contact -->
                        <div class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                            <a href="{{ route('contact') }}" class="nav-link">
                                <div class="nav-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                        <polyline points="22,6 12,13 2,6"/>
                                    </svg>
                                </div>
                                <span class="nav-text">Contact</span>
                                <div class="nav-indicator"></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- User Actions -->
                <div class="nav-actions">
                    @guest
                        <div class="auth-buttons">
                            <a href="{{ route('login') }}" class="btn-auth btn-login">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                                    <polyline points="10,17 15,12 10,7"/>
                                    <line x1="15" y1="12" x2="3" y2="12"/>
                                </svg>
                                <span>Login</span>
                            </a>
                            <a href="{{ route('register') }}" class="btn-auth btn-register">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                    <circle cx="8.5" cy="7" r="4"/>
                                    <line x1="20" y1="8" x2="20" y2="14"/>
                                    <line x1="23" y1="11" x2="17" y2="11"/>
                                </svg>
                                <span>Register</span>
                            </a>
                        </div>
                    @else
                        <div class="user-menu dropdown">
                            <div class="user-trigger dropdown-trigger" data-dropdown="user-dropdown">
                                <div class="user-avatar">
                                    @if(Auth::user()->avatar)
                                        <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}">
                                    @else
                                        <div class="avatar-placeholder">
                                            {{ substr(Auth::user()->name, 0, 2) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="user-info">
                                    <span class="user-name">{{ Auth::user()->name }}</span>
                                    <span class="user-role">{{ Auth::user()->isAdmin() ? 'Admin' : 'User' }}</span>
                                </div>
                                <div class="nav-arrow">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="6,9 12,15 18,9"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="dropdown-menu user-dropdown" id="user-dropdown">
                                <div class="dropdown-content">
                                    @if(Auth::user()->isAdmin())
                                        <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                            <div class="item-icon">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <rect x="3" y="3" width="7" height="9"/>
                                                    <rect x="14" y="3" width="7" height="5"/>
                                                    <rect x="14" y="12" width="7" height="9"/>
                                                    <rect x="3" y="16" width="7" height="5"/>
                                                </svg>
                                            </div>
                                            <span class="item-title">Admin Dashboard</span>
                                        </a>
                                    @else
                                        <a href="{{ route('dashboard') }}" class="dropdown-item">
                                            <div class="item-icon">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                                </svg>
                                            </div>
                                            <span class="item-title">Dashboard</span>
                                        </a>
                                    @endif
                                    <a href="{{ route('user.profile') }}" class="dropdown-item">
                                        <div class="item-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                                <circle cx="12" cy="7" r="4"/>
                                            </svg>
                                        </div>
                                        <span class="item-title">My Profile</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('logout') }}" class="dropdown-item logout-item"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <div class="item-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                                <polyline points="16,17 21,12 16,7"/>
                                                <line x1="21" y1="12" x2="9" y2="12"/>
                                            </svg>
                                        </div>
                                        <span class="item-title">Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>

                <!-- Mobile Menu Toggle -->
                <div class="mobile-toggle" id="mobileToggle">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation Overlay -->
            <div class="mobile-nav-overlay" id="mobileNavOverlay">
                <div class="mobile-nav-content">
                    <div class="mobile-nav-header">
                        <div class="mobile-brand">
                            <img src="{{ asset('images/logo.png') }}" alt="EZofz.lk">
                            <span>EZofz.lk</span>
                        </div>
                        <button class="mobile-close" id="mobileClose">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"/>
                                <line x1="6" y1="6" x2="18" y2="18"/>
                            </svg>
                        </button>
                    </div>

                    <div class="mobile-nav-menu">
                        <!-- Mobile Home -->
                        <a href="{{ route('home') }}" class="mobile-nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <div class="mobile-nav-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                </svg>
                            </div>
                            <span>Home</span>
                        </a>

                        <!-- Mobile Databases -->
                        <div class="mobile-nav-group">
                            <div class="mobile-nav-group-header" data-mobile-group="databases">
                                <div class="mobile-nav-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <ellipse cx="12" cy="5" rx="9" ry="3"/>
                                        <path d="M3 5v14c0 1.66 4.03 3 9 3s9-1.34 9-3V5"/>
                                    </svg>
                                </div>
                                <span>Databases</span>
                                <div class="mobile-arrow">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="9,18 15,12 9,6"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="mobile-nav-group-content" id="mobile-databases">
                                <a href="{{ Auth::check() ? route('penal-code.index') : route('penal-code.public') }}" class="mobile-nav-subitem">
                                    <span>Penal Code Database</span>
                                </a>
                                <a href="{{ Auth::check() ? route('criminal-procedure-code.index') : route('criminal-procedure-code.public') }}" class="mobile-nav-subitem">
                                    <span>Criminal Procedure Code</span>
                                </a>
                                <a href="{{ route('police.directory') }}" class="mobile-nav-subitem">
                                    <span>Police Directory</span>
                                </a>
                            </div>
                        </div>

                        <!-- Mobile Tools -->
                        <div class="mobile-nav-group">
                            <div class="mobile-nav-group-header" data-mobile-group="tools">
                                <div class="mobile-nav-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                                    </svg>
                                </div>
                                <span>Tools</span>
                                <div class="mobile-arrow">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="9,18 15,12 9,6"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="mobile-nav-group-content" id="mobile-tools">
                                <a href="{{ route('tools.unicode-typing') }}" class="mobile-nav-subitem">
                                    <span>Sinhala Unicode Typing</span>
                                </a>
                                <a href="{{ route('tools.name-converter') }}" class="mobile-nav-subitem">
                                    <span>Name Converter</span>
                                </a>
                                <a href="{{ route('tools.sl-idcard-details') }}" class="mobile-nav-subitem">
                                    <span>ID Card Details</span>
                                </a>
                                <a href="{{ route('sldrc.app') }}" class="mobile-nav-subitem">
                                    <span>SLDRC App</span>
                                </a>
                            </div>
                        </div>

                        <!-- Mobile Downloads -->
                        <div class="mobile-nav-group">
                            <div class="mobile-nav-group-header" data-mobile-group="downloads">
                                <div class="mobile-nav-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                        <polyline points="7,10 12,15 17,10"/>
                                    </svg>
                                </div>
                                <span>Downloads</span>
                                <div class="mobile-arrow">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="9,18 15,12 9,6"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="mobile-nav-group-content" id="mobile-downloads">
                                <a href="{{ route('documents.index') }}" class="mobile-nav-subitem">
                                    <span>All Downloads</span>
                                </a>
                                <a href="{{ route('documents.law') }}" class="mobile-nav-subitem">
                                    <span>Law Documents</span>
                                </a>
                                <a href="{{ route('documents.police') }}" class="mobile-nav-subitem">
                                    <span>Police Documents</span>
                                </a>
                            </div>
                        </div>



                        <!-- Mobile About -->
                        <a href="{{ route('about') }}" class="mobile-nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                            <div class="mobile-nav-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                                </svg>
                            </div>
                            <span>About</span>
                        </a>

                        <!-- Mobile Contact -->
                        <a href="{{ route('contact') }}" class="mobile-nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                            <div class="mobile-nav-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                </svg>
                            </div>
                            <span>Contact</span>
                        </a>

                        @guest
                            <div class="mobile-auth-section">
                                <a href="{{ route('login') }}" class="mobile-auth-btn login">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                                        <polyline points="10,17 15,12 10,7"/>
                                    </svg>
                                    <span>Login</span>
                                </a>
                                <a href="{{ route('register') }}" class="mobile-auth-btn register">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                        <circle cx="8.5" cy="7" r="4"/>
                                    </svg>
                                    <span>Register</span>
                                </a>
                            </div>
                        @else
                            <div class="mobile-user-section">
                                <div class="mobile-user-info">
                                    <div class="mobile-user-avatar">
                                        @if(Auth::user()->avatar)
                                            <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}">
                                        @else
                                            <div class="mobile-avatar-placeholder">
                                                {{ substr(Auth::user()->name, 0, 2) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mobile-user-details">
                                        <span class="mobile-user-name">{{ Auth::user()->name }}</span>
                                        <span class="mobile-user-role">{{ Auth::user()->isAdmin() ? 'Admin' : 'User' }}</span>
                                    </div>
                                </div>
                                <div class="mobile-user-actions">
                                    @if(Auth::user()->isAdmin())
                                        <a href="{{ route('admin.dashboard') }}" class="mobile-user-action">
                                            <span>Admin Dashboard</span>
                                        </a>
                                    @else
                                        <a href="{{ route('dashboard') }}" class="mobile-user-action">
                                            <span>Dashboard</span>
                                        </a>
                                    @endif
                                    <a href="{{ route('user.profile') }}" class="mobile-user-action">
                                        <span>My Profile</span>
                                    </a>
                                    <a href="{{ route('logout') }}" class="mobile-user-action logout"
                                       onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();">
                                        <span>Logout</span>
                                    </a>
                                    <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
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
                            <li><a href="{{ route('sitemap') }}" class="text-light text-decoration-none">Sitemap</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h6 class="text-white mb-3">Library</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('penal-code.public') }}" class="text-light text-decoration-none">Penal Code</a></li>
                            <li><a href="{{ route('criminal-procedure-code.public') }}" class="text-light text-decoration-none">Criminal Procedure Code</a></li>
                            <li><a href="{{ route('police.directory') }}" class="text-light text-decoration-none">Police Directory</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h6 class="text-white mb-3">Tools</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('tools.unicode-typing') }}" class="text-light text-decoration-none">Unicode Typing</a></li>
                            <li><a href="{{ route('tools.name-converter') }}" class="text-light text-decoration-none">Name Converter</a></li>
                            <li><a href="{{ route('tools.sl-idcard-details') }}" class="text-light text-decoration-none">ID Card Details</a></li>
                            <li><a href="{{ route('sldrc.app') }}" class="text-light text-decoration-none">SLDRC App</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h6 class="text-white mb-3">Downloads</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('documents.law') }}" class="text-light text-decoration-none">Law Documents</a></li>
                            <li><a href="{{ route('documents.police') }}" class="text-light text-decoration-none">Police Documents</a></li>
                            <li><a href="{{ route('documents.index') }}" class="text-light text-decoration-none">All Documents</a></li>
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
                        <p class="mb-0 text-light">Developed by <a href="#" class="text-light text-decoration-none">Ezofz Technology Solutions</a></p>
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

        // Professional interaction effects
        const interactiveElements = document.querySelectorAll('a, button, .nav-link, .dropdown-item, .btn, [role="button"]');

        interactiveElements.forEach(element => {
            element.addEventListener('mouseenter', () => {
                element.style.transition = 'all 0.3s ease';
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

        // Initialize Simple and Reliable Navigation System
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Initializing navigation system...');

            // Wait for Bootstrap to be fully loaded
            setTimeout(function() {
                initializeNavigation();
            }, 100);
        });        // Simple and Reliable Navigation System
        function initializeNavigation() {
            console.log('Setting up navigation...');

            const navToggler = document.querySelector('.navbar-toggler');
            const navCollapse = document.querySelector('#navbarNav');
            const dropdowns = document.querySelectorAll('.dropdown-toggle');

            if (!navToggler || !navCollapse) {
                console.error('Navigation elements not found');
                return;
            }

            // Setup navbar toggle
            setupNavbarToggle(navToggler, navCollapse);

            // Setup dropdowns
            setupDropdowns(dropdowns);

            // Setup outside click to close
            setupOutsideClickClose(navCollapse, navToggler);

            console.log('Navigation setup complete');
        }

        function setupNavbarToggle(toggler, collapse) {
            toggler.addEventListener('click', function(e) {
                e.preventDefault();

                const isExpanded = collapse.classList.contains('show');

                if (isExpanded) {
                    collapse.classList.remove('show');
                    toggler.classList.add('collapsed');
                    toggler.setAttribute('aria-expanded', 'false');
                } else {
                    collapse.classList.add('show');
                    toggler.classList.remove('collapsed');
                    toggler.setAttribute('aria-expanded', 'true');
                }

                console.log('Navbar toggled:', !isExpanded ? 'opened' : 'closed');
            });
        }

        function setupDropdowns(dropdownToggles) {
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const dropdown = this.nextElementSibling;
                    if (!dropdown || !dropdown.classList.contains('dropdown-menu')) {
                        return;
                    }

                    // Close other dropdowns
                    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                        if (menu !== dropdown) {
                            menu.classList.remove('show');
                            const menuToggle = menu.previousElementSibling;
                            if (menuToggle) {
                                menuToggle.setAttribute('aria-expanded', 'false');
                            }
                        }
                    });

                    // Toggle current dropdown
                    const isOpen = dropdown.classList.contains('show');
                    dropdown.classList.toggle('show');
                    this.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');

                    console.log('Dropdown toggled:', this.textContent.trim(), !isOpen ? 'opened' : 'closed');
                });
            });
        }

        function setupOutsideClickClose(navCollapse, navToggler) {
            document.addEventListener('click', function(e) {
                const clickedInNavbar = e.target.closest('.navbar');

                if (!clickedInNavbar && navCollapse.classList.contains('show')) {
                    navCollapse.classList.remove('show');
                    navToggler.classList.add('collapsed');
                    navToggler.setAttribute('aria-expanded', 'false');

                    // Close all dropdowns too
                    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                        menu.classList.remove('show');
                        const toggle = menu.previousElementSibling;
                        if (toggle) {
                            toggle.setAttribute('aria-expanded', 'false');
                        }
                    });
                }
            });
        }

        // Debug function for troubleshooting
        function debugNavigation() {
            const toggler = document.querySelector('.navbar-toggler');
            const collapse = document.querySelector('#navbarNav');

            console.log('Navigation Debug:', {
                togglerExists: !!toggler,
                collapseExists: !!collapse,
                isExpanded: collapse?.classList.contains('show'),
                togglerExpanded: toggler?.getAttribute('aria-expanded'),
                isMobile: window.innerWidth < 992,
                navItemsCount: document.querySelectorAll('.nav-item').length,
                dropdownsCount: document.querySelectorAll('.dropdown-menu').length
            });
        }

        // Make debug available globally
        window.debugNavigation = debugNavigation;
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

    <!-- Modern Navigation JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile navigation elements
            const mobileToggle = document.querySelector('.mobile-toggle');
            const mobileOverlay = document.querySelector('.mobile-nav-overlay');
            const mobileClose = document.querySelector('.mobile-close');

            // Dropdown elements
            const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');
            const userTrigger = document.querySelector('.user-trigger');

            // Mobile navigation groups
            const mobileGroupHeaders = document.querySelectorAll('.mobile-nav-group-header');

            // Mobile menu toggle
            if (mobileToggle && mobileOverlay) {
                mobileToggle.addEventListener('click', function() {
                    mobileToggle.classList.toggle('active');
                    mobileOverlay.classList.toggle('show');
                    document.body.style.overflow = mobileOverlay.classList.contains('show') ? 'hidden' : '';
                });
            }

            // Mobile close button
            if (mobileClose) {
                mobileClose.addEventListener('click', function() {
                    mobileToggle.classList.remove('active');
                    mobileOverlay.classList.remove('show');
                    document.body.style.overflow = '';
                });
            }

            // Close mobile menu when clicking overlay
            if (mobileOverlay) {
                mobileOverlay.addEventListener('click', function(e) {
                    if (e.target === mobileOverlay) {
                        mobileToggle.classList.remove('active');
                        mobileOverlay.classList.remove('show');
                        document.body.style.overflow = '';
                    }
                });
            }

            // Desktop dropdown functionality (includes user dropdown)
            dropdownTriggers.forEach(trigger => {
                const dropdown = trigger.nextElementSibling;
                if (dropdown) {
                    trigger.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        // Close other dropdowns
                        document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                            if (menu !== dropdown) {
                                menu.classList.remove('show');
                            }
                        });

                        // Toggle current dropdown
                        dropdown.classList.toggle('show');
                    });
                }
            });            // Mobile navigation groups toggle
            mobileGroupHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const groupName = this.getAttribute('data-mobile-group');
                    const content = document.getElementById('mobile-' + groupName);

                    if (content) {
                        // Close other groups
                        document.querySelectorAll('.mobile-nav-group-header.active').forEach(otherHeader => {
                            if (otherHeader !== this) {
                                otherHeader.classList.remove('active');
                                const otherGroupName = otherHeader.getAttribute('data-mobile-group');
                                const otherContent = document.getElementById('mobile-' + otherGroupName);
                                if (otherContent) {
                                    otherContent.classList.remove('show');
                                }
                            }
                        });

                        // Toggle current group
                        this.classList.toggle('active');
                        content.classList.toggle('show');
                    }
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function() {
                document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                    menu.classList.remove('show');
                });
            });

            // Prevent dropdown from closing when clicking inside
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                        // Close mobile menu if open
                        if (mobileOverlay && mobileOverlay.classList.contains('show')) {
                            mobileToggle.classList.remove('active');
                            mobileOverlay.classList.remove('show');
                            document.body.style.overflow = '';
                        }
                    }
                });
            });

            // Add scroll effect to navbar
            let lastScrollTop = 0;
            const navbar = document.querySelector('.modern-navbar');

            window.addEventListener('scroll', function() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                if (navbar) {
                    if (scrollTop > 100) {
                        navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                        navbar.style.backdropFilter = 'blur(20px)';
                        navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
                    } else {
                        navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                        navbar.style.backdropFilter = 'blur(10px)';
                        navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.05)';
                    }
                }

                lastScrollTop = scrollTop;
            });

            // Add loading states for navigation items
            document.querySelectorAll('.nav-item a, .mobile-nav-item').forEach(link => {
                link.addEventListener('click', function() {
                    if (this.href && !this.href.includes('#') && !this.target) {
                        this.style.opacity = '0.7';
                        this.style.pointerEvents = 'none';

                        // Reset after 3 seconds as fallback
                        setTimeout(() => {
                            this.style.opacity = '';
                            this.style.pointerEvents = '';
                        }, 3000);
                    }
                });
            });
        });
    </script>
</body>
</html>
