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
                    <a href="javascript::void(0)" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        {{ __('المنشورات') }}
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
            <a href="{{ route('postCreate') }}"
               class="btn btn-success">
                <span> {{ __('إضافة منشور')  }}</span>
                <span><i class="fa-solid fa-plus-square fa-lg"></i></span>
            </a>
        </div>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border text-center">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border">
            <tr class="">
                <th scope="col" class="px-6 py-3 border">
                    {{ __('#')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('عنوان المنشور')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('محتوى المنشور')  }}
                </th>
                <th scope="col" class="px-6 py-3 border">
                    {{ __('اسم الناشر')  }}
                </th>
                <th scope="col" class="px-6 py-3 border" colspan="2">
                    {{ __('العمليات')  }}
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 border">
                        {{ $post->id  }}
                    </td>
                    <td class="px-6 py-4 border">
                        {{ $post->title  }}
                    </td>
                    <td class="px-6 py-4 border">
                        {{ $post->body  }}
                    </td>
                    <td class="px-6 py-4 border">
                        {{ $post->user->name  }}
                    </td>
                    {{--actions--}}
                    <td class="px-6 py-4 border w-6">
                        <a href="{{ route('postEdit',['id' => $post->id]) }}"
                           class="btn btn-success">
                            <span><i class="fa-solid fa-edit fa-lg"></i></span>
                        </a>
                    </td>
                    <td class="px-6 py-4 border w-6">
                        <form action="{{ route('postDestroy',['id' => $post->id]) }}" method="post" id="delete-post-form-{{ $post->id }}">
                            @method('delete')
                            @csrf
                            <button data-post-id="{{ $post->id }}" type="button"
                                class="delete-post-button btn btn-error">
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
        document.querySelectorAll('.delete-post-button').forEach(confirmButton => {
            confirmButton.addEventListener('click',  (event) => {
                event.preventDefault();
                let formID = confirmButton.getAttribute('data-post-id');
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
                        document.querySelector(`#delete-post-form-${formID}`).submit();
                        }
                    })


            });
        });
     }) () ;
</script>