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
            </ol>
        </nav>

    </div>
    <x-alerts.errors></x-alerts.errors>
    <x-alerts.crud></x-alerts.crud>
    <x-alerts.forbidden></x-alerts.forbidden>
<div class="flex md:flex-row py-5">
<div>
    <a href="{{ route('roleCreate') }}" class="btn btn-success">
        <span> {{ __('إضافة دور')  }}</span>
        <span><i class="fa-solid fa-plus-square fa-lg"></i></span>
    </a>
</div>
<div>
    <a href="{{ route('roleAttachPermission') }}" class="btn btn-success mr-2">
        <span> {{ __('إضافة أذونات للدور')  }}</span>
        <span><i class="fa-solid fa-plus-square fa-lg"></i></span>
    </a>
</div>
</div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-md text-center text-gray-500 dark:text-gray-400 border">
                <thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border">
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
                    <th scope="col" class="px-6 py-3 border">
                         {{ __('اﻷذونات')  }}
                    </th>
                    <th scope="col" class="px-6 py-3 border" colspan="2">
                        {{ __('العمليات')  }}
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 border w-10">
                        {{ $role->id  }}
                    </td>
                     <td class="px-6 py-4 border">
                        {{ $role->name  }}
                    </td>
                    <td class="px-6 py-4 border">
                        {{ $role->display_name  }}
                    </td>
                    <td class="px-6 py-4 border">
                        {{ $role->description  }}
                    </td>
                    <td class="px-6 py-4 border">
                        <a href="{{ route('rolePermissionsIndex',['id' =>$role->id]) }}">
                            {{ __('اﻷذونات')  }}
                        </a>
                    </td>

                    {{--actions--}}
                    <td class="px-6 py-4 border w-6">
                        <a href="{{ route('roleEdit',['id' => $role->id]) }}" class="btn btn-success">
                            <span><i class="fa-solid fa-edit fa-lg"></i></span>
                        </a>
                    </td>
                    <td class="px-6 py-4 border w-6">
                        <form action="{{ route('roleDestroy',['id' => $role->id]) }}" method="post" id="delete-role-form-{{ $role->id }}">
                            @csrf
                            @method('delete')
                            <button type="button" data-role-id="{{ $role->id }}" class="delete-role-button btn btn-error">
                                <span><i class="fa-solid fa-trash fa-lg"></i></span>
                            </button>
                        </form>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</x-layouts.app>
<script>
     (() => {
        document.querySelectorAll('.delete-role-button').forEach(confirmButton => {
            confirmButton.addEventListener('click',  (event) => {
                event.preventDefault();
                let formID = confirmButton.getAttribute('data-role-id');
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
                        document.querySelector(`#delete-role-form-${formID}`).submit();
                        }
                    })


            });
        });
     }) () ;
</script>