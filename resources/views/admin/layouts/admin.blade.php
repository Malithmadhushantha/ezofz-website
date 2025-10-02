<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard - EZofz.lk')</title>

    <link href="https://fonts.bunny.net/css?family=Inter:300,400,500,600,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Admin Police Directory Styles */
        .admin-police-card {
            background: var(--bs-white);
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .admin-police-card:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .nav-link span.small {
            font-size: 0.75rem;
            opacity: 0.7;
        }

        .nav-link.active span.small {
            opacity: 1;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="adminSidebar" class="col-md-3 col-lg-2 d-md-block admin-sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="EZofz.lk" height="40" class="mb-2">
                        <h5 class="text-white">Admin Panel</h5>
                    </div>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2 me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.documents') ? 'active' : '' }}" href="{{ route('admin.documents') }}">
                                <i class="bi bi-file-text me-2"></i>Documents
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users') }}">
                                <i class="bi bi-people me-2"></i>Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}" href="{{ route('admin.testimonials.index') }}">
                                <i class="bi bi-chat-quote me-2"></i>Testimonials
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.penal-code.*') ? 'active' : '' }}" href="{{ route('admin.penal-code.index') }}">
                                <i class="bi bi-book me-2"></i>Penal Code
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.criminal-procedure-code.*') ? 'active' : '' }}" href="{{ route('admin.criminal-procedure-code.index') }}">
                                <i class="bi bi-journal-text me-2"></i>Criminal Procedure Code
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.police.*') ? 'active' : '' }}" href="{{ route('admin.police.index') }}">
                                <i class="bi bi-shield-check me-2"></i>Police Station Directory
                                <span class="d-block ps-4 small text-muted">Manage Provinces, Divisions & Stations</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear me-2"></i>Settings
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <a class="nav-link text-warning" href="{{ route('home') }}">
                                <i class="bi bi-arrow-left me-2"></i>Back to Website
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Top navbar -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-outline-secondary d-md-none me-3" type="button" onclick="toggleSidebar()">
                            <i class="bi bi-list"></i>
                        </button>
                        <h1 class="h2 text-primary">@yield('page-title', 'Admin Dashboard')</h1>
                    </div>

                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
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
                        </div>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
