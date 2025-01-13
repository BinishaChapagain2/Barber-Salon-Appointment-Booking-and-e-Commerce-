@extends('layouts.master')

@section('title')
    Appointments | Gentleman Barbershop
@endsection

@section('headerofuser')
    <div class="container px-2 py-5 ml-4">
        <h1 class="text-2xl font-semibold text-gray-800 sm:text-3xl md:text-4xl"> <i
                class='text-3xl bx bx-calendar-event'></i>
            My Appointments</h1>
    </div>
@endsection



@section('content')
    <div class="container px-2 py-5 text-gray-800 sm:px-5">
        <div class="overflow-x-auto bg-white rounded shadow-md">
            <table class="min-w-full text-gray-800 table-auto">
                <thead>
                    <tr class="text-white bg-gradient-to-r from-gray-800 to-gray-600">
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Customer Name</th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Email</th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Appointment Date</th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Appointment Time</th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Services</th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Staff</th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Total Price</th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr class="transition duration-300 border-b bg-gray-50 hover:bg-blue-100">
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $appointment->user->name }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $appointment->user->email }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $appointment->appointment_date }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $appointment->appointment_time }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                @foreach ($appointment->services as $service)
                                    <span class="block">{{ $service->name }}</span>
                                @endforeach
                            </td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $appointment->staff->name }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                ${{ number_format($appointment->total_price, 2) }}</td>
                            <td class="px-4 py-2">
                                <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                                    <a href="{{ route('appointment.edit', $appointment->id) }}"
                                        class="w-full px-4 py-2 text-xs font-bold text-white bg-blue-500 rounded hover:bg-blue-700 sm:w-auto sm:text-sm md:text-base lg:text-sm">Update</a>

                                    <a onclick="showPopup({{ $appointment->id }})"
                                        class="w-full px-4 py-2 text-xs font-bold text-white bg-red-500 rounded cursor-pointer hover:bg-red-700 sm:w-auto sm:text-sm md:text-base lg:text-sm">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    <div class="fixed inset-0 items-center justify-center hidden bg-gray-600 bg-opacity-50 backdrop-blur-sm" id="popup">
        <form action="{{ route('appointment.delete') }}" method="POST"
            class="px-8 py-6 text-center bg-white rounded-lg shadow-lg">
            @csrf
            <input type="hidden" name="id" id="appointment_id">
            <h1 class="mb-4 text-2xl font-semibold text-gray-800">Confirm Deletion</h1>
            <p class="mb-6 text-gray-600">Are you sure you want to delete this appointment? <br> <span
                    class="text-red-500">This action cannot be undone.</span></p>
            <div class="flex justify-center space-x-4">
                <button type="submit"
                    class="px-6 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Yes,
                    Delete</button>
                <button type="button" onclick="hidePopup()"
                    class="px-6 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Cancel</button>
            </div>
        </form>
    </div>

    {{-- JavaScript for Modal --}}
    <script>
        function showPopup(appointmentId) {
            document.getElementById('popup').classList.remove('hidden');
            document.getElementById('popup').classList.add('flex');
            document.getElementById('appointment_id').value = appointmentId;
        }

        function hidePopup() {
            document.getElementById('popup').classList.remove('flex');
            document.getElementById('popup').classList.add('hidden');
        }
    </script>
@endsection
