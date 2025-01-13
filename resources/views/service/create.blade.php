@extends('layouts.app')

@section('title')
    Create Service | Gentleman BarberShop
@endsection

@section('headerofadmin')
    <div class="w-full px-4 py-4 bg-[#051923] shadow-md text-white">
        <i class="bx bx-menu menu-icon"></i>
        <span class="font-medium logo-name lg:text-lg">Create New Service</span>
    </div>
@endsection

@section('content')
    <div class="flex flex-col flex-1 w-full h-auto bg-gray-300">
        <!-- Servive Creation Form -->
        <div class="w-full p-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-xl font-bold">Create New Service</h2>
            <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- service Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Service Name</label>
                    <input type="text" name="name" id="name"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter service name" value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- service Description Input -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Service Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter service description">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- service Price Input -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" step="0.01" name="price" id="price"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter service price" value="{{ old('price') }}">
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




                <!-- Category Select Dropdown -->
                <div class="mb-4">
                    <label for="servicecategory_id" class="block text-sm font-medium text-gray-700">Service Category</label>
                    <select name="servicecategory_id" id="servicecategory_id"
                        class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select Category</option>
                        @foreach ($servicecategories as $servicecategory)
                            <option value="{{ $servicecategory->id }}"
                                {{ old('servicecategory_id') == $servicecategory->id ? 'selected' : '' }}>
                                {{ $servicecategory->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('servicecategory_id')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>



                <!-- service Image Input -->
                <div>
                    <label for="photopath-" class="block text-sm font-medium text-gray-700">Service Image</label>
                    <input type="file" name="photopath" id="picture"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('photopath')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Select Dropdown -->
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status"
                        class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <option value="show" {{ old('status') == 'show' ? 'selected' : '' }}>Show</option>
                        <option value="hide" {{ old('status') == 'hide' ? 'selected' : '' }}>Hide</option>
                    </select>
                    @error('status')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Submit and Exit Buttons -->
                <div class="flex justify-between w-full">
                    <button type="submit"
                        class="px-4 py-3 font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700">Create
                        Service</button>
                    <a href="{{ route('service.index') }}"
                        class="px-6 py-3 font-semibold text-white bg-red-600 rounded-md hover:bg-red-700">Exit</a>
                </div>
            </form>
        </div>
    </div>
@endsection
