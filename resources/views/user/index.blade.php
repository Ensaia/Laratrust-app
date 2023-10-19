<x-layouts.app>
    <x-alerts.errors></x-alerts.errors>
    <x-alerts.crud></x-alerts.crud>
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
                <li>
                <li class="inline-flex items-center">
                    <a href="javascript::void(0)" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        {{ __('المستخدمون') }}
                    </a>
                    <span class="px-2"><i class="fa-solid fa-chevron-left"></i></span>
                </li>
            </ol>
        </nav>

    </div>
    <div class="flex md:flex-row py-5">
        <div>
            <a href="{{ route('attachUserRole') }}"
               class="btn btn-success px-2">
                <span class=""> {{ __('إضافة ادوار للمستخدمين')  }}</span>
                <span><i class="fa-solid fa-plus-square fa-lg"></i></span>
            </a>
        </div>
        <div>
            <a href="{{ route('attachUserPermission') }}"
               class="btn btn-success px-2 mr-2">
                <span> {{ __('إضافة اذونات للمستخدمين')  }}</span>
                <span><i class="fa-solid fa-plus-square fa-lg"></i></span>
            </a>
        </div>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-md text-gray-500 dark:text-gray-400 border text-center">
            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border">
            <tr class="">
                <th scope="col" class="px-6 py-3 border">
                    {{ __('#')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('اسم المستخدم')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('البريد الآلكتروني')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('صلاحيات المستخدم')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('اﻷدوار')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('اﻷذونات')  }}
                </th>

                <th scope="col" class="px-6 py-3 border" colspan="2">
                    {{ __('العمليات')  }}
                </th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 border w-10">
                        {{ $user->id  }}
                    </td>
                    <td class="px-6 py-4 border">
                        {{ $user->name  }}
                    </td>
                    <td class="px-6 py-4 border">
                        {{ $user->email  }}
                    </td>
                    <td class="px-6 py-4 border">
                        <div class="md:flex md:flex-row justify-center">
                            @foreach ($user->roles as $user_role)
                            <div>
                        <span class="mr-2 px-4 py-5 badge badge-success">{{ $user_role->name }}</span>
                    </div>
                    @endforeach
                        </div>
                    </td>
                    <td class="px-6 py-6 border">
                        <a href="{{ route('userRolesIndex',['id' => $user->id]) }}" class="link">
                            <span> {{ __('اﻷدوار')  }}</span>
                        </a>
                    </td>
                    <td class="px-6 py-4 border">
                        <a href="{{ route('userPermissionsIndex',['id' => $user->id]) }}" class="link">
                            <span> {{ __('اﻷذونات')  }}</span>
                        </a>
                    </td>
                    {{--actions--}}
                    <td class="px-6 py-2 w-10 border">
                        <form action="{{ route('userDestroy',['id' => $user->id]) }}" method="post" id="delete-user-form-{{ $user->id }}">
                            @csrf
                            @method('delete')
                            <button data-user-id="{{ $user->id }}"
                            type="button"
                                class="delete-user-button btn btn-error">
                                <span><i class="fa-solid fa-trash fa-lg"></i></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
     <div class="py-2 px-8 pt-2 mt-3 bg-white border rounded-lg shadow">
            {{ $users->links() }}
        </div>
    {{--    @php echo '<pre>'; print_r($abilities) @endphp--}}
</x-layouts.app>
<script>
    (() => {
        document.querySelectorAll('.delete-user-button').forEach(confirmButton => {
            confirmButton.addEventListener('click',  (event) => {
                event.preventDefault();
                let formID = confirmButton.getAttribute('data-user-id');
                Swal.fire({
                    title: 'هل أنت متأكد ؟',
                    text: "تحذير !! سيتم حذف جميع البيانات",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#228b22',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'إلغاء',
                    confirmButtonText: 'حذف البيانات'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.querySelector(`#delete-user-form-${formID}`).submit();
                        }
                    })


            });
        });
    }) () ;
</script>
