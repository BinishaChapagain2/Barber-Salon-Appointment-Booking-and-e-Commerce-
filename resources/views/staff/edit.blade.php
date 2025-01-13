@extends('layouts.app')

@section('title')
    Edit Staff | Gentleman Barbershop
@endsection

@section('headerofadmin')
    <div class="w-full px-4 py-4 bg-[#051923] shadow-md text-white">
        <i class="bx bx-menu menu-icon"></i>
        <span class="font-medium logo-name lg:text-lg">Edit Staff</span>
    </div>
@endsection

@section('content')
    <div class="flex flex-col flex-1 w-full h-auto bg-gray-300">
        <!-- Staff Edit Form -->
        <div class="w-full p-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-xl font-bold">Edit Staff</h2>
            <form action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- First Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" id="name"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter first name" value="{{ $staff->name }}">
                    @error('name')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Number Input -->
                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter phone number" value="{{ $staff->phone_number }}">
                    @error('phone_number')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter email" value="{{ $staff->email }}">
                    @error('email')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Facebook Link Input -->
                <div>
                    <label for="facebook_link" class="block font-medium text-gray-700 text -sm">Facebook Link</label>
                    <input type="text" name="facebook_link" id="facebook_link"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter Facebook link" value="{{ $staff->facebook_link }}">
                    @error('facebook_link')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror

                </div>

                <!-- Instagram Link Input -->
                <div>
                    <label for="instagram_link" class="block font-medium text-gray-700 text -sm">Instagram Link</label>
                    <input type="text" name="instagram_link" id="instagram_link"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter Instagram link" value="{{ $staff->instagram_link }}">
                    @error('instagram_link')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror

                </div>

                <!-- Tiktok Link Input -->

                <div>
                    <label for="tiktok_link" class="block font-medium text-gray-700 text -sm">Tiktok Link</label>
                    <input type="text" name="tiktok_link" id="tiktok_link"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter Tiktok link" value="{{ $staff->tiktok_link }}">
                    @error('tiktok_link')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>



                <!-- Specialization Input -->
                <div>
                    <label for="specialization" class="block text-sm font-medium text-gray-700">Specialization</label>
                    <input type="text" name="specialization" id="specialization"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter specialization (optional)" value="{{ $staff->specialization }}">
                    @error('specialization')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Experience Input -->
                <div>
                    <label for="experience" class="block text-sm font-medium text-gray-700">Experience (Years)</label>
                    <input type="number" name="experience" id="experience" min="0"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter years of experience" value="{{ $staff->experience }}">
                    @error('experience')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Photo Input -->
                <div>
                    <label for="photopath" class="block text-sm font-medium text-gray-700">Staff Photo</label>
                    <input type="file" name="photopath" id="photopath"
                        class="block w-full p-3 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('photopath')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror

                    <p>Current Photo:</p>
                    <img src="{{ asset('images/staffs/' . $staff->photopath) }}" alt="" class="w-44">

                </div>



                <!-- Submit and Exit Buttons -->
                <div class="flex justify-between w-full">
                    <button type="submit"
                        class="px-4 py-3 font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Update Staff
                    </button>
                    <a href="{{ route('staff.index') }}"
                        class="px-6 py-3 font-semibold text-white bg-red-600 rounded-md hover:bg-red-700">Exit</a>
                </div>
            </form>
        </div>
    </div>
@endsection
