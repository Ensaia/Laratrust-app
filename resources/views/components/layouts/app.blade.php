<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon/auth.ico') }}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.all.min.css') }}">
</head>
@vite(['resources/js/app.js','resources/css/app.css'])
<body class="bg-gray-200 min-h-screen font-base">
<div class="flex flex-col md:flex-row" x-data="{ isSidebarOpen : true}">
    <x-views.sidebar></x-views.sidebar>
    <div class="w-full md:flex-1">
        <x-views.header></x-views.header>
        <main>
            <div class="px-8 py-6">
                {{ $slot }}
            </div>
        </main>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
 <script type="text/javascript" src="{{ asset('js/fontawesome.all.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>
