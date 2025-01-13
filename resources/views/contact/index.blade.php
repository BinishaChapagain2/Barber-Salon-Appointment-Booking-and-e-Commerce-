@extends('layouts.app')

@section('title')
    Enquiry Details | Gentleman Barbershop
@endsection

@section('headerofadmin')
    <div class="flex justify-between w-full px-4 py-4 bg-[#051923] shadow-md text-white">
        <div class="flex items-center space-x-2 left">
            <i class="text-lg bx bx-menu menu-icon"></i>
            <span class="text-sm font-medium logo-name sm:text-base md:text-lg lg:text-xl">View Enquiry</span>
        </div>



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
                            Phone </th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Message</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr class="transition duration-300 border-b bg-gray-50 hover:bg-blue-100">
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $contact->name }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $contact->email }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $contact->phone }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $contact->message }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
