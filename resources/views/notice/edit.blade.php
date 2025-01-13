@extends('layouts.app')

@section('title')
    Update Notice | Gentleman BarberShop
@endsection

@section('headerofadmin')
    <div class="w-full px-4 py-4 bg-[#051923] shadow-md text-white">
        <i class="bx bx-menu menu-icon"></i>
        <span class="font-medium logo-name lg:text-lg">Update Notice</span>
    </div>
@endsection

@section('content')
    <div class="flex flex-col flex-1 w-full h-auto bg-gray-300">
        <!-- notice Creation Form -->
        <div class="w-full p-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-xl font-bold">Edit Notice</h2>
            <form action="{{ route('notice.update', $notice->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- notice title Input -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Notice Title</label>
                    <input type="text" name="title" id="title"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter notice title" value="{{ $notice->title }}">
                    @error('title')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- notice Description Input -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Notice Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter notice description">{{ $notice->description }}</textarea>
                    @error('description')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                <!-- notice Image Input -->
                <div>
                    <label for="photopath" class="block text-sm font-medium text-gray-700">Notice Image</label>
                    <input type="file" name="photopath" id="image"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('photopath')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                    <p>Current Picture:</p>
                    <img src="{{ asset('images/notices/' . $notice->photopath) }}" alt="" class="w-44">
                </div>


                <!-- Submit and Exit Buttons -->
                <div class="flex justify-between w-full">
                    <button type="submit"
                        class="px-4 py-3 font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700">Update
                        notice</button>
                    <a href="{{ route('notice.index') }}"
                        class="px-6 py-3 font-semibold text-white bg-red-600 rounded-md hover:bg-red-700">Exit</a>
                </div>
            </form>
        </div>
    </div>
@endsection
