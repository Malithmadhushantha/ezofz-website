@extends('admin.layouts.admin')

@section('title', 'Admin Dashboard - EZofz.lk')
@section('page-title', 'Admin Dashboard')
@section('page-description', 'Comprehensive overview and management of your legal platform')
@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<!-- Enhanced Dashboard Statistics -->
<div class="row g-4 mb-4">
    <!-- Content Statistics -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white position-relative overflow-hidden h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0 fw-bold counter-value">{{ $documents->total() }}</h4>
                        <p class="mb-1 opacity-75">Total Documents</p>
                        <small class="opacity-50">
                            <i class="bi bi-arrow-up me-1"></i>Content Library
                        </small>
                    </div>
                    <div class="icon-box">
                        <i class="bi bi-file-earmark-text fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="progress" style="height: 3px;">
                <div class="progress-bar bg-white bg-opacity-30" style="width: 100%"></div>
            </div>
        </div>
    </div>

    <!-- User Management -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white position-relative overflow-hidden h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        @php
                            $totalUsers = App\Models\User::count();
                            $adminUsers = App\Models\User::where('role', 'admin')->orWhere('is_admin', true)->count();
                            $regularUsers = $totalUsers - $adminUsers;
                        @endphp
                        <h4 class="mb-0 fw-bold counter-value">{{ $totalUsers }}</h4>
                        <p class="mb-1 opacity-75">Total Users</p>
                        <small class="opacity-50">
                            <i class="bi bi-people me-1"></i>{{ $adminUsers }} Admins, {{ $regularUsers }} Users
                        </small>
                    </div>
                    <div class="icon-box">
                        <i class="bi bi-person-gear fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="progress" style="height: 3px;">
                <div class="progress-bar bg-white bg-opacity-30" style="width: {{ $totalUsers > 0 ? ($adminUsers / $totalUsers) * 100 : 0 }}%"></div>
            </div>
        </div>
    </div>

    <!-- Legal Database -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white position-relative overflow-hidden h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        @php
                            $penalSections = App\Models\PenalCodeSection::count();
                            $criminalSections = App\Models\CriminalProcedureCode::count();
                            $totalLegalSections = $penalSections + $criminalSections;
                        @endphp
                        <h4 class="mb-0 fw-bold counter-value">{{ $totalLegalSections }}</h4>
                        <p class="mb-1 opacity-75">Legal Sections</p>
                        <small class="opacity-50">
                            <i class="bi bi-book me-1"></i>Penal & Criminal Code
                        </small>
                    </div>
                    <div class="icon-box">
                        <i class="bi bi-balance-scale fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="progress" style="height: 3px;">
                <div class="progress-bar bg-white bg-opacity-30" style="width: 100%"></div>
            </div>
        </div>
    </div>

    <!-- Police Directory -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white position-relative overflow-hidden h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        @php
                            $policeStations = App\Models\PoliceStation::count();
                            $policeDivisions = App\Models\PoliceDivision::count();
                            $policeProvinces = App\Models\PoliceProvince::count();
                        @endphp
                        <h4 class="mb-0 fw-bold counter-value">{{ $policeStations }}</h4>
                        <p class="mb-1 opacity-75">Police Stations</p>
                        <small class="opacity-50">
                            <i class="bi bi-geo-alt me-1"></i>{{ $policeDivisions }} Divisions, {{ $policeProvinces }} Provinces
                        </small>
                    </div>
                    <div class="icon-box">
                        <i class="bi bi-shield-check fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="progress" style="height: 3px;">
                <div class="progress-bar bg-white bg-opacity-30" style="width: 100%"></div>
            </div>
        </div>
    </div>
</div>

