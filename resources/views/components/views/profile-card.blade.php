    <div class="px-6 py-6 text-center lg:mt-0 xl:px-10 card bg-base-100 shadow-xl bg-white">
        <div class="space-y-4 xl:space-y-6 ">
            <img class="mx-auto rounded-full h-[90px] w-[90px]" src="{{ asset('images/user.png') }}"
                 alt="user avatar">
            <div class="space-y-2">
                <div
                    class="flex justify-center items-center flex-col space-y-3 text-lg font-medium leading-6">
                    <div>
                        <h3 class="text-black">اسم المستخدم : {{ auth()->user()->name }}</h3>
                    </div>
                    <div>
                        <h4 class="text-black">البريد الآلكتروني : {{ auth()->user()->email }}</h4>
                    </div>
                    @if(auth()->user()->email_verified_at != null)
                    <div class="bg-green-300 py-3 px-3">
                        <h4 >
                            <span class="text-green-700">تم التأكد من صحة البريداﻷلكتروني</span>
                            <span class="pr-2"><i class="text-green-500 text-[1.2rem] fa-solid fa-check-circle"></i></span>
                        </h4>
                    </div>
                    @endif
                        @if(auth()->user()->email_verified_at === null)
                        <div v-else class="mt-4">
                            <form action="" method="post">
                                @csrf
                                @method('post')
                                <button type="submit" class="btn btn-neutral md:w-full">التأكد من صحة البريد
                                    اﻻلكتروني
                                </button>
                            </form>
                        </div>
                    @endif
                    <div class="divide-gray-500"></div>
                    <div><p class="text-black text-bold">مطور ويب Back-End</p></div>
                    <div class="flex flex-row py-1.5 ">
                        <div class="px-1 items-center">
                            <a href="#" target="_blank">
                                <span class="sr-only">Twitter</span>
                                <span class="text-black hover:text-gray-500"><i
                                        class="fa-brands fa-square-twitter fa-2xl"></i></span>
                            </a>
                        </div>
                        <div class="px-1 items-center">
                            <a href="#" target="_blank">
                                <span class="sr-only">GitHub</span>
                                <span class="text-black hover:text-gray-500"><i
                                        class="fa-brands fa-square-github fa-2xl"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="mt-3 space-x-5">
                        <div class="flex flex-row">
                            @php $roles = App\Models\User::with('roles')->where('id','=' , auth()->user()->id)->get(); @endphp
                            @foreach($roles as $role)
                                @foreach($role->roles as $user_role)
                            <div class="px-1">
                               <span class="mr-2 px-4 py-5 badge badge-success">{{ $user_role->name }}</span>
                            </div>
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
       <div class="px-6 py-4 border border-gray-300 rounded mt-5 bg-white border rounded-lg shadow">
                <h2 class="mb-4 font-semibold text-black font-bold">{{ __('التأكيد والتحقق') }}</h2>
                @if (Route::has('password.confirm'))
                <div>
                    <a href="{{ route('password.confirm') }}"
                        class="link link-primary">
                        {{ __('تأكيد كلمة المرور ؟') }}
                    </a>
                </div>
                @endif
                @if (Route::has('password.confirmation'))
                <div>
                    <a href="{{ route('password.confirmation') }}"
                        class="link link-primary">
                        {{ __('حالة تأكيد كلمة المرور ؟') }}
                    </a>
                </div>
                @endif
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()))
                <div>
                    <a href="{{ route('verification.notice') }}"
                        class="link link-primary">
                        {{ __('التحقق من صحة البريد الآلكتروني ؟') }}
                    </a>
                </div>
                @endif
            </div>
