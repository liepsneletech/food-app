<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pavadinimas</title>

    <!-- Scripts -->
    @vite(['resources/css/front/app.css', 'resources/js/front/app.js'])
</head>

<body>
    @include('layouts.nav-front')

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    <!-- Page Footer -->
    @include('layouts.footer-front')


</body>

</html>
