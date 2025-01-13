@extends('layouts.master')

@section('title')
    Create Appointment | Gentleman BarberShop
@endsection

@section('content')
    <div class="container px-4 py-12 mx-auto">
        <div class="max-w-5xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl">
            <div class="bg-[#051923] py-8 text-center">
                <h2 class="text-4xl font-extrabold text-white">Book Your Appointment</h2>
            </div>
            <div class="p-8">
                @if ($errors->any())
                    <div class="p-4 mb-6 text-red-700 bg-red-100 border border-red-400 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('appointment.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="block font-medium text-gray-700">Customer Name</label>
                            <input type="text" name="name" id="name"
                                class="w-full px-4 py-3 mt-2 border rounded-lg focus:ring-blue-500 focus:outline-none"
                                value="{{ old('name', optional(auth()->user())->name) }}" readonly>
                        </div>
                        <div>
                            <label for="email" class="block font-medium text-gray-700">Customer Email</label>
                            <input type="email" name="email" id="email"
                                class="w-full px-4 py-3 mt-2 border rounded-lg focus:ring-blue-500 focus:outline-none"
                                value="{{ old('email', optional(auth()->user())->email) }}" readonly>
                        </div>
                    </div>

                    <div>
                        <label class="block mb-4 text-lg font-medium text-gray-700">Select Services</label>
                        @foreach ($servicecategories as $category)
                            <h3 class="text-xl font-bold text-gray-800">{{ $category->name }}</h3>
                            <div class="flex py-4 space-x-4 overflow-x-auto">
                                @foreach ($category->services as $service)
                                    <div
                                        class="relative w-64 p-4 transition-transform transform rounded-lg shadow-lg bg-gray-50 hover:scale-105">
                                        <img src="{{ asset('images/services/' . $service->photopath) }}"
                                            alt="{{ $service->name }}" class="object-cover w-full h-32 rounded-md">
                                        <h4 class="mt-4 text-lg font-medium">{{ $service->name }}</h4>
                                        <div class="flex items-center justify-between mt-2">
                                            @if ($service->discounted_price)
                                                <span
                                                    class="text-sm text-gray-500 line-through">${{ $service->price }}</span>
                                                <span
                                                    class="text-lg font-semibold text-blue-600">${{ $service->discounted_price }}</span>
                                            @else
                                                <span
                                                    class="text-lg font-semibold text-blue-600">${{ $service->price }}</span>
                                            @endif
                                        </div>
                                        <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                            class="absolute w-5 h-5 top-2 right-2 accent-blue-600 service-checkbox"
                                            data-price="{{ $service->discounted_price ?: $service->price }}"
                                            onchange="updateTotalPrice()">
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                    <div>
                        <label class="block mb-4 text-lg font-medium text-gray-700">Select Barber/Staff</label>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($staffs as $staff)
                                <div class="p-4 text-center transition-transform transform border rounded-lg cursor-pointer hover:bg-blue-50 hover:scale-105"
                                    onclick="selectBarber({{ $staff->id }})" aria-selected="false">
                                    <img src="{{ asset('images/staffs/' . $staff->photopath) }}" alt="{{ $staff->name }}"
                                        class="w-24 h-24 mx-auto rounded-full">
                                    <p class="mt-4 font-medium text-gray-800">{{ $staff->name }}</p>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="staff_id" id="selected_barber_id" value="{{ old('staff_id') }}"
                            required>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="appointment_date" class="block font-medium text-gray-700">Appointment Date</label>
                            <input type="date" name="appointment_date" id="appointment_date"
                                class="w-full px-4 py-3 mt-2 border rounded-lg focus:ring-blue-500 focus:outline-none"
                                value="{{ old('appointment_date') }}" required>
                        </div>
                        <div>
                            <label for="appointment_time" class="block font-medium text-gray-700">Appointment Time</label>
                            <input type="time" name="appointment_time" id="appointment_time"
                                class="w-full px-4 py-3 mt-2 border rounded-lg focus:ring-blue-500 focus:outline-none"
                                value="{{ old('appointment_time') }}" required>
                        </div>
                    </div>

                    <div>
                        <label for="notes" class="block font-medium text-gray-700">Special Requests (Optional)</label>
                        <textarea name="notes" id="notes" rows="4"
                            class="w-full px-4 py-3 mt-2 border rounded-lg focus:ring-blue-500 focus:outline-none"
                            placeholder="Any special requests...">{{ old('notes') }}</textarea>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="total_price" id="total_price" value="0">

                    <div class="flex items-center justify-between mt-8">
                        <button type="submit"
                            class="px-6 py-3 font-semibold text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                            Confirm Booking
                        </button>
                        <a href="{{ route('homepage') }}"
                            class="px-6 py-3 font-semibold text-white transition bg-red-600 rounded-lg hover:bg-red-700">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function selectBarber(id) {
            document.getElementById('selected_barber_id').value = id;
            document.querySelectorAll('.border').forEach(card => card.classList.remove('bg-blue-50', 'border-blue-500'));
            document.querySelector(`[onclick="selectBarber(${id})"]`).classList.add('bg-blue-50', 'border-blue-500');
        }

        function updateTotalPrice() {
            const checkboxes = document.querySelectorAll('.service-checkbox:checked');
            let total = 0;
            checkboxes.forEach(checkbox => {
                total += parseFloat(checkbox.getAttribute('data-price'));
            });
            document.getElementById('total_price').value = total.toFixed(2);
        }
    </script>
@endsection
