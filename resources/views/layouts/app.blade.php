<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dubai Online Car Care') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>

        <style>
            .navbar .nav-link {
                position: relative;
                transition: color .2s ease;
            }

            .navbar .nav-link::after {
                content: "";
                position: absolute;
                left: 0;
                right: 0;
                bottom: -6px;
                height: 2px;
                background: #0d6efd;
                transform: scaleX(0);
                transform-origin: left;
                transition: transform .2s ease;
            }

            .navbar .nav-link:hover,
            .navbar .nav-link:focus {
                color: #0d6efd;
            }

            .navbar .nav-link:hover::after,
            .navbar .nav-link:focus::after {
                transform: scaleX(1);
            }

            .navbar .nav-link:active {
                color: #0a58ca;
            }

            .navbar .nav-link:active::after {
                transform: scaleX(1);
                background: #0a58ca;
            }

            .navbar .btn.btn-primary:hover,
            .navbar .btn.btn-primary:focus {
                filter: brightness(0.95);
                box-shadow: 0 8px 16px rgba(13, 110, 253, 0.25);
            }

            .navbar .btn.btn-primary:active {
                transform: translateY(1px);
                box-shadow: 0 4px 10px rgba(13, 110, 253, 0.2);
            }

            @media (max-width: 991.98px) {
                .navbar .nav-link {
                    padding: .65rem .75rem;
                    border-radius: .5rem;
                }

                .navbar .nav-link::after {
                    display: none;
                }

                .navbar .nav-link:hover,
                .navbar .nav-link:focus,
                .navbar .nav-link:active {
                    background: rgba(13, 110, 253, 0.08);
                }

                .navbar .btn.btn-primary {
                    width: 100%;
                }
            }

            .auth-btn,
            .auth-btn-outline {
                border: 1px solid #111;
                transition: background-color .2s ease, color .2s ease, border-color .2s ease, transform .1s ease;
            }

            .auth-btn {
                background-color: #111;
                color: #f8f9fa;
            }

            .auth-btn:hover,
            .auth-btn:focus {
                background-color: #f8f9fa;
                color: #111;
            }

            .auth-btn-outline {
                background-color: #f8f9fa;
                color: #111;
            }

            .auth-btn-outline:hover,
            .auth-btn-outline:focus {
                background-color: #111;
                color: #f8f9fa;
            }

            .auth-btn:active,
            .auth-btn-outline:active {
                transform: translateY(1px);
            }
        </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2 fw-semibold" href="{{ url('/') }}">
                    <span class="d-inline-flex align-items-center justify-content-center rounded-3 text-white" style="width: 36px; height: 36px; background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);">
                        <span class="fw-bold">D</span>
                    </span>
                    <span class="fs-6">{{ config('app.name', 'Dubai Online Car Care') }}</span>
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn {{ Route::is('register') ? 'auth-btn' : 'auth-btn-outline' }} btn-sm px-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn {{ Route::is('register') ? 'auth-btn-outline' : 'auth-btn' }} btn-sm px-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="navbarDropdown">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="px-3 py-2">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">Logout</button>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
</body>
</html>
