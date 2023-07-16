<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ Session::token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="{{ asset('css/rfs.css') }}" rel="stylesheet">
    <link href="/css/master.css" rel="stylesheet">
    <link href="/css/sidebar.css" rel="stylesheet">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ asset('/img/logo-primary.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script>$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});</script>
</head>
<body class="min-vh-100 d-flex flex-column">
    @include('layout.nav')
    @yield('content')
    <script src="/js/sidebar.js"></script>
</body>
</html>