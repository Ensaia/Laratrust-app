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
                        {{ __('الأدوار') }}
                    </a>
                    <span class="px-2"><i class="fa-solid fa-chevron-left"></i></span>
                </li>
            </ol>
        </nav>

    </div>
    <x-alerts.errors></x-alerts.errors>
    <x-alerts.crud></x-alerts.crud>
    <x-alerts.forbidden></x-alerts.forbidden>
    <div class="relative overflow-x-auto">
        <table class="w-full text-md text-center text-gray-500 dark:text-gray-400 border text-center">
            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border">
            <tr class="">
                <th scope="col" class="px-6 py-3 border">
                    {{ __('#')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('اسم الدور')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('عنوان الدور')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('وصف الدور')  }}
                </th>

                <th scope="col" class="px-6 py-3 border" colspan="1">
                    {{ __('العمليات')  }}
                </th>
            </tr>
            </thead>
            <tbody>

            @foreach($roles as $role)
                @foreach($role->roles as $user_role)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 border w-10">
                            {{ $user_role->id  }}
                        </td>
                        <td class="px-6 py-4 border">
                            {{ $user_role->name  }}
                        </td>
                        <td class="px-6 py-4 border">
                            {{ $user_role->display_name  }}
                        </td>
                        <td>
                            {{ $user_role->description  }}
                        </td>
                        {{--actions--}}
                        <td class="px-6 py-2 w-10 border">
                            <form action="{{ route('detachRole',['id' => request()->id]) }}" method="post" id="delete-user-role-form-{{ $user_role->id }}">
                                @csrf
                                @method('post')
                                <input type="hidden" name="role_id" value="{{ $user_role->id }}">
                                <button type="button" data-user-role-id="{{ $user_role->id }}" class="delete-user-role-button btn btn-error">
                                    <span><i class="fa-solid fa-rectangle-xmark fa-lg"></i></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
    {{--    @php echo '<pre>'; print_r($abilities) @endphp--}}
</x-layouts.app>
<script>
     (() => {
        document.querySelectorAll('.delete-user-role-button').forEach(confirmButton => {
            confirmButton.addEventListener('click',  (event) => {
                event.preventDefault();
                let formID = confirmButton.getAttribute('data-user-role-id');
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
                        document.querySelector(`#delete-user-role-form-${formID}`).submit();
                        }
                    })


            });
        });
     }) () ;
</script>
