@extends('layouts.master')

@section('title')
    Product | Gentleman Barbershop
@endsection

@section('content')
    <!-- Latest Products Section -->
    <div class="w-full px-6 py-5 mx-auto max-w-10xl">
        <div
            class="flex flex-col-reverse justify-between mx-auto mb-10 space-y-2 max-w-8xl md:flex-row md:space-y-0 md:items-center">

            <!-- Title -->
            <h2
                class="pl-4 mt-4 text-3xl font-bold tracking-wide text-[#051923] border-l-4 border-yellow-500 sm:text-4xl lg:text-5xl">
                Latest Products
            </h2>

            <!-- Search Bar -->
            <div class="relative w-full max-w-xs md:max-w-md">
                <form action="{{ route('search') }}" method="GET" class="flex">
                    <input type="text"
                        class="w-full px-4 py-3 text-sm text-gray-900 border border-gray-300 rounded-l bg-gray-50 focus:outline-none focus:border-[#051923] focus:ring-1 focus:ring-[#051923] transition duration-300"
                        placeholder="Search products..." name="search">
                    <button type="submit"
                        class="flex items-center justify-center w-12 text-white transition-all duration-300 bg-[#051923] rounded hover:bg-yellow-500">
                        <i class="bx bx-search-alt-2"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Subtitle -->
        <p class="py-2 mx-auto text-gray-600 max-w-8xl sm:text-lg lg:text-xl">
            Discover our premium selection of the latest products designed for the modern gentleman.
        </p>

        <!-- Product Grid Wrapper -->

        <!-- Product Grid Wrapper -->
        <div class="grid grid-cols-1 gap-8 mt-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($products as $product)
                <!-- Product Card -->
                <a href="{{ route('viewproductdetail', $product->id) }}">
                    <div
                        class="relative transition duration-300 transform bg-white rounded-lg shadow-lg hover:shadow-2xl hover:scale-105">
                        <!-- New Tag -->
                        <div
                            class="absolute px-3 py-1 text-xs font-semibold text-white bg-yellow-600 rounded-full top-3 right-3">
                            New
                        </div>

                        <!-- Product Image -->
                        <img src="{{ asset('images/products/' . $product->photopath) }}" alt="{{ $product->name }}"
                            class="object-cover w-full h-56 bg-gray-100 rounded-t-lg sm:h-64 lg:h-72">

                        <div class="p-5">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                            <p class="mt-2 text-sm text-gray-600">
                                {{ Str::limit($product->description, 100) }}
                            </p>

                            <!-- Price and Discount -->
                            <div class="flex items-center mt-4 space-x-3">
                                <span class="text-xl font-bold text-gray-900">Rs.{{ $product->price }}</span>
                                @if ($product->discounted_price)
                                    <span
                                        class="text-lg font-medium text-red-500 line-through">Rs.{{ $product->discounted_price }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
@endsection

@section('productpagecategorieslink')
    <!-- Categories Section -->
    <div class="px-4 py-12 mx-auto max-w-8xl">
        <h2 class="pl-4 text-3xl font-bold text-[#051923] border-l-4 border-yellow-500 sm:text-4xl lg:text-5xl">
            Categories
        </h2>

        <!-- Categories Grid -->
        <div class="mt-8">
            <ul class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
                @php
                    $categories = App\Models\Category::orderBy('priority')->get();
                @endphp
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('categoryproduct', $category->id) }}"
                            class="block px-4 py-3 text-sm font-medium text-center text-white transition duration-300 bg-gray-900 rounded shadow-md hover:bg-blue-600 hover:scale-105">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
