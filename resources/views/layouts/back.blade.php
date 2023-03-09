<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'K UI') }}</title>

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/back/app.css', 'resources/js/back/app.js'])
</head>

<body class="font-sans antialiased">
    <div x-data="mainState" x-on:resize.window="handleWindowResize" x-cloak>
        <div class="min-h-screen text-gray-700 bg-gray-100">
            <!-- Sidebar -->
            <x-sidebar.sidebar />

            <!-- Page Wrapper -->
            <div class="flex flex-col min-h-screen"
                :class="{
                    'lg:ml-64': isSidebarOpen,
                    'md:ml-16': !isSidebarOpen
                }"
                style="transition-property: margin; transition-duration: 150ms;">

                <!-- Navbar -->
                @include('layouts.nav-back')

                <!-- Page Content -->
                <main class="px-4 sm:px-6 flex-1 mt-6">
                    {{ $slot }}
                </main>

                <!-- Page Footer -->
                @include('layouts.footer-back')
            </div>
        </div>
    </div>
</body>

</html>
