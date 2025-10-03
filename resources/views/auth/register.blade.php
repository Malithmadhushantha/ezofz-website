@extends('layouts.app')

@section('title', 'Register - EZofz.lk')

@section('content')
<style>
    /* Professional register card styling */
    .register-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(37, 99, 235, 0.1);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .register-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
    }

    /* Professional header gradient */
    .register-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        padding: 2rem;
        text-align: center;
        color: white;
        margin: -2rem -2rem 2rem -2rem;
    }

    /* Professional form styling */
    .form-control {
        background: #ffffff;
        border: 2px solid var(--medium-gray);
        color: var(--text-dark);
        transition: all 0.3s ease;
        font-family: 'Inter', sans-serif;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
    }

    .form-control:focus {
        background: #ffffff;
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        color: var(--text-dark);
        outline: none;
    }

    .input-group-text {
        background: var(--light-gray);
        border: 2px solid var(--medium-gray);
        color: var(--primary-blue);
        border-radius: 10px 0 0 10px;
        border-right: none;
    }

    .form-label {
        color: var(--text-dark);
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    /* Professional error styling */
    .invalid-feedback {
        color: var(--danger-color);
        font-family: 'Inter', sans-serif;
        font-weight: 500;
    }

    /* Professional checkbox styling */
    .form-check-input {
        background-color: #ffffff;
        border: 2px solid var(--medium-gray);
        transition: all 0.3s ease;
        border-radius: 6px;
    }

    .form-check-input:checked {
        background-color: var(--primary-blue);
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .form-check-label {
        color: var(--text-dark);
        font-family: 'Inter', sans-serif;
        font-weight: 500;
    }

    .form-check-label a {
        color: var(--primary-blue);
        text-decoration: none;
        font-weight: 600;
    }

    .form-check-label a:hover {
        color: var(--secondary-blue);
        text-decoration: underline;
    }

    /* Professional button styling */
    .btn-primary {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        border: none;
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        border-radius: 10px;
        padding: 0.75rem 2rem;
        font-size: 1rem;
        letter-spacing: 0.025em;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.25);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.35);
        background: linear-gradient(135deg, var(--secondary-blue) 0%, var(--primary-blue) 100%);
    }

    /* Professional Google button */
    .google-btn {
        background: #ffffff;
        border: 2px solid var(--medium-gray);
        color: var(--text-dark);
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        border-radius: 10px;
        padding: 0.75rem 2rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .google-btn:hover {
        background: var(--light-gray);
        border-color: var(--primary-blue);
        color: var(--text-dark);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .google-btn i {
        color: #4285f4;
    }

    /* Professional link styling */
    .text-decoration-none.fw-bold {
        color: var(--primary-blue);
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .text-decoration-none.fw-bold:hover {
        color: var(--secondary-blue);
        text-decoration: underline !important;
    }

    /* Professional divider */
    .register-divider {
        color: var(--text-light);
        font-family: 'Inter', sans-serif;
        font-weight: 500;
    }

    .register-divider hr {
        border-color: var(--medium-gray) !important;
    }

    /* Page background */
    body {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%) !important;
        min-height: 100vh;
    }

    /* Professional text styling */
    .register-text {
        color: var(--text-dark);
        font-family: 'Inter', sans-serif;
    }

    .register-subtitle {
        color: var(--text-light);
        font-family: 'Inter', sans-serif;
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .register-card {
            margin: 1rem;
        }

        .register-header {
            padding: 1.5rem;
            margin: -1.5rem -1.5rem 1.5rem -1.5rem;
        }

        .form-label {
            font-size: 0.9rem;
        }

        .btn-primary, .google-btn {
            font-size: 1rem;
        }
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="register-card" data-aos="zoom-in" data-aos-duration="800">
                <div class="register-header">
                    <img src="{{ asset('images/logo.png') }}" alt="EZofz.lk" height="60" class="mb-3">
                    <h3 class="fw-bold mb-2">Join EZofz.lk</h3>
                    <p class="mb-0 opacity-90">Create your account to access professional tools</p>
                </div>
                <div class="card-body p-4">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                       name="password" required autocomplete="new-password">
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label small" for="terms">
                                    I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and
                                    <a href="#" class="text-decoration-none">Privacy Policy</a>
                                </label>
                            </div>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-person-plus me-2"></i>{{ __('Register') }}
                            </button>
                        </div>

                        <div class="text-center mb-3">
                            <div class="d-flex align-items-center">
                                <hr class="flex-grow-1 register-divider">
                                <span class="mx-3 register-divider">or</span>
                                <hr class="flex-grow-1 register-divider">
                            </div>
                        </div>

                        <div class="d-grid mb-4">
                            <a href="{{ route('google.redirect') }}" class="btn btn-outline-light btn-lg google-btn">
                                <i class="bi bi-google me-2"></i>Sign up with Google
                            </a>
                        </div>
                    </form>

                    <hr class="my-4" style="border-color: var(--medium-gray);">

                    <div class="text-center">
                        <p class="mb-0 register-text">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-decoration-none fw-bold">Sign in here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
