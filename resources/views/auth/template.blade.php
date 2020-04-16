<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', env('APP_TITLE'))</title>

    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.html') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/fav.png') }}">
    <link rel="stylesheet" href="{{ bustCache('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('fonts/auth/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('fonts/auth/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/auth/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ bustCache('css/auth/main.css') }}">
</head>
<body>
@yield('content')

<script src="{{ bustCache('js/jquery.min.js') }}"></script>
<script src="{{ bustCache('js/auth/popper.js') }}"></script>
<script src="{{ bustCache('js/bootstrap.min.js') }}"></script>
<script src="{{ bustCache('js/auth/main.js') }}"></script>

</body>
</html>