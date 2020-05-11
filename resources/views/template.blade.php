<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="@yield('meta_description', 'Alytaus „Dainava“ – vienas seniausių ir žinomiausių Lietuvos futbolo klubų. Jį 1935 m. Alytuje įkūrė Lietuvos šaulių sąjungos vyrai.')">
    <title>@yield('title', env('APP_TITLE'))</title>

    <link rel="icon" href="{{ asset('images/fav.png') }}" type="image/png">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ bustCache('css/custom.css') }}">
    <link rel="stylesheet" href="{{ bustCache('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ bustCache('css/color.css') }}">
    <link rel="stylesheet" href="{{ bustCache('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ bustCache('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ bustCache('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ bustCache('css/prettyPhoto.css') }}">
    <link rel="stylesheet" href="{{ bustCache('css/select2.min.css') }}">
    <!--Rev Slider Start-->
    <link rel="stylesheet" href="{{ bustCache('js/rev-slider/css/settings.css') }}"  type='text/css' media='all' />
    <link rel="stylesheet" href="{{ bustCache('js/rev-slider/css/layers.css') }}"  type='text/css' media='all' />
    <link rel="stylesheet" href="{{ bustCache('js/rev-slider/css/navigation.css') }}"  type='text/css' media='all' />
    @yield('head')
</head>

<body>
<div class="wrapper gray-bg">
    @include('sections.next_match')
    @include('sections.header')
    <div class="main-content wf100">
        @yield('content')
    </div>
    @include('sections.footer')
</div>

<!-- Optional JavaScript -->
<script src="{{ bustCache('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ bustCache('js/jquery-migrate-3.0.1.js') }}"></script>
<script src="{{ bustCache('js/popper.min.js') }}"></script>
<script src="{{ bustCache('js/bootstrap.min.js') }}"></script>
<script src="{{ bustCache('js/mobile-nav.js') }}"></script>
<script src="{{ bustCache('js/owl.carousel.min.js') }}"></script>
<script src="{{ bustCache('js/isotope.js') }}"></script>
<script src="{{ bustCache('js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ bustCache('js/jquery.countdown.js') }}"></script>
<script src="{{ bustCache('js/custom.js') }}"></script>
<script src="{{ bustCache('js/select2.min.js') }}"></script>
<!--Rev Slider Start-->
<script type="text/javascript" src="{{ bustCache('js/rev-slider/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ bustCache('js/rev-slider/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ bustCache('js/rev-slider.js') }}"></script>
<script type="text/javascript" src="{{ bustCache('js/rev-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ bustCache('js/rev-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ bustCache('js/rev-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ bustCache('js/rev-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ bustCache('js/rev-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ bustCache('js/rev-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ bustCache('js/rev-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ bustCache('js/rev-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ bustCache('js/rev-slider/js/extensions/revolution.extension.video.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('[class^=single-select-with-typing]').select2();
    });
</script>
@yield('scripts')
</body>

</html>