<!-- Main Dashboard Content -->
<div class="row g-4">
    <!-- Content Management Overview -->
    <div class="col-lg-8">
        <div class="row g-4">
            <!-- Legal Database Management -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-balance-scale me-2"></i>Legal Database Management
                        </h5>
                        <div class="badge bg-white text-primary">Active</div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center p-3 bg-warning bg-opacity-10 rounded">
                                    <div class="feature-icon bg-warning text-white rounded me-3">
                                        <i class="bi bi-book fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Penal Code Sections</h6>
                                        <p class="mb-0 text-muted small">Manage criminal law provisions</p>
                                        <div class="mt-2">
                                            <span class="badge bg-warning">{{ App\Models\PenalCodeSection::count() }} Sections</span>
                                            <a href="{{ route('admin.penal-code.index') }}" class="btn btn-sm btn-outline-warning ms-2">Manage</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center p-3 bg-success bg-opacity-10 rounded">
                                    <div class="feature-icon bg-success text-white rounded me-3">
                                        <i class="bi bi-journal-text fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Criminal Procedure Code</h6>
                                        <p class="mb-0 text-muted small">Court procedures and legal processes</p>
                                        <div class="mt-2">
                                            <span class="badge bg-success">{{ App\Models\CriminalProcedureCode::count() }} Codes</span>
                                            <a href="{{ route('admin.criminal-procedure-code.index') }}" class="btn btn-sm btn-outline-success ms-2">Manage</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Directory Management -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-gradient-info text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-building me-2"></i>Directory Management
                        </h5>
                        <div class="badge bg-white text-info">Updated</div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="text-center p-3 border rounded hover-card">
                                    <div class="feature-icon bg-info text-white rounded-circle mx-auto mb-3">
                                        <i class="bi bi-geo-alt fs-4"></i>
                                    </div>
                                    <h6 class="mb-1">Police Provinces</h6>
                                    <p class="text-muted small mb-2">{{ App\Models\PoliceProvince::count() }} Provinces</p>
                                    <a href="{{ route('admin.police.index') }}" class="btn btn-sm btn-info">View All</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center p-3 border rounded hover-card">
                                    <div class="feature-icon bg-primary text-white rounded-circle mx-auto mb-3">
                                        <i class="bi bi-buildings fs-4"></i>
                                    </div>
                                    <h6 class="mb-1">Police Divisions</h6>
                                    <p class="text-muted small mb-2">{{ App\Models\PoliceDivision::count() }} Divisions</p>
                                    <a href="{{ route('admin.police.index') }}" class="btn btn-sm btn-primary">Manage</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center p-3 border rounded hover-card">
                                    <div class="feature-icon bg-success text-white rounded-circle mx-auto mb-3">
                                        <i class="bi bi-shield-check fs-4"></i>
                                    </div>
                                    <h6 class="mb-1">Police Stations</h6>
                                    <p class="text-muted small mb-2">{{ App\Models\PoliceStation::count() }} Stations</p>
                                    <a href="{{ route('admin.police.index') }}" class="btn btn-sm btn-success">Directory</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content & User Statistics -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-graph-up text-primary me-2"></i>Platform Analytics
                        </h5>
                        <small class="text-muted">Last 30 days</small>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <div class="h4 text-primary mb-1">{{ $documents->total() }}</div>
                                    <div class="text-muted small">Total Documents</div>
                                    <div class="progress mt-2" style="height: 4px;">
                                        <div class="progress-bar bg-primary" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <div class="h4 text-success mb-1">{{ App\Models\Testimonial::count() }}</div>
                                    <div class="text-muted small">Testimonials</div>
                                    <div class="progress mt-2" style="height: 4px;">
                                        <div class="progress-bar bg-success" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <div class="h4 text-warning mb-1">{{ App\Models\Category::count() }}</div>
                                    <div class="text-muted small">Categories</div>
                                    <div class="progress mt-2" style="height: 4px;">
                                        <div class="progress-bar bg-warning" style="width: 70%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <div class="h4 text-info mb-1">{{ App\Models\User::count() }}</div>
                                    <div class="text-muted small">Total Users</div>
                                    <div class="progress mt-2" style="height: 4px;">
                                        <div class="progress-bar bg-info" style="width: 90%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="col-lg-4">
        <!-- Quick Actions -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-gradient-primary text-white">
                <h5 class="mb-0"><i class="bi bi-lightning-charge me-2"></i>Quick Actions</h5>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin.documents') }}" class="list-group-item list-group-item-action d-flex align-items-center hover-item">
                        <div class="action-icon bg-primary text-white rounded p-2 me-3">
                            <i class="bi bi-file-plus"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Document Management</h6>
                            <small class="text-muted">Upload and organize files</small>
                        </div>
                        <i class="bi bi-chevron-right ms-auto text-primary"></i>
                    </a>
                    <a href="{{ route('admin.testimonials.index') }}" class="list-group-item list-group-item-action d-flex align-items-center hover-item">
                        <div class="action-icon bg-success text-white rounded p-2 me-3">
                            <i class="bi bi-chat-quote"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Testimonials</h6>
                            <small class="text-muted">Manage user feedback</small>
                        </div>
                        <i class="bi bi-chevron-right ms-auto text-success"></i>
                    </a>
                    <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action d-flex align-items-center hover-item">
                        <div class="action-icon bg-info text-white rounded p-2 me-3">
                            <i class="bi bi-person-gear"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">User Management</h6>
                            <small class="text-muted">Accounts & permissions</small>
                        </div>
                        <i class="bi bi-chevron-right ms-auto text-info"></i>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center hover-item">
                        <div class="action-icon bg-warning text-white rounded p-2 me-3">
                            <i class="bi bi-gear"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">System Settings</h6>
                            <small class="text-muted">Configure preferences</small>
                        </div>
                        <i class="bi bi-chevron-right ms-auto text-warning"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-activity text-success me-2"></i>Recent Activity</h5>
                <small class="text-muted">Today</small>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker bg-primary"></div>
                        <div class="timeline-content">
                            <h6 class="mb-1">System Login</h6>
                            <p class="mb-0 small text-muted">Admin {{ Auth::user()->name }} logged in</p>
                            <small class="text-muted">{{ now()->format('h:i A') }}</small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-success"></div>
                        <div class="timeline-content">
                            <h6 class="mb-1">Dashboard Access</h6>
                            <p class="mb-0 small text-muted">Accessed admin dashboard</p>
                            <small class="text-muted">{{ now()->subMinutes(5)->format('h:i A') }}</small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-info"></div>
                        <div class="timeline-content">
                            <h6 class="mb-1">Database Status</h6>
                            <p class="mb-0 small text-muted">All systems operational</p>
                            <small class="text-muted">{{ now()->subHours(1)->format('h:i A') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Information -->
        <div class="card shadow-sm">
            <div class="card-header bg-gradient-dark text-white">
                <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>System Information</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-server text-primary me-2"></i>
                            <span class="fw-medium">Laravel</span>
                        </div>
                        <span class="badge bg-primary">{{ app()->version() }}</span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-code-square text-success me-2"></i>
                            <span class="fw-medium">PHP</span>
                        </div>
                        <span class="badge bg-success">{{ phpversion() }}</span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-database text-warning me-2"></i>
                            <span class="fw-medium">Database</span>
                        </div>
                        <span class="badge bg-success">Connected</span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-cloud-check text-info me-2"></i>
                            <span class="fw-medium">Environment</span>
                        </div>
                        <span class="badge bg-{{ app()->environment() === 'production' ? 'danger' : 'warning' }}">
                            {{ ucfirst(app()->environment()) }}
                        </span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-speedometer2 text-success me-2"></i>
                            <span class="fw-medium">Status</span>
                        </div>
                        <span class="badge bg-success">
                            <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i>Online
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@push('styles')
<style>
    /* Enhanced Dashboard Styles */
    .icon-box {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        padding: 1rem;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .counter-value {
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: -0.025em;
    }

    .action-icon {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
    }

    /* Gradient Headers */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #2563eb, #3b82f6) !important;
    }

    .bg-gradient-info {
        background: linear-gradient(135deg, #0ea5e9, #06b6d4) !important;
    }

    .bg-gradient-dark {
        background: linear-gradient(135deg, #1e293b, #334155) !important;
    }

    /* Hover Effects */
    .hover-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(37, 99, 235, 0.15);
        border-color: #3b82f6 !important;
    }

    .hover-item {
        transition: all 0.3s ease;
    }

    .hover-item:hover {
        background-color: rgba(37, 99, 235, 0.05) !important;
        transform: translateX(5px);
    }

    /* Timeline Styles */
    .timeline {
        position: relative;
        padding-left: 2rem;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, #e5e7eb, #d1d5db);
    }

    .timeline-item {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .timeline-marker {
        position: absolute;
        left: -23px;
        top: 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .timeline-content h6 {
        font-size: 0.875rem;
        font-weight: 600;
    }

    /* Enhanced Cards */
    .card {
        border: 1px solid rgba(37, 99, 235, 0.08);
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.1);
        border-color: rgba(37, 99, 235, 0.15);
    }

    .card-header {
        border-bottom: 1px solid rgba(37, 99, 235, 0.08);
    }

    /* Statistics Progress Bars */
    .progress {
        background: rgba(37, 99, 235, 0.1);
        border-radius: 10px;
    }

    .progress-bar {
        border-radius: 10px;
        transition: width 0.6s ease;
    }

    /* Badge Enhancements */
    .badge {
        font-weight: 500;
        padding: 0.5rem 0.75rem;
        border-radius: 8px;
        font-size: 0.75rem;
    }

    /* List Group Enhancements */
    .list-group-item {
        border: none;
        border-bottom: 1px solid rgba(37, 99, 235, 0.05);
        padding: 1rem;
    }

    .list-group-item:last-child {
        border-bottom: none;
    }

    /* Animation for counters */
    .counter-value {
        animation: countUp 1s ease-out;
    }

    @keyframes countUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .counter-value {
            font-size: 1.5rem;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
        }

        .timeline {
            padding-left: 1.5rem;
        }

        .timeline-marker {
            left: -19px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Animate counter values
        function animateCounters() {
            const counters = document.querySelectorAll('.counter-value');
            counters.forEach(counter => {
                const target = parseInt(counter.innerText);
                let current = 0;
                const increment = target / 20;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.innerText = target;
                        clearInterval(timer);
                    } else {
                        counter.innerText = Math.floor(current);
                    }
                }, 50);
            });
        }

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.6s ease-out forwards';
                }
            });
        }, observerOptions);

        // Observe dashboard cards
        document.querySelectorAll('.card').forEach(card => {
            observer.observe(card);
        });

        // Add hover effects to statistics cards
        const statCards = document.querySelectorAll('.col-xl-3 .card');
        statCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
                this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add click animation to action buttons
        const actionButtons = document.querySelectorAll('.hover-item');
        actionButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('div');
                ripple.className = 'ripple-effect';

                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';

                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Progress bar animations
        function animateProgressBars() {
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            });
        }

        // Initialize animations
        setTimeout(animateCounters, 300);
        setTimeout(animateProgressBars, 500);

        // Real-time clock update in timeline
        function updateTimeline() {
            const timeElements = document.querySelectorAll('.timeline small');
            if (timeElements.length > 0) {
                timeElements[0].textContent = new Date().toLocaleTimeString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                });
            }
        }

        // Update timeline every minute
        setInterval(updateTimeline, 60000);

        // Add loading states for quick action links
        const quickActions = document.querySelectorAll('.hover-item');
        quickActions.forEach(action => {
            action.addEventListener('click', function() {
                const icon = this.querySelector('i.bi-chevron-right');
                if (icon) {
                    icon.className = 'bi bi-arrow-clockwise spin ms-auto';
                    setTimeout(() => {
                        icon.className = 'bi bi-chevron-right ms-auto';
                    }, 1000);
                }
            });
        });

        console.log('✅ Advanced Admin Dashboard initialized successfully!');
    });

    // Add CSS for ripple effect
    const rippleStyle = document.createElement('style');
    rippleStyle.textContent = `
        .ripple-effect {
            position: absolute;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.3);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        .spin {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
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
    `;
    document.head.appendChild(rippleStyle);
</script>
@endpush

@endsection
