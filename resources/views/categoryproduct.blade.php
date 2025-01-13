@extends('layouts.master')
@section('title')
    {{ $category->name }} Product's |Gentleman BarberShop
@endsection

@section('content')
    <!-- Latest Products Section -->
    <div class="px-4 py-12 mx-auto max-w-7xl">
        <h2 class="pl-4 text-3xl font-bold text-[#051923] border-l-4 border-yellow-500 sm:text-4xl lg:text-5xl">
            {{ $category->name }}
            Product's</h2>

        <!-- Product Grid Wrapper -->
        <div class="grid grid-cols-1 gap-8 mt-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($products as $product)
                <!-- Product Card -->
                <a href="{{ route('viewproductdetail', $product->id) }}">
                    <div
                        class="transition duration-300 transform bg-white rounded-lg shadow-lg hover:shadow-2xl hover:scale-105">
                        <!-- New Tag -->


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

        <!-- Pagination -->
        <div class="flex items-center justify-center mt-10">
            {{ $products->links() }}
        </div>
    </div>
@endsection
