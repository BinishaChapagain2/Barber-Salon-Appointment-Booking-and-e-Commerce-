@extends('layouts.master')
@section('content')
    <!-- Latest services Section -->
    <div class="w-full px-4 py-2 mx-auto max-w-8xl">
        <div class="flex flex-col-reverse justify-between mb-6 space-y-1 md:flex-row ">

            <!-- Title -->
            <h2
                class="pl-4 mt-4 text-3xl md:mt-3 font-bold tracking-wide text-[#051923]  border-l-4 border-yellow-500 sm:text-4xl lg:text-5xl">
                Search Results
            </h2>

            <!-- Search Bar -->
            <div class="relative w-full max-w-xs md:max-w-md md:mb-6">
                <form action="{{ route('searchservice') }}" method="GET" class="flex">
                    <input type="text"
                        class="w-full px-4 py-3 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:border-[#051923] focus:ring-1 focus:ring-[#051923] transition duration-300"
                        placeholder="Search services..." name="search">
                    <button type="submit"
                        class="flex items-center justify-center w-12 text-white transition-all duration-300 bg-[#051923] hover:bg-yellow-500 rounded ">
                        <i class="bx bx-search-alt-2"></i>
                    </button>
                </form>
            </div>
        </div>

    </div>
    <div class="px-16 ">
        <div class="grid grid-cols-1 gap-8 mt-12 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @forelse ($services as $service)
                <!-- service Card -->
                <a href="{{ route('viewservicedetail', $service->id) }}" <div
                    class="relative transition-transform duration-300 transform bg-white rounded-lg shadow-lg hover:scale-105 hover:shadow-xl">
                    <!-- New Tag -->
                    <div
                        class="absolute px-3 py-1 text-xs font-semibold text-white bg-yellow-600 rounded-full top-3 right-3">
                        New
                    </div>

                    <!-- service Image -->
                    <img src="{{ asset('images/services/' . $service->photopath) }}" alt="{{ $service->name }}"
                        class="object-contain w-full h-64 bg-gray-100 rounded-t-lg">

                    <!-- service Info -->
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $service->name }}</h3>
                        <p class="mt-2 text-sm text-gray-600">
                            {{ Str::limit($service->description, 100) }}
                        </p>

                        <!-- Price and Discount -->
                        <div class="flex items-center mt-4 space-x-3">
                            <span class="text-xl font-bold text-gray-900">Rs.{{ $service->price }}</span>
                            @if ($service->discounted_price)
                                <span
                                    class="text-lg font-medium text-red-500 line-through">Rs.{{ $service->discounted_price }}</span>
                            @endif
                        </div>

                        <!-- Actions -->




                    </div>

                </a>
            @empty
                <div class="flex flex-col items-center justify-center h-64 bg-gray-100 rounded-lg">
                    <i class="mb-4 text-6xl text-gray-400 bx bx-box"></i>
                    <p class="text-lg font-semibold text-gray-700">No services Found</p>

                </div>
            @endforelse

        </div>
    </div>
@endsection
