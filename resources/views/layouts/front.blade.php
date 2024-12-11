<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if ($setting)
            {{ $setting->nama_sekolah }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

    @livewireStyles
</head>

<body x-data="{ 'navOpen': false }">
    <div id="app" class="wrapper position-relative" x-bind:class="{ 'open': navOpen }">
        <header class="header">
            @include('layouts.front.header')
            <!-- include header -->
        </header>

        <main style="padding-top: 70px; min-height: calc(100vh - 80px)" class="pb-5 page-content">

            {{ $slot }}
            <!-- tempat konten halaman -->
        </main>

        <!-- footer -->
        <!-- <footer class="footer bg-primary pt-3 pb-2">
            <div class="container text-muted d-flex justify-content-between">
                <p>Copywae &copy; @if ($setting)
{{ $setting->nama_sekolah }}
@endif, All Right Reserved.</p>
                <p>Developed by: 2Hrs</p>
            </div>
        </footer> -->
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
</body>

</html>
