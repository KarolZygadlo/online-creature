<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
</head>
<body class="min-w-[350px]" id="zooming">
@include('blocks.header')

@yield('content')

@include('blocks.footer')

<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script>
    new WOW({
        mobile: false,
        offset: 100
    }).init();
</script>
@yield('scripts')
</body>
