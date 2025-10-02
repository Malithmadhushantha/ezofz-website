@extends('layouts.app')

@section('title', 'Dashboard - EZofz.lk')

@section('content')
<div class="dashboard-page min-vh-100">
    <div class="container-fluid px-3 px-lg-4 py-3">
        <!-- Welcome Header -->
        <div class="row mb-4" data-aos="fade-up">
            <div class="col-12">
                <div class="welcome-card">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="welcome-content">
                                <h1 class="welcome-title">
                                    Welcome back, {{ Auth::user()->name }}!
                                    <span class="wave">👋</span>
                                </h1>
                                <p class="welcome-subtitle">
                                    Ready to explore legal documents and use our powerful tools?
                                    Your legal research companion awaits.
                                </p>
                                <div class="welcome-stats">
                                    <div class="stat-item">
                                        <i class="bi bi-calendar-check"></i>
                                        <span>Member since {{ Auth::user()->created_at->format('M Y') }}</span>
                                    </div>
                                    <div class="stat-item">
                                        <i class="bi bi-clock"></i>
                                        <span>Last login: {{ Auth::user()->last_login_at ? Auth::user()->last_login_at->diffForHumans() : 'First time!' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center">
                            <div class="profile-section">
                                <div class="profile-avatar-wrapper">
                                    @if(Auth::user()->avatar)
                                        <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" class="dashboard-avatar" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="dashboard-avatar-placeholder" style="display: none;">
                                            {{ Auth::user()->initials }}
                                        </div>
                                    @else
                                        <div class="dashboard-avatar-placeholder">
                                            {{ Auth::user()->initials }}
                                        </div>
                                    @endif
                                    <a href="{{ route('user.profile') }}" class="edit-profile-btn">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </div>
                                <h5 class="profile-name">{{ Auth::user()->name }}</h5>
                                <p class="profile-role">{{ Auth::user()->isAdmin() ? 'Administrator' : 'Member' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Messages -->
        @if (session('success'))
            <div class="row mb-4" data-aos="fade-up">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            </div>
        @endif

        <!-- Quick Actions -->
        <div class="row mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12">
                <h3 class="section-title">
                    <i class="bi bi-lightning-charge me-2"></i>Quick Actions
                </h3>
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('documents.index') }}" class="quick-action-card">
                            <div class="action-icon download-icon">
                                <i class="bi bi-download"></i>
                            </div>
                            <h5>Download Documents</h5>
                            <p>Access legal documents in PDF, Word, and Excel formats</p>
                            <div class="action-arrow">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <a href="#" class="quick-action-card">
                            <div class="action-icon typing-icon">
                                <i class="bi bi-keyboard"></i>
                            </div>
                            <h5>Sinhala Typing Tool</h5>
                            <p>Convert English text to Sinhala with our advanced tool</p>
                            <div class="action-arrow">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <a href="#" class="quick-action-card">
                            <div class="action-icon converter-icon">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <h5>Name Converter</h5>
                            <p>Convert names between Sinhala and English scripts</p>
                            <div class="action-arrow">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('user.profile') }}" class="quick-action-card">
                            <div class="action-icon profile-icon">
                                <i class="bi bi-person-gear"></i>
                            </div>
                            <h5>Manage Profile</h5>
                            <p>Update your account information and preferences</p>
                            <div class="action-arrow">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity & Statistics -->
        <div class="row mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-8">
                <div class="activity-card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bi bi-activity me-2"></i>Recent Activity
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="activity-timeline">
                            <div class="activity-item">
                                <div class="activity-icon login-activity">
                                    <i class="bi bi-box-arrow-in-right"></i>
                                </div>
                                <div class="activity-content">
                                    <h6>Logged into your account</h6>
                                    <p>{{ Auth::user()->last_login_at ? Auth::user()->last_login_at->format('M d, Y \a\t h:i A') : 'First time login' }}</p>
                                </div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-icon profile-activity">
                                    <i class="bi bi-person-check"></i>
                                </div>
                                <div class="activity-content">
                                    <h6>Account created</h6>
                                    <p>{{ Auth::user()->created_at->format('M d, Y \a\t h:i A') }}</p>
                                </div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-icon email-activity">
                                    <i class="bi bi-envelope-check"></i>
                                </div>
                                <div class="activity-content">
                                    <h6>Email verification</h6>
                                    <p>{{ Auth::user()->email_verified_at ? 'Verified on ' . Auth::user()->email_verified_at->format('M d, Y') : 'Pending verification' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="stats-card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bi bi-bar-chart me-2"></i>Your Statistics
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="stat-row">
                            <div class="stat-info">
                                <span class="stat-label">Account Status</span>
                                <span class="stat-value {{ Auth::user()->email_verified_at ? 'verified' : 'pending' }}">
                                    {{ Auth::user()->email_verified_at ? 'Verified' : 'Pending' }}
                                </span>
                            </div>
                            <div class="stat-icon">
                                <i class="bi bi-{{ Auth::user()->email_verified_at ? 'check-circle-fill' : 'clock-fill' }}"></i>
                            </div>
                        </div>

                        <div class="stat-row">
                            <div class="stat-info">
                                <span class="stat-label">Account Type</span>
                                <span class="stat-value admin-type">
                                    {{ Auth::user()->isAdmin() ? 'Administrator' : 'Standard User' }}
                                </span>
                            </div>
                            <div class="stat-icon">
                                <i class="bi bi-{{ Auth::user()->isAdmin() ? 'shield-check' : 'person' }}"></i>
                            </div>
                        </div>

                        <div class="stat-row">
                            <div class="stat-info">
                                <span class="stat-label">Member Since</span>
                                <span class="stat-value">{{ Auth::user()->created_at->format('M d, Y') }}</span>
                            </div>
                            <div class="stat-icon">
                                <i class="bi bi-calendar-date"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="row mb-5" data-aos="fade-up" data-aos-delay="300">
            <div class="col-12">
                <h3 class="section-title">
                    <i class="bi bi-compass me-2"></i>Explore EZofz.lk
                </h3>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="navigation-card">
                            <div class="nav-card-header">
                                <h5><i class="bi bi-file-text me-2"></i>Legal Documents</h5>
                                <p>Access comprehensive legal document collections</p>
                            </div>
                            <div class="nav-links">
                                <a href="{{ route('documents.index') }}" class="nav-link-item">
                                    <i class="bi bi-files"></i>
                                    <span>All Documents</span>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                                <a href="{{ route('documents.index', ['type' => 'pdf']) }}" class="nav-link-item">
                                    <i class="bi bi-file-pdf"></i>
                                    <span>PDF Documents</span>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                                <a href="{{ route('documents.index', ['type' => 'word']) }}" class="nav-link-item">
                                    <i class="bi bi-file-word"></i>
                                    <span>Word Documents</span>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                                <a href="{{ route('documents.index', ['type' => 'excel']) }}" class="nav-link-item">
                                    <i class="bi bi-file-excel"></i>
                                    <span>Excel Documents</span>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="navigation-card">
                            <div class="nav-card-header">
                                <h5><i class="bi bi-tools me-2"></i>Utility Tools</h5>
                                <p>Powerful tools for legal professionals and students</p>
                            </div>
                            <div class="nav-links">
                                <a href="#" class="nav-link-item">
                                    <i class="bi bi-keyboard"></i>
                                    <span>Sinhala Typing Tool</span>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                                <a href="#" class="nav-link-item">
                                    <i class="bi bi-person-badge"></i>
                                    <span>Name Converter</span>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                                <a href="#" class="nav-link-item">
                                    <i class="bi bi-translate"></i>
                                    <span>Text Translator</span>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                                <a href="#" class="nav-link-item">
                                    <i class="bi bi-search"></i>
                                    <span>Legal Search</span>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Management -->
        <div class="row" data-aos="fade-up" data-aos-delay="400">
            <div class="col-lg-8">
                <div class="account-card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bi bi-person-gear me-2"></i>Account Management
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <a href="{{ route('user.profile') }}" class="management-link">
                                    <div class="management-icon">
                                        <i class="bi bi-person-lines-fill"></i>
                                    </div>
                                    <div>
                                        <h6>Edit Profile</h6>
                                        <p>Update your personal information and preferences</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('user.profile') }}#security" class="management-link">
                                    <div class="management-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                    <div>
                                        <h6>Security Settings</h6>
                                        <p>Change password and manage account security</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="help-card">
                    <div class="help-content">
                        <i class="bi bi-question-circle help-icon"></i>
                        <h5>Need Help?</h5>
                        <p>Contact our support team for assistance with any questions or issues.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-chat-dots me-2"></i>Get Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
