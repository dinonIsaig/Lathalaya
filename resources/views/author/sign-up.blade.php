@extends('layouts.app')

@section('title', 'Sign Up')

@push('styles')
<style>
    body {
        background: linear-gradient(160deg, #F6F9FF 70%, #C8ECF6 80%);
        min-height: 100vh;
        background-repeat: no-repeat;
    }
</style>

@endpush

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center relative overflow-hidden">

    <div class="flex justify-center">
        <div class=" p-4 rounded-lg inline-block w-1/5">
            <a href="{{ route('lathalaya')}}">
                <img src="{{ asset('assets/images/lathalayaLogo.png') }}" alt="Logo" class="w-full h-auto">
            </a>
        </div>
    </div>

    <h1 class="text-2xl font-bold text-text-primary max-sm:text-md">Create Your Account</h1>
    <p class="text-[#4A5565] text-md mb-8 max-sm:text-sm tracking-tight">Create account and start writing articles</p>

    <div class="relative z-10 text-left w-1/5 max-w-lg max-md:w-md rounded-lg shadow-xl p-8">
        <form method="POST" action="{{ route('author.sign-up') }}" class="space-y-4">
            @csrf

            <div class="flex gap-4">
                <div>
                    <label for="First Name" class="mb-2 block text-sm text-gray-700">
                    First Name
                    </label>
                    <div class="relative rounded-md">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <div>
                            <input type="text" name="first_name" id="first_name" class="input-field" placeholder="John" value="{{ old('first_name') }}">
                        </div>
                    </div>
                    @error('first_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="Last Name" class="mb-2 block text-sm text-gray-700">
                    Last Name
                    </label>
                    <div class="relative rounded-md">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <input type="text" name="last_name" id="last_name" class="input-field" placeholder="Doe" value="{{ old('last_name') }}">
                    </div>
                    @error('last_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="email" class="mb-2 block text-sm text-gray-700">
                    Email Address
                </label>
                <div class="relative rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </div>
                    <input type="email" name="email" id="email" class="input-field" placeholder="JohnDoe@gmail.com" value="{{ old('email') }}">
                </div>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="mb-2 block text-sm text-gray-700">
                    Password
                </label>
                <div class="relative rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                    <input type="password" name="password" id="password" class="input-field" placeholder="Password123">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <i class="fas fa-eye-slash toggle-password cursor-pointer text-gray-400 hover:text-gray-600"></i>
                    </div>
                </div>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label for="password_confirmation" class="mb-2 block text-sm text-gray-700">
                    Confirm Password
                </label>
                <div class="relative rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="input-field" placeholder="Password123">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <i class="fas fa-eye-slash toggle-password cursor-pointer text-gray-400 hover:text-gray-600"></i>
                    </div>
                </div>
            </div>

            <div>
                <button class="normal-btn w-full py-1.5 text-sm">
                    Sign Up
                </button>
            </div>

            <div class="flex gap-2 justify-center mt-4">
                <p class="text-[#4A5565] tracking-tight">Already have an account?</p>
                <a href="{{ route('author.sign-in.form') }}" class="font-semibold text-button  hover:underline">Sign In</a>
            </div>

        </form>
    </div>
</div>
@endsection

@push('scripts')
@vite(['resources/js/toggle-password.js'])
@endpush


