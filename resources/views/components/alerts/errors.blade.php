@if ($errors->any())
<div class="py-2">
	<ul class="flex flex-col">
		@foreach ($errors->all() as $error)
		<li class="py-2">
			<div
				class="flex flex-col text-red-800 border border-red-300 rounded-lg bg-red-50"
				role="alert">
				<div class="flex justify-between p-4">
					<div>
						<span class="text-md font-semibold">{{ $error }}</span>
					</div>
					<div>
						<span class="text-md"><i class="fa-solid fa-exclamation-triangle fa-lg"></i></span>
					</div>
				</div>
			</div>
		</li> 
		@endforeach
	</ul>
</div>
@endif
