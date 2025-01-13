@extends('layouts.master')

@section('title')
    404 - Page Not Found | Gentleman BarberShop
@endsection

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-gray-800">404</h1>
            <h2 class="mt-4 text-2xl text-gray-600">Oops! The page you're looking for doesn't exist.</h2>
            <p class="mt-2 text-gray-500">
                It seems like you've reached a page that doesn't exist. You can head back to our homepage or explore our
                services.
            </p>
            <a href="{{ url('/') }}"
                class="inline-block px-6 py-3 mt-6 text-white bg-[#051923] rounded-lg hover:bg-blue-700">
                Back to Homepage
            </a>
        </div>
    </div>
@endsection
