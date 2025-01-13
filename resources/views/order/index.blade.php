@extends('layouts.app')

@section('title')
    Orders | Gentleman Barbershop
@endsection

@section('headerofadmin')
    <div class="flex justify-between w-full px-4 py-4 bg-[#051923] shadow-md text-white">
        <div class="flex items-center space-x-2 left">
            <i class="text-lg bx bx-menu menu-icon"></i>
            <span class="text-sm font-medium logo-name sm:text-base md:text-lg lg:text-xl">View Orders</span>
        </div>


    </div>
@endsection


@section('content')
    <div class="container px-4 py-5 text-white sm:px-5">
        <!-- Orders Table -->
        <div class="overflow-x-auto bg-white rounded shadow-md">
            <table class="min-w-full text-gray-800 table-auto">
                <thead>
                    <tr class="text-white bg-gradient-to-r from-gray-800 to-gray-600">
                        <th class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base">Order
                            Date</th>
                        <th class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base">Product
                            Image</th>
                        <th class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base">Product
                            Name</th>
                        <th class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base">Customer
                            Name</th>
                        <th class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base">Phone
                        </th>
                        <th class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base">Address
                        </th>
                        <th class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base">Rate
                        </th>
                        <th class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base">Quantity
                        </th>
                        <th class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base">Total
                        </th>
                        <th class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base">Mode
                        </th>
                        <th class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base">Status
                        </th>
                        <th class="px-4 py-2 text-xs font-medium text-left sm:px-6 sm:py-4 sm:text-sm md:text-base">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="transition duration-300 border-b bg-gray-50 hover:bg-blue-100">
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $order->created_at }}
                            </td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                <img src="{{ asset('images/products/' . $order->product->photopath) }}" alt="Product Image"
                                    class="object-cover w-16 h-16">
                            </td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $order->product->name }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $order->name }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $order->phone }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $order->address }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $order->price }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $order->qty }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $order->qty * $order->price }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">
                                {{ $order->payment_method }}</td>
                            <td class="px-4 py-2 text-xs sm:px-6 sm:py-4 sm:text-sm md:text-base">{{ $order->status }}</td>
                            <td class="px-4 py-2">
                                <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                                    <a href="{{ route('order.status', [$order->id, 'pending']) }}"
                                        class="w-full px-4 py-2 text-xs font-bold text-white bg-blue-500 rounded hover:bg-blue-700 sm:w-auto sm:text-sm md:text-base lg:text-sm">Pending</a>
                                    <a href="{{ route('order.status', [$order->id, 'shipping']) }}"
                                        class="w-full px-4 py-2 text-xs font-bold text-white bg-blue-500 rounded hover:bg-blue-700 sm:w-auto sm:text-sm md:text-base lg:text-sm">Shipping</a>
                                    <a href="{{ route('order.status', [$order->id, 'processing']) }}"
                                        class="w-full px-4 py-2 text-xs font-bold text-white bg-green-600 rounded hover:bg-green-800 sm:w-auto sm:text-sm md:text-base lg:text-sm">Processing</a>
                                    <a href="{{ route('order.status', [$order->id, 'completed']) }}"
                                        class="w-full px-4 py-2 text-xs font-bold text-white bg-yellow-600 rounded hover:bg-yellow-800 sm:w-auto sm:text-sm md:text-base lg:text-sm">Completed</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
