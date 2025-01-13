@extends('layouts.master')
@section('title')
    {{ $category->name }} Service's |Gentleman BarberShop
@endsection

@section('content')
    <!-- Latest service Section -->
    <div class="px-4 py-12 mx-auto max-w-7xl">
        <h2 class="pl-4 text-3xl font-bold text-[#051923] border-l-4 border-yellow-500 sm:text-4xl lg:text-5xl">
            {{ $category->name }}
            Service's</h2>

        <!-- service Grid Wrapper -->
        <div class="grid grid-cols-1 gap-8 mt-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <!-- Loop through service -->
            @foreach ($services as $service)
                <!-- service Card -->
                <div
                    class="relative transition duration-300 transform bg-white rounded-lg shadow-lg hover:shadow-2xl hover:scale-105">
                    <img src="{{ asset('images/services/' . $service->photopath) }}" alt="{{ $service->name }}"
                        class="object-contain w-full h-56 bg-gray-100 rounded-t-lg sm:h-64 lg:h-72">

                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $service->name }}</h3>
                        <p class="mt-2 text-sm text-gray-600">{{ Str::limit($service->description, 100) }}</p>

                        <!-- Price and Buy Now Section -->
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex flex-col">
                                @if ($service->discounted_price != '')
                                    <span
                                        class="text-sm text-gray-500 line-through">Rs.{{ $service->discounted_price }}</span>
                                    <span class="text-xl font-bold text-gray-900">Rs.{{ $service->price }}</span>
                                @else
                                    <span class="text-xl font-bold text-gray-900">Rs.{{ $service->price }}</span>
                                @endif
                            </div>
                            <button
                                class="px-5 py-2 text-sm font-medium text-white transition duration-300 transform bg-[#051923] rounded hover:bg-blue-700 hover:scale-105 whitespace-nowrap">
                                Buy Now
                            </button>
                        </div>

                        <!-- Wishlist and Add to Cart Section -->
                        <div class="flex items-center justify-between mt-4">
                            <button class="text-sm font-semibold text-[#051923] hover:underline">
                                <a href="{{ route('viewservicedetail', $service->id) }}">View Details</a>
                            </button>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
