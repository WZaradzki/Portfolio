<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('meta.meta_title', 'Wiktor Zaradzki - web dev') }}</title>
    <meta name="description" content="{{ config('meta.description', 'Wiktor Zaradzki - web dev') }}" />
    <meta name="robots" content="index, follow">
    <meta name="author" content="Zaraza">
    <meta name="keywords" content="{{ config('meta.keywords', 'web developing') }}" />

    <meta property=”og:title” content="{{ config('meta.meta_title', 'Wiktor Zaradzki - web dev') }}" />
    <meta property=”og:description” content="{{ config('meta.description', 'Wiktor Zaradzki - web dev') }}" />
    <meta property="og:type" content="website" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <script src="https://kit.fontawesome.com/36e97e30c4.js" crossorigin="anonymous"></script> --}}
    <!-- Scripts -->
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white-100">
        <div id="app"></div>
    </div>
</body>
<script src="{{ mix('js7/app.js') }}" type="text/javascript"></script>

</html>