/* Dashboard Styles */
.dashboard-page {
    font-family: 'Inter', 'Segoe UI', sans-serif;
    background: linear-gradient(135deg,
        rgba(10, 14, 23, 0.95) 0%,
        rgba(5, 7, 12, 0.98) 50%,
        rgba(10, 14, 23, 0.95) 100%);
    color: #e2e8f0;
}

/* Welcome Card */
.welcome-card {
    background: rgba(15, 23, 42, 0.9);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

.welcome-title {
    color: #f8fafc;
    font-weight: 700;
    font-size: 2.5rem;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.wave {
    display: inline-block;
    animation: wave 2s ease-in-out infinite;
}

@keyframes wave {
    0%, 100% { transform: rotate(0deg); }
    10%, 30%, 50%, 70% { transform: rotate(-10deg) scale(1.1); }
    20%, 40%, 60% { transform: rotate(10deg) scale(1.1); }
    80% { transform: rotate(-5deg); }
}

.welcome-subtitle {
    color: #94a3b8;
    font-size: 1.2rem;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.welcome-stats {
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #60a5fa;
    font-weight: 500;
}

.stat-item i {
    font-size: 1.1rem;
}

/* Profile Section */
.profile-section {
    position: relative;
}

.profile-avatar-wrapper {
    position: relative;
    display: inline-block;
    margin-bottom: 1rem;
}

.dashboard-avatar, .dashboard-avatar-placeholder {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: 3px solid rgba(59, 130, 246, 0.3);
}

.dashboard-avatar-placeholder {
    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    font-weight: 700;
    color: white;
}

.edit-profile-btn {
    position: absolute;
    bottom: 0;
    right: 0;
    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
    color: white;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    border: 2px solid rgba(15, 23, 42, 1);
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
}

.edit-profile-btn:hover {
    transform: scale(1.1);
    color: white;
    box-shadow: 0 4px 16px rgba(59, 130, 246, 0.5);
}

.profile-name {
    color: #f8fafc;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.profile-role {
    color: #94a3b8;
    margin: 0;
}

/* Section Title */
.section-title {
    color: #60a5fa;
    font-weight: 600;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
}

/* Quick Action Cards */
.quick-action-card {
    background: rgba(15, 23, 42, 0.9);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 16px;
    padding: 2rem;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
    display: block;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.quick-action-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
    transition: left 0.5s ease;
}

.quick-action-card:hover::before {
    left: 100%;
}

.quick-action-card:hover {
    transform: translateY(-8px);
    border-color: rgba(59, 130, 246, 0.4);
    box-shadow: 0 16px 40px rgba(59, 130, 246, 0.15);
    text-decoration: none;
    color: inherit;
}

.action-icon {
    width: 64px;
    height: 64px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 1;
}

.download-icon {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
}

.typing-icon {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: white;
}

.converter-icon {
    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
    color: white;
}

.profile-icon {
    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
    color: white;
}

.quick-action-card h5 {
    color: #f8fafc;
    font-weight: 600;
    margin-bottom: 0.75rem;
}

.quick-action-card p {
    color: #94a3b8;
    margin-bottom: 1.5rem;
    line-height: 1.5;
}

.action-arrow {
    position: absolute;
    bottom: 1.5rem;
    right: 1.5rem;
    color: #60a5fa;
    font-size: 1.25rem;
    transition: transform 0.3s ease;
}

.quick-action-card:hover .action-arrow {
    transform: translateX(4px);
}

/* Card Styles */
.activity-card, .stats-card, .navigation-card, .account-card, .help-card {
    background: rgba(15, 23, 42, 0.9);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 16px;
    overflow: hidden;
    height: 100%;
}

.card-header {
    background: rgba(59, 130, 246, 0.1);
    border-bottom: 1px solid rgba(59, 130, 246, 0.2);
    padding: 1.25rem 1.5rem;
}

.card-header h5 {
    color: #60a5fa;
    margin: 0;
    font-weight: 600;
}

.card-body {
    padding: 1.5rem;
}

/* Activity Timeline */
.activity-timeline {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.activity-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.activity-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: white;
}

.login-activity {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}

.profile-activity {
    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
}

.email-activity {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
}

.activity-content h6 {
    color: #f8fafc;
    margin-bottom: 0.25rem;
    font-weight: 600;
}

.activity-content p {
    color: #94a3b8;
    margin: 0;
    font-size: 0.9rem;
}

/* Statistics */
.stat-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid rgba(59, 130, 246, 0.1);
}

.stat-row:last-child {
    border-bottom: none;
}

.stat-info {
    display: flex;
    flex-direction: column;
}

.stat-label {
    color: #94a3b8;
    font-size: 0.9rem;
    margin-bottom: 0.25rem;
}

.stat-value {
    color: #f8fafc;
    font-weight: 600;
}

.stat-value.verified {
    color: #10b981;
}

.stat-value.pending {
    color: #f59e0b;
}

.stat-value.admin-type {
    color: #60a5fa;
}

.stat-icon {
    color: #60a5fa;
    font-size: 1.25rem;
}

/* Navigation Cards */
.nav-card-header h5 {
    color: #f8fafc;
    margin-bottom: 0.5rem;
}

.nav-card-header p {
    color: #94a3b8;
    margin: 0;
}

.nav-links {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-top: 1.5rem;
}

.nav-link-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.75rem 1rem;
    background: rgba(30, 41, 59, 0.5);
    border-radius: 10px;
    color: #cbd5e1;
    text-decoration: none;
    transition: all 0.3s ease;
}

.nav-link-item:hover {
    background: rgba(59, 130, 246, 0.1);
    color: #60a5fa;
    text-decoration: none;
    transform: translateX(4px);
}

.nav-link-item i:first-child {
    color: #60a5fa;
    font-size: 1.1rem;
}

.nav-link-item i:last-child {
    margin-left: auto;
    font-size: 0.9rem;
}

/* Management Links */
.management-link {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.5rem;
    background: rgba(30, 41, 59, 0.5);
    border-radius: 12px;
    color: inherit;
    text-decoration: none;
    transition: all 0.3s ease;
    height: 100%;
}

.management-link:hover {
    background: rgba(59, 130, 246, 0.1);
    transform: translateY(-2px);
    text-decoration: none;
    color: inherit;
}

.management-icon {
    width: 48px;
    height: 48px;
    background: rgba(59, 130, 246, 0.1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #60a5fa;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.management-link h6 {
    color: #f8fafc;
    margin-bottom: 0.25rem;
    font-weight: 600;
}

.management-link p {
    color: #94a3b8;
    margin: 0;
    font-size: 0.9rem;
}

/* Help Card */
.help-card {
    background: linear-gradient(135deg,
        rgba(59, 130, 246, 0.1) 0%,
        rgba(99, 102, 241, 0.1) 100%);
    border: 1px solid rgba(59, 130, 246, 0.3);
}

.help-content {
    padding: 2rem;
    text-align: center;
}

.help-icon {
    font-size: 3rem;
    color: #60a5fa;
    margin-bottom: 1rem;
}

.help-card h5 {
    color: #f8fafc;
    margin-bottom: 1rem;
    font-weight: 600;
}

.help-card p {
    color: #94a3b8;
    margin-bottom: 1.5rem;
}

/* Custom Alert */
.custom-alert {
    background: rgba(16, 185, 129, 0.1);
    border: 1px solid rgba(16, 185, 129, 0.3);
    color: #10b981;
    border-radius: 12px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .welcome-card {
        padding: 1.5rem;
        text-align: center;
    }

    .welcome-title {
        font-size: 2rem;
        flex-direction: column;
        gap: 0.5rem;
    }

    .welcome-stats {
        justify-content: center;
        margin-top: 1rem;
    }

    .quick-action-card {
        padding: 1.5rem;
    }

    .card-body {
        padding: 1rem;
    }

    .management-link {
        padding: 1rem;
    }
}

@media (max-width: 576px) {
    .welcome-stats {
        flex-direction: column;
        gap: 1rem;
    }

    .stat-item {
        justify-content: center;
    }

    .action-icon {
        width: 48px;
        height: 48px;
        font-size: 1.5rem;
    }

    .quick-action-card h5 {
        font-size: 1.1rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }

    // Add hover effects to cards
    const cards = document.querySelectorAll('.quick-action-card, .management-link');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Auto-dismiss alerts
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);

    // Add loading states to links
    const actionLinks = document.querySelectorAll('.quick-action-card, .nav-link-item, .management-link');
    actionLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Add loading state for external links only
            if (this.getAttribute('href') === '#') {
                e.preventDefault();
                const originalText = this.innerHTML;
                this.innerHTML = '<div class="text-center"><i class="bi bi-hourglass-split me-2"></i>Coming Soon</div>';
                setTimeout(() => {
                    this.innerHTML = originalText;
                }, 2000);
            }
        });
    });
});
</script>
@endpush
@endsection
