<!DOCTYPE html>
<html lang="en">
    
<head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="description" content="Dubai Online Car Care">
        <meta name="author" content="">

        @yield("meta")

        <!-- Favicon and touch Icons -->
        <link href="{{ urlVersion('assets/img/favicon.png') }}" rel="shortcut icon" type="image/png">
        <link href="{{ urlVersion('assets/img/apple-touch-icon.html') }}" rel="apple-touch-icon">
        <link href="{{ urlVersion('assets/img/apple-touch-icon-72x72.html') }}" rel="apple-touch-icon" sizes="72x72">
        <link href="{{ urlVersion('assets/img/apple-touch-icon-114x114.html') }}" rel="apple-touch-icon" sizes="114x114">
        <link href="{{ urlVersion('assets/img/apple-touch-icon-144x144.html') }}" rel="apple-touch-icon" sizes="144x144">

        <!-- Page Title -->
        <title>@yield("title") Dubai Online Car Care</title>    

        <!-- Styles Include -->
        <link rel="stylesheet" href="{{ urlVersion('assets/css/main.css') }}">
        
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
        <script src="{{ urlVersion('assets/js/jquery-3.6.0.min.js') }}"></script>

        

        {{-- 
            https://dubaionlinecarcare.com/assets/js/jquery-3.6.0.min.js?v=1.0.1 // Disk Cache
        --}}
        <!-- Framework -->
        <script src="{{ urlVersion('assets/js/bootstrap.min.js') }}"></script>

         {{-- 
            https://dubaionlinecarcare.com/assets/js/bootstrap.min.js Disk Cache Failed
        --}}

        <!-- WOW Scroll Effect -->
        <script src="{{ urlVersion('plugins/wow/wow.min.js') }}"></script>

        <!-- Swiper Slider -->
        <script src="{{ urlVersion('plugins/swiper/swiper-bundle.min.js') }}"></script>

        <!-- Odometer Counter -->
        <script src="{{ urlVersion('plugins/odometer/appear.js') }}"></script>
        <script src="{{ urlVersion('plugins/odometer/odometer.js') }}"></script>

        <!-- Fancybox -->
        <script src="{{ urlVersion('plugins/fancybox/jquery.fancybox.min.js') }}"></script>

        <!-- Flatpickr -->
        <script src="{{ urlVersion('plugins/flatpickr/flatpickr.min.js') }}"></script>

        <!-- Nice Select -->
        <script src="{{ urlVersion('plugins/nice-select/jquery.nice-select.min.js') }}"></script>

        <!-- Theme Custom JS -->
        <script src="{{ urlVersion('assets/js/theme.js') }}"></script>
        <script src="{{ urlVersion('assets/js/pricetable-toggler.js') }}"></script>

    </body>
</html>