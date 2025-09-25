@extends('layouts.app')

@section('title', 'All Testimonials - EZofz.lk')
@section('description', 'Read testimonials from our satisfied users at EZofz.lk')

@push('styles')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --dark-bg: #0f1419;
        --card-bg: rgba(255, 255, 255, 0.95);
        --text-light: #8892b0;
        --border-color: rgba(255, 255, 255, 0.1);
    }

    body {
        background: linear-gradient(135deg, #0a0f1c 0%, #1a1f35 50%, #0f1419 100%);
        min-height: 100vh;
        position: relative;
        color: white;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background:
            radial-gradient(circle at 20% 50%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(120, 119, 198, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 40% 80%, rgba(64, 224, 208, 0.1) 0%, transparent 50%);
        pointer-events: none;
        z-index: -1;
    }

    .hero-header {
        padding: 120px 0 80px;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(102, 126, 234, 0.3);
    }

    .page-title {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #ffffff 0%, #e0e6ff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1.5rem;
    }

    .testimonial-card {
        background: rgba(15, 25, 40, 0.9);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(102, 126, 234, 0.3);
        transition: all 0.4s ease;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 35px 70px rgba(0, 0, 0, 0.4);
        border-color: rgba(102, 126, 234, 0.6);
    }

    .user-info {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .user-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        position: relative;
        overflow: hidden;
        border: 2px solid rgba(102, 126, 234, 0.3);
        transition: all 0.3s ease;
    }

    .user-avatar:hover {
        border-color: rgba(102, 126, 234, 0.6);
        transform: scale(1.05);
    }

    .avatar-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .avatar-initials {
        width: 100%;
        height: 100%;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 1.1rem;
    }

    .user-name {
        font-weight: 600;
        color: white;
        margin-bottom: 0.25rem;
    }

    .user-date {
        color: var(--text-light);
        font-size: 0.9rem;
    }

    .rating {
        margin-bottom: 1rem;
    }

    .star {
        color: #ffd700;
        font-size: 1.2rem;
    }

    .star.empty {
        color: #444;
    }

    .testimonial-content {
        color: #cbd5e0;
        line-height: 1.6;
        font-style: italic;
    }

    .no-testimonials {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--text-light);
    }

    .pagination {
        justify-content: center;
        margin-top: 3rem;
    }

    .pagination .page-link {
        background: rgba(15, 25, 40, 0.9);
        border: 1px solid rgba(102, 126, 234, 0.3);
        color: white;
        padding: 0.75rem 1rem;
        margin: 0 0.25rem;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        background: var(--primary-gradient);
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
    }

    .pagination .page-item.active .page-link {
        background: var(--primary-gradient);
        border-color: transparent;
    }
</style>
@endpush

@section('content')
<!-- Hero Header -->
<div class="hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="page-title">All Testimonials</h1>
                <p class="lead text-light">What our users say about EZofz.lk</p>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            @if($testimonials->count() > 0)
                @foreach($testimonials as $testimonial)
                    <div class="testimonial-card">
                        <div class="user-info">
                            <div class="user-avatar">
                                @if($testimonial->user->avatar)
                                    <img src="{{ $testimonial->user->avatar_url }}" alt="{{ $testimonial->user->name }}" class="avatar-image" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="avatar-initials" style="display: none;">
                                        {{ $testimonial->user->initials }}
                                    </div>
                                @else
                                    <div class="avatar-initials">
                                        {{ $testimonial->user->initials }}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <div class="user-name">{{ $testimonial->user->name }}</div>
                                <div class="user-date">{{ $testimonial->created_at->diffForHumans() }}</div>
                            </div>
                        </div>

                        <div class="rating">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star-fill star {{ $i <= $testimonial->rating ? '' : 'empty' }}"></i>
                            @endfor
                        </div>

                        <div class="testimonial-content">
                            "{{ $testimonial->content }}"
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $testimonials->links() }}
                </div>
            @else
                <div class="no-testimonials">
                    <i class="bi bi-chat-quote display-1 mb-3"></i>
                    <h3>No testimonials yet</h3>
                    <p>Be the first to share your experience with EZofz.lk!</p>
                    @auth
                        <a href="{{ route('about') }}#testimonials" class="btn btn-primary mt-3">
                            <i class="bi bi-plus-circle me-2"></i>Add Your Testimonial
                        </a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
