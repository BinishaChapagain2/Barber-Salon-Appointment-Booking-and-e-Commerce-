@extends('layouts.master')

@section('title')
    View Products | Gentleman Barbershop
@endsection

@section('content')
    <div class="container px-4 mx-auto mt-8 sm:px-6 lg:px-8 max-w-7xl">
        <div class="grid grid-cols-1 gap-10 md:grid-cols-4 lg:grid-cols-4">
            <!-- Product Image -->
            <div class="md:col-span-1">
                <div class="relative">
                    <img src="{{ asset('images/products/' . $product->photopath) }}" alt="{{ $product->name }}"
                        class="object-cover w-full transition duration-300 ease-in-out transform bg-gray-100 rounded-lg shadow-lg h-80 md:h-80 hover:scale-105">
                </div>
            </div>

            <!-- Product Details -->
            <div class="px-4 border-l-2 border-gray-200 sm:px-6 md:px-8 md:col-span-2">
                <h2 class="mb-4 text-2xl md:text-4xl font-extrabold text-[#051923]">{{ $product->name }}</h2>

                <!-- Price and Discount -->
                <div class="flex items-center space-x-4">
                    <p class="text-xl font-bold text-gray-900 md:text-xl">
                        @if ($product->discounted_price)
                            Rs.{{ $product->discounted_price }}
                            <span
                                class="text-sm font-medium text-red-600 line-through md:text-base">Rs.{{ $product->price }}</span>
                        @else
                            Rs.{{ $product->price }}
                        @endif
                    </p>
                </div>

                <!-- Quantity Selector -->
                <div class="flex items-center mt-4 space-x-2 md:mt-6">
                    <button
                        class="px-2 py-1 text-xs md:text-base text-white bg-[#051923] rounded-l hover:bg-gray-800 dec-btn">-</button>
                    <input type="text"
                        class="w-10 text-xs text-center bg-gray-200 border-none qty sm:w-12 md:w-14 md:text-base"
                        value="1" readonly name="qty">
                    <button
                        class="px-2 py-1 text-xs md:text-base text-white bg-[#051923] rounded-r hover:bg-gray-800 inc-btn">+</button>
                </div>

                <!-- Add to Cart and Buy Now Buttons -->
                <div class="flex mt-4 space-x-4 md:mt-6">
                    <!-- Add to Cart -->
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="qty" class="hidden-qty" value="1">
                        <button type="submit"
                            class="flex items-center justify-center px-4 py-2 text-xs text-white transition duration-300 ease-in-out bg-[#051923] rounded shadow md:px-6 md:py-3 md:text-base hover:bg-blue-700">
                            <i class='mr-2 bx bx-cart-add'></i> Add to Cart
                        </button>
                    </form>

                    <!-- Buy Now -->
                    <form action="{{ route('buynow.buy', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="qty" class="hidden-qty" value="1">
                        <button type="submit"
                            class="flex items-center justify-center px-4 py-2 text-xs text-white transition duration-300 ease-in-out bg-green-600 rounded shadow md:px-6 md:py-3 md:text-base hover:bg-green-900">
                            <i class='mr-2 bx bx-credit-card'></i> Buy Now
                        </button>
                    </form>


                </div>

                <!-- Stock Information -->
                <p class="mt-2 text-xs text-gray-500 md:text-sm">In Stock: <span
                        class="font-semibold text-gray-700">{{ $product->stock }}</span></p>
            </div>




            <!-- Delivery & Support Info -->
            <div class="px-4 py-4 rounded-lg shadow-sm bg-gray-50">
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="mr-2 text-xl text-indigo-600 bx bxs-truck"></i>
                        <span class="text-sm text-gray-600">Delivery within 5 days</span>
                    </div>
                    <div class="flex items-center">
                        <i class="mr-2 text-xl text-green-600 bx bx-refresh"></i>
                        <span class="text-sm text-gray-600">7 days return policy</span>
                    </div>
                    <div class="flex items-center">
                        <i class="mr-2 text-xl text-orange-600 bx bx-credit-card"></i>
                        <span class="text-sm text-gray-600">Cash on delivery available</span>
                    </div>
                    <div class="flex items-center">
                        <i class="mr-2 text-xl text-red-600 bx bx-shield"></i>
                        <span class="text-sm text-gray-600">Warranty available</span>
                    </div>
                    <div class="flex items-center">
                        <i class="mr-2 text-xl text-blue-600 bx bx-headphone"></i>
                        <span class="text-sm text-gray-600">24/7 customer support</span>
                    </div>
                    <div class="flex items-center">
                        <i class="mr-2 text-xl text-teal-600 bx bx-lock-alt"></i>
                        <span class="text-sm text-gray-600">100% secure payment</span>
                    </div>
                </div>
            </div>



        </div>
        <!-- Product Description -->
        <div class="mt-8 md:mt-10 ">
            <h2 class="text-2xl pl-4 md:text-3xl font-bold text-[#051923] border-l-4 border-yellow-500">About the Product
            </h2>
            <p class="mt-4 text-xs leading-relaxed text-justify text-gray-600 sm:text-sm md:text-base">
                {{ $product->description }}</p>
        </div>
    </div>



    <!-- Related Products Section -->
    <div class="container px-4 mx-auto mt-12 sm:px-6 lg:px-8 max-w-7xl">
        <h2 class="pl-4 text-3xl font-bold text-[#051923] border-l-4 border-yellow-500 sm:text-4xl lg:text-5xl">
            Related Products</h2>
        <!-- Product Grid Wrapper -->
        <div class="grid grid-cols-1 gap-8 mt-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($relatedproducts as $rproduct)
                <a href="{{ route('viewproductdetail', $rproduct->id) }}">
                    <div
                        class="relative transition duration-300 transform bg-white rounded-lg shadow-lg hover:shadow-2xl hover:scale-105">
                        <img src="{{ asset('images/products/' . $rproduct->photopath) }}" alt="{{ $rproduct->name }}"
                            class="object-cover w-full h-56 bg-gray-100 rounded-t-lg sm:h-64 lg:h-72">
                        <div class="p-5">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $rproduct->name }}</h3>
                            <p class="mt-2 text-sm text-gray-600">{{ Str::limit($rproduct->description, 100) }}</p>
                            <div class="flex items-center mt-4 space-x-3">
                                <span class="text-xl font-bold text-gray-900">Rs.{{ $rproduct->price }}</span>
                                @if ($rproduct->discounted_price)
                                    <span
                                        class="text-lg font-medium text-red-500 line-through">Rs.{{ $rproduct->discounted_price }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.inc-btn').click(function(e) {
                e.preventDefault();
                let qty = $(this).siblings('.qty');
                let newQty = parseInt(qty.val()) + 1;
                let maxStock = {{ $product->stock }};
                if (newQty <= maxStock) {
                    qty.val(newQty);
                    $('.hidden-qty').val(newQty);
                }
            });

            $('.dec-btn').click(function(e) {
                e.preventDefault();
                let qty = $(this).siblings('.qty');
                let newQty = parseInt(qty.val()) - 1;
                if (newQty >= 1) {
                    qty.val(newQty);
                    $('.hidden-qty').val(newQty);
                }
            });
        });
    </script>
@endsection
