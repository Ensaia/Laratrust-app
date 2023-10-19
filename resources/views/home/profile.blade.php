<x-layouts.app>
    <div class="my2 mb-4 flex flex-col px-4 pb-8 pt-6 ">
        <div class="-mx-3 mb-6 md:flex md:flex-wrap">
            <div class="px-3 md:w-2/5 sm:mb-4">
                <!-- <AuthUser class="p-5 bg-white border rounded shadow" /> -->
                <!-- profile card -->
                <x-views.profile-card></x-views.profile-card>
                <!-- profile card -->
            </div>
            <div class="px-3 md:w-3/5">
                <x-alerts.errors/>
                <x-alerts.status/>
                <!-- update profile information -->
                <x-views.update-profile-information></x-views.update-profile-information>
                <!-- update profile information -->
                <!-- update user password -->
                <x-views.update-password></x-views.update-password>
                <!-- update user password -->
            </div>
        </div>
    </div>
</x-layouts.app>
