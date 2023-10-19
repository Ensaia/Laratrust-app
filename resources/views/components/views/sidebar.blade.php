<aside class="w-full md:w-64 bg-gray-800 md:min-h-screen" x-data="{ isMobileMenuOpen: false }" x-bind:class="{ 'md:-mr-64' : isSidebarOpen == false}">
    <div class="flex items-center justify-between bg-gray-900 p-4 h-16">
        <a href="{{ route('indexPage') }}" class="flex items-center">
            <img src="{{ asset('images/auth.png') }}" alt="Logo" class="w-12 h-12 items-center"/>
            <span class="text-gray-300 text-xl font-semibold mx-2">{{ config('app.name', 'Laravel') }}</span>
        </a>
        <div class="flex md:hidden">
            <button type="button" x-on:click="isMobileMenuOpen = !isMobileMenuOpen" onClick="toggleClass('#mobileMenuIcon','fa-bars','fa-xmark')"
                    class="text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500">
                <span class="w-8"><i class="fa-solid fa-bars fa-lg" id="mobileMenuIcon"></i></span>
            </button>
        </div>
    </div>
    <div class="px-2 py-6 md:block" x-bind:class="isMobileMenuOpen? 'block': 'hidden'" >
        <ul>
            <li class="px-2 py-3 bg-gray-900 rounded">
                <a href="{{ route('indexPage') }}" class="flex items-center">
                    <span class="w-6 text-gray-500"><i class="fa-solid fa-home-alt"></i></span>
                    <span class="mx-2 text-gray-300">{{ __('الرئيسية') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="{{ route('usersIndex') }}" class="flex items-center">
                    <span class="w-6 text-gray-500"><i class="fa-solid fa-users"></i></span>
                    <span class="mx-2 text-gray-300">{{ __('المستخدمون') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="{{ route('postsIndex') }}" class="flex items-center">
                    <span class="w-6 text-gray-500"><i class="fa-solid fa-book-open"></i></span>
                    <span class="mx-2 text-gray-300">{{ __('المنشورات') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="{{ route('permissionsIndex') }}" class="flex items-center">
                    <span class="w-6 text-gray-500"><i class="fa-solid fa-users-gear"></i></span>
                    <span class="mx-2 text-gray-300">{{ __('اﻷذونات') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="{{ route('rolesIndex') }}" class="flex items-center">
                    <span class="w-6 text-gray-500"><i class="fa-solid fa-users-cog"></i></span>
                    <span class="mx-2 text-gray-300">{{ __('اﻷدوار') }}</span>
                </a>
            </li>
        </ul>
        <div class="border-t border-gray-700 -mx-2 mt-2 md:hidden"></div>
        <ul class="mt-6 md:hidden">
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="{{ route('profile') }}" class="mx-2 text-gray-300">
                    <span class="w-6 text-gray-500"><i class="fa-solid fa-user"></i></span>
                    <span class="mx-2 text-gray-300">{{ __('الملف الشخصي') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <button class="mx-2 text-gray-300" x-on:click="logout">
                    <span class="w-6 text-gray-500"><i class="fa-solid fa-sign-out-alt"></i></span>
                    <span class="mx-2 text-gray-300">{{ __('تسجيل الخروج') }}</span>
                </button>
            </li>
        </ul>
    </div>
</aside>
