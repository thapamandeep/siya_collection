<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siya Collection</title>
<!-- Swiper CSS in HEAD -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Your style.css -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- Swiper JS -->

</head>
<body>

    @include('site.partials.header')

    
        @yield('content')
    

    @include('site.partials.footer')

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('js/hero-slide.js') }}"></script>

</body>
<!-- Swiper CSS -->
<!-- JS at END of BODY -->

</html>