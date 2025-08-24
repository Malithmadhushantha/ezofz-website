@extends('layouts.app')

@section('title', 'Login - EZofz.lk')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0" data-aos="fade-up">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="EZofz.lk" height="60" class="mb-3">
                        <h3 class="fw-bold text-primary">Welcome Back!</h3>
                        <p class="text-muted">Sign in to access your account</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
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

                        <div class="mb-3">
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

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('Login') }}
                            </button>
                        </div>

                        <div class="text-center">
                            @if (Route::has('password.request'))
                                <a class="text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="mb-0">Don't have an account?
                            <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Sign up here</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Demo Credentials -->
            <div class="card mt-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card-body">
                    <h6 class="card-title">Demo Credentials:</h6>
                    <p class="mb-1"><strong>Admin:</strong> admin@ezofz.lk / password123</p>
                    <p class="mb-0 text-muted small">Use these credentials to test the admin functionality</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
