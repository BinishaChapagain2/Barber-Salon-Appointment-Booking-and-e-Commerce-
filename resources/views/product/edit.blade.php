@extends('layouts.app')

@section('title')
    Update Product | Gentleman BarberShop
@endsection

@section('headerofadmin')
    <div class="w-full px-4 py-4 bg-[#051923] shadow-md text-white">
        <i class="bx bx-menu menu-icon"></i>
        <span class="font-medium logo-name lg:text-lg">Update New Product</span>
    </div>
@endsection

@section('content')
    <div class="flex flex-col flex-1 w-full h-auto bg-gray-300">
        <!-- Product Creation Form -->
        <div class="w-full p-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-xl font-bold">Edit New Product</h2>
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- Product Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="name" id="name"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter product name" value="{{ $product->name }}">
                    @error('name')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Description Input -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Product Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter product description">{{ $product->description }}</textarea>
                    @error('description')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Price Input -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" step="0.01" name="price" id="price"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter product price" value="{{ $product->price }}">
                    @error('price')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Discounted Price Input -->
                <div>
                    <label for="discounted_price" class="block text-sm font-medium text-gray-700">Discounted Price</label>
                    <input type="number" step="0.01" name="discounted_price" id="discounted_price"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter discounted price (optional)" value="{{ $product->discounted_price }}">
                    @error('discounted_price')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stock Quantity Input -->
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                    <input type="text" name="stock" id="stock"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter stock quantity" value="{{ $product->stock }}">
                    @error('stock')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category Select Dropdown -->
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="category_id"
                        class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Image Input -->
                <div>
                    <label for="photopath" class="block text-sm font-medium text-gray-700">Product Image</label>
                    <input type="file" name="photopath" id="image"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('photopath')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                    <p>Current Picture:</p>
                    <img src="{{ asset('images/products/' . $product->photopath) }}" alt="" class="w-44">
                </div>

                <!-- Status Select Dropdown -->
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status"
                        class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <option value="show" @if ($product->status == 'show') selected @endif>Show</option>
                        <option value="hide" @if ($product->status == 'hide') selected @endif>Hide</option>
                    </select>
                    @error('status')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit and Exit Buttons -->
                <div class="flex justify-between w-full">
                    <button type="submit"
                        class="px-4 py-3 font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700">Update
                        Product</button>
                    <a href="{{ route('product.index') }}"
                        class="px-6 py-3 font-semibold text-white bg-red-600 rounded-md hover:bg-red-700">Exit</a>
                </div>
            </form>
        </div>
    </div>
@endsection
