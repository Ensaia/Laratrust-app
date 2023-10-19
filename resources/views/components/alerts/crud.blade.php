@if (session('success'))
    <div class="py-2">
        	<div
				class="flex flex-col text-green-800 border border-green-300 rounded-lg bg-green-50"
				role="alert">
				<div class="flex justify-between p-4">
					<div>
						<span class="text-md font-semibold">{{ session('success') }}</span>
					</div>
					<div>
						<span class="text-md"><i class="fa-solid fa-circle-check fa-lg"></i></span>
					</div>
				</div>
			</div>
    </div>
@endif
@if (session('error'))
    <div class="py-2">
    <div
				class="flex flex-col text-red-800 border border-red-300 rounded-lg bg-red-50"
				role="alert">
				<div class="flex justify-between p-4">
					<div>
						<span class="text-md font-semibold">{{ session('error') }}</span>
					</div>
					<div>
						<span class="text-md"><i class="fa-solid fa-exclamation-triangle fa-lg"></i></span>
					</div>
				</div>
			</div>
</div>
@endif
