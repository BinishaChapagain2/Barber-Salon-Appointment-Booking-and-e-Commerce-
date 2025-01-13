@extends('layouts.app')

@section('title')
    Staff | Gentleman Barbershop
@endsection

@section('headerofadmin')
    <div class="flex justify-between w-full px-4 py-4 bg-[#051923] shadow-md text-white">
        <div class="flex items-center space-x-2">
            <i class="text-lg bx bx-menu menu-icon"></i>
            <span class="text-sm font-medium logo-name sm:text-base md:text-lg lg:text-xl">View Staff</span>
        </div>
        <div>
            <a href="{{ route('staff.create') }}"
                class="px-3 py-2 text-xs font-bold text-white bg-blue-500 rounded hover:bg-blue-700 sm:px-4 sm:py-2 md:px-4 md:py-3 lg:px-4 lg:py-2 lg:text-base">
                Add Staff
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container px-2 py-5 text-white sm:px-5">
        <div class="overflow-x-auto bg-white rounded shadow-md">
            <table class="min-w-full text-gray-800 table-auto">
                <thead>
                    <tr class="text-white bg-gradient-to-r from-gray-800 to-gray-600">
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            S.N
                        </th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Picture
                        </th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Name
                        </th>

                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Mobile
                        </th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Email
                        </th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Facebook Link
                        </th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Instagram Link
                        </th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Tiktok Link
                        </th>

                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Specialization
                        </th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Experience
                        </th>



                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr class="transition duration-300 border-b bg-gray-50 hover:bg-blue-100">
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                @if ($staff->photopath)
                                    <img src="{{ asset('images/staffs/' . $staff->photopath) }}" alt="{{ $staff->name }} "
                                        class="object-cover w-16 h-16">
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $staff->name }}
                            </td>

                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $staff->phone_number }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $staff->email }}</td>

                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                <a href="{{ $staff->facebook }}" target="_blank"
                                    class="text-blue-500 hover:underline">{{ $staff->facebook }}</a>
                            </td>

                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                <a href="{{ $staff->instagram }}" target="_blank"
                                    class="text-blue-500 hover:underline">{{ $staff->instagram }}</a>
                            </td>

                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                <a href="{{ $staff->tiktok }}" target="_blank"
                                    class="text-blue-500 hover:underline">{{ $staff->tiktok }}</a>

                            </td>



                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $staff->specialization }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $staff->experience }}
                            </td>
                            <td class="px-4 py-2">
                                <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                                    <a href="{{ route('staff.edit', $staff->id) }}"
                                        class="w-full px-4 py-2 text-xs font-bold text-white bg-blue-500 rounded hover:bg-blue-700 sm:w-auto sm:text-sm md:text-base lg:text-sm">Edit</a>
                                    <a onclick="showpopup({{ $staff->id }})"
                                        class="w-full px-4 py-2 text-xs font-bold text-white bg-red-500 rounded cursor-pointer hover:bg-red-700 sm:w-auto sm:text-sm md:text-base lg:text-sm ">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{-- Pop up mode --}}

    <div class="fixed inset-0 items-center justify-center hidden bg-gray-600 bg-opacity-50 backdrop-blur-sm" id="popup">
        <form action="{{ route('staff.delete') }}" class="px-8 py-6 text-center bg-white rounded-lg shadow-lg"
            method="POST">
            @csrf
            @method('DELETE')

            <h1 class="mb-4 text-2xl font-semibold text-gray-800">Confirm Deletion</h1>
            <p class="mb-6 text-gray-600">Are you sure you want to delete this Staff? <br> <span class="text-red-500">This
                    action cannot be undone.</span>
            </p>

            <input type="hidden" name="id" id="staff_id">
            <div class="flex justify-center space-x-4">
                <button type="submit"
                    class="px-6 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Yes,
                    Delete</button>
                <button type="button" onclick="hidepopup()"
                    class="px-6 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Cancel</button>
            </div>
        </form>
    </div>

    {{-- end pop up model --}}
@endsection


<script>
    function showpopup(staff_id) {
        document.getElementById('popup').classList.remove('hidden');
        document.getElementById('popup').classList.add('flex');
        document.getElementById('staff_id').value = staff_id;
    }

    function hidepopup() {
        document.getElementById('popup').classList.remove('flex');
        document.getElementById('popup').classList.add('hidden');
    }
</script>
