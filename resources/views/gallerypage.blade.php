@extends('layouts.master')

@section('content')
    <div class="container mx-auto ">


        <div class="py-10 bg-[#051923] text-white text-center">
            <div class="container px-4 mx-auto">
                <h1 class="mb-6 text-3xl font-extrabold sm:text-6xl">Gallery</h1>
                <p class="text-lg font-light"> Timeless elegance captured in every image.</p>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 gap-6 mx-5 mt-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($galleries as $gallery)
                <div
                    class="relative overflow-hidden transition-transform duration-300 bg-white shadow-lg group rounded-xl hover:shadow-2xl hover:scale-105">
                    <!-- Image with rounded corners -->
                    <img src="{{ asset('images/galleries/' . $gallery->photopath) }}" alt="Gallery Image"
                        class="object-cover w-full transition-opacity duration-300 h-60 rounded-xl opacity-90 group-hover:opacity-100">
                </div>
            @endforeach



        </div>
    </div>
@endsection
