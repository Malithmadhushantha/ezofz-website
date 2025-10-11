<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title', 'Admin Dashboard - EZofz.lk')</title>

    <!-- Preload critical fonts -->
    <link rel="preload" href="https://fonts.bunny.net/css?family=Inter:300,400,500,600,700" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.bunny.net/css?family=Inter:300,400,500,600,700" rel="stylesheet"></noscript>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        /* Professional Admin Theme Variables - Matching Main Website */
        :root {
            --admin-primary: #2563eb;
            --admin-primary-light: #3b82f6;
            --admin-secondary: #1e40af;
            --admin-accent: #0ea5e9;
            --admin-success: #059669;
            --admin-warning: #d97706;
            --admin-danger: #dc2626;
            --admin-dark: #1e293b;
            --admin-light-gray: #f8fafc;
            --admin-medium-gray: #e2e8f0;
            --admin-text-dark: #1e293b;
            --admin-text-light: #64748b;
            --admin-sidebar-bg: linear-gradient(135deg, var(--admin-dark) 0%, #334155 100%);
            --admin-sidebar-hover: rgba(59, 130, 246, 0.1);
            --admin-sidebar-active: linear-gradient(135deg, var(--admin-primary) 0%, var(--admin-primary-light) 100%);
            --admin-card-shadow: 0 4px 20px rgba(37, 99, 235, 0.08);
            --admin-hover-shadow: 0 8px 30px rgba(37, 99, 235, 0.12);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            background-color: #ffffff;
            color: var(--admin-text-dark);
            background-image:
                linear-gradient(135deg, rgba(37, 99, 235, 0.02) 0%, transparent 50%),
                linear-gradient(45deg, rgba(59, 130, 246, 0.02) 0%, transparent 50%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Professional Admin Sidebar */
        .admin-sidebar {
            background: var(--admin-sidebar-bg);
            min-height: 100vh;
            box-shadow: 2px 0 20px rgba(37, 99, 235, 0.1);
            border-right: none;
            backdrop-filter: blur(10px);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            width: 280px;
            height: 100vh;
            overflow-y: auto;
            transform: translateX(-100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform;
        }

        .admin-sidebar.show {
            transform: translateX(0);
        }

        .admin-sidebar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 0.875rem 1.25rem;
            margin: 0.25rem 0.75rem;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            border: none;
            position: relative;
            overflow: hidden;
            font-size: 0.95rem;
        }

        .admin-sidebar .nav-link:hover {
            background: var(--admin-sidebar-hover);
            color: white;
            transform: translateX(8px);
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.2);
        }

        .admin-sidebar .nav-link.active {
            background: var(--admin-sidebar-active);
            color: white;
            box-shadow: 0 6px 25px rgba(37, 99, 235, 0.4);
            transform: translateX(4px);
        }

        .admin-sidebar .nav-link i {
            width: 22px;
            text-align: center;
            font-size: 1.1rem;
        }

        .admin-sidebar .nav-link span.small {
            font-size: 0.725rem;
            opacity: 0.75;
            margin-top: 0.25rem;
            line-height: 1.3;
            font-weight: 400;
        }

        .admin-sidebar .nav-link.active span.small {
            opacity: 1;
        }

        /* Professional Cards */
        .admin-police-card, .card {
            background: white;
            border-radius: 16px;
            box-shadow: var(--admin-card-shadow);
            border: 1px solid var(--admin-medium-gray);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .admin-police-card:hover, .card:hover {
            box-shadow: var(--admin-hover-shadow);
            transform: translateY(-8px) scale(1.02);
            border-color: var(--admin-primary);
        }

        /* Professional Top Navigation Bar */
        .admin-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--admin-medium-gray);
            box-shadow: 0 2px 20px rgba(37, 99, 235, 0.08);
            padding: 1rem 1.5rem;
            transition: left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            height: 80px;
            display: flex;
            align-items: center;
        }

        .admin-header .container-fluid {
            height: 100%;
        }

        /* Header button consistency */
        .admin-header .btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .admin-header .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.2);
        }

        .admin-header .btn-outline-secondary:hover {
            background: var(--admin-light-gray);
            border-color: var(--admin-primary);
            color: var(--admin-primary);
        }

        .admin-header.sidebar-open {
            left: 280px;
        }

        .admin-header.sidebar-closed {
            left: 0;
        }

        .border-bottom {
            border: none !important;
            background: transparent !important;
            margin: 0 !important;
            padding: 0 !important;
            box-shadow: none !important;
        }

        .text-primary {
            background: linear-gradient(135deg, var(--admin-primary), var(--admin-accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
        }

        /* Professional Buttons */
        .btn {
            border-radius: 12px;
            font-weight: 600;
            padding: 0.75rem 1.25rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            font-size: 0.875rem;
            letter-spacing: 0.025em;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.25);
        }

        .btn-outline-primary {
            border: 2px solid var(--admin-primary);
            color: var(--admin-primary);
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: var(--admin-primary);
            color: white;
            border-color: var(--admin-primary);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
        }

        .btn-outline-secondary {
            border: 2px solid var(--admin-text-light);
            color: var(--admin-text-light);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--admin-primary), var(--admin-primary-light));
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--admin-primary-light), var(--admin-primary));
        }

        /* Professional Dropdown Menu */
        .dropdown-menu {
            border-radius: 16px;
            border: 1px solid var(--admin-medium-gray);
            box-shadow: 0 20px 60px rgba(37, 99, 235, 0.15);
            padding: 0.75rem 0;
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
        }

        .dropdown-item {
            padding: 0.875rem 1.5rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            font-size: 0.875rem;
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, var(--admin-light-gray), var(--admin-medium-gray));
            color: var(--admin-primary);
            transform: translateX(8px);
        }

        /* Professional Alerts */
        .alert {
            border-radius: 16px;
            border: 1px solid;
            box-shadow: var(--admin-card-shadow);
            font-weight: 500;
            padding: 1rem 1.25rem;
            font-size: 0.875rem;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.1), rgba(5, 150, 105, 0.05));
            color: var(--admin-success);
            border-color: rgba(5, 150, 105, 0.2);
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(220, 38, 38, 0.05));
            color: var(--admin-danger);
            border-color: rgba(220, 38, 38, 0.2);
        }

        .alert-warning {
            background: linear-gradient(135deg, rgba(217, 119, 6, 0.1), rgba(217, 119, 6, 0.05));
            color: var(--admin-warning);
            border-color: rgba(217, 119, 6, 0.2);
        }

        .alert-info {
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.1), rgba(14, 165, 233, 0.05));
            color: var(--admin-accent);
            border-color: rgba(14, 165, 233, 0.2);
        }

        /* Professional Logo Area */
        .admin-sidebar .text-center {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            margin-bottom: 1.5rem;
            position: relative;
        }

        .admin-sidebar .text-center::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        }

        .admin-sidebar h5 {
            background: linear-gradient(135deg, #ffffff, #e2e8f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            margin: 0.5rem 0 0 0;
            font-size: 1.25rem;
            letter-spacing: 0.025em;
        }

        .admin-sidebar .logo-container img {
            filter: brightness(1.1) contrast(1.1);
            transition: all 0.3s ease;
        }

        .admin-sidebar .logo-container:hover img {
            transform: scale(1.05);
        }

        /* Enhanced Sidebar Overlay */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(4px);
            cursor: pointer;
        }

        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* Enhanced Breadcrumb */
        .breadcrumb-sm {
            font-size: 0.75rem;
            margin: 0;
            padding: 0;
            background: transparent;
        }

        .breadcrumb-sm .breadcrumb-item + .breadcrumb-item::before {
            content: "›";
            font-weight: bold;
        }

        /* Enhanced Flash Messages */
        #flashMessages .alert {
            min-width: 300px;
            max-width: 400px;
            border: none;
            border-left: 4px solid;
        }

        /* Enhanced Navigation Sections */
        .nav-section {
            padding: 0.5rem 0;
        }

        /* Main Content Adjustments */
        .main-content {
            margin-left: 0;
            padding-top: 80px; /* Space for fixed header */
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: calc(100vh - 80px);
            background: #f8fafc;
        }

        @media (min-width: 992px) {
            .main-content.sidebar-open {
                margin-left: 280px;
            }
        }

        @media (max-width: 991.98px) {
            .main-content.sidebar-open {
                margin-left: 0; /* Don't push content on mobile */
            }
        }

        /* Sidebar Toggle Button */
        .sidebar-toggle {
            position: relative;
            width: 44px;
            height: 44px;
            border: 2px solid var(--admin-primary);
            background: white;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-toggle:hover {
            background: var(--admin-primary);
            color: white;
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .sidebar-toggle.active {
            background: var(--admin-primary);
            color: white;
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .sidebar-toggle:active {
            transform: scale(0.95);
            transition: transform 0.1s ease;
        }

        /* Add a subtle pulse animation to indicate interactivity */
        .sidebar-toggle:not(.active):before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border-radius: 14px;
            background: linear-gradient(45deg, var(--admin-primary), var(--admin-accent));
            opacity: 0;
            z-index: -1;
            animation: pulse-border 2s ease-in-out infinite;
        }

        @keyframes pulse-border {
            0%, 100% { opacity: 0; transform: scale(1); }
            50% { opacity: 0.3; transform: scale(1.1); }
        }

        /* Header Actions Styling */
        .admin-header .gap-3 > * {
            display: flex;
            align-items: center;
        }

        .admin-header .status-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--admin-success);
            display: inline-block;
            animation: pulse 2s ease-in-out infinite;
        }

        /* Quick Action Buttons */
        .admin-header .btn-outline-secondary {
            border-width: 1px;
            font-weight: 500;
        }

        .admin-header .btn-outline-secondary i {
            font-size: 1rem;
        }

        /* User Dropdown Enhancements */
        .admin-header #userDropdown {
            min-height: 44px;
        }

        .admin-header #userDropdown:hover {
            background: var(--admin-primary);
            color: white;
            border-color: var(--admin-primary);
        }

        .admin-header #userDropdown:hover .bg-primary {
            background: rgba(255, 255, 255, 0.2) !important;
        }

        /* Animated Hamburger Icon */
        .hamburger {
            width: 20px;
            height: 14px;
            position: relative;
            cursor: pointer;
        }

        .hamburger span {
            display: block;
            position: absolute;
            height: 2px;
            width: 100%;
            background: var(--admin-primary);
            border-radius: 1px;
            opacity: 1;
            left: 0;
            transform: rotate(0deg);
            transition: all 0.25s ease-in-out;
        }

        .hamburger span:nth-child(1) {
            top: 0px;
        }

        .hamburger span:nth-child(2) {
            top: 6px;
        }

        .hamburger span:nth-child(3) {
            top: 12px;
        }

        /* Active state animation */
        .sidebar-toggle:hover .hamburger span,
        .sidebar-toggle.active .hamburger span {
            background: white;
        }

        .hamburger.active span:nth-child(1) {
            top: 6px;
            transform: rotate(45deg);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            top: 6px;
            transform: rotate(-45deg);
        }

        /* Desktop Sidebar Behavior */
        @media (min-width: 992px) {
            .admin-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .main-content.sidebar-open {
                margin-left: 280px;
            }

            .admin-header {
                left: 0;
                transition: left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .admin-header.sidebar-open {
                left: 280px;
            }

            .sidebar-overlay {
                display: none;
            }
        }

        /* Mobile and Tablet Adjustments */
        @media (max-width: 991.98px) {
            .admin-sidebar {
                transform: translateX(-100%);
                z-index: 1060; /* Higher than overlay */
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .main-content.sidebar-open {
                margin-left: 0;
            }

            .admin-header {
                left: 0;
                padding: 0.75rem 1rem;
            }

            .admin-header.sidebar-open {
                left: 0;
            }

            .sidebar-overlay.show {
                display: block;
            }

            .container-fluid {
                padding: 0;
            }

            main {
                padding: 1rem !important;
            }

            /* Mobile header adjustments */
            .admin-header .page-info h1 {
                font-size: 1.25rem;
            }

            .admin-header .gap-3 {
                gap: 0.5rem !important;
            }

            .admin-header .btn-sm {
                width: 36px;
                height: 36px;
                font-size: 0.875rem;
            }
        }

        /* Tablet adjustments */
        @media (max-width: 767.98px) {
            .admin-header .page-info {
                display: none;
            }

            .admin-header .gap-3 {
                gap: 0.25rem !important;
            }
        }

        /* Animation for page transitions */
        main {
            animation: fadeInUp 0.5s ease-out;
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

        /* Professional Table Styles */
        .table {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--admin-card-shadow);
            border: 1px solid var(--admin-medium-gray);
        }

        .table thead th {
            background: linear-gradient(135deg, var(--admin-primary), var(--admin-primary-light));
            color: white;
            border: none;
            font-weight: 700;
            padding: 1.25rem 1rem;
            font-size: 0.875rem;
            letter-spacing: 0.025em;
            text-transform: uppercase;
        }

        .table tbody tr {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-bottom: 1px solid var(--admin-medium-gray);
        }

        .table tbody tr:hover {
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.03), rgba(37, 99, 235, 0.01));
            transform: scale(1.01);
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.08);
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: var(--admin-medium-gray);
        }

        /* Professional Form Controls */
        .form-control, .form-select {
            border-radius: 12px;
            border: 2px solid var(--admin-medium-gray);
            padding: 0.875rem 1.125rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.875rem;
            background-color: white;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
            background-color: white;
        }

        /* Modern Badge Styling */
        .badge {
            border-radius: 12px;
            font-weight: 600;
            padding: 0.5rem 0.875rem;
            font-size: 0.75rem;
            letter-spacing: 0.025em;
        }

        /* Status Badge Colors */
        .badge.bg-success {
            background: linear-gradient(135deg, var(--admin-success), #10b981) !important;
        }

        .badge.bg-warning {
            background: linear-gradient(135deg, var(--admin-warning), #f59e0b) !important;
        }

        .badge.bg-danger {
            background: linear-gradient(135deg, var(--admin-danger), #ef4444) !important;
        }

        .badge.bg-primary {
            background: linear-gradient(135deg, var(--admin-primary), var(--admin-primary-light)) !important;
        }

        .badge.bg-info {
            background: linear-gradient(135deg, var(--admin-accent), #06b6d4) !important;
        }

        /* Scrollbar Styling */
        .admin-sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .admin-sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-light" data-sidebar-state="{{ auth()->user()?->admin_sidebar_state ?? 'open' }}">

    @auth
        @if(auth()->user()->isAdmin())
            <!-- Sidebar Overlay for Mobile -->
            <div id="sidebarOverlay" class="sidebar-overlay" onclick="closeSidebar()"></div>

            <!-- Enhanced Modern Admin Sidebar -->
            <nav id="adminSidebar" class="admin-sidebar" role="navigation" aria-label="Admin Navigation">
                <div class="position-sticky pt-3">
                    <!-- Admin Logo & Brand -->
                    <div class="text-center mb-4 px-3">
                        <div class="logo-container mb-3">
                            <img src="{{ asset('images/logo.png') }}" alt="EZofz.lk Admin" height="50" class="mb-2" loading="lazy">
                        </div>
                        <h5 class="text-white mb-1 fw-bold">Admin Panel</h5>
                        <small class="text-white-50 d-flex align-items-center justify-content-center">
                            <span class="status-indicator online me-2" title="Online"></span>
                            <span class="text-truncate" style="max-width: 150px;" title="{{ Auth::user()->name }}">
                                {{ Str::limit(Auth::user()->name, 20) }}
                            </span>
                        </small>
                        <div class="mt-2">
                            <span class="badge bg-success bg-opacity-20 text-success border border-success border-opacity-30 px-2 py-1">
                                <i class="bi bi-shield-check me-1"></i>Administrator
                            </span>
                        </div>
                    </div>

                    <!-- Navigation Menu -->
                    <div class="sidebar-menu px-3">
                        <ul class="nav flex-column">
                            <!-- Dashboard -->
                            <li class="nav-item mb-1" style="--item-index: 0">
                                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                                   href="{{ route('admin.dashboard') }}"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="right"
                                   title="Main Dashboard"
                                   data-page="Dashboard">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <!-- Content Management Section -->
                            <li class="nav-section mt-4 mb-2">
                                <small class="text-white-50 text-uppercase fw-bold d-flex align-items-center"
                                       style="font-size: 0.65rem; letter-spacing: 0.1em; opacity: 0.7;">
                                    <i class="bi bi-folder2-open me-2"></i>Content Management
                                </small>
                            </li>

                            <li class="nav-item mb-1" style="--item-index: 1">
                                <a class="nav-link {{ request()->routeIs('admin.documents*') ? 'active' : '' }}"
                                   href="{{ route('admin.documents') }}"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="right"
                                   title="Manage Documents & Files"
                                   data-page="Documents">
                                    <i class="bi bi-file-earmark-text me-2"></i>
                                    <span>Documents</span>
                                    <small class="d-block text-white-50 mt-1" style="font-size: 0.7rem; line-height: 1.2;">
                                        Upload & Organize Files
                                    </small>
                                </a>
                            </li>

                            <li class="nav-item mb-1" style="--item-index: 2">
                                <a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}"
                                   href="{{ route('admin.testimonials.index') }}"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="right"
                                   title="Manage User Testimonials"
                                   data-page="Testimonials">
                                    <i class="bi bi-chat-quote me-2"></i>
                                    <span>Testimonials</span>
                                    <small class="d-block text-white-50 mt-1" style="font-size: 0.7rem; line-height: 1.2;">
                                        User Reviews & Feedback
                                    </small>
                                </a>
                            </li>

                            <!-- Legal Databases Section -->
                            <li class="nav-section mt-4 mb-2">
                                <small class="text-white-50 text-uppercase fw-bold d-flex align-items-center"
                                       style="font-size: 0.65rem; letter-spacing: 0.1em; opacity: 0.7;">
                                    <i class="bi bi-balance-scale me-2"></i>Legal Databases
                                </small>
                            </li>

                            <li class="nav-item mb-1" style="--item-index: 3">
                                <a class="nav-link {{ request()->routeIs('admin.penal-code.*') ? 'active' : '' }}"
                                   href="{{ route('admin.penal-code.index') }}"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="right"
                                   title="Penal Code Management"
                                   data-page="Penal Code">
                                    <i class="bi bi-book me-2"></i>
                                    <span>Penal Code</span>
                                    <small class="d-block text-white-50 mt-1" style="font-size: 0.7rem; line-height: 1.2;">
                                        Sections & Amendments
                                    </small>
                                </a>
                            </li>

                            <li class="nav-item mb-1" style="--item-index: 4">
                                <a class="nav-link {{ request()->routeIs('admin.criminal-procedure-code.*') ? 'active' : '' }}"
                                   href="{{ route('admin.criminal-procedure-code.index') }}"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="right"
                                   title="Criminal Procedure Code Management"
                                   data-page="Criminal Procedure">
                                    <i class="bi bi-journal-code me-2"></i>
                                    <span>Criminal Procedure</span>
                                    <small class="d-block text-white-50 mt-1" style="font-size: 0.7rem; line-height: 1.2;">
                                        Court Procedures & Laws
                                    </small>
                                </a>
                            </li>

                            <!-- Directory Management Section -->
                            <li class="nav-section mt-4 mb-2">
                                <small class="text-white-50 text-uppercase fw-bold d-flex align-items-center"
                                       style="font-size: 0.65rem; letter-spacing: 0.1em; opacity: 0.7;">
                                    <i class="bi bi-building me-2"></i>Directory Management
                                </small>
                            </li>

                            <li class="nav-item mb-1" style="--item-index: 5">
                                <a class="nav-link {{ request()->routeIs('admin.police.*') ? 'active' : '' }}"
                                   href="{{ route('admin.police.index') }}"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="right"
                                   title="Police Directory Management"
                                   data-page="Police Directory">
                                    <i class="bi bi-shield-check me-2"></i>
                                    <span>Police Directory</span>
                                    <small class="d-block text-white-50 mt-1" style="font-size: 0.7rem; line-height: 1.2;">
                                        Provinces, Divisions & Stations
                                    </small>
                                </a>
                            </li>

                            <!-- User Management Section -->
                            <li class="nav-section mt-4 mb-2">
                                <small class="text-white-50 text-uppercase fw-bold d-flex align-items-center"
                                       style="font-size: 0.65rem; letter-spacing: 0.1em; opacity: 0.7;">
                                    <i class="bi bi-people me-2"></i>User Management
                                </small>
                            </li>

                            <li class="nav-item mb-1" style="--item-index: 6">
                                <a class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}"
                                   href="{{ route('admin.users') }}"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="right"
                                   title="User Accounts & Permissions"
                                   data-page="Users">
                                    <i class="bi bi-person-gear me-2"></i>
                                    <span>Users</span>
                                    <small class="d-block text-white-50 mt-1" style="font-size: 0.7rem; line-height: 1.2;">
                                        Accounts & Permissions
                                    </small>
                                </a>
                            </li>

                            <!-- System Section -->
                            <li class="nav-section mt-4 mb-2">
                                <small class="text-white-50 text-uppercase fw-bold d-flex align-items-center"
                                       style="font-size: 0.65rem; letter-spacing: 0.1em; opacity: 0.7;">
                                    <i class="bi bi-gear me-2"></i>System
                                </small>
                            </li>

                            <li class="nav-item mb-1" style="--item-index: 7">
                                <a class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}"
                                   href="#"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="right"
                                   title="System Configuration"
                                   data-page="Settings">
                                    <i class="bi bi-gear me-2"></i>
                                    <span>Settings</span>
                                    <small class="d-block text-white-50 mt-1" style="font-size: 0.7rem; line-height: 1.2;">
                                        Configuration & Preferences
                                    </small>
                                </a>
                            </li>

                            <!-- Quick Actions -->
                            <li class="nav-section mt-4 mb-2 pt-3 border-top border-secondary border-opacity-30">
                                <small class="text-white-50 text-uppercase fw-bold d-flex align-items-center"
                                       style="font-size: 0.65rem; letter-spacing: 0.1em; opacity: 0.7;">
                                    <i class="bi bi-lightning me-2"></i>Quick Actions
                                </small>
                            </li>

                            <li class="nav-item mb-3" style="--item-index: 8">
                                <a class="nav-link text-warning border border-warning border-opacity-30 bg-warning bg-opacity-10"
                                   href="{{ route('home') }}"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="right"
                                   title="Return to Main Website"
                                   target="_blank">
                                    <i class="bi bi-box-arrow-up-right me-2"></i>
                                    <span>Visit Website</span>
                                    <small class="d-block text-warning mt-1" style="font-size: 0.7rem; line-height: 1.2;">
                                        Open Public Site
                                    </small>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Enhanced Admin Header -->
            <header id="adminHeader" class="admin-header" role="banner">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center h-100">
                        <div class="d-flex align-items-center">
                            <!-- Enhanced Sidebar Toggle -->
                            <button class="sidebar-toggle me-3"
                                    id="sidebarToggleBtn"
                                    type="button"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="bottom"
                                    title="Toggle Sidebar Navigation (Ctrl + B) - Click to show/hide menu"
                                    aria-label="Toggle sidebar navigation"
                                    aria-expanded="true">
                                <div class="hamburger" id="hamburgerIcon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </button>

                            <!-- Page Info -->
                            <div class="page-info d-flex flex-column justify-content-center">
                                <h1 class="h4 text-primary mb-1 fw-bold" id="pageTitle">
                                    @yield('page-title', 'Admin Dashboard')
                                </h1>
                                <p class="text-muted mb-0 small" id="pageDescription">
                                    @yield('page-description', 'Welcome to the administration panel')
                                </p>

                                <!-- Breadcrumb Navigation -->
                                @hasSection('breadcrumb')
                                <nav aria-label="breadcrumb" class="mt-1">
                                    <ol class="breadcrumb breadcrumb-sm mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
                                                <i class="bi bi-house-door me-1"></i>Admin
                                            </a>
                                        </li>
                                        @yield('breadcrumb')
                                    </ol>
                                </nav>
                                @endif
                            </div>
                        </div>

                        <!-- Header Actions -->
                        <div class="d-flex align-items-center gap-3">
                            <!-- System Status -->
                            <div class="d-none d-lg-flex align-items-center bg-white rounded-pill px-3 py-2 shadow-sm border"
                                 style="height: 40px;">
                                <span class="status-indicator online me-2" title="System Online"></span>
                                <span id="currentTime" class="text-primary fw-semibold small d-flex align-items-center"></span>
                            </div>

                            <!-- Quick Actions -->
                            <div class="d-none d-md-flex align-items-center gap-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary rounded-circle position-relative d-flex align-items-center justify-content-center"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="bottom"
                                        title="Notifications"
                                        aria-label="Notifications"
                                        style="width: 40px; height: 40px;">
                                    <i class="bi bi-bell fs-5"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                          style="font-size: 0.6rem; padding: 0.25em 0.4em;">
                                        3
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </button>

                                <button type="button" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="bottom"
                                        title="Quick Search"
                                        aria-label="Search"
                                        style="width: 40px; height: 40px;">
                                    <i class="bi bi-search fs-5"></i>
                                </button>
                            </div>

                            <!-- Enhanced User Dropdown -->
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle rounded-pill d-flex align-items-center shadow-sm position-relative px-3 py-2"
                                        type="button"
                                        id="userDropdown"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                        data-bs-auto-close="outside"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="bottom"
                                        title="User Menu">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2"
                                         style="width: 32px; height: 32px;">
                                        <i class="bi bi-person-fill text-white fs-6"></i>
                                    </div>
                                    <span class="d-none d-sm-inline text-truncate fw-semibold" style="max-width: 120px;">
                                        {{ Str::limit(Auth::user()->name, 15) }}
                                    </span>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="min-width: 280px;">
                                    <!-- User Profile Header -->
                                    <li class="px-3 py-3 bg-light border-bottom">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                                 style="width: 48px; height: 48px;">
                                                <i class="bi bi-person-fill text-white fs-5"></i>
                                            </div>
                                            <div class="flex-grow-1 min-w-0">
                                                <h6 class="mb-0 fw-bold text-truncate">{{ Auth::user()->name }}</h6>
                                                <small class="text-muted">{{ Auth::user()->email }}</small>
                                                <div class="mt-1">
                                                    <span class="badge bg-success bg-opacity-20 text-success">
                                                        <i class="bi bi-shield-check me-1"></i>Admin
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- User Actions -->
                                    <li><h6 class="dropdown-header">Account</h6></li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center py-2" href="#">
                                            <i class="bi bi-person me-3 text-primary"></i>
                                            <span>My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center py-2" href="#">
                                            <i class="bi bi-gear me-3 text-primary"></i>
                                            <span>Account Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center py-2" href="#">
                                            <i class="bi bi-shield-lock me-3 text-primary"></i>
                                            <span>Security</span>
                                        </a>
                                    </li>

                                    <li><hr class="dropdown-divider my-2"></li>

                                    <!-- System Actions -->
                                    <li><h6 class="dropdown-header">System</h6></li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center py-2" href="#">
                                            <i class="bi bi-question-circle me-3 text-info"></i>
                                            <span>Help & Support</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('home') }}" target="_blank">
                                            <i class="bi bi-box-arrow-up-right me-3 text-success"></i>
                                            <span>Visit Website</span>
                                        </a>
                                    </li>

                                    <li><hr class="dropdown-divider my-2"></li>

                                    <!-- Logout -->
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center py-2 text-danger"
                                           href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                   if(confirm('Are you sure you want to logout?')) {
                                                       document.getElementById('logout-form').submit();
                                                   }">
                                            <i class="bi bi-box-arrow-right me-3"></i>
                                            <span>Logout</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Enhanced Main Content Wrapper -->
            <div id="mainContent" class="main-content" role="main">
                <div class="container-fluid h-100">
                    <main class="px-3 px-md-4 py-3">
                        <!-- Flash Messages -->
                        <div id="flashMessages" class="position-fixed top-0 end-0 p-3" style="z-index: 1055; top: 100px !important;">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show shadow-lg border-0" role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill me-2 text-success fs-5"></i>
                                        <div>
                                            <strong>Success!</strong>
                                            <div>{{ session('success') }}</div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show shadow-lg border-0" role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-exclamation-triangle-fill me-2 text-danger fs-5"></i>
                                        <div>
                                            <strong>Error!</strong>
                                            <div>{{ session('error') }}</div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('warning'))
                                <div class="alert alert-warning alert-dismissible fade show shadow-lg border-0" role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-exclamation-circle-fill me-2 text-warning fs-5"></i>
                                        <div>
                                            <strong>Warning!</strong>
                                            <div>{{ session('warning') }}</div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('info'))
                                <div class="alert alert-info alert-dismissible fade show shadow-lg border-0" role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-info-circle-fill me-2 text-info fs-5"></i>
                                        <div>
                                            <strong>Info!</strong>
                                            <div>{{ session('info') }}</div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>

                        <!-- Page Content -->
                        <div class="content-wrapper">
                            @yield('content')
                        </div>
                    </main>
                </div>
            </div>

        @else
            <!-- Unauthorized Access -->
            <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
                <div class="text-center">
                    <div class="mb-4">
                        <i class="bi bi-shield-exclamation text-danger" style="font-size: 4rem;"></i>
                    </div>
                    <h1 class="h3 text-danger mb-3">Access Denied</h1>
                    <p class="text-muted mb-4">You don't have permission to access this admin panel.</p>



                    <a href="{{ route('home') }}" class="btn btn-primary">
                        <i class="bi bi-house me-2"></i>Go to Homepage
                    </a>
                </div>
            </div>
        @endif
    @else
        <!-- Not Authenticated -->
        <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
            <div class="text-center">
                <div class="mb-4">
                    <i class="bi bi-person-x text-warning" style="font-size: 4rem;"></i>
                </div>
                <h1 class="h3 text-warning mb-3">Authentication Required</h1>
                <p class="text-muted mb-4">Please log in to access the admin panel.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                </a>
            </div>
        </div>
    @endauth

    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Global clock update function
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-US', {
                hour12: true,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            const clockElement = document.getElementById('currentTime');
            if (clockElement) {
                clockElement.innerHTML = `<i class="bi bi-clock me-1"></i>${timeString}`;
            }
        }

        // Enhanced Sidebar Management
        class AdminSidebar {
            constructor() {
                this.sidebar = document.getElementById('adminSidebar');
                this.overlay = document.getElementById('sidebarOverlay');
                this.mainContent = document.getElementById('mainContent');
                this.adminHeader = document.getElementById('adminHeader');
                this.hamburger = document.getElementById('hamburgerIcon');
                this.toggleButton = document.getElementById('sidebarToggleBtn');
                this.isDesktop = window.innerWidth >= 992;

                console.log('AdminSidebar constructor:', {
                    isDesktop: this.isDesktop,
                    screenWidth: window.innerWidth,
                    elementsFound: {
                        sidebar: !!this.sidebar,
                        toggleButton: !!this.toggleButton,
                        mainContent: !!this.mainContent,
                        adminHeader: !!this.adminHeader
                    }
                });

                this.init();
            }

            init() {
                if (!this.sidebar) return;

                // Set initial state
                this.loadSidebarState();

                // Event listeners
                this.attachEventListeners();

                // Update toggle button accessibility
                this.updateAriaAttributes();
            }

            attachEventListeners() {
                // Toggle button click
                if (this.toggleButton) {
                    // Remove any existing onclick handler
                    this.toggleButton.removeAttribute('onclick');

                    this.toggleButton.addEventListener('click', (e) => {
                        e.preventDefault();
                        console.log('Sidebar toggle button clicked');
                        this.toggle();
                    });
                }

                // Overlay click (mobile)
                if (this.overlay) {
                    this.overlay.addEventListener('click', () => {
                        this.close();
                    });
                }

                // Escape key
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && this.isOpen() && !this.isDesktop) {
                        this.close();
                    }
                });

                // Window resize
                window.addEventListener('resize', () => {
                    this.handleResize();
                });

                // Keyboard shortcut (Ctrl + B)
                document.addEventListener('keydown', (e) => {
                    if (e.ctrlKey && e.key === 'b') {
                        e.preventDefault();
                        this.toggle();
                    }
                });
            }

            isOpen() {
                return this.sidebar.classList.contains('show');
            }

            toggle() {
                console.log('Toggling sidebar, current state:', this.isOpen() ? 'open' : 'closed');
                if (this.isOpen()) {
                    this.close();
                } else {
                    this.open();
                }
            }

            open() {
                console.log('Opening sidebar');
                this.sidebar.classList.add('show');

                if (this.hamburger) this.hamburger.classList.add('active');
                if (this.toggleButton) this.toggleButton.classList.add('active');

                // Apply styles for both desktop and mobile
                if (this.mainContent) this.mainContent.classList.add('sidebar-open');
                if (this.adminHeader) {
                    this.adminHeader.classList.remove('sidebar-closed');
                    this.adminHeader.classList.add('sidebar-open');
                }

                // Show overlay only on mobile
                if (!this.isDesktop && this.overlay) {
                    this.overlay.classList.add('show');
                }

                this.saveSidebarState(true);
                this.updateAriaAttributes();

                // Dispatch custom event
                window.dispatchEvent(new CustomEvent('sidebarOpened'));
            }

            close() {
                console.log('Closing sidebar');
                this.sidebar.classList.remove('show');

                if (this.overlay) this.overlay.classList.remove('show');
                if (this.hamburger) this.hamburger.classList.remove('active');
                if (this.toggleButton) this.toggleButton.classList.remove('active');

                // Apply styles for both desktop and mobile
                if (this.mainContent) this.mainContent.classList.remove('sidebar-open');
                if (this.adminHeader) {
                    this.adminHeader.classList.add('sidebar-closed');
                    this.adminHeader.classList.remove('sidebar-open');
                }

                this.saveSidebarState(false);
                this.updateAriaAttributes();

                // Dispatch custom event
                window.dispatchEvent(new CustomEvent('sidebarClosed'));
            }

            handleResize() {
                const wasDesktop = this.isDesktop;
                this.isDesktop = window.innerWidth >= 992;

                if (wasDesktop !== this.isDesktop) {
                    // When switching between desktop and mobile, maintain current state
                    // but update styling appropriately
                    if (this.isOpen()) {
                        this.open(); // Re-apply correct styling for new screen size
                    } else {
                        this.close(); // Re-apply correct styling for new screen size
                    }
                }
            }

            loadSidebarState() {
                const savedState = localStorage.getItem('adminSidebarOpen');
                // Start closed by default on both desktop and mobile, but respect user's saved preference
                const shouldOpen = savedState === 'true';

                console.log('Loading sidebar state:', { savedState, isDesktop: this.isDesktop, shouldOpen });

                if (shouldOpen) {
                    this.open();
                } else {
                    this.close();
                }
            }

            saveSidebarState(isOpen) {
                localStorage.setItem('adminSidebarOpen', isOpen ? 'true' : 'false');
            }

            updateAriaAttributes() {
                if (this.toggleButton) {
                    this.toggleButton.setAttribute('aria-expanded', this.isOpen());
                }
            }
        }

        // Global functions for backwards compatibility
        window.toggleSidebar = function() {
            console.log('toggleSidebar called, instance exists:', !!window.adminSidebarInstance);
            if (window.adminSidebarInstance) {
                window.adminSidebarInstance.toggle();
            } else {
                console.error('AdminSidebar instance not found');
            }
        };

        window.openSidebar = function() {
            if (window.adminSidebarInstance) {
                window.adminSidebarInstance.open();
            }
        };

        window.closeSidebar = function() {
            if (window.adminSidebarInstance) {
                window.adminSidebarInstance.close();
            }
        };

        // Enhanced Admin Panel Initialization
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Sidebar
            console.log('Initializing Admin Panel...');
            window.adminSidebarInstance = new AdminSidebar();
            console.log('AdminSidebar initialized:', window.adminSidebarInstance);

            // Add visual feedback for sidebar status
            const toggleButton = document.getElementById('sidebarToggleBtn');
            if (toggleButton) {
                // Add a small badge to indicate keyboard shortcut
                const badge = document.createElement('span');
                badge.className = 'position-absolute top-0 start-100 translate-middle badge bg-primary rounded-pill';
                badge.style.cssText = 'font-size: 0.6rem; z-index: 1;';
                badge.textContent = 'Ctrl+B';
                badge.title = 'Keyboard shortcut to toggle sidebar';
                toggleButton.appendChild(badge);

                // Hide badge after 3 seconds
                setTimeout(() => {
                    badge.style.opacity = '0';
                    badge.style.transition = 'opacity 0.3s ease';
                    setTimeout(() => badge.remove(), 300);
                }, 3000);
            }

            // Initialize Tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl, {
                    delay: { "show": 300, "hide": 100 },
                    trigger: 'hover focus',
                    boundary: 'viewport'
                });
            });

            // Initialize Clock
            updateClock();
            setInterval(updateClock, 1000);

            // Professional Auto-hide alerts with animation
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                // Add slide-in animation
                alert.style.transform = 'translateX(100%)';
                alert.style.opacity = '0';

                setTimeout(() => {
                    alert.style.transition = 'all 0.3s ease-out';
                    alert.style.transform = 'translateX(0)';
                    alert.style.opacity = '1';
                }, 100);

                // Auto-hide after 7 seconds with fade-out animation
                setTimeout(() => {
                    if (alert) {
                        alert.style.transition = 'all 0.3s ease-in';
                        alert.style.transform = 'translateX(100%)';
                        alert.style.opacity = '0';

                        setTimeout(() => {
                            const bsAlert = new bootstrap.Alert(alert);
                            bsAlert.close();
                        }, 300);
                    }
                }, 7000);
            });

            // Professional Loading States for Buttons
            const buttons = document.querySelectorAll('.btn[type="submit"]');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    if (!this.disabled && !this.closest('form')?.checkValidity?.()?.call(this.closest('form'))) {
                        return; // Don't show loading if form is invalid
                    }

                    if (!this.disabled) {
                        const originalText = this.innerHTML;
                        const loadingText = this.dataset.loadingText || 'Processing...';

                        this.innerHTML = `<i class="bi bi-arrow-clockwise spin me-2"></i>${loadingText}`;
                        this.disabled = true;
                        this.classList.add('btn-loading');

                        // Re-enable after 15 seconds as fallback
                        setTimeout(() => {
                            this.innerHTML = originalText;
                            this.disabled = false;
                            this.classList.remove('btn-loading');
                        }, 15000);
                    }
                });
            });

            // Professional Navigation Interactions
            const sidebarLinks = document.querySelectorAll('.admin-sidebar .nav-link');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Add professional ripple effect
                    const ripple = document.createElement('div');
                    ripple.className = 'nav-ripple';

                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                    ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';

                    this.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);

                    // Add active state management
                    sidebarLinks.forEach(otherLink => otherLink.classList.remove('active'));
                    this.classList.add('active');
                });

                // Add hover sound effect (optional, can be enabled)
                link.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(8px)';
                });

                link.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.style.transform = 'translateX(0)';
                    }
                });
            });

            // Professional Table Interactions
            const tableRows = document.querySelectorAll('.table tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.01)';
                    this.style.zIndex = '1';
                });

                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                    this.style.zIndex = 'auto';
                });

                // Add click animation
                row.addEventListener('click', function(e) {
                    if (!e.target.closest('button, a, input')) {
                        this.style.transform = 'scale(0.98)';
                        setTimeout(() => {
                            this.style.transform = 'scale(1.01)';
                        }, 150);
                    }
                });
            });

            // Page load animation handled by initializePageAnimations()

            // Dynamic Page Title Updates
            const navLinks = document.querySelectorAll('.admin-sidebar .nav-link[data-page]');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    const pageName = this.getAttribute('data-page');
                    if (pageName) {
                        updatePageTitle(pageName);
                    }
                });
            });

            // Smooth Focus Management
            document.addEventListener('focusin', function(e) {
                if (e.target.closest('.admin-sidebar')) {
                    e.target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
                }
            });

            // Auto-hide flash messages
            setTimeout(() => {
                const alerts = document.querySelectorAll('#flashMessages .alert');
                alerts.forEach(alert => {
                    const bsAlert = new bootstrap.Alert(alert);
                    setTimeout(() => {
                        try {
                            bsAlert.close();
                        } catch (e) {
                            // Alert already closed
                        }
                    }, 5000);
                });
            }, 100);

            // Initialize page animations
            initializePageAnimations();

            // Initialize additional components
            initializeAdminComponents();
        });

        // Initialize page animations
        function initializePageAnimations() {
            document.body.style.opacity = '0';
            setTimeout(() => {
                document.body.style.transition = 'opacity 0.3s ease';
                document.body.style.opacity = '1';
            }, 50);
        }

        // Page Title Update Function
        function updatePageTitle(pageName) {
            const pageTitle = document.getElementById('pageTitle');
            const pageDescription = document.getElementById('pageDescription');

            if (pageTitle && pageName) {
                pageTitle.textContent = pageName;
                document.title = `${pageName} - Admin Dashboard - EZofz.lk`;

                // Update description based on page
                if (pageDescription) {
                    const descriptions = {
                        'Dashboard': 'Welcome to the administration panel',
                        'Documents': 'Manage and organize your documents',
                        'Categories': 'Organize content categories and subcategories',
                        'Testimonials': 'Manage customer testimonials and reviews',
                        'Users': 'Manage user accounts and permissions',
                        'Settings': 'Configure system settings and preferences'
                    };
                    pageDescription.textContent = descriptions[pageName] || 'Administrative panel section';
                }
            }
        }        // Enhanced form validation
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const requiredInputs = this.querySelectorAll('[required]');
                let isValid = true;

                requiredInputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('is-invalid');

                        // Remove invalid class on input
                        input.addEventListener('input', function() {
                            this.classList.remove('is-invalid');
                        }, { once: true });
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    showNotification('Please fill in all required fields', 'danger');
                }
            });
        });

        // Notification system
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            notification.style.cssText = `
                top: 20px;
                right: 20px;
                z-index: 9999;
                min-width: 300px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            `;

            notification.innerHTML = `
                <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;

            document.body.appendChild(notification);

            // Auto remove after 5 seconds
            setTimeout(() => {
                if (notification) {
                    const bsAlert = new bootstrap.Alert(notification);
                    bsAlert.close();
                }
            }, 5000);
        }

        // Search functionality for tables
        function initTableSearch(tableId, searchInputId) {
            const searchInput = document.getElementById(searchInputId);
            const table = document.getElementById(tableId);

            if (searchInput && table) {
                searchInput.addEventListener('input', function() {
                    const filter = this.value.toLowerCase();
                    const rows = table.querySelectorAll('tbody tr');

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(filter) ? '' : 'none';
                    });
                });
            }
        }

        // Add Professional CSS Animations
        const style = document.createElement('style');
        style.textContent = `
            /* Professional Loading Animation */
            .spin {
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }

            /* Professional Button Loading State */
            .btn-loading {
                position: relative;
                pointer-events: none;
            }

            .btn-loading::after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(255, 255, 255, 0.2);
                border-radius: inherit;
                animation: pulse 1.5s ease-in-out infinite;
            }

            @keyframes pulse {
                0%, 100% { opacity: 0.2; }
                50% { opacity: 0.4; }
            }

            /* Professional Navigation Ripple Effect */
            .nav-ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.4);
                transform: scale(0);
                animation: nav-ripple-animation 0.6s cubic-bezier(0.4, 0, 0.2, 1);
                pointer-events: none;
                z-index: 0;
            }

            @keyframes nav-ripple-animation {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }

            /* Professional Card Hover Effects */
            .card {
                position: relative;
                overflow: hidden;
            }

            .card::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(37, 99, 235, 0.1), transparent);
                transition: left 0.5s;
                z-index: 1;
            }

            .card:hover::before {
                left: 100%;
            }

            /* Professional Scroll Animations */
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
                animation: fadeInUp 0.6s ease-out;
            }

            /* Professional Focus States */
            .form-control:focus, .form-select:focus, .btn:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15) !important;
            }

            /* Professional Sidebar Scroll */
            .admin-sidebar {
                scrollbar-width: thin;
                scrollbar-color: rgba(255, 255, 255, 0.3) transparent;
            }

            .admin-sidebar::-webkit-scrollbar {
                width: 6px;
            }

            .admin-sidebar::-webkit-scrollbar-track {
                background: transparent;
            }

            .admin-sidebar::-webkit-scrollbar-thumb {
                background: rgba(255, 255, 255, 0.3);
                border-radius: 3px;
                transition: background 0.3s ease;
            }

            .admin-sidebar::-webkit-scrollbar-thumb:hover {
                background: rgba(255, 255, 255, 0.5);
            }

            /* Professional Typography */
            h1, h2, h3, h4, h5, h6 {
                font-weight: 700;
                letter-spacing: -0.025em;
            }

            .text-muted {
                color: var(--admin-text-light) !important;
            }

            /* Professional Status Indicators */
            .status-indicator {
                display: inline-block;
                width: 8px;
                height: 8px;
                border-radius: 50%;
                margin-right: 0.5rem;
                animation: pulse 2s ease-in-out infinite;
            }

            .status-indicator.online {
                background: var(--admin-success);
            }

            .status-indicator.offline {
                background: var(--admin-text-light);
                animation: none;
            }

            /* Sidebar Animation Enhancements */
            .admin-sidebar .nav-link {
                opacity: 0;
                transform: translateX(-20px);
                animation: slideInFromLeft 0.3s ease forwards;
            }

            .admin-sidebar.show .nav-link {
                animation-delay: calc(var(--item-index, 0) * 0.05s);
            }

            @keyframes slideInFromLeft {
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            /* Header Animation */
            .border-bottom {
                transform: translateY(-10px);
                opacity: 0;
                animation: slideInFromTop 0.6s ease 0.2s forwards;
            }

            @keyframes slideInFromTop {
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            /* Content Animation */
            .main-content {
                opacity: 0;
                animation: fadeInContent 0.8s ease 0.3s forwards;
            }

            @keyframes fadeInContent {
                to {
                    opacity: 1;
                }
            }

            /* Smooth Scroll */
            html {
                scroll-behavior: smooth;
            }

            /* Loading State for Main Content */
            .main-content.loading {
                pointer-events: none;
            }

            .main-content.loading::after {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(255, 255, 255, 0.8);
                z-index: 9999;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        `;
        document.head.appendChild(style);
    </script>

    <script>
        // Additional component initialization
        function initializeAdminComponents() {
            // Add any additional initialization here
            console.log('EZofz Admin Panel initialized successfully');
        }
    </script>    @stack('scripts')
</body>
</html>
