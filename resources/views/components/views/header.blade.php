<nav class="hidden md:flex justify-between items-center bg-white p-4 shadow-md h-16">
    <div class="">
        <ul class="flex">
            <li class="mr-6">
                <button type="button" x-on:click="isSidebarOpen = !isSidebarOpen" onClick="toggleClass('#SidebarIcon','fa-bars','fa-xmark')">
                    <span class="w-6 text-gray-500"><i class="fa-solid fa-bars fa-lg" id="SidebarIcon"></i></span>
                    <span class="sr-only">Expand / collapse sidebar</span>
                </button>
            </li>
            <li class="mr-6">
                <a href="{{ route('indexPage') }}" class="px-1 py-3 rounded hover:bg-gray-200 hover:text-black hover:font-semibold">
                    <span class="w-6 text-gray-500"><i class="fa-solid fa-home-alt"></i></span>
                    <span class="mx-2 text-black">{{ __('الرئيسية') }}</span>
                </a>
            </li>
            <li class="mr-6">
                <a href="{{ route('usersIndex') }}" class="px-1 py-3 rounded hover:bg-gray-200 hover:text-black hover:font-semibold">
                    <span class="w-6 text-gray-500"><i class="fa-solid fa-users"></i></span>
                    <span class="mx-2 text-black">{{ __('المستخدمون') }}</span>
                </a>
            </li>

        </ul>
    </div>
{{-- RIGHT NAV --}}
    <div>
        <div class="flex flex-row">
{{-- DROP DOWN--}}
            @props([
            'align' => 'right'
            ])
            <div class="relative inline-flex" x-data="{ openDropDownMenu: false }">
                <button
                    class="inline-flex justify-center items-center group hover:bg-gray-200 hover:text-black hover:font-semibold px-3 py-3"
                    aria-haspopup="true"
                    x-on:click.prevent="openDropDownMenu = !openDropDownMenu"
                    x-bind:aria-expanded="openDropDownMenu"
                >
                    <img class="w-8 h-8 rounded-full" src="{{ asset('images/user.png') }}" width="32" height="32" alt="{{ Auth::user()->name }}" />
                    <div class="flex items-center truncate">
                        <span class="truncate mr-2 text-sm font-medium dark:text-slate-300 group-hover:text-slate-800 dark:group-hover:text-slate-200">{{ Auth::user()->name }}</span>
                        <span class=" mr-1 text-black" x-bind:class="{'rotate-180': openDropDownMenu}">
                            <i class="fa-solid fa-caret-down"></i>
                        </span>
                    </div>
                </button>
                <div
                    class="origin-top-right z-10 absolute top-full min-w-44 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1 {{$align === 'right' ? 'right-0' : 'left-0'}}"
                    x-on:click.outside="openDropDownMenu = false"
                    x-on:keydown.escape.window="openDropDownMenu = false"
                    x-show="openDropDownMenu"
                    x-transition:enter="transition ease-out duration-200 transform"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-out duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    x-cloak
                >
                    <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200 dark:border-slate-700">
                        <div class="font-medium text-slate-800 dark:text-slate-100">{{ Auth::user()->name }}</div>
                    </div>
                    <ul>
                        <li>
                            <a class="font-medium text-sm hover:bg-gray-200 hover:text-black hover:font-semibold flex items-center py-1 px-3" href="{{ route('profile') }}" @click="openDropDownMenu = false" @focus="openDropDownMenu = true" @focusout="openDropDownMenu = false">
                            <span class="w-6 text-gray-500"><i class="fa-solid fa-user"></i></span>
                            <span class="mx-2 text-black">{{ __('الملف الشخصي') }}</span>
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @method('post')
                                @csrf
                                <a class="font-medium text-sm hover:bg-gray-200 hover:text-black hover:font-semibold flex items-center py-1 px-3"
                                   href="{{ route('logout') }}"
                                   x-on:click.prevent="$root.submit();"
                                   x-on:focus="openDropDownMenu = true"
                                   x-on:focusout="openDropDownMenu = false"
                                >
                                    <span class="w-6 text-gray-500"><i class="fa-solid fa-sign-out-alt"></i></span>
                                    <span class="mx-2 text-black">{{ __('تسجيل الخروج') }}</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>