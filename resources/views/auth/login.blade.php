@extends('layouts.app')

@section('content')
<main class="min-vh-100 d-flex align-items-center bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-9">
                <section class="card border-0 shadow-lg overflow-hidden">
                    <div class="row g-0">
                        <div class="col-lg-5 d-none d-lg-flex">
                            <div class="w-100 h-100 p-4 p-xl-5 text-white" style="background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);">
                                <div class="h-100 d-flex flex-column justify-content-between">
                                    <div>
                                        <h2 class="h3 fw-semibold mb-3">{{ __('Welcome Back') }}</h2>
                                        <p class="mb-0 opacity-75">Sign in to manage your account, view updates, and keep things moving.</p>
                                    </div>
                                    <div class="mt-4">
                                        <div class="bg-white bg-opacity-10 rounded-4 p-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                        <path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2Zm1 14.93V20h-2v-3.07A8.006 8.006 0 0 1 4.07 13H7v-2H4.07A8.006 8.006 0 0 1 11 4.07V7h2V4.07A8.006 8.006 0 0 1 19.93 11H17v2h2.93A8.006 8.006 0 0 1 13 16.93Z"/>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold">Secure sign-in</div>
                                                    <small class="opacity-75">Your data stays protected.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7">
                            <div class="card-body p-4 p-md-5">
                                <header class="mb-4">
                                    <h1 class="h4 mb-1">{{ __('Login') }}</h1>
                                    <p class="text-muted mb-0">Enter your credentials to continue.</p>
                                </header>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>
@endsection
