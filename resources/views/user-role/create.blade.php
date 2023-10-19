<x-layouts.app>
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
                <li class="inline-flex items-center">
                    <a href="{{ route('usersIndex') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        {{ __('المستخدمون') }}
                    </a>
                    <span class="px-2"><i class="fa-solid fa-chevron-left"></i></span>
                </li>
                <li class="inline-flex items-center">
                    <a href="javascript::void(0)" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        {{ __('إضافة دور للمستخدم') }}
                    </a>
                    <span class="px-2"><i class="fa-solid fa-chevron-left"></i></span>
                </li>
            </ol>
        </nav>

    </div>
    <div class="mb-4 flex flex-col px-8 pb-8 pt-6 bg-white border rounded-lg shadow">
        <x-alerts.errors></x-alerts.errors>
        <x-alerts.crud></x-alerts.crud>
        <x-alerts.forbidden></x-alerts.forbidden>
        <form method="POST" action="{{ route('attachUserRoleStore') }}" class="">
            @method('post')
            @csrf

            <div class="-mx-3 mb-6 md:flex">
                <div class="px-3 md:w-full">
                    <label for="email" class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">{{ __('المستخدمون') }}</label>
                    <select name="user_id" id="user-id" class="select select-bordered w-full" required>
                        <option disabled selected>{{ __('المستخدمون') }}</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}"><span>{{ $user->email }}</span> -- <span>{{ $user->name }}</span></option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="-mx-3 mb-6 md:flex">
                <div class="px-3 md:w-full">
                    <label for="email" class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">{{ __('اﻷدوار') }}</label>
                    <select name="role_id" id="role-id" class="select select-bordered w-full" required>
                        <option disabled selected>{{ __('اختر دورا ') }}</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="-mx-3 mb-6 md:flex">
                <div class="px-3 md:w-full">
                    <button type="submit"
                            class="w-full btn btn-neutral">
                        {{ __('إضافة دور للمستخدم') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

</x-layouts.app>
