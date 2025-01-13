@extends('layouts.app')

@section('title')
    Customer | Gentleman Barbershop
@endsection

@section('headerofadmin')
    <div class="flex justify-between w-full px-4 py-4 bg-[#051923] shadow-md text-white">
        <div class="flex items-center space-x-2 left">
            <i class="text-lg bx bx-menu menu-icon"></i>
            <span class="text-sm font-medium logo-name sm:text-base md:text-lg lg:text-xl">View Customer</span>
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
                            S.N</th>

                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Name</th>
                        <th
                            class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base lg:text-base">
                            Email</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="transition duration-300 border-b bg-gray-50 hover:bg-blue-100">
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $user->name }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
