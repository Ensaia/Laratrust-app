<x-layouts.app>
    <x-alerts.forbidden></x-alerts.forbidden>
    <div class="py-3">
        <!-- Breadcrumb -->
        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('indexPage') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        {{ __('الرئيسية') }}
                    </a>
                    <span class="px-2"><i class="fa-solid fa-chevron-left"></i></span>
                </li>
            </ol>
        </nav>
    </div>
    {{--  CARDS  --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-4 gap-4">

            <div class="flex items-start p-4 rounded-xl shadow-lg bg-white">
                <div class="flex items-center justify-center bg-orange-50 h-12 w-12 rounded-full border border-orange-100">
                    <i class="fa-solid fa-users"></i>
                </div>

                <div class="mr-4">
                    <h2 class="font-semibold">{{ __('المستخدمون') }} {{ $count_users }}</h2>
                    <p class="mt-2 text-sm text-gray-500">{{ __('عدد المستخدمين الحاليين') }}</p>
                </div>
            </div>

            <div class="flex items-start p-4 rounded-xl shadow-lg bg-white">
                <div class="flex items-center justify-center bg-red-50 h-12 w-12 rounded-full border border-red-100">
                    <i class="fa-solid  fa-book-open"></i>
                </div>

                <div class="mr-4">
                    <h2 class="font-semibold">{{ __('المنشورات') }} {{ $count_posts }}</h2>
                    <p class="mt-2 text-sm text-gray-500">{{ __('عدد المنشورات الحالية') }}</p>
                </div>
            </div>

            <div class="flex items-start p-4 rounded-xl shadow-lg bg-white">
                <div class="flex items-center justify-center bg-indigo-50 h-12 w-12 rounded-full border border-indigo-100">
                    <i class="fa-solid fa-user-gear"></i>
                </div>

                <div class="mr-4">
                    <h2 class="font-semibold">{{ __('الأذونات') }} {{ $count_permissions }}</h2>
                    <p class="mt-2 text-sm text-gray-500">{{ __('عدد الأذونات الحالية') }}</p>
                </div>
            </div>

            <div class="flex items-start p-4 rounded-xl shadow-lg bg-white">
                <div class="flex items-center justify-center bg-indigo-50 h-12 w-12 rounded-full border border-indigo-100">
                    <i class="fa-solid fa-user-lock"></i>
                </div>

                <div class="mr-4">
                    <h2 class="font-semibold">{{ __('الأدوار') }} {{ $count_roles }}</h2>
                    <p class="mt-2 text-sm text-gray-500">{{ __('عدد الأدوار الحالية') }}</p>
                </div>
            </div>

        </div>
</x-layouts.app>
