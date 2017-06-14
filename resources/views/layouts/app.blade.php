<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Styles -->
    <link href="/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
    @include('layouts.menu')

    @include('layouts._flash')

    @yield('content')

    <!-- Scripts -->
    <script src="/js/jquery-3.1.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>
