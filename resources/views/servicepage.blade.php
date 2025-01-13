@extends('layouts.master')

@section('content')
    <div class="container mx-auto text-[#051923]">

        <div
            class="flex flex-col-reverse justify-between mx-3 mb-10 space-y-1 sm:mx-5 lg:space-y-2 max-w-8xl md:flex-row md:space-y-0 md:items-center ">

            <!-- Title -->
            <h2
                class="pl-4 mt-4 text-3xl font-bold tracking-wide text-[#051923] border-l-4 border-yellow-500 sm:text-4xl lg:text-5xl">
                Our Services
            </h2>

            <!-- Search Bar -->
            <div class="relative w-full max-w-xs md:max-w-md">
                <form action="{{ route('searchservice') }}" method="GET" class="flex">
                    <input type="text"
                        class="w-full px-4 py-3 text-sm text-gray-900 border border-gray-300 rounded-l bg-gray-50 focus:outline-none focus:border-[#051923] focus:ring-1 focus:ring-[#051923] transition duration-300"
                        placeholder="Search services..." name="search">
                    <button type="submit"
                        class="flex items-center justify-center w-12 text-white transition-all duration-300 bg-[#051923] rounded hover:bg-yellow-500">
                        <i class="bx bx-search-alt-2"></i>
                    </button>
                </form>
            </div>
        </div>

        <p class="pl-5 mx-auto mb-3 text-gray-600 max-w-8xl sm:text-lg lg:text-xl">
            Discover our premium selection of the latest services designed for the modern gentleman.
        </p>







        <!-- Loop through each category -->
        @foreach ($servicecategories as $category)
            <div class="px-5 mb-12">
                <!-- Category Name with Highlighted Style -->
                <div class="flex items-center pl-4 mb-6 border-l-4 border-yellow-500">
                    <i class="mr-3 text-3xl text-[#051923] bx bx-category"></i>
                    <h2 class="text-3xl font-semibold text-[#051923]">
                        {{ $category->name }}
                    </h2>
                </div>

                <!-- Unique Layout for Service Cards with Horizontal Scroll -->
                <div class="flex gap-6 pb-4 overflow-x-auto hide-scroll-bar">
                    @foreach ($category->services as $service)
                        <!-- Service Card -->
                        <div class="relative p-6 transition-transform transform rounded-lg shadow-lg bg-gray-50 hover:scale-105"
                            style="min-width: 300px;">
                            <!-- Service Image -->
                            <div class="relative mb-4">
                                <img src="{{ asset('images/services/' . $service->photopath) }}" alt="{{ $service->name }}"
                                    class="object-cover w-full h-64 rounded-lg">
                                @if ($service->discounted_price)
                                    @php
                                        $discount =
                                            (($service->price - $service->discounted_price) / $service->price) * 100;
                                    @endphp
                                    <span
                                        class="absolute px-2 py-1 text-sm font-semibold text-white bg-red-500 rounded-lg top-3 left-3">
                                        {{ round($discount) }}% OFF
                                    </span>
                                @endif
                            </div>

                            <!-- Service Info -->
                            <h3 class="mb-2 text-xl font-bold text-[#051923]">{{ $service->name }}</h3>
                            <p class="mb-4 text-[#051923]">{{ $service->description }}</p>

                            <!-- Pricing -->
                            <div class="flex items-center mb-4">
                                @if ($service->discounted_price)
                                    <span class="text-xl font-semibold text-[#051923]">Rs.
                                        {{ $service->discounted_price }} &nbsp;&nbsp;</span>
                                    <span class="text-base text-red-500 line-through">Rs. {{ $service->price }}</span>
                                @else
                                    <span class="text-xl font-semibold text-white">Rs. {{ $service->price }}</span>
                                @endif
                            </div>

                            <!-- View Details Button -->
                            <a href="{{ route('viewservicedetail', $service->id) }}"
                                class="block px-4 py-2 text-sm font-semibold text-center text-white transition duration-300 bg-[#051923] hover:text-white rounded-lg hover:bg-[#051923]">
                                View Details
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
