<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', env('APP_TITLE') . ' – Admin')</title>

    <link rel="stylesheet" href="{{ bustCache('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/font-awesome.min.css') }}">

    <link href="{{ bustCache('css/admin/main.css') }}" rel="stylesheet">

    @yield('head')
</head>

<body>
@include('admin.sections.header')

<div class="container mt-3">
    @include('admin.partials.alerts')
    @yield('content')
</div>

<script src="{{ bustCache('js/jquery.min.js') }}"></script>
<script src="{{ bustCache('js/bootstrap.min.js') }}"></script>

@yield('scripts')

</body>
</html>
