<x-layouts.auth>
    <x-alerts.errors />
    <x-alerts.status />

    <div class="mb-4 flex flex-col px-8 pb-8 pt-6">

        <div class="my-4 text-xs text-justify text-gray-400 sm:text-sm">
            {{ __('هل نسيت كلمة المرور ؟ ليست مشكلة ادخل بريد الآلكتروني وسيتم إرسال رسالة اعادة تعيين كلمة المرور الى بريدك الآلكتروني. ') }}
        </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

           <div class="-mx-3 mb-6 md:flex">
           <div class="px-3 md:w-full">
                <label for="email" class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">{{ __('البريد الآلكتروني') }}</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-3 py-2 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:shadow-outline focus:border-blue-300" />
            </div>
           </div>

            <div class="flex items-end justify-between">
                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="text-blue-600 transition duration-150 ease-in-out hover:text-blue-400 focus:outline-none focus:underline">
                    {{ __('ليس لديك حساب ؟') }}
                </a>
                @endif

                <div class="flex justify-end pt-4">
                    <button type="submit"
                        class="w-full text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        {{ __('إرسال رابط إعادة تعيين كلمة المرور') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</x-layouts.guest>
