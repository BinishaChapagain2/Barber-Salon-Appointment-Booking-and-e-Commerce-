@extends('layouts.master')
@section('title')
    About Us | Gentleman Barbershop |
@endsection

@section('content')
    <div
        class="flex flex-col items-center px-2 py-5 mx-auto space-y-8 max-w-8xl lg:flex-row lg:justify-between lg:space-y-0">

        <!-- Left side - images -->
        <div class="flex flex-col items-center gap-4 lg:flex-row lg:items-start lg:space-x-8">
            <!-- Image for Small Devices -->
            <div class="block w-full rounded-lg lg:hidden">
                <img src="{{ asset('images/courses/1727780877.jpg') }}" alt="Salon Interior"
                    class="object-cover h-auto rounded w-96"> <!-- Full width on small screens -->
            </div>

            <!-- Image for Large Devices -->
            <div class="hidden lg:block">
                <img src="{{ asset('images/courses/1727780877.jpg') }}" alt="Salon Interior"
                    class="object-cover w-full rounded-xl lg:w-96 lg:h-96"> <!-- Adjust width for large screens -->
            </div>

            <div class="flex flex-col items-center gap-6 lg:items-start">
                <div class="px-4  py-2 text-white bg-[#051923] rounded-3xl shadow-lg w-fit">
                    <span class="text-sm text-gray-200">Since</span>
                    <span class="text-3xl font-bold">2021</span>
                </div>
                <div class="hidden overflow-hidden rounded-xl lg:block">
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



    <section class="py-12 text-center">
        <!-- Header Section -->
        <h4 class="mb-2 tracking-widest text-gray-500 uppercase">Our Goal</h4>
        <h1 class="mb-8 text-4xl font-bold text-gray-800">Gentleman Barbershop Goals</h1>

        <!-- Card Section -->
        <div class="container grid gap-8 px-6 mx-auto sm:grid-cols-1 lg:grid-cols-3">
            <!-- Card 1: Our Mission -->
            <div
                class="overflow-hidden transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105 hover:shadow-xl">
                <img class="object-cover w-full h-56 rounded-t-lg" src="{{ asset('images/our-mission.jpg') }}"
                    alt="Mission Image">
                <div
                    class="relative flex items-center justify-center w-16 h-16 mx-auto -mt-8 bg-gray-800 rounded-full shadow-md">
                    <i class='text-3xl text-white bx bxs-bullseye'></i>
                </div>
                <div class="p-6">
                    <h3 class="mt-6 text-xl font-semibold text-gray-800">Our Mission</h3>
                    <p class="mt-4 text-sm leading-relaxed text-gray-600">
                        Our mission is to provide premium grooming services that enhance the confidence and style of each
                        client. We aim for excellence in every cut, shave, and service.
                    </p>
                </div>
            </div>

            <!-- Card 2: Our Vision -->
            <div
                class="overflow-hidden transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105 hover:shadow-xl">
                <img class="object-cover w-full h-56 rounded-t-lg" src="{{ asset('images/our-vision.jpg') }}"
                    alt="Vision Image">
                <div
                    class="relative flex items-center justify-center w-16 h-16 mx-auto -mt-8 bg-gray-800 rounded-full shadow-md">
                    <i class='text-3xl text-white bx bxs-show'></i>
                </div>
                <div class="p-6">
                    <h3 class="mt-6 text-xl font-semibold text-gray-800">Our Vision</h3>
                    <p class="mt-4 text-sm leading-relaxed text-gray-600">
                        Our vision is to be the leading barbershop in the city, known for innovation, quality, and customer
                        satisfaction. We strive to create a space where style meets comfort.
                    </p>
                </div>
            </div>

            <!-- Card 3: Our Approach -->
            <div
                class="overflow-hidden transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105 hover:shadow-xl">
                <img class="object-cover w-full h-56 rounded-t-lg" src="{{ asset('images/our-approach.jpg') }}"
                    alt="Approach Image">
                <div
                    class="relative flex items-center justify-center w-16 h-16 mx-auto -mt-8 bg-gray-800 rounded-full shadow-md">
                    <i class='text-3xl text-white bx bxs-compass'></i>
                </div>
                <div class="p-6">
                    <h3 class="mt-6 text-xl font-semibold text-gray-800">Our Approach</h3>
                    <p class="mt-4 text-sm leading-relaxed text-gray-600">
                        Our approach focuses on personal connections with each client, attention to detail, and continuous
                        improvement in our skills and services.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 text-center">
        <!-- Introductory Section -->
        <h4 class="mb-2 tracking-widest text-gray-500 uppercase">About Our Team</h4>
        <h1 class="mb-6 text-4xl font-bold text-gray-800">Meet Our Experts</h1>
        <p class="max-w-2xl px-4 mx-auto mb-10 text-gray-600">
            Our team consists of experienced professionals dedicated to excellence in their fields. Each expert brings
            unique skills and years of experience to provide the best service. Discover more about their specialties and
            connect with them on social media.
        </p>

        <!-- Team Cards -->
        <div class="container grid gap-8 px-6 mx-auto md:grid-cols-4">
            <!-- Team Member -->
            @foreach ($staffs as $staff)
                <div
                    class="overflow-hidden transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105 hover:shadow-xl">
                    <img class="object-cover w-full h-72" src="{{ asset('images/staffs/' . $staff->photopath) }}"
                        alt="{{ $staff->name }}">
                    <div class="p-4 text-center">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $staff->name }}</h3>
                        <p class="mt-1 text-sm text-gray-500">Specialist: {{ $staff->specialization }}</p>
                        <p class="mt-1 text-sm text-gray-500">Experience: {{ $staff->experience }} Years</p>
                        <!-- Social Media Icons -->
                        <div class="flex justify-center mt-4 space-x-4">
                            <a href="{{ $staff->facebook }}"
                                class="text-gray-600 transition-transform transform hover:text-blue-600 hover:scale-110">
                                <i class='text-2xl bx bxl-facebook-square'></i>
                            </a>
                            <a href="{{ $staff->instagram }}"
                                class="text-gray-600 transition-transform transform hover:text-red-600 hover:scale-110">
                                <i class='text-2xl bx bxl-instagram'></i>
                            </a>
                            <a href="{{ $staff->tiktok }}"
                                class="text-gray-600 transition-transform transform hover:text-black hover:scale-110">
                                <i class='text-2xl bx bxl-tiktok'></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endsection
