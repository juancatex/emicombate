<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'EMI') }}</title>
        <link rel="stylesheet" href="/dist/libs/cropper/dist/cropper.min.css">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="accountbg font-sans antialiased">
        @inertia
        <script src="/dist/libs/jquery/dist/jquery.min.js"></script>   
        <script src="/dist/libs/cropper/dist/cropper.min.js"></script>
    </body>
</html>
