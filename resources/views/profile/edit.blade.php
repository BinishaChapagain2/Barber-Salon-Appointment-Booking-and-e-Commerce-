@extends(auth()->user()->role == 'admin' ? 'layouts.app' : 'layouts.master')

@section('content')
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="flex flex-col space-y-6 max-w-7xl sm:px-6 lg:px-2 sm:flex-row sm:space-x-6">
            <!-- Update Profile Section -->
            <div class="w-full p-4 sm:p-8 sm:w-1/3">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="flex flex-col space-y-6 max-w-7xl sm:px-6 lg:px-2 sm:flex-row sm:space-x-6">
                <div class="max-w-xl p-4 lg:p-0">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Section -->
            <div class="flex flex-col space-y-6 max-w-7xl sm:px-6 lg:px-2 sm:flex-row sm:space-x-6">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
