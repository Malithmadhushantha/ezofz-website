@extends('layouts.app')

@section('title', 'My Profile - EZofz.lk')

@section('content')
<div class="profile-page min-vh-100">
    <div class="container-fluid px-3 px-lg-4 py-3">
        <!-- Header -->
        <div class="row mb-4" data-aos="fade-up">
            <div class="col-12">
                <div class="profile-header-card">
                    <div class="d-flex flex-column flex-lg-row align-items-center gap-4">
                        <div class="profile-avatar-section text-center">
                            <div class="avatar-container">
                                @if($user->avatar)
                                    <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="profile-avatar" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="profile-avatar-placeholder" style="display: none;">
                                        {{ $user->initials }}
                                    </div>
                                @else
                                    <div class="profile-avatar-placeholder">
                                        {{ $user->initials }}
                                    </div>
                                @endif
                                <div class="avatar-overlay">
                                    <i class="bi bi-camera"></i>
                                </div>
                            </div>
                            <h2 class="profile-name mt-3 mb-1">{{ $user->name }}</h2>
                            <p class="profile-email text-muted">{{ $user->email }}</p>
                            <span class="member-badge">
                                <i class="bi bi-star-fill me-1"></i>
                                Member since {{ $user->created_at->format('M Y') }}
                            </span>
                        </div>

                        <div class="profile-stats flex-grow-1">
                            <div class="row g-3">
                                <div class="col-lg-3 col-md-6">
                                    <div class="stat-card">
                                        <div class="stat-icon">
                                            <i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="stat-info">
                                            <h4>{{ $user->created_at->diffForHumans() }}</h4>
                                            <p>Member Since</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="stat-card">
                                        <div class="stat-icon">
                                            <i class="bi bi-clock-history"></i>
                                        </div>
                                        <div class="stat-info">
                                            <h4>{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}</h4>
                                            <p>Last Login</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="stat-card">
                                        <div class="stat-icon">
                                            <i class="bi bi-shield-check"></i>
                                        </div>
                                        <div class="stat-info">
                                            <h4>{{ $user->isAdmin() ? 'Admin' : 'User' }}</h4>
                                            <p>Account Type</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="stat-card">
                                        <div class="stat-icon">
                                            <i class="bi bi-check-circle"></i>
                                        </div>
                                        <div class="stat-info">
                                            <h4>{{ $user->email_verified_at ? 'Verified' : 'Pending' }}</h4>
                                            <p>Email Status</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="row mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12">
                <ul class="nav nav-pills profile-nav" id="profileTabs">
                    <li class="nav-item">
                        <button class="nav-link active" id="profile-info-tab" data-bs-toggle="pill" data-bs-target="#profile-info">
                            <i class="bi bi-person me-2"></i>Profile Information
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="security-tab" data-bs-toggle="pill" data-bs-target="#security">
                            <i class="bi bi-shield-lock me-2"></i>Security
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="preferences-tab" data-bs-toggle="pill" data-bs-target="#preferences">
                            <i class="bi bi-gear me-2"></i>Preferences
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="row mb-4" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="row mb-4" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="row mb-4" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Please fix the following errors:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <!-- Tab Content -->
        <div class="tab-content" id="profileTabContent">
            <!-- Profile Information Tab -->
            <div class="tab-pane fade show active" id="profile-info">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="profile-form-card" data-aos="fade-up" data-aos-delay="200">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="bi bi-person-lines-fill me-2"></i>Personal Information
                                </h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                   name="name" value="{{ old('name', $user->name) }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Email Address</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email', $user->email) }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                                   name="phone" value="{{ old('phone', $user->phone) }}"
                                                   placeholder="+94 77 123 4567">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Profile Picture</label>
                                            <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                                   name="avatar" accept="image/*">
                                            @error('avatar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">JPG, PNG or GIF. Max size: 2MB</small>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control @error('address') is-invalid @enderror"
                                                      name="address" rows="3" placeholder="Your address...">{{ old('address', $user->address) }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Bio</label>
                                            <textarea class="form-control @error('bio') is-invalid @enderror"
                                                      name="bio" rows="4" placeholder="Tell us about yourself...">{{ old('bio', $user->bio) }}</textarea>
                                            @error('bio')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-actions mt-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-check-lg me-2"></i>Update Profile
                                        </button>
                                        @if($user->avatar)
                                            <button type="button" class="btn btn-outline-danger" onclick="deleteAvatar()">
                                                <i class="bi bi-trash me-2"></i>Remove Photo
                                            </button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="profile-sidebar" data-aos="fade-up" data-aos-delay="300">
                            <div class="quick-actions-card">
                                <h6 class="card-title">
                                    <i class="bi bi-lightning me-2"></i>Quick Actions
                                </h6>
                                <div class="action-buttons">
                                    <a href="{{ route('dashboard') }}" class="action-btn">
                                        <i class="bi bi-speedometer2"></i>
                                        <span>Dashboard</span>
                                    </a>
                                    <a href="{{ route('documents.index') }}" class="action-btn">
                                        <i class="bi bi-download"></i>
                                        <span>Downloads</span>
                                    </a>
                                    <a href="#" class="action-btn">
                                        <i class="bi bi-keyboard"></i>
                                        <span>Typing Tool</span>
                                    </a>
                                    <a href="#" class="action-btn">
                                        <i class="bi bi-person-badge"></i>
                                        <span>Name Converter</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Tab -->
            <div class="tab-pane fade" id="security">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="profile-form-card" data-aos="fade-up" data-aos-delay="200">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="bi bi-lock me-2"></i>Change Password
                                </h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.password.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label">Current Password</label>
                                        <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                               name="current_password" required>
                                        @error('current_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                               name="new_password" required>
                                        @error('new_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control"
                                               name="new_password_confirmation" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-shield-check me-2"></i>Update Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="security-info-card" data-aos="fade-up" data-aos-delay="300">
                            <h6 class="card-title">
                                <i class="bi bi-info-circle me-2"></i>Security Information
                            </h6>
                            <div class="security-items">
                                <div class="security-item">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <div>
                                        <strong>Email Verification</strong>
                                        <p>{{ $user->email_verified_at ? 'Verified on ' . $user->email_verified_at->format('M d, Y') : 'Not verified' }}</p>
                                    </div>
                                </div>

                                <div class="security-item">
                                    <i class="bi bi-clock-fill text-info"></i>
                                    <div>
                                        <strong>Last Login</strong>
                                        <p>{{ $user->last_login_at ? $user->last_login_at->format('M d, Y \a\t h:i A') : 'Never logged in' }}</p>
                                    </div>
                                </div>

                                <div class="security-item">
                                    <i class="bi bi-calendar-fill text-primary"></i>
                                    <div>
                                        <strong>Account Created</strong>
                                        <p>{{ $user->created_at->format('M d, Y \a\t h:i A') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Preferences Tab -->
            <div class="tab-pane fade" id="preferences">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="profile-form-card" data-aos="fade-up" data-aos-delay="200">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="bi bi-sliders me-2"></i>Account Preferences
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="preference-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>Email Notifications</h6>
                                            <p class="text-muted mb-0">Receive updates about new features and content</p>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" checked>
                                        </div>
                                    </div>
                                </div>

                                <div class="preference-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>SMS Notifications</h6>
                                            <p class="text-muted mb-0">Receive SMS for important account updates</p>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </div>
                                </div>

                                <div class="preference-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>Dark Mode</h6>
                                            <p class="text-muted mb-0">Use dark theme for better night viewing</p>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" checked>
                                        </div>
                                    </div>
                                </div>

                                <div class="preference-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>Auto-save</h6>
                                            <p class="text-muted mb-0">Automatically save your work while typing</p>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="danger-zone-card" data-aos="fade-up" data-aos-delay="300">
                            <h6 class="card-title text-danger">
                                <i class="bi bi-exclamation-triangle me-2"></i>Danger Zone
                            </h6>
                            <div class="danger-actions">
                                <button class="btn btn-outline-danger btn-sm" onclick="confirmDeleteAccount()">
                                    <i class="bi bi-trash me-2"></i>Delete Account
                                </button>
                                <small class="text-muted d-block mt-2">
                                    This action cannot be undone. Your account and all data will be permanently deleted.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Avatar Form (Hidden) -->
<form id="deleteAvatarForm" action="{{ route('user.avatar.delete') }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@push('styles')
<style>
/* Profile Page Styles */
.profile-page {
    font-family: 'Inter', 'Segoe UI', sans-serif;
    background: linear-gradient(135deg,
        rgba(10, 14, 23, 0.95) 0%,
        rgba(5, 7, 12, 0.98) 50%,
        rgba(10, 14, 23, 0.95) 100%);
    color: #e2e8f0;
}

/* Profile Header */
.profile-header-card {
    background: rgba(15, 23, 42, 0.9);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

.profile-avatar-section {
    flex-shrink: 0;
}

.avatar-container {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

.profile-avatar, .profile-avatar-placeholder {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid rgba(59, 130, 246, 0.3);
}

.profile-avatar-placeholder {
    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    font-weight: 700;
    color: white;
}

.avatar-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    color: white;
    font-size: 1.5rem;
}

.avatar-container:hover .avatar-overlay {
    opacity: 1;
}

.profile-name {
    color: #f8fafc;
    font-weight: 700;
    margin: 0;
}

.profile-email {
    color: #94a3b8;
    margin: 0;
}

.member-badge {
    background: rgba(59, 130, 246, 0.1);
    color: #60a5fa;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 500;
    border: 1px solid rgba(59, 130, 246, 0.3);
    display: inline-block;
}

/* Stats Cards */
.stat-card {
    background: rgba(30, 41, 59, 0.8);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    height: 100%;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
    border-color: rgba(59, 130, 246, 0.4);
}

.stat-icon {
    background: rgba(59, 130, 246, 0.1);
    color: #60a5fa;
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin: 0 auto 1rem;
}

.stat-info h4 {
    color: #f8fafc;
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.stat-info p {
    color: #94a3b8;
    margin: 0;
    font-size: 0.9rem;
}

/* Navigation */
.profile-nav {
    background: rgba(15, 23, 42, 0.6);
    padding: 0.5rem;
    border-radius: 12px;
    border: 1px solid rgba(59, 130, 246, 0.2);
}

.profile-nav .nav-link {
    color: #94a3b8;
    border-radius: 8px;
    padding: 0.75rem 1.5rem;
    margin: 0 0.25rem;
    transition: all 0.3s ease;
    border: none;
    font-weight: 500;
    background: transparent;
}

.profile-nav .nav-link:hover {
    color: #60a5fa;
    background: rgba(59, 130, 246, 0.1);
}

.profile-nav .nav-link.active {
    color: #ffffff;
    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

/* Alert Styles */
.alert {
    background: rgba(15, 23, 42, 0.9);
    border: 1px solid rgba(59, 130, 246, 0.3);
    border-radius: 12px;
    color: #e2e8f0;
}

.alert-success {
    background: rgba(16, 185, 129, 0.1);
    border-color: rgba(16, 185, 129, 0.3);
    color: #6ee7b7;
}

.alert-danger {
    background: rgba(239, 68, 68, 0.1);
    border-color: rgba(239, 68, 68, 0.3);
    color: #fca5a5;
}

.alert .btn-close {
    filter: invert(1);
}

/* Form Cards */
.profile-form-card {
    background: rgba(15, 23, 42, 0.9);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 16px;
    overflow: hidden;
}

.profile-form-card .card-header {
    background: rgba(59, 130, 246, 0.1);
    border-bottom: 1px solid rgba(59, 130, 246, 0.2);
    padding: 1.25rem 1.5rem;
}

.profile-form-card .card-header h5 {
    color: #60a5fa;
    margin: 0;
    font-weight: 600;
}

.profile-form-card .card-body {
    padding: 1.5rem;
}

/* Form Styles */
.form-label {
    color: #cbd5e1;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.form-control {
    background: rgba(30, 41, 59, 0.8);
    border: 1px solid rgba(59, 130, 246, 0.3);
    color: #f8fafc;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    background: rgba(30, 41, 59, 0.9);
    border-color: #60a5fa;
    box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.1);
    color: #f8fafc;
}

.form-control::placeholder {
    color: #64748b;
}

.is-invalid {
    border-color: #ef4444;
}

.invalid-feedback {
    color: #fca5a5;
}

.form-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

/* Sidebar */
.profile-sidebar .quick-actions-card {
    background: rgba(15, 23, 42, 0.9);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 16px;
    padding: 1.5rem;
}

.quick-actions-card .card-title {
    color: #60a5fa;
    font-weight: 600;
    margin-bottom: 1rem;
}

.action-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.action-btn {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem;
    background: rgba(30, 41, 59, 0.6);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 10px;
    color: #cbd5e1;
    text-decoration: none;
    transition: all 0.3s ease;
}

.action-btn:hover {
    background: rgba(59, 130, 246, 0.1);
    border-color: rgba(59, 130, 246, 0.4);
    color: #60a5fa;
    text-decoration: none;
    transform: translateX(4px);
}

.action-btn i {
    font-size: 1.25rem;
}

/* Security Info */
.security-info-card {
    background: rgba(15, 23, 42, 0.9);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 16px;
    padding: 1.5rem;
}

.security-info-card .card-title {
    color: #60a5fa;
    font-weight: 600;
    margin-bottom: 1rem;
}

.security-items {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.security-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem;
    background: rgba(30, 41, 59, 0.5);
    border-radius: 10px;
}

.security-item i {
    font-size: 1.25rem;
    margin-top: 0.25rem;
}

.security-item strong {
    color: #f8fafc;
    display: block;
    margin-bottom: 0.25rem;
}

.security-item p {
    color: #94a3b8;
    margin: 0;
    font-size: 0.9rem;
}

/* Preferences */
.preference-item {
    padding: 1.5rem 0;
    border-bottom: 1px solid rgba(59, 130, 246, 0.1);
}

.preference-item:last-child {
    border-bottom: none;
}

.preference-item h6 {
    color: #f8fafc;
    margin-bottom: 0.25rem;
}

.form-check-input:checked {
    background-color: #60a5fa;
    border-color: #60a5fa;
}

.form-check-input:focus {
    box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.1);
}

/* Danger Zone */
.danger-zone-card {
    background: rgba(15, 23, 42, 0.9);
    border: 1px solid rgba(239, 68, 68, 0.3);
    border-radius: 16px;
    padding: 1.5rem;
}

.danger-zone-card .card-title {
    font-weight: 600;
    margin-bottom: 1rem;
}

.danger-actions .btn {
    border-radius: 8px;
    font-weight: 500;
}

/* Responsive Design */
@media (max-width: 768px) {
    .profile-header-card {
        padding: 1.5rem;
        text-align: center;
    }

    .profile-stats {
        margin-top: 2rem;
    }

    .profile-nav .nav-link {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }

    .action-btn {
        padding: 0.75rem;
    }

    .form-actions {
        flex-direction: column;
    }

    .form-actions .btn {
        width: 100%;
    }
}

@media (max-width: 576px) {
    .profile-avatar, .profile-avatar-placeholder {
        width: 80px;
        height: 80px;
    }

    .profile-name {
        font-size: 1.5rem;
    }

    .stat-card {
        padding: 1rem;
    }

    .profile-form-card .card-body {
        padding: 1rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Avatar upload preview
    const avatarInput = document.querySelector('input[name="avatar"]');
    const avatarContainer = document.querySelector('.avatar-container');

    if (avatarInput && avatarContainer) {
        avatarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validate file type
                const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Please select a valid image file (JPEG, PNG, JPG, or GIF).');
                    this.value = '';
                    return;
                }

                // Validate file size (2MB max)
                if (file.size > 2 * 1024 * 1024) {
                    alert('File size must be less than 2MB.');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const existingImg = avatarContainer.querySelector('.profile-avatar');
                    const placeholder = avatarContainer.querySelector('.profile-avatar-placeholder');

                    if (existingImg) {
                        existingImg.src = e.target.result;
                        existingImg.style.display = 'block';
                    } else if (placeholder) {
                        placeholder.outerHTML = `<img src="${e.target.result}" alt="Profile" class="profile-avatar">`;
                    }
                };
                reader.readAsDataURL(file);
            }
        });

        // Avatar container click to trigger file input
        avatarContainer.addEventListener('click', function() {
            avatarInput.click();
        });
    }

    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="bi bi-spinner-border spinner-border-sm me-2"></i>Saving...';
                submitBtn.disabled = true;
            }
        });
    });

    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

function deleteAvatar() {
    if (confirm('Are you sure you want to remove your profile picture?')) {
        const form = document.getElementById('deleteAvatarForm');
        const deleteBtn = event.target;

        // Show loading state
        deleteBtn.innerHTML = '<i class="bi bi-spinner-border spinner-border-sm me-2"></i>Removing...';
        deleteBtn.disabled = true;

        form.submit();
    }
}

function confirmDeleteAccount() {
    if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
        if (confirm('This will permanently delete all your data. Are you absolutely sure?')) {
            // Implement account deletion logic here
            alert('Account deletion feature will be implemented soon.');
        }
    }
}
</script>
@endpush
@endsection
