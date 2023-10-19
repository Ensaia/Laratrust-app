<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon/auth.ico') }}">
    <!-- Styles -->
    <link href="{{ asset(mix('/css/app.css')) }}" type="text/css" rel="stylesheet">
</head>
@vite(['resources/js/app.js','resources/css/app.css'])
<body>
    <div class="flex flex-col justify-center min-h-screen antialiased bg-gray-100">
        {{ $slot }}
    </div>
</body>

</html>
