@extends('layouts.master')

@section('title')
    Courses | Gentleman Barbershop
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="relative w-full h-64 bg-center bg-cover sm:h-80 lg:h-[28rem]">
        <!-- Blurred Background Image -->
        <div class="absolute inset-0 bg-center bg-cover filter blur-md"
            style="background-image: url('{{ asset('images/1731506007.jpg') }}');">
        </div>

        <!-- Dark Overlay for Contrast -->
        <div class="absolute inset-0 bg-black opacity-60"></div>

        <!-- Centered Text -->
        <div class="relative flex items-center justify-center h-full">
            <h1 class="text-3xl font-extrabold text-center text-white sm:text-4xl lg:text-6xl">Master Barbering Skills</h1>
        </div>
    </div>

    <!-- Latest Courses Section -->
    <section class="relative w-full px-4 py-16 mx-auto max-w-7xl">
        <h2 class="mb-6 text-3xl font-extrabold text-center text-gray-900 sm:text-4xl lg:text-5xl">Latest Courses</h2>
        <p class="max-w-3xl mx-auto text-base text-center text-gray-500 sm:text-lg lg:text-xl">
            Elevate your barbering skills with our curated professional courses. Enroll now to become a top-tier barber.
        </p>

        <!-- Course Grid Wrapper -->
        <div class="grid grid-cols-1 gap-12 mt-12 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($courses as $course)
                <div
                    class="overflow-hidden transition duration-300 transform bg-white rounded-lg shadow-lg hover:scale-105">
                    <!-- Course Image -->
                    <div class="relative h-64">
                        <img src="{{ asset('images/courses/' . $course->photopath) }}" alt="{{ $course->name }}"
                            class="object-cover w-full h-full transition duration-300 hover:opacity-90">
                        @if ($course->discounted_price)
                            <!-- Special Offer Badge -->
                            <div
                                class="absolute px-3 py-1 text-lg font-bold text-white rounded shadow-lg top-3 right-3 bg-gradient-to-r from-red-500 to-orange-500">
                                {{ 100 - round(($course->discounted_price / $course->price) * 100) }}% OFF
                            </div>
                        @endif
                    </div>

                    <!-- Course Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 transition duration-300 hover:text-red-500">
                            {{ $course->name }}
                        </h3>
                        <p class="mt-2 text-base leading-relaxed text-gray-600">
                            {{ $course->description }}
                        </p>
                        <p class="mt-4 text-sm font-medium text-gray-500">
                            <span class="text-gray-900">Duration: 1 to {{ $course->duration }} Weeks</span>
                        </p>

                        <!-- Price and Enroll Button -->
                        <div class="flex flex-col mt-6 space-y-2">
                            @if ($course->discounted_price)
                                <!-- Discounted Price Styling -->
                                <span class="text-2xl font-bold text-gray-900">
                                    Rs.{{ $course->discounted_price }}
                                </span>
                                <span class="text-lg text-red-700 line-through">
                                    Rs.{{ $course->price }}
                                </span>
                            @else
                                <span class="text-2xl font-bold text-gray-900">
                                    Rs.{{ $course->price }}
                                </span>
                            @endif

                            <!-- Enroll Now Button -->
                            <a href="{{ route('contactpage') }}#contact_form"
                                class="inline-block px-6 py-2 mt-4 text-lg font-semibold text-white transition duration-300 bg-[#051923] rounded shadow-lg">
                                Enroll Now
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
