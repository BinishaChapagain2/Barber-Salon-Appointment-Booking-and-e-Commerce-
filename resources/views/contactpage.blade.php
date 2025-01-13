@extends('layouts.master')

@section('title')
    Contact Us
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="py-10 bg-[#051923] text-white text-center">
        <div class="container px-4 mx-auto">
            <h1 class="mb-6 text-3xl font-extrabold sm:text-6xl">Contact Us</h1>
            <p class="text-lg font-light">We would love to hear from you. Feel free to reach out to us using any of the
                following methods.</p>
        </div>
    </div>

    <!-- Contact Information Section -->
    <div class="py-16 bg-gray-100">
        <div class="container grid grid-cols-1 gap-8 px-4 mx-auto md:grid-cols-2 lg:grid-cols-3">
            <!-- Address Section -->
            <div class="p-8 text-center transition-shadow duration-300 bg-white rounded-lg shadow-lg hover:shadow-2xl">
                <i class='mb-4 text-5xl text-[#051923] bx bxs-map-pin'></i>
                <h2 class="mb-2 text-xl font-semibold text-[#051923]">Address</h2>
                <p class="text-gray-800">1234 Tadi Street</p>
                <p class="text-gray-800">Chitwan, Tadi 12345</p>
            </div>

            <!-- Phone Section -->
            <div class="p-8 text-center transition-shadow duration-300 bg-white rounded-lg shadow-lg hover:shadow-2xl">
                <i class='mb-4 text-5xl text-[#051923] bx bxs-phone'></i>
                <h2 class="mb-2 text-xl font-semibold text-[#051923]">Phone</h2>
                <p class="text-gray-800">(+977) <a href="tel:9892093488">9892093488</a> </p>
                <p class="text-gray-800">(+977) <a href="tel:9892093488">9892093488</a> </p>
            </div>



            <!-- Email Section -->
            <div class="p-8 text-center transition-shadow duration-300 bg-white rounded-lg shadow-lg hover:shadow-2xl">
                <i class='mb-4 text-5xl text-[#051923] bx bxs-envelope'></i>
                <h2 class="mb-2 text-xl font-semibold text-[#051923]">Email</h2>
                <p class="text-gray-800">
                    <a href="mailto:gentlemanbarbershop@gmail.com"
                        class="text-blue-800 hover:text-blue-800">Gentlemanbarbershop@gmail.com</a>
                </p>
                <p class="text-gray-800">
                    <a href="mailto:gentlemanbarbershop@gmail.com"
                        class="text-blue-800 hover:text-blue-800">Gentlemanbarbershop@gmail.com</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Contact Form Section -->
    <div class="py-12 bg-gray-100">
        <div class="container px-4 mx-auto">
            <h2 class="mb-8 text-3xl font-semibold text-center text-[#051923]">Get In Touch With Us</h2>

            <!-- Flexbox Layout for Form and Image -->
            <div class="flex flex-col-reverse justify-between space-y-8 lg:flex-row lg:space-y-0 lg:space-x-8">

                <!-- Contact Form -->
                <div class="w-full p-8 bg-white rounded-lg shadow-lg lg:w-1/2" id="contact_form">
                    <form action=" {{ route('contact.store') }}
                    " method="POST">
                        @csrf

                        <!-- Name Field -->
                        <label for="name" class="block text-sm font-medium text-[#051923]">Full Name</label>
                        <div class="relative mb-6 floating-label">
                            <i class='absolute text-xl text-gray-500 bx bx-user left-4 top-3'></i>
                            <input type="text" id="name" name="name" placeholder=" "
                                class="w-full py-3 pl-10 mt-1 transition duration-300 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 hover:shadow-md"
                                required>
                        </div>

                        <!-- Email Field -->
                        <label for="email" class="block text-sm font-medium text-[#051923]">Email</label>
                        <div class="relative mb-6 floating-label">
                            <i class='absolute text-xl text-gray-500 bx bx-envelope left-4 top-3'></i>
                            <input type="email" id="email" name="email" placeholder=" "
                                class="w-full py-3 pl-10 mt-1 transition duration-300 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 hover:shadow-md"
                                required>
                        </div>

                        <!-- Phone Field -->
                        <label for="phone" class="block text-sm font-medium text-[#051923]">Phone</label>
                        <div class="relative mb-6 floating-label">
                            <i class='absolute text-xl text-gray-500 bx bx-phone left-4 top-3'></i>
                            <input type="text" id="phone" name="phone" placeholder=" "
                                class="w-full py-3 pl-10 mt-1 transition duration-300 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 hover:shadow-md">
                        </div>



                        <!-- Message Field -->
                        <label for="message" class="block text-sm font-medium text-[#051923]">Message</label>
                        <div class="relative mb-6 floating-label">
                            <i class='absolute text-xl text-gray-500 bx bx-message-square-dots left-4 top-3'></i>
                            <textarea id="message" name="message" rows="4" placeholder=" "
                                class="w-full py-3 pl-10 mt-1 transition duration-300 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 hover:shadow-md"
                                required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full py-3 font-semibold text-white bg-[#051923] rounded-lg hover:bg-gray-800 transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Image with Gradient Effect -->
                <div class="relative lg:w-1/2 lg:h-auto">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#051923cc] via-[#05192366] to-transparent z-10">
                    </div>
                    <img src="{{ asset('images/chair.jpg') }}" alt="Chair"
                        class="object-cover w-full h-full rounded shadow-lg">
                </div>
            </div>
        </div>
    </div>


    <!-- Map Section -->

    <!-- Google Map Section -->
    <div class="py-12">
        <div class="container px-4 mx-auto">
            <iframe class="w-full rounded shadow-md h-96"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3535.0908847396804!2d84.51234057491999!3d27.62170172926472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994efa83d7df2e3%3A0xae2391f3365cdf46!2sGentlemen%20Barbershop%20%26%20Academy!5e0!3m2!1sen!2snp!4v1725276154338!5m2!1sen!2snp"></iframe>
        </div>
    </div>
@endsection
