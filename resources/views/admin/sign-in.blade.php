
@extends('layouts.app')

@section('title', 'Sign In')

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
            <a href="{{ route('pam.account.type')}}">
                <img src="{{ asset('assets/images/lathalayaLogo.png') }}" alt="Logo" class="w-full h-auto">
            </a>
        </div>
    </div>

    <h1 class="text-2xl font-bold text-text-primary max-sm:text-md">Welcome Back</h1>
    <p class="text-[#4A5565] text-md mb-8 max-sm:text-sm tracking-tight">Sign in to your LathaLaya admin account</p>

    <div class="relative z-10 text-left w-1/5 max-w-lg max-md:w-md rounded-lg shadow-xl p-8">
        <form method="POST" action="{{ route('admin.sign-in') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="mb-2 block text-sm text-gray-700">
                    Email Address
                </label>
                <div class="relative rounded-md">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </div>
                    <input type="email" name="email" id="email" class="input-field" placeholder="you@example.com">
                </div>
            </div>

            <div>
                <label for="password" class="mb-2 block text-sm text-gray-700">
                    Password
                </label>
                <div class="relative rounded-md">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                    <input type="password" name="password" id="password" class="input-field" placeholder="Enter your password">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <i class="fas fa-eye-slash toggle-password cursor-pointer text-gray-400 hover:text-gray-600"></i>
                    </div>
                </div>
            </div>

            <div>
                <button class="normal-btn w-full py-1.5 text-sm">
                    Sign In
                </button>
            </div>

        </form>
    </div>
</div>
@endsection

@push('scripts')
@vite(['resources/js/toggle-password.js'])
@endpush
