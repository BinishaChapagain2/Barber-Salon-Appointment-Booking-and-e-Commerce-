@extends('layouts.master')

@section('title')
    View Services | Gentleman Barbershop
@endsection

@section('content')
    <!-- Main Service Section -->
    <div class="container px-4 mx-auto mt-10 max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-10 md:grid-cols-4 lg:grid-cols-4">
            <!-- Service Image -->
            <div class="md:col-span-1">
                <div class="relative">
                    <img src="{{ asset('images/services/' . $service->photopath) }}" alt="{{ $service->name }}"
                        class="object-cover w-full transition duration-300 ease-in-out transform bg-gray-100 rounded-lg shadow-lg h-90 md:h-80 hover:scale-105">

                </div>
            </div>

            <!-- Service Details -->
            <div class="px-4 border-l-2 border-gray-200 md:col-span-2 sm:px-6 md:px-8">
                <h2 class="text-2xl font-extrabold text-gray-900">{{ $service->name }}</h2>

                <!-- Service Description -->
                <div class="mt-6">
                    <h3 class="text-xl font-bold text-gray-900">About the Service</h3>
                    <p class="mt-4 text-base text-gray-600">{{ $service->description }}</p>
                </div>

                <!-- Price and Discount -->
                <div class="mt-6">
                    <p class="text-2xl font-bold text-gray-900">
                        @if ($service->discounted_price)
                            Rs.{{ $service->discounted_price }}
                            <span class="ml-2 text-lg text-red-500 line-through">Rs.{{ $service->price }}</span>
                        @else
                            Rs.{{ $service->price }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Services Section -->
    <div class="py-12 mx-auto max-w-7xl">
        <h2 class="pl-3 ml-4 text-3xl font-bold text-gray-900 border-l-4 border-yellow-500 sm:text-3xl lg:text-4xl">
            Related Services
        </h2>

        <div class="grid grid-cols-1 gap-6 mt-10 ml-4 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Loop through related services -->
            @foreach ($relatedservices as $rservice)
                <div class="relative p-6 transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105"
                    style="min-width: 325px;">
                    <!-- Service Image -->
                    <div class="relative mb-4">
                        <img src="{{ asset('images/services/' . $rservice->photopath) }}" alt="{{ $rservice->name }}"
                            class="object-cover w-full h-64 rounded-lg">
                        @if ($rservice->discounted_price)
                            @php
                                $discount = (($rservice->price - $rservice->discounted_price) / $rservice->price) * 100;
                            @endphp
                            <span
                                class="absolute px-2 py-1 text-sm font-semibold text-white bg-red-500 rounded-lg top-3 left-3">
                                {{ round($discount) }}% OFF
                            </span>
                        @endif
                    </div>

                    <!-- Service Info -->
                    <h3 class="mb-2 text-xl font-bold text-[#051923]">{{ $rservice->name }}</h3>
                    <p class="mb-4 text-gray-900">{{ Str::limit($rservice->description, 100) }}</p>

                    <!-- Pricing -->
                    <div class="flex items-center mb-4">
                        @if ($rservice->discounted_price)
                            <span class="text-xl font-semibold text-gray-900">Rs.
                                {{ $rservice->discounted_price }}</span> &nbsp;&nbsp;

                            <span class="text-sm font-medium text-red-500 line-through">Rs. {{ $rservice->price }}</span>
                        @else
                            <span class="text-xl font-semibold text-[#051923]">Rs. {{ $rservice->price }}</span>
                        @endif
                    </div>

                    <!-- View Details Button -->
                    <a href="{{ route('viewservicedetail', $rservice->id) }}"
                        class="block px-4 py-2 text-sm font-semibold text-center text-[white]  transition duration-300 bg-[#051923] rounded-lg ">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>

    </div>
@endsection
