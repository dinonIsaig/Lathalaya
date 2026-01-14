@extends('layouts.app')

@section('title', 'Lathalaya')

@section('content')


<div class="flex h-screen bg-neutral-light">

    <div class="flex-1 pt-30 overflow-auto">

        <div class="p-4 px-18 max-md:px-8 ">
            @include('components.default-navbar')

            <div class="mb-6 flex justify-end">
                <button onclick=""
                    class="normal-btn flex items-center px-3 md:px-4">
                    <svg class="w-4 h-4 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    <span class="hidden sm:inline-block ml-1 tracking-tight text-base">Create Article</span>
                </button>
            </div>

            <div class="justify-center w-full mb-10">
                <div class="top-4 right-4 flex items-center mb-2">
                    <div class="bg-black rounded-xl relative overflow-hidden w-full aspect-[21/9] md:aspect-[3/1]">
                        <img src="{{ asset('assets/images/headlineImg.png') }}" alt="Headline Image" class="object-cover rounded-lg w-full h-full">

                        <div class="absolute bottom-0 left-0 flex flex-col p-5  md:p-10 text-white bg-gradient-to-t from-black/80 to-transparent w-full">
                            <span class="bg-tags text-xs px-2 py-1  md:text-xs rounded-2xl w-fit">Business</span>
                            <h1 class="text-lg sm:text-lg md:text-2xl lg:text-4xl font-bold mt-2 max-w-4xl leading-tight">Breaking: New Technology Revolution Transforms Global Markets</h1>
                            <p class="text-xs md:text-sm opacity-80 mt-2">By John Writer</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="flex justify-end mb-4">
                        <button onclick="" class="normal-btn flex items-center px-3 md:px-4">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 6H21M6 12H18M10 18H14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="hidden sm:inline-block ml-1 tracking-tight text-base">Filter</span>
                        </button>
            </div>

            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Latest Stories</h2>

            <div class="flex justify-center mb-4">
                @include('components.latest-articles')
            </div>

        </div>

    </div>
</div>


@stack('scripts')
@endsection


