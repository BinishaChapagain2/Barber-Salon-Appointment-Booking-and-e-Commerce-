@extends('layouts.master')
@section('content')
    <div class="container px-4 py-8 mx-auto">
        <div class="mb-6 border-b-2 border-blue-900">
            <h1 class="text-2xl font-bold text-gray-800 md:text-3xl">
                <i class='text-xl bx bx-cart-add md:text-3xl'></i> My Cart
            </h1>
            <p class="text-gray-600">Products in Cart</p>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full overflow-hidden bg-white rounded-lg shadow-md">
                <thead class="text-white bg-[#051923]">
                    <tr>
                        <th class="p-2 text-left md:p-4">Product Image</th>
                        <th class="p-2 text-left md:p-4">Product Name</th>
                        <th class="p-2 text-left md:p-4">Quantity</th>
                        <th class="p-2 text-left md:p-4">Price</th>
                        <th class="p-2 text-left md:p-4">Total</th>
                        <th class="p-2 text-left md:p-4">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($carts as $cart)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="p-2 md:p-4">
                                <img src="{{ asset('images/products/' . $cart->product->photopath) }}"
                                    alt="{{ $cart->product->name }}" class="object-cover w-12 h-12 rounded md:w-16 md:h-16">
                            </td>
                            <td class="p-2 text-gray-800 md:p-4">{{ $cart->product->name }}</td>
                            <td class="p-2 text-gray-800 md:p-4">{{ $cart->qty }}</td>
                            <td class="p-2 font-semibold text-gray-800 md:p-4">
                                @if ($cart->product->discounted_price == '')
                                    ${{ number_format($cart->product->price, 2) }}
                                @else
                                    ${{ number_format($cart->product->discounted_price, 2) }}
                                    <br>
                                    <span class="text-xs text-red-600 line-through">
                                        ${{ number_format($cart->product->price, 2) }}
                                    </span>
                                @endif
                            </td>
                            <td class="p-2 text-gray-800 md:p-4">${{ number_format($cart->total, 2) }}</td>
                            <td class="p-2 text-center md:p-4">
                                <a href="{{ route('checkout', $cart->id) }}"
                                    class="block px-2 py-1 md:px-4 md:py-2 text-white bg-green-600 rounded-lg hover:bg-[#051923]">
                                    Checkout
                                </a>
                                <a href="{{ route('cart.delete', $cart->id) }}"
                                    class="block px-2 py-1 mt-1 text-white bg-red-600 rounded-lg md:px-4 md:py-2 hover:bg-red-500">
                                    Remove
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
