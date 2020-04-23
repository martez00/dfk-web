<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', env('APP_TITLE') . ' – Admin')</title>

    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.html') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/fav.png') }}">
    <link rel="stylesheet" href="{{ bustCache('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/font-awesome.min.css') }}">

    <link href="{{ bustCache('css/admin/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/select2.min.css') }}">

    @yield('head')
</head>

<body>
@include('admin.sections.header')

<div class="container">
    <div class="content bg-light p-3 light-shadow rounded">
        @include('admin.partials.alerts')
        @yield('content')
    </div>
</div>

<script src="{{ bustCache('js/jquery.min.js') }}"></script>
<script src="{{ bustCache('js/popper.min.js') }}"></script>
<script src="{{ bustCache('js/bootstrap.min.js') }}"></script>
<script src="{{ bustCache('js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@yield('scripts')
</body>
</html>
