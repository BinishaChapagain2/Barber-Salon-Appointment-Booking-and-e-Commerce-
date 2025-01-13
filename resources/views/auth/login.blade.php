@extends('layouts.master')
@section('title')
    Login To Connect with Gentleman Style Hub
@endsection
@section('content')
    <div class="flex flex-col justify-center min-h-screen py-8 bg-gray-100 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="text-3xl font-extrabold text-center text-gray-900 ">
                Sign in to your account
            </h2>
            <p class="mt-2 text-sm text-center text-gray-600 max-w">
                or <br>
                <a href="{{ route('register') }} " class="font-medium text-blue-600 hover:text-blue-500">
                    Create an account
                </a>
            </p>
        </div>

        <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email address
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Enter your email address" value="{{ old('email') }}" autofocus>
                        </div>
                        @error('email')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Enter your password">
                        </div>
                        @error('password')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <label for="remember" class="block ml-2 text-sm text-gray-900">
                                Remember me
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500">
                                Forgot your password?
                            </a>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex flex-col gap-2">
                        <button type="submit"
                            class="border transition-colors focus:ring-2 p-0.5 disabled:cursor-not-allowed border-transparent bg-[#051923] text-white rounded-lg">
                            <span class="flex items-center justify-center gap-1 font-medium py-1 px-2.5 text-base">
                                Login
                            </span>
                        </button>

                        <!-- Social Login Buttons -->
                        <a href="{{ route('google.login') }}"
                            class="transition-colors focus:ring-2 p-0.5 disabled:cursor-not-allowed bg-white hover:bg-gray-100 text-gray-900 border border-gray-200 rounded-lg">
                            <span class="flex items-center justify-center gap-1 font-medium py-1 px-2.5 text-base">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px"
                                    y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" height="1em"
                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#FFC107" d="..."></path>
                                    <path fill="#FF3D00" d="..."></path>
                                    <path fill="#4CAF50" d="..."></path>
                                    <path fill="#1976D2" d="..."></path>
                                </svg>
                                Sign in with <i class='bx bxl-google' style='color:#141413'></i>oogle
                            </span>
                        </a>

                    </div>
                </form>
            </div>
        </div>

        <p class="flex items-center justify-center mt-6 text-center divide-x divide-gray-300">
            <a class="pr-3.5 inline-flex items-center gap-x-2 text-sm text-gray-600 decoration-2 hover:underline hover:text-blue-600"
                href="{{ route('homepage') }}" target="_blank">Gentleman Style Hub
            </a>
            <a class="inline-flex items-center pl-3 text-sm text-gray-600 gap-x-2 decoration-2 hover:underline hover:text-blue-600"
                href="">
                Contact us!
            </a>
        </p>
    </div>
@endsection
