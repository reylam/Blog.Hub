<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex gap-5">
                <a href="{{ route('blog.create') }}"
                    class="py-2 px-5 rounded-lg text-black bg-[#FFD600] font-bold transition-all duration-200 ease-in-out hover:bg-[#ceb01a]">+
                    Add Blog</a>
                <a href="{{ route('profile.blog') }}"
                    class="py-2 px-5 rounded-lg border-2 border-[#FFD600] hover:bg-[#FFD600] transition-all duration-200 ease-in-out font-medium text-white hover:text-black ">
                    My Blog</a>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
