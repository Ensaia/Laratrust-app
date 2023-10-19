<x-layouts.auth>
    <x-alerts.errors />
    <x-alerts.status />

    <div class="px-4 py-4 sm:mx-auto sm:w-full sm:max-w-lg sm:px-0">

        <div class="mb-4 text-sm text-gray-600">
            {{ __('شكرا لكم على التسجيل ! قبل البدء هل يمكنك تأكيد بريدك اﻵلكتروني بالضغط على الرابط الذي تم ارسالة اليك ؟ اذا لم تتلقى اي رسالة سيتم ارسالها الى بريدك اﻵلكتروني بكل سرور.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-sm text-green-600">
            {{ __('تم ارسال رسالة تحقق من البريد اﻵلكتروني جديدة الى البريد اﻵلكتروني الذي ادخلته اثناء التسجيل.') }}
        </div>
        @endif

        <div class="flex items-center justify-between mt-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <button type="submit"
                        class="flex justify-center px-2 py-2 text-white uppercase transition duration-300 ease-in-out bg-gray-800 border border-gray-900 rounded-md hover:bg-blue-800 focus:outline-none focus:shadow-outline active:bg-gray-700">
                        {{ __('إعادة ارسال رسالة التحقق من البريد اﻵلكتروني') }}
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="text-gray-700 underline uppercase hover:text-blue-700">
                    {{ __('تسجيل الخروج') }}
                </button>
            </form>
        </div>
    </div>
</x-layouts.guest>
