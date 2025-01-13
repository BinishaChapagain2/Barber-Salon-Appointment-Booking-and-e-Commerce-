@extends('layouts.master')
@section('title')
    Login To Connect with Gentleman Barber Shop
@endsection

@section('content')
    <div class="w-full max-w-2xl p-8 mx-auto bg-white rounded-lg shadow-lg">
        <!-- Logo Section -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/clientlogo.webp') }}" alt="Gentleman Style Hub Logo" class="object-contain w-24 h-24">
        </div>

        <h2 class="text-2xl sm:text-3xl font-bold text-[#051923] text-center mb-6">Register for Gentleman Style Hub</h2>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Profile Picture -->
            <div>
                <label for="profilePicture" class="block text-[#051923] font-medium mb-2">Profile Picture</label>
                <input type="file" id="profilePicture" name="profile_picture" accept="image/*"
                    class="w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#051923] text-[#051923]">
            </div>

            <!-- Full Name -->
            <div>
                <x-input-label for="name" :value="__('Full Name')" />
                <x-text-input id="name"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#051923] text-[#051923]"
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                    placeholder="Enter your full name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Phone Number -->
            <div>
                <label for="phone" class="block text-[#051923] font-medium mb-2">Phone Number</label>
                <input type="tel" id="phone" name="phone"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#051923] text-[#051923]"
                    placeholder="Enter your phone number" required>
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email Address')" />
                <x-text-input id="email"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#051923] text-[#051923]"
                    type="email" name="email" :value="old('email')" required autocomplete="username"
                    placeholder="Enter your email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Gender -->
            <div>
                <label class="block text-[#051923] font-medium mb-2">Gender</label>
                <div class="flex items-center space-x-4">
                    <label class="flex items-center">
                        <input type="radio" name="gender" value="male" class="text-[#051923] focus:ring-[#051923]"
                            required>
                        <span class="ml-2 text-[#051923]">Male</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="gender" value="female" class="text-[#051923] focus:ring-[#051923]"
                            required>
                        <span class="ml-2 text-[#051923]">Female</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="gender" value="other" class="text-[#051923] focus:ring-[#051923]"
                            required>
                        <span class="ml-2 text-[#051923]">Other</span>
                    </label>
                </div>
            </div>

            {{-- address --}}

            <div>
                <label for="address" class="block text-[#051923] font-medium mb-2">Address</label>
                <textarea name="address" id="address"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#051923] text-[#051923]"
                    placeholder="Enter your address" required></textarea>
            </div>



            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#051923] text-[#051923]"
                    type="password" name="password" required autocomplete="new-password"
                    placeholder="Enter your password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#051923] text-[#051923]"
                    type="password" name="password_confirmation" required autocomplete="new-password"
                    placeholder="Confirm your password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-[#051923] text-white py-2 rounded-md hover:bg-blue-700 transition duration-300">
                    Register
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <p class="mt-4 text-center text-blue-700">Already have an account?
            <a href="{{ route('login') }}" class="text-[#051923] hover:underline">Login here</a>
        </p>
    </div>
@endsection
