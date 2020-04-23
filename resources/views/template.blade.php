<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="@yield('meta_description', 'Alytaus „Dainava“ – vienas seniausių ir žinomiausių Lietuvos futbolo klubų. Jį 1935 m. Alytuje įkūrė Lietuvos šaulių sąjungos vyrai.')">
    <title>@yield('title', env('APP_TITLE'))</title>

    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.html') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/fav.png') }}">
    <link rel="stylesheet" href="{{ bustCache('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/off-canvas.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('fonts/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/rsmenu-main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/rsmenu-transitions.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/rsanimations.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/rs-spaceing.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/select2.min.css') }}">
    @yield('head')
</head>

<body>
@include('sections.header')
@yield('content')
@include('sections.footer')

<script src="{{ bustCache('js/modernizr-2.8.3.min.js') }}"></script>
<script src="{{ bustCache('js/jquery.min.js') }}"></script>
<script src="{{ bustCache('js/bootstrap.min.js') }}"></script>
<script src="{{ bustCache('js/owl.carousel.min.js') }}"></script>
<script src="{{ bustCache('js/slick.min.js') }}"></script>
<script src="{{ bustCache('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ bustCache('js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ bustCache('js/wow.min.js') }}"></script>
<script src="{{ bustCache('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ bustCache('js/rsmenu-main.js') }}"></script>
<script src="{{ bustCache('js/plugins.js') }}"></script>
<script src="{{ bustCache('js/jquery.counterup.min.js') }}"></script>
<script src="{{ bustCache('js/waypoints.min.js') }}"></script>
<script src="{{ bustCache('js/swiper.min.js') }}"></script>
<script src="{{ bustCache('js/main.js') }}"></script>
<script src="{{ bustCache('js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('[class^=single-select-with-typing]').select2();
    });
</script>
@yield('scripts')
</body>

</html>
