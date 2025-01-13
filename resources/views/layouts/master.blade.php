<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/gentalmanlogo.png') }}" type="image/x-icon">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- swipe js --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

        const swiper = new Swiper(...)
    </script>


    <!-- Boxicons link -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- Animate.css for animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    @include('layouts.alert')
    <nav class="bg-[#051923] sticky top-0 z-40">
        <div class="container px-4 mx-auto sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('homepage') }}" class="flex items-center">
                        <img class="w-auto h-20" src="{{ asset('images/gentalmanlogo.png') }}" alt="Logo">
                    </a>
                </div>

                <!-- Desktop Menu (visible on lg screens and up) -->
                <div class="hidden space-x-4 lg:flex lg:flex-1 lg:items-center lg:justify-center">
                    <a href="{{ route('homepage') }}"
                        class="px-3 py-2 text-xs font-medium text-white rounded-md hover:text-gray-300 sm:text-sm md:text-base lg:text-lg">Home</a>
                    <a href="{{ route('aboutpage') }}"
                        class="px-3 py-2 text-xs font-medium text-white rounded-md hover:text-gray-300 sm:text-sm md:text-base lg:text-lg">About</a>

                    <!-- Services Dropdown -->
                    <div class="relative group">

                        <a href="{{ route('servicepage') }}" id="services-menu-button"
                            class="px-3 py-2 text-xs font-medium text-white rounded-md cursor-pointer hover:text-gray-300 sm:text-sm md:text-base lg:text-lg">
                            Services</i>
                        </a>
                    </div>

                    <a href="{{ route('productpage') }}"
                        class="px-3 py-2 text-xs font-medium text-white rounded-md hover:text-gray-300 sm:text-sm md:text-base lg:text-lg">Product</a>
                    <a href="/coursepage"
                        class="px-3 py-2 text-xs font-medium text-white rounded-md hover:text-gray-300 sm:text-sm md:text-base lg:text-lg">Courses</a>
                    <a href="{{ route('gallerypage') }}"
                        class="px-3 py-2 text-xs font-medium text-white rounded-md hover:text-gray-300 sm:text-sm md:text-base lg:text-lg">Gallery</a>
                    <a href="{{ route('contactpage') }}"
                        class="px-3 py-2 text-xs font-medium text-white rounded-md hover:text-gray-300 sm:text-sm md:text-base lg:text-lg">Contact</a>

                </div>












                <!-- Book Now and User Profile (Desktop) -->
                <div class="hidden lg:flex lg:items-center lg:space-x-4">

                    @auth

                        <div class="relative group">
                            <!-- Profile Picture -->
                            <img class="object-cover w-10 h-10 rounded-full cursor-pointer"
                                src="{{ asset('images/profile_pictures/' . (auth()->user()->profile_picture ?? 'defaultusericon.jpg')) }}"
                                alt="User Profile">




                            <!-- Dropdown Menu -->
                            <div
                                class="absolute right-0 hidden w-48 p-2 transition-all duration-300 ease-in-out transform bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 top-6 group-hover:block group-hover:opacity-100 group-hover:translate-y-2 animate__animated animate__bounceIn">

                                {{-- my booking --}}
                                <a href="{{ route('appointment.index') }}"
                                    class="flex items-center gap-2 p-2 text-gray-700 transition-colors duration-300 ease-in-out rounded-lg hover:bg-blue-50 hover:text-blue-600">
                                    <i class='text-xl bx bx-calendar-event'></i>
                                    <span>My Appointment</span>
                                </a>

                                <!-- My Chart -->
                                <a href="{{ route('mycart') }}"
                                    class="relative flex items-center gap-2 p-2 text-gray-700 transition-colors duration-300 ease-in-out rounded-lg hover:bg-blue-50 hover:text-blue-600">
                                    <i class='text-xl bx bx-cart-add'></i>
                                    <span>My Cart</span>
                                    @if (auth()->user()->cart->count() > 0)
                                        <span
                                            class="absolute top-0 right-0 flex items-center justify-center w-5 h-5 text-xs text-white bg-red-600 rounded-full">
                                            {{ auth()->user()->cart->count() }}
                                        </span>
                                    @endif
                                </a>

                                <!-- My Order -->
                                <a href="{{ route('myorder') }}"
                                    class="flex items-center gap-2 p-2 text-gray-700 transition-colors duration-300 ease-in-out rounded-lg hover:bg-blue-50 hover:text-blue-600">
                                    <i class='text-xl bx bx-shopping-bag'></i>
                                    <span>My Order</span>
                                </a>
                                <!-- My Order History -->
                                <a href="{{ route('cancelhistory') }}"
                                    class="flex items-center gap-2 p-2 text-gray-700 transition-colors duration-300 ease-in-out rounded-lg hover:bg-blue-50 hover:text-blue-600">
                                    <i class='text-xl bx bx-shopping-bag'></i>
                                    <span>Order History</span>
                                </a>




                                <!-- My Profile -->
                                <a href="{{ route('profile.edit') }}"
                                    class="flex items-center gap-2 p-2 text-gray-700 transition-colors duration-300 ease-in-out rounded-lg hover:bg-blue-50 hover:text-blue-600">
                                    <i class='text-xl bx bx-user'></i>
                                    <span>My Profile</span>
                                </a>

                                <!-- Logout -->
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button
                                        class="flex items-center w-full gap-2 p-2 text-left text-gray-700 transition-colors duration-300 ease-in-out rounded-lg hover:bg-red-50 hover:text-red-600">
                                        <i class='text-xl bx bx-log-out'></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>



                        <!-- Login Button for Guests -->
                    @else
                        <a href="{{ route('login') }}"
                            class="block px-5 py-2 ml-2 font-medium  text-lg bg-white  text-[#051923] transition duration-300  border-2 border-[#f8f9fa] rounded-full hover:bg-gray-300 hover:text-[#051923]">
                            Login
                        </a>
                    @endauth

                </div>

                <!-- Mobile Menu button (sm and md screens) -->
                <div class="flex items-center lg:hidden">
                    <button type="button"
                        class="p-2 rounded-md text-gray-400 hover:bg-[#051923] hover:text-white focus:outline-none"
                        id="mobile-menu-button">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block w-6 h-6" id="menu-icon" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                        <svg class="hidden w-6 h-6" id="close-icon" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (hidden by default) -->
        <div class="hidden lg:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('homepage') }}"
                    class="block px-3 py-2 text-base font-medium text-white rounded-md">Home</a>
                <a href="{{ route('aboutpage') }}"
                    class="block px-3 py-2 text-base font-medium text-white rounded-md">About</a>

                <!-- Mobile Services Dropdown -->
                <div class="relative z-10">
                    <a href="{{ route('servicepage') }}" id="mobile-services-menu-button"
                        class="flex items-center px-3 py-2 text-base font-medium text-white rounded-md bg-[#051923] hover:bg-[#0a2a36] transition-all duration-300">
                        Services</i>
                    </a>
                </div>


                <a href="{{ route('productpage') }}"
                    class="block px-3 py-2 text-base font-medium text-white rounded-md">Product</a>
                <a href="{{ route('coursepage') }}"
                    class="block px-3 py-2 text-base font-medium text-white rounded-md">Courses</a>
                <a href="{{ route('gallerypage') }}"
                    class="block px-3 py-2 text-base font-medium text-white rounded-md">Gallery</a>
                <a href="{{ route('contactpage') }}"
                    class="block px-3 py-2 text-base font-medium text-white rounded-md">Contact</a>




                <div class="flex items-center justify-between w-full px-3 py-2 ">

                    @auth

                        <div class="relative group">
                            <img class="object-cover w-10 h-10 rounded-full cursor-pointer"
                                src="{{ asset('images/profile_pictures/' . (auth()->user()->profile_picture ?? 'defaultusericon.jpg')) }}"
                                alt="User Profile">
                            <div
                                class="absolute hidden w-48 p-2 bg-gray-100 border rounded shadow left-10 -top-12 group-hover:block">

                                <a href="{{ route('appointment.index') }}" class="block p-4 py-2 hover:bg-gray-200">
                                    <i class='bx bx-calendar-event'></i> My Appointment
                                </a>

                                <a href="{{ route('mycart') }}" class="block p-4 py-2 hover:bg-gray-200">
                                    <i class='bx bx-bar-chart-alt'></i> My Chart
                                </a>
                                <a href="" class="block p-4 py-2 hover:bg-gray-200">
                                    <i class='bx bx-shopping-bag'></i> My Order
                                </a>

                                {{-- order history --}}
                                <a href="{{ route('cancelhistory') }}" class="block p-4 py-2 hover:bg-gray-200">
                                    <i class='bx bx-shopping-bag'></i> Order History
                                </a>


                                <a href="{route('profile.edit')}" class="block p-4 py-2 hover:bg-gray-200">
                                    <i class='bx bx-user'></i> My Profile
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="block w-full p-4 py-2 text-left rounded-md hover:bg-gray-200">
                                        <i class='bx bx-log-out'></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                            class="block p-3 py-1 w-auto  text-base font-medium text-[#051923] hover:text-white hover:bg-[#051923]  bg-white rounded-md ">Login/Register
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    @yield('headerofuser')
    @yield('content')
    @yield('productpagecategorieslink')
    @yield('servicepagecategories')



    <footer class="px-3 pt-6 mt-6 lg:px-9 border-t-2 border-gray-700 bg-[#051923]">
        <div class="grid gap-5 row-gap-6 mb-8 text-white sm:grid-cols-2 lg:grid-cols-4">

            <div class="sm:col-span-2">
                <a href="#" class="inline-flex items-center">
                    <img src="{{ asset('images/gentalmanlogo.png') }}" alt="logo" class="w-10 h-10">
                    <span class="ml-2 text-xl font-bold tracking-wide text-white">Gentelman Barber Shop</span>
                </a>
                <div class="mt-6 lg:max-w-2xl">
                    <p class="text-sm text-gray-400">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi felis mi, faucibus dignissim
                        lorem
                        id, imperdiet interdum mauris. Vestibulum ultrices sed libero non porta. Vivamus malesuada urna
                        eu
                        nibh malesuada, non finibus massa laoreet. Nunc nisi velit, feugiat a semper quis, pulvinar id
                        libero. Vivamus mi diam, consectetur non orci ut, tincidunt pretium justo. In vehicula porta
                        molestie. Suspendisse potenti.
                    </p>
                </div>
            </div>

            <div class="flex flex-col gap-4 text-sm md:flex-row">
                <div class="md:w-1/2">
                    <p class="text-sm font-bold tracking-wide text-white uppercase">Service's</p>
                    <div class="flex flex-col mt-2 space-y-2">

                        @php
                            $servicecategories = App\Models\servicecategory::all();
                        @endphp

                        @foreach ($servicecategories as $service)
                            <a href="{{ route('servicepage') }}"
                                class="hover:text-gray-300">{{ $service->name }}</a>
                        @endforeach

                    </div>
                </div>
                <div class="md:w-1/2">
                    <p class="mt-6 text-sm font-bold tracking-wide text-white uppercase md:mt-0">Product's
                    </p>
                    <div class="flex flex-col mt-2 space-y-2">
                        @php
                            $categories = App\Models\category::all();
                        @endphp

                        @foreach ($categories as $category)
                            <a href="{{ route('productpage') }}"
                                class="hover:text-gray-300">{{ $category->name }}</a>
                        @endforeach

                    </div>
                </div>
            </div>


            <div>
                <p class="text-base font-bold tracking-wide text-white uppercase">Available On</p>
                <div class="flex gap-1 mt-3">


                    <a class="w-1/2 bg-white rounded" href="https://www.youtube.com/channel/UCo8tEi6SrGFP8XG9O0ljFgA">
                        <img src="https://banner2.cleanpng.com/20181109/wkv/kisspng-logo-youtube-image-portable-network-graphics-compu-youtube-logo-svg-vector-amp-png-transparent-ve-1713924615300.webp"
                            alt="Youtube Button" class="h-10 mx-auto">
                    </a>
                    <a class="w-1/2 bg-white rounded" href="https://www.youtube.com/channel/UCo8tEi6SrGFP8XG9O0ljFgA">
                        <img src="https://logos-world.net/wp-content/uploads/2020/05/Facebook-Logo.png"
                            alt="Youtube Button" class="h-10 mx-auto">
                    </a>
                    <a class="w-1/2 bg-white rounded" href="https://www.youtube.com/channel/UCo8tEi6SrGFP8XG9O0ljFgA">
                        <img src="https://www.logo.wine/a/logo/TikTok/TikTok-Wordmark-Logo.wine.svg"
                            alt="Youtube Button" class="h-10 mx-auto rounded">
                    </a>
                </div>
                <p class="mt-4 text-base font-bold tracking-wide text-white uppercase">Contact</p>
                <div class="flex">
                    <p class="mr-1 text-gray-400">Email:</p>
                    <a href="#" class="hover:text-gray-300">Gentelman@company.com</a>
                </div>
            </div>

        </div>

        <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t border-gray-700 lg:flex-row">
            <p class="text-sm text-gray-500">© Copyright 2023 Gentelman Barber Shop. All rights reserved.</p>
            <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
                <li>
                    <a href="#"
                        class="text-sm text-gray-500 transition-colors duration-300 hover:text-white">Privacy &amp;
                        Cookies Policy
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="text-sm text-gray-500 transition-colors duration-300 hover:text-white">Disclaimer
                    </a>
                </li>
            </ul>
        </div>

    </footer>


    <script>
        // Services dropdown for desktop
        const servicesButton = document.getElementById('services-menu-button');
        const servicesDropdown = document.getElementById('services-dropdown');

        servicesButton.addEventListener('click', () => {
            servicesDropdown.classList.toggle('hidden');
        });

        // Mobile menu button toggle
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Services dropdown for mobile
        const mobileServicesButton = document.getElementById('mobile-services-menu-button');
        const mobileServicesDropdown = document.getElementById('mobile-services-dropdown');

        mobileServicesButton.addEventListener('click', () => {
            mobileServicesDropdown.classList.toggle('hidden');
        });
    </script>
</body>

</html>
