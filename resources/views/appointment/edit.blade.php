@extends('layouts.master')

@section('title')
    Edit Appointment | Gentleman BarberShop
@endsection

@section('content')
    <div class="max-w-4xl px-6 py-12 mx-auto mt-12 bg-white rounded-lg shadow-lg md:px-10 lg:px-16">
        <h2 class="mb-10 text-2xl font-bold tracking-tight text-center text-gray-900 md:text-3xl lg:text-4xl">
            Edit Your Appointment
        </h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('appointment.update', $appointment->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 md:text-lg">Customer Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 md:text-base"
                        value="{{ old('name', $appointment->user->name) }}" readonly>
                </div>
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 md:text-lg">Customer
                        Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 md:text-base"
                        value="{{ old('email', $appointment->user->email) }}" readonly>
                </div>
            </div>

            <div class="space-y-6">
                <label class="block mb-2 text-2xl font-bold text-gray-800">Select Services</label>
                @foreach ($servicecategories as $category)
                    <h3 class="mb-4 text-xl font-bold text-gray-700">{{ $category->name }}</h3>

                    <div class="overflow-x-auto scrollbar-hide">
                        <div class="flex space-x-4 md:space-x-6 lg:space-x-8 w-max md:w-full snap-x snap-mandatory">
                            @foreach ($category->services as $service)
                                <div
                                    class="relative p-4 transition duration-300 transform border border-gray-300 rounded-lg shadow-sm w-72 sm:w-60 hover:bg-blue-50 snap-center">
                                    <img src="{{ asset('images/services/' . $service->photopath) }}"
                                        alt="{{ $service->name }}" class="object-cover w-full h-32 mb-3 rounded-md">
                                    <h4 class="text-lg font-medium text-gray-900">{{ $service->name }}</h4>
                                    <div class="mt-2">
                                        @if ($service->discounted_price)
                                            <span
                                                class="text-lg font-semibold text-red-600 line-through">${{ $service->price }}</span>
                                            <span
                                                class="text-xl font-semibold text-blue-600">${{ $service->discounted_price }}</span>
                                        @else
                                            <span class="text-xl font-semibold text-blue-600">${{ $service->price }}</span>
                                        @endif
                                    </div>
                                    <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                        id="service{{ $service->id }}" class="absolute top-2 right-2 service-checkbox"
                                        data-price="{{ $service->discounted_price ?: $service->price }}"
                                        onchange="updateTotalPrice()" @if (in_array($service->id, $appointment->services->pluck('id')->toArray())) checked @endif>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div>
                <label for="staff" class="block mb-4 text-lg font-semibold text-gray-800 md:text-xl">Select
                    Barber/Staff</label>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($staffs as $staff)
                        <div class="p-4 text-center transition duration-300 transform border rounded-lg shadow-sm cursor-pointer hover:bg-gray-50 hover:scale-105
                            @if ($appointment->staff_id == $staff->id) bg-blue-100 border-blue-500 @endif"
                            onclick="selectBarber({{ $staff->id }})">
                            <img src="{{ asset('images/staffs/' . $staff->photopath) }}" alt="{{ $staff->name }}"
                                class="w-24 h-24 mx-auto mb-4 rounded">
                            <p class="text-lg font-bold text-gray-800">{{ $staff->name }}</p>
                        </div>
                    @endforeach
                </div>
                <input type="hidden" name="staff_id" id="selected_barber_id"
                    value="{{ old('staff_id', $appointment->staff_id) }}" required>
            </div>



            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label for="date" class="block text-sm font-semibold text-gray-700 md:text-lg">Appointment
                        Date</label>
                    <input type="date" name="appointment_date" id="date"
                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 md:text-base"
                        value="{{ old('appointment_date', $appointment->appointment_date) }}" required>
                </div>
                <div>
                    <label for="time" class="block text-sm font-semibold text-gray-700 md:text-lg">Appointment
                        Time</label>
                    <input type="time" name="appointment_time" id="time"
                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 md:text-base"
                        value="{{ old('appointment_time', $appointment->appointment_time) }}" required>
                </div>
            </div>

            <div>
                <label for="notes" class="block text-sm font-semibold text-gray-700 md:text-lg">Special Requests
                    (Optional)</label>
                <textarea name="notes" id="notes" rows="4"
                    class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 md:text-base"
                    placeholder="Any special requests...">{{ old('notes', $appointment->notes) }}</textarea>
            </div>

            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <input type="hidden" name="total_price" id="total_price"
                value="{{ old('total_price', $appointment->total_price) }}">

            <div class="flex justify-between w-full text-center">
                <button type="submit"
                    class="w-full px-6 py-3 text-lg text-white bg-blue-600 rounded-lg shadow-md md:w-auto hover:bg-blue-700">
                    Update Booking
                </button>

                <a href="{{ route('appointment.index') }}"
                    class="w-full px-6 py-3 text-lg text-white bg-red-600 rounded-lg shadow-md md:w-auto hover:bg-red-700">Cancel
                </a>
            </div>
        </form>
    </div>

    <script>
        function selectBarber(id) {
            document.getElementById('selected_barber_id').value = id;
            document.querySelectorAll('.border').forEach(card => card.classList.remove('bg-blue-100', 'border-blue-500'));
            document.querySelector(`[onclick="selectBarber(${id})"]`).classList.add('bg-blue-100', 'border-blue-500');
        }

        function updateTotalPrice() {
            const checkboxes = document.querySelectorAll('.service-checkbox:checked');
            let total = 0;
            checkboxes.forEach((checkbox) => {
                total += parseFloat(checkbox.getAttribute('data-price'));
            });
            document.getElementById('total_price').value = total.toFixed(2);
        }

        // Initialize total price on page load
        document.addEventListener('DOMContentLoaded', updateTotalPrice);
    </script>
@endsection
