<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $meta_title ?? 'Ranihati Construction Private Limited - RCPL' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description"
        content="{{ $meta_description ?? 'Ranihati Construction Private Limited (RCPL) is a leading construction and facade company in Kolkata, West Bengal. We specialize in civil construction, facade solutions, and interior designing.' }}">
    <meta name="keywords"
        content="{{ $meta_keywords ?? 'construction company kolkata, facade company kolkata, civil construction west bengal, interior design company, RCPL, Ranihati Construction' }}">
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $meta_title ?? 'Ranihati Construction Private Limited - RCPL' }}">
    <meta property="og:description"
        content="{{ $meta_description ?? 'Ranihati Construction Private Limited (RCPL) is a leading construction and facade company in Kolkata, West Bengal.' }}">
    <meta property="og:image" content="{{ $og_image ?? asset('img/logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $meta_title ?? 'Ranihati Construction Private Limited - RCPL' }}">
    <meta property="twitter:description"
        content="{{ $meta_description ?? 'Ranihati Construction Private Limited (RCPL) is a leading construction and facade company in Kolkata, West Bengal.' }}">
    <meta property="twitter:image" content="{{ $og_image ?? asset('img/logo.png') }}">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon" type="image/x-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('lib/flaticon/font/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/slick/slick-theme.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body>
    <div class="wrapper">
        <!-- Top Bar -->
        @include('frontend.includes.topbar')

        <!-- Navigation -->
        @include('frontend.includes.navbar')

        <!-- Main Content -->
        @yield('content')

        <!-- Footer -->
        @include('frontend.includes.footer')

        <!-- WhatsApp Button -->
        <a href="https://wa.me/919874444725" target="_blank" class="back-to-top">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/slick/slick.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/allCarousel.js') }}"></script>

    @stack('scripts')
</body>

</html>