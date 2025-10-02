@extends('layouts.app')

@section('title', 'Login - EZofz.lk')

@section('content')
<style>
    /* Tech-themed card styling */
    .tech-card {
        background: rgba(15, 20, 30, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 214, 255, 0.2);
        box-shadow: 0 0 20px rgba(0, 214, 255, 0.1);
        border-radius: 12px;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .tech-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 214, 255, 0.2);
    }

    /* Scanline effect for card */
    .tech-card::before {
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

    /* Form input styling */
    .form-control {
        background: rgba(20, 25, 35, 0.9);
        border: 1px solid rgba(0, 214, 255, 0.3);
        color: #e0e0e0;
        transition: all 0.3s ease;
        font-family: 'Rajdhani', sans-serif;
        border-radius: 6px;
    }

    .form-control:focus {
        background: rgba(20, 25, 35, 1);
        border-color: var(--tech-cyan);
        box-shadow: 0 0 10px rgba(0, 214, 255, 0.5);
        color: #e0e0e0;
        animation: digitalTyping 0.3s ease;
    }

    .input-group-text {
        background: rgba(10, 14, 23, 0.8);
        border: 1px solid rgba(0, 214, 255, 0.3);
        color: var(--tech-cyan);
        border-radius: 6px 0 0 6px;
    }

    .form-label {
        color: #e0e0e0;
        font-family: 'Orbitron', sans-serif;
        font-weight: 500;
        text-shadow: 0 0 5px rgba(0, 214, 255, 0.3);
    }

    /* Error message styling */
    .invalid-feedback {
        color: var(--danger-color);
        font-family: 'Rajdhani', sans-serif;
        text-shadow: 0 0 5px rgba(239, 68, 68, 0.5);
    }

    /* Checkbox styling */
    .form-check-input {
        background-color: rgba(20, 25, 35, 0.9);
        border: 1px solid rgba(0, 214, 255, 0.3);
        transition: all 0.3s ease;
    }

    .form-check-input:checked {
        background-color: var(--tech-cyan);
        border-color: var(--tech-cyan);
        box-shadow: 0 0 8px rgba(0, 214, 255, 0.5);
    }

    .form-check-label {
        color: #e0e0e0;
        font-family: 'Rajdhani', sans-serif;
    }

    /* Button styling */
    .btn-primary {
        background: linear-gradient(135deg, var(--tech-blue), var(--tech-purple));
        border: none;
        font-family: 'Orbitron', sans-serif;
        font-weight: 600;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        animation: pulse 2s infinite;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.5);
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.7s ease;
    }

    .btn-primary:hover::before {
        left: 100%;
    }

    /* Google Sign-in Button */
    .google-btn {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #e0e0e0;
        font-family: 'Orbitron', sans-serif;
        font-weight: 600;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .google-btn:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.4);
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 255, 255, 0.1);
    }

    .google-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.7s ease;
    }

    .google-btn:hover::before {
        left: 100%;
    }

    .google-btn i {
        color: #4285f4;
    }

    /* Link styling */
    .text-decoration-none {
        color: var(--tech-cyan);
        font-family: 'Rajdhani', sans-serif;
        transition: all 0.3s ease;
    }

    .text-decoration-none:hover {
        text-shadow: 0 0 8px rgba(0, 214, 255, 0.5);
    }

    /* Demo credentials card */
    .card-title {
        font-family: 'Orbitron', sans-serif;
        color: var(--tech-cyan);
        text-shadow: 0 0 5px rgba(0, 214, 255, 0.3);
    }

    .card-body p {
        color: #e0e0e0;
        font-family: 'Rajdhani', sans-serif;
    }

    .card-body .text-muted {
        color: #d1d5db !important;
    }

    /* Digital typing animation for inputs */
    @keyframes digitalTyping {
        0% {
            transform: translateX(-5px);
            opacity: 0.5;
        }
        50% {
            transform: translateX(5px);
            opacity: 0.7;
        }
        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    /* Parallax effect for card background */
    .tech-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 50% 50%, rgba(0, 214, 255, 0.1), transparent 70%);
        z-index: -1;
        transition: transform 0.5s ease;
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .tech-card {
            padding: 1.5rem;
        }

        .form-label {
            font-size: 0.9rem;
        }

        .btn-primary {
            font-size: 1rem;
        }
    }
</style>

<script>
    // Parallax effect for tech-card
    document.addEventListener('mousemove', (e) => {
        const cards = document.querySelectorAll('.tech-card');
        cards.forEach(card => {
            const rect = card.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            const moveX = (e.clientX - centerX) / 50;
            const moveY = (e.clientY - centerY) / 50;

            card.style.setProperty('--parallax-x', `${moveX}px`);
            card.style.setProperty('--parallax-y', `${moveY}px`);
            card.querySelector('::after').style.transform = `translate(${moveX}px, ${moveY}px)`;
        });
    });
</script>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="tech-card scanline" data-aos="zoom-in" data-aos-duration="800">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="EZofz.lk" height="60" class="mb-3 pulse">
                        <h3 class="fw-bold" style="font-family: 'Orbitron', sans-serif; color: var(--tech-cyan); text-shadow: 0 0 10px rgba(0, 214, 255, 0.5);">Welcome Back!</h3>
                        <p style="color: #d1d5db; font-family: 'Rajdhani', sans-serif;">Sign in to access advanced tools</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password">
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('Login') }}
                            </button>
                        </div>

                        <div class="text-center mb-3">
                            <div class="d-flex align-items-center">
                                <hr class="flex-grow-1" style="border-color: rgba(0, 214, 255, 0.3);">
                                <span class="mx-3" style="color: #d1d5db; font-family: 'Rajdhani', sans-serif;">or</span>
                                <hr class="flex-grow-1" style="border-color: rgba(0, 214, 255, 0.3);">
                            </div>
                        </div>

                        <div class="d-grid mb-4">
                            <a href="{{ route('google.redirect') }}" class="btn btn-outline-light btn-lg google-btn">
                                <i class="bi bi-google me-2"></i>Sign in with Google
                            </a>
                        </div>

                        <div class="text-center">
                            @if (Route::has('password.request'))
                                <a class="text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>

                    <hr class="my-4" style="border-color: rgba(0, 214, 255, 0.2);">

                    <div class="text-center">
                        <p class="mb-0" style="color: #d1d5db; font-family: 'Rajdhani', sans-serif;">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Sign up here</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Demo Credentials -->
           <!-- <div class="tech-card mt-3 scanline" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="800">
                <div class="card-body">
                    <h6 class="card-title">Demo Credentials:</h6>

                    <p class="mb-0 text-muted small">Use these credentials to test the admin functionality</p>
                </div>
            </div>-->
        </div>
    </div>
</div>
@endsection
