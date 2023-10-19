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
                        {{ __('إضافة دور')  }}
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
          <form method="post" action="{{ route('roleStore') }}">
              @csrf()
              @method('post')
              <div class="-mx-3 mb-6 md:flex">
                  <div class="px-3 md:w-full">
                      <label for="name"
                             class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">
                         {{ __('اسم الدور')  }}
                          </label>
                      <input type="text" class="input input-bordered w-full @error('name') border-red-500 @enderror" name="name" id="name"
                             value="{{ old('name') }}"
                      />
                  </div>
              </div>
              <div class="-mx-3 mb-6 md:flex">
                  <div class="mb-6 px-3 md:mb-0 md:w-full">
                      <label for="display_name"
                             class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">
                         {{ __('عنوان الدور')  }}

                          </label>
                      <input type="text" class="input input-bordered w-full @error('display_name') border-red-500 @enderror" name="display_name" id="display_name"
                      value="{{ old('display_name') }}"
                      />

                  </div>
              </div>
              <div class="-mx-3 mb-6 md:flex">
                  <div class="mb-6 px-3 md:mb-0 md:w-full">
                      <label for="description"
                             class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">
                          {{ __('وصف الدور')  }}

                      </label>
                      <input type="text" class="input input-bordered w-full @error('description') border-red-500 @enderror" name="description" id="description"
                             value="{{ old('description') }}"
                      />

                  </div>
              </div>
              <div class="-mx-3 mb-6 md:flex">
                  <div class="px-3 md:w-full">
                      <button class="w-full btn btn-neutral md:w-full" type="submit">
                          {{ __('إضافة دور')  }}
                      </button>
                  </div>
              </div>
          </form>
      </div>
</x-layouts.app>
