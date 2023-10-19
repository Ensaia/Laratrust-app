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
                    <a href="{{ route('rolesIndex') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        {{ __('الأدوار') }}
                    </a>
                    <span class="px-2"><i class="fa-solid fa-chevron-left"></i></span>
                </li>
                <li class="inline-flex items-center">
                    <a href="javascript::void(0)" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        {{ __('الأذونات الممنوحة لدور') }}
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
        <table class="w-full text-md text-center text-gray-500 dark:text-gray-400 border">
            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border">
            <tr class="">
                <th scope="col" class="px-6 py-3 border">
                    {{ __('#')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('اسم اﻹذن')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('عنوان اﻹذن')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('وصف اﻹذن')  }}
                </th>

                <th scope="col" class="px-6 py-3 border" colspan="1">
                    {{ __('العمليات')  }}
                </th>
            </tr>
            </thead>
            <tbody>

            @foreach($roles as $role)
                @foreach($role->permissions as $role_permission)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                        <td class="px-6 py-4 border w-10">
                            {{ $role_permission->id  }}
                        </td>
                        <td class="px-6 py-4 border">
                            {{ $role_permission->name  }}
                        </td>
                        <td class="px-6 py-4 border">
                            {{ $role_permission->display_name  }}
                        </td>
                        <td>
                            {{ $role_permission->description  }}
                        </td>
                        {{--actions--}}
                        <td class="px-6 py-2 w-10 border">
                            <form action="{{ route('roleDetachPermission') }}" method="post" id="delete-role-permission-form-{{ $role_permission->id }}">
                                @csrf
                                @method('post')
                                <input type="hidden" name="role_id" value="{{ request()->id }}">
                                <input type="hidden" name="permission_id" value="{{ $role_permission->id }}">
                                <button class="delete-role-permission-button btn btn-error" type="button" data-role-permission-id={{ $role_permission->id }}>
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
</x-layouts.app>
<script>
     (() => {
        document.querySelectorAll('.delete-role-permission-button').forEach(confirmButton => {
            confirmButton.addEventListener('click',  (event) => {
                event.preventDefault();
                let formID = confirmButton.getAttribute('data-role-permission-id');
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
                        document.querySelector(`#delete-role-permission-form-${formID}`).submit();
                        }
                    })


            });
        });
     }) () ;
</script>