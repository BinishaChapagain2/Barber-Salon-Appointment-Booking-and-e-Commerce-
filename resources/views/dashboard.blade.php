@extends('layouts.app')

@section('title')
    Gentelman BarberShop Dashboard
@endsection



@section('headerofadmin')
    <div class="w-full px-4 py-4 bg-[#051923] shadow-md logo text-white">
        <i class="bx bx-menu menu-icon"></i>
        <span class="font-medium logo-name lg:text-lg">Gentleman Dashboard</span>
    </div>
@endsection

@section('content')
    <!-- Dashboard Container -->
    <div class="grid flex-1 grid-cols-1 gap-4 p-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        <!-- Dashboard Cards -->



        <!-- Appointment Card -->
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-blue-500 bx bx-calendar-event'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Appointment</p>
            <p class="text-sm font-bold text-gray-700"> Total Appointment : <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $appointments }}</span></p>
        </div>




        <!-- Customer Card -->
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-green-500 bx bx-user'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Customer</p>
            <p class="text-sm font-bold text-gray-700"> Total Customer : <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $users }}</span></p>
        </div>

        <!-- Category Card -->
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-purple-500 bx bx-category'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Category</p>
            <p class="text-sm font-bold text-gray-700"> Total Category : <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $categories }}</span></p>
        </div>

        <!-- Product Card -->
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-orange-500 bx bx-box'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Product</p>
            <p class="text-sm font-bold text-gray-700"> Total Product : <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $products }}</span></p>
        </div>

        <!-- Total Orders Card -->
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-blue-500 bx bx-receipt'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Total Orders</p>
            <p class="text-sm font-bold text-gray-700"> Total Orders : <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $order }}</span></p>
        </div>

        <!-- Pending Orders Card -->
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-yellow-500 bx bx-hourglass'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Pending Orders</p>
            <p class="text-sm font-bold text-gray-700"> Pending Orders : <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $pending }}</span></p>
        </div>

        <!-- shipping Orders Card -->
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-green-500 bx bx-store'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Shipping Orders</p>
            <p class="text-sm font-bold text-gray-700"> Shipping Orders : <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $shipping }}</span></p>
        </div>

        <!-- Processing Orders Card -->
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-orange-500 bx bx-cog'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Processing Orders</p>
            <p class="text-sm font-bold text-gray-700"> Processing Orders : <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $processing }}</span></p>
        </div>


        <!-- Completed Orders Card -->
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-green-500 bx bx-check-circle'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Completed Orders</p>
            <p class="text-sm font-bold text-gray-700"> Completed Orders : <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $completed }}</span></p>
        </div>

        <!-- Services categories Card -->
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-red-500 bx bx-briefcase'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Services Category</p>
            <p class="text-sm font-bold text-gray-700"> Total Category: <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $servicescategory }}</span></p>
        </div>

        {{-- service card --}}
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-orange-500 bx bxs-analyse'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Services</p>
            <p class="text-sm font-bold text-gray-700"> Total Services : <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $services }}</span></p>
        </div>

        {{-- Courses Card --}}
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-blue-500 bx bx-book-open'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Courses</p>
            <p class="text-sm font-bold text-gray-700"> Total Courses : <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $courses }}</span></p>
        </div>

        <!-- staff Card -->
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-green-500 bx bx-user'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Staff</p>
            <p class="text-sm font-bold text-gray-700"> Total Staff : <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $staffs }}</span></p>
        </div>


        <!-- Enquiry Card -->
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-teal-500 bx bx-chat'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Enquiry</p>
            <p class="text-sm font-bold text-gray-700"> Total Enquiry : <span
                    class="mt-1 text-sm font-bold text-gray-900">{{ $enquiry }}</span></p>
        </div>

        <!-- Revenue Report Card -->
        <div
            class="flex flex-col items-center justify-center w-full p-4 transition-shadow duration-300 ease-in-out transform bg-gray-200 rounded-lg shadow-md h-36 hover:shadow-lg hover:scale-105">
            <i class='text-3xl text-yellow-500 bx bx-bar-chart'></i>
            <p class="mt-2 text-lg font-semibold text-center text-gray-700">Revenue Report</p>
            <p class="text-sm font-bold text-gray-700"> Total Revenue : <span
                    class="mt-1 text-sm font-bold text-gray-900">$11,125</span></p>
        </div>

    </div>
@endsection
