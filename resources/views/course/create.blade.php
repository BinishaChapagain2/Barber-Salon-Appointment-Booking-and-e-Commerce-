@extends('layouts.app')

@section('title')
    Create Courses | Gentleman BarberShop
@endsection

@section('headerofadmin')
    <div class="w-full px-4 py-4 bg-[#051923] shadow-md text-white">
        <i class="bx bx-menu menu-icon"></i>
        <span class="font-medium logo-name lg:text-lg">Create New Course</span>
    </div>
@endsection

@section('content')
    <div class="flex flex-col flex-1 w-full h-auto bg-gray-300">
        <!-- course Creation Form -->
        <div class="w-full p-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-xl font-bold">Create New Course</h2>
            <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- course Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Course Name</label>
                    <input type="text" name="name" id="name"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter course name" value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- course Description Input -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Course Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter course description">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- course Duration Input -->
                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
                    <input type="number" step="0.01" name="duration" id="duration"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter course duration" value="{{ old('duration') }}">
                    @error('duration')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- course Price Input -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" step="0.01" name="price" id="price"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter course price" value="{{ old('price') }}">
                    @error('price')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Discounted Price Input -->
                <div>
                    <label for="discounted_price" class="block text-sm font-medium text-gray-700">Discounted Price</label>
                    <input type="number" step="0.01" name="discounted_price" id="discounted_price"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter discounted price (optional)" value="{{ old('discounted_price') }}">
                    @error('discounted_price')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                <!-- course Image Input -->
                <div>
                    <label for="photopath-" class="block text-sm font-medium text-gray-700">Course Image</label>
                    <input type="file" name="photopath" id="picture"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('photopath')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>




                <!-- Submit and Exit Buttons -->
                <div class="flex justify-between w-full">
                    <button type="submit"
                        class="px-4 py-3 font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700">Create
                        course</button>
                    <a href="{{ route('course.index') }}"
                        class="px-6 py-3 font-semibold text-white bg-red-600 rounded-md hover:bg-red-700">Exit</a>
                </div>
            </form>
        </div>
    </div>
@endsection
