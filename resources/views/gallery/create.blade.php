@extends('layouts.app')

@section('title')
    Upload Gallery | Gentleman BarberShop
@endsection

@section('headerofadmin')
    <div class="w-full px-4 py-4 bg-[#051923] shadow-md text-white">
        <i class="bx bx-menu menu-icon"></i>
        <span class="font-medium logo-name lg:text-lg">Upload New Photo</span>
    </div>
@endsection

@section('content')
    <div class="flex flex-col flex-1 w-full h-auto bg-gray-300">
        <!-- gallery Creation Form -->
        <div class="w-full p-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-xl font-bold">Add New Photo</h2>
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- gallery Image Input -->
                <div>
                    <label for="photopath-" class="block text-sm font-medium text-gray-700">Upload Image</label>
                    <input type="file" name="photopath" id="picture"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('photopath')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit and Exit Buttons -->
                <div class="flex justify-between w-full">
                    <button type="submit"
                        class="px-4 py-3 font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700">Upload to
                        Gallery</button>
                    <a href="{{ route('gallery.index') }}"
                        class="px-6 py-3 font-semibold text-white bg-red-600 rounded-md hover:bg-red-700">Exit</a>
                </div>
            </form>
        </div>
    </div>
@endsection
