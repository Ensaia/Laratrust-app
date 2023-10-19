@if (session('forbidden'))
    <div class="py-2">
          <div
				class="flex flex-col text-red-800 border border-red-300 rounded-lg bg-red-50"
				role="alert">
				<div class="flex justify-between p-4">
					<div>
						<span class="text-md font-semibold">{{ __('لا يمتلك صاحب هذا الحساب صلاحيات كافية لدخول هذه الصفحة !!!') }}</span>
					</div>
					<div>
						<span class="text-md"><i class="fa-solid fa-exclamation-triangle fa-lg"></i></span>
					</div>
				</div>
			</div>
    </div>
@endif
