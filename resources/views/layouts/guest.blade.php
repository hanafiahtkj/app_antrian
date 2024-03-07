<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('vendor/metrica/dist/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                background-image: url("{{ asset('img/puskesmas.png') }}");
                background-repeat: no-repeat;
                background-position: center;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" id="bg-logo" style="background-color:#ffffffd1!important">
            <div class="text-center">
                <p class="fs-1 fw-bold">Selamat Datang</p>
                <p class="fs-1 fw-bold">Login</p>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-transparent  overflow-hidden sm:rounded-lg pt-4">
                {{ $slot }}
            </div>

            <footer class="footer text-center mt-4">
                &copy; <span class="text-muted d-none d-sm-inline-block">Polanka NadiaIntania. Some Right Reserved</span>
            </footer>
        </div>
    </body>
</html>
