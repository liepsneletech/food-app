<x-front-layout>
    <div class="bg-gray-100">
        <x-slot name="header">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Profile') }}
            </h2>
        </x-slot>

        <div class="space-y-6 pt-6 pb-10 px-4 sm:px-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
</x-front-layout>
