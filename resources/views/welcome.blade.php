@extends('layouts.master')
@section('title')
    Gentleman Barbershop|Bharatpur-15,Chitwan
@endsection
@section('content')
    <div id="loading"
        class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-600 bg-opacity-80 backdrop-blur-sm">
        <div class="flex items-center justify-center space-x-6">
            <!-- Logo -->
            <div class="flex items-center justify-center w-48 h-48 bg-black rounded-full">
                <img src="{{ asset('images/gentalmanlogo.png') }}" alt="Logo" class="object-contain w-44 h-44">
            </div>

            <!-- Spinner -->
            <div class="w-16 h-16 border-4 border-t-4 border-white rounded-full border-t-gray-800 animate-spin"></div>

            <!-- Loading Text -->
            <p class="text-2xl font-semibold text-white">Loading...</p>
        </div>
    </div>


    <!-- Container -->
    <div class="container px-4 py-16 mx-auto lg:py-6">
        <!-- Flexbox for main content -->
        <div class="flex flex-col items-center justify-between -mt-12 lg:flex-row">
            <!-- Left Section -->
            <div class="lg:w-1/2">
                <h4 class="mb-2 text-lg tracking-widest text-gray-800 uppercase">Welcome to Gentelman Barber Shop</h4>
                <h1 class="mb-6 text-5xl font-bold leading-tight md:text-6xl">
                    Discover You Unique &amp; New Style
                </h1>
                <p class="mb-8 text-lg text-gray-700">
                    We believe that your hair is an expression of your personality. Our skilled stylists are here to help
                    you unleash your true style potential.
                </p>

                <ul class="mb-8 space-y-2 text-xl">
                    <li class="flex items-center">
                        <span class="font-medium text-gray-500">01.</span>
                        <span class="ml-3">Get Hair Style You Deserve</span>
                    </li>
                    <li class="flex items-center">
                        <span class="font-medium text-gray-500">02.</span>
                        <span class="ml-3">Artistry in Every Cut <span class="text-gray-400">......</span></span>
                    </li>
                </ul>

                <a href="{{ route('appointment.create') }}"
                    class="inline-block px-6 py-3 text-lg text-white  bg-[#051923] transition duration-300  border-2 border-[#051923] rounded-full hover:bg-white hover:text-[#051923]">Book
                    Now</a>
            </div>

            <!-- Right Section (Image Area) -->
            <div class="relative mt-10 lg:w-1/2 lg:mt-0">
                <!-- Image Placeholder (replace with actual image URL when available) -->
                <div class="relative overflow-hidden rounded-full shadow-2xl shadow-slate-300 w-82 top-10 h-82 lg:h-82">
                    <img src="{{ asset('images/chair.jpg') }}" alt="Hair Styling" class="object-cover w-full h-full">
                </div>
            </div>
        </div>
    </div>

    <div
        class="flex flex-col items-center px-2 py-5 mx-auto space-y-8 max-w-8xl lg:flex-row lg:justify-between lg:space-y-0">

        <!-- Left side - images -->
        <div class="flex flex-col items-center gap-4 lg:flex-row lg:items-start lg:space-x-8">
            <!-- Image for Small Devices - hidden on small screens -->
            <div class="hidden w-full rounded-lg lg:block">
                <img src="{{ asset('images/courses/1727780877.jpg') }}" alt="Salon Interior"
                    class="object-cover w-full rounded-xl lg:w-96 lg:h-96"> <!-- Adjust width for large screens -->
            </div>

            <div class="flex flex-col items-center gap-6 lg:items-start">
                <div class="px-4 py-2 text-white bg-[#051923] rounded-3xl shadow-lg w-fit">
                    <span class="text-sm text-gray-200">Since</span>
                    <span class="text-3xl font-bold">2021</span>
                </div>
                <div class="hidden overflow-hidden lg:block rounded-xl">
                    <img src="{{ asset('images/staffs/1726674303.jpg') }}" alt="Hair Stylist"
                        class="object-cover w-full h-auto sm:w-52 sm:h-64 md:w-64 md:h-72 lg:w-96 lg:h-80">
                </div>
            </div>
        </div>

        <!-- Right side - content -->
        <div class="flex flex-col m-6 space-y-4 lg:ml-8 lg:items-start lg:text-left">
            <h4 class="text-lg tracking-wider text-gray-600 uppercase sm:text-xl lg:text-2xl">
                About Gentleman Barber Shop
            </h4>
            <h2 class="text-2xl font-bold text-gray-800 sm:text-3xl lg:text-4xl">
                Luxury Salon Where You Will Feel Unique
            </h2>
            <p class="text-justify text-gray-500 lg:text-lg">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text.
            </p>
            <ul class="space-y-2 text-justify lg:text-lg">
                <li class="text-gray-800">
                    <span class="font-bold">01. </span> The hair cutting and styling with 10 years of experience.
                </li>
                <li class="text-gray-800">
                    <span class="font-bold">02. </span> Update the latest technology and tendency in the world.
                </li>
                <li class="text-gray-800">
                    <span class="font-bold">03. </span> Using the best products from the top providers.
                </li>
            </ul>
        </div>

    </div>


    <!-- Services Section -->
    <section class="px-4 py-12 bg-gray-50">
        <div class="container mx-auto text-center">
            <h4 class="text-sm tracking-wider text-gray-600 uppercase sm:text-lg lg:text-sm">
                PROFESSIONAL SERVICES <br> <br>
            </h4>
            <!-- Heading -->
            <h2 class="mb-8 text-3xl font-bold text-gray-800">We Are Experts In

            </h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($services as $service)
                    <!-- Service Card -->
                    <div class="relative p-6 transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105">
                        <!-- Service Image -->
                        <div class="relative mb-4">
                            <img src="{{ asset('images/services/' . $service->photopath) }}" alt="{{ $service->name }}"
                                class="object-cover w-full h-64 rounded-lg">
                            @if ($service->discounted_price)
                                <span
                                    class="absolute px-2 py-1 text-sm font-semibold text-white bg-red-500 rounded-lg top-3 left-3">
                                    {{ round((($service->price - $service->discounted_price) / $service->price) * 100) }}%
                                    OFF
                                </span>
                            @endif
                        </div>

                        <!-- Service Info -->
                        <h3 class="mb-2 text-left text-xl font-bold text-[#051923]">{{ $service->name }}</h3>
                        <p class="mb-4 text-left text-justify text-[#051923]">{{ $service->description }}</p>

                        <!-- Pricing -->
                        <div class="flex mb-4 items center">
                            <span class="text-lg text-left font-bold text-[#051923]">Rs.{{ $service->price }}</span>
                            @if ($service->discounted_price)
                                <span
                                    class="text-lg font-bold text-left text-red-500 line-through">Rs.{{ $service->discounted_price }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>

        </div>


    </section>

    <a href="{{ route('servicepage') }}"
        class="px-3 py-3 ml-9 text-lg  text-white  bg-[#051923] transition duration-300  border-2 border-[#051923] rounded-full hover:bg-white hover:text-[#051923] ">Explore
        More</a>


    <!-- Services Section -->
    <section class="px-3 py-12 bg-gray-50">
        <div class="container mx-auto">
            <h4 class="text-sm tracking-wider text-center text-gray-600 uppercase sm:text-lg lg:text-sm">
                Premium Grooming Products <br> <br>
            </h4>
            <!-- Heading -->
            <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Unleash Your Style with Our Premium
                Grooming Products!

            </h2>

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

    </section>

    <a href="{{ route('productpage') }}"
        class="px-3 py-3 ml-9 text-lg  text-white  bg-[#051923] transition duration-300  border-2 border-[#051923] rounded-full hover:bg-white hover:text-[#051923] ">Explore
        More</a>



    {{-- Gallery section --}}

    <section class="px-3 py-12 bg-gray-50">
        <div class="container mx-auto text-center">
            <h4 class="text-sm tracking-wider text-gray-600 uppercase sm:text-lg lg:text-sm">
                Gallery <br> <br>
            </h4>
            <!-- Heading -->
            <h2 class="mb-8 text-3xl font-bold text-gray-800">Showcasing Our Finest Creations</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <!-- Gallery -->

                @foreach ($galleries as $gallery)
                    <div
                        class="p-6 transition-shadow duration-300 transform bg-white rounded-lg shadow-lg cursor-pointer hover:shadow-2xl hover:scale-105">
                        <img src=" {{ asset('images/galleries/' . $gallery->photopath) }} " alt="Gallery"
                            class="object-cover w-full h-64">
                    </div>
                @endforeach
                {{-- buuton to explore more --}}






            </div>

        </div>

    </section>
    <a href="{{ route('gallerypage') }}"
        class="px-3 py-3 ml-9 text-lg  text-white  bg-[#051923] transition duration-300  border-2 border-[#051923] rounded-full hover:bg-white hover:text-[#051923] ">Explore
        More</a>






    {{-- Testimonial Section --}}

    <div class="container relative w-full p-3 mx-auto mt-10 rounded-lg shadow-lg bg-gray-50">

        <!-- Review Form (Full Width) -->
        <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">Leave a Review</h2>
        <form action="{{ route('reviews.store') }}" method="POST" class="w-full mb-8">
            @csrf
            <div class="w-full mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700">Review</label>
                <textarea name="review" rows="4" class="w-full p-3 border border-gray-300 rounded-md"
                    placeholder="Write your review..." required></textarea>
                <p class="text-sm text-gray-500">Max 500 characters</p>
            </div>

            <!-- Rating Radio Buttons -->
            <div class="w-full mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700">Rating</label>
                <div class="flex space-x-4">
                    @for ($i = 1; $i <= 5; $i++)
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" name="rating" value="{{ $i }}" required>
                            <i class="text-yellow-500 bx bxs-star"></i> <!-- Star icon -->
                            <span class="ml-2 text-lg font-semibold">{{ $i }}</span>
                        </label>
                    @endfor
                </div>
            </div>

            <!-- Submit Button (Black Background) -->
            <button type="submit"
                class="px-4 py-2 text-white transition-transform duration-200 bg-black rounded-lg w-max hover:bg-gray-900 hover:scale-105">
                Submit Review
            </button>
        </form>

        <!-- Display Reviews in Slider -->
        <h2 class="mb-4 text-3xl font-bold text-gray-800">Customer Reviews</h2>

        <div class="overflow-x-auto">
            <div class="flex space-x-4">
                @foreach ($reviews as $review)
                    <div class="flex-none p-4 bg-white border border-gray-200 rounded-lg shadow-sm w-80">
                        <!-- Avatar -->
                        <div class="flex items-center justify-center w-12 h-12 mr-4 bg-gray-900 rounded-full">
                            @if ($review->user->profile_picture)
                                <img class="object-cover w-full h-full rounded-full"
                                    src="{{ asset('images/profile_pictures/' . $review->user->profile_picture) }}"
                                    alt="{{ $review->user->name }}'s Profile Picture">
                            @else
                                <span
                                    class="text-xl font-bold text-white">{{ strtoupper(substr($review->user->name, 0, 1)) }}</span>
                            @endif
                        </div>

                        <!-- Review Content -->
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $review->user->name }}</h3>
                            </div>
                            <p class="mt-2 text-gray-600">{{ $review->review }}</p>

                            <!-- Star Rating -->
                            <div class="flex items-center mt-2">
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <i class="text-yellow-500 bx bxs-star"></i> <!-- Filled star icon -->
                                @endfor
                            </div>
                            <span class="text-sm text-gray-500">Reviewed on
                                {{ $review->created_at->format('F j, Y \a\t g:i A') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <script>
        // Show the loader when the page starts loading
        window.addEventListener('load', function() {
            document.getElementById("loading").classList.add("hidden");
        });

        // Show the loader when the page starts loading
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById("loading").classList.remove("hidden");
        });
    </script>
@endsection
