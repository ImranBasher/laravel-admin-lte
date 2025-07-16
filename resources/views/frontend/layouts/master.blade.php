<!DOCTYPE html>
<html lang="zxx">
    
<!-- Mirrored from wpthemebooster.com/demo/themeforest/html/ducatibox/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Jun 2025 18:26:40 GMT -->
<head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="description" content="Dubai Online Car Care">
        <meta name="author" content="">

        <!-- Favicon and touch Icons -->
        <link href="{{ asset('assets/img/favicon.png') }}" rel="shortcut icon" type="image/png">
        <link href="{{ asset('assets/img/apple-touch-icon.html') }}" rel="apple-touch-icon">
        <link href="{{ asset('assets/img/apple-touch-icon-72x72.html') }}" rel="apple-touch-icon" sizes="72x72">
        <link href="{{ asset('assets/img/apple-touch-icon-114x114.html') }}" rel="apple-touch-icon" sizes="114x114">
        <link href="{{ asset('assets/img/apple-touch-icon-144x144.html') }}" rel="apple-touch-icon" sizes="144x144">

        <!-- Page Title -->
        <title>Dubai Online Car Care</title>    

        <!-- Styles Include -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        
    </head>


    <body>
        @include('frontend.include.header')

        <!-- Main Wrapper-->
        <main class="wrapper">
            @yield('content')
        </main>

        @include('frontend.include.footer')
        @stack('custom-scripts')  <!-- For JavaScript -->

        <!-- Core JS -->
        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

        <!-- Framework -->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

        <!-- WOW Scroll Effect -->
        <script src="{{ asset('plugins/wow/wow.min.js') }}"></script>

        <!-- Swiper Slider -->
        <script src="{{ asset('plugins/swiper/swiper-bundle.min.js') }}"></script>

        <!-- Odometer Counter -->
        <script src="{{ asset('plugins/odometer/appear.js') }}"></script>
        <script src="{{ asset('plugins/odometer/odometer.js') }}"></script>

        <!-- Fancybox -->
        <script src="{{ asset('plugins/fancybox/jquery.fancybox.min.js') }}"></script>

        <!-- Flatpickr -->
        <script src="{{ asset('plugins/flatpickr/flatpickr.min.js') }}"></script>

        <!-- Nice Select -->
        <script src="{{ asset('plugins/nice-select/jquery.nice-select.min.js') }}"></script>

        <!-- Theme Custom JS -->
        <script src="{{ asset('assets/js/theme.js') }}"></script>
        <script src="{{ asset('assets/js/pricetable-toggler.js') }}"></script>

    </body>


<!-- Mirrored from wpthemebooster.com/demo/themeforest/html/ducatibox/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Jun 2025 18:27:03 GMT -->
</html>