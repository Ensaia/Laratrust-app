<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon/auth.ico') }}">
</head>
@vite(['resources/js/app.js','resources/css/app.css'])
<body>
       <div class="max-w-screen-md container m-auto p-4 md:p-6 2xl:p-10 ">
            {{ $slot }}
       </div>
</body>

</html>
