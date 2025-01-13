@extends('layouts.app')


@section('title')
    Create Category|Gentelman BarberShop
@endsection


@section('headerofadmin')
    <div class="w-full px-4 py-4 bg-[#051923] shadow-md logo text-white">
        <i class="bx bx-menu menu-icon"></i>
        <span class="font-medium logo-name lg:text-lg">Create Category of Product's</span>
    </div>
@endsection

@section('content')
    <div class="flex flex-col flex-1 w-full h-auto bg-gray-300">
        <!-- Category Creation Form -->
        <div class="w-full p-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-xl font-bold">Create New Category</h2>
            <form action="{{ route('category.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Category Priority Input -->
                <div>
                    <label for="priority" class="block text-sm font-medium text-gray-700">Category Priority</label>
                    <input type="text" name="priority" id="priority"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter category priority" value="{{ old('priority') }}">
                    @error('priority')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input type="text" name="name" id="name"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter category name" value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category Description Input -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Category Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter category description">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit and Exit Buttons -->
                <div class="flex justify-between w-full">
                    <button type="submit"
                        class="px-4 py-3 font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700">Create
                        Category</button>
                    <a href="{{ route('category.index') }}"
                        class="px-6 py-3 font-semibold text-white bg-red-600 rounded-md hover:bg-red-700">Exit</a>
                </div>
            </form>
        </div>
    </div>
@endsection
