@php
    $user = request()->is('admin*') ? Auth::guard('admin')->user() : Auth::user();
@endphp

<nav class="bg-white border-b border-neutral-light w-full sm:px-8 lg:px-18 mb-15 shadow-md fixed top-0 left-0 z-50">
    <div class="max-w-full mx-auto flex items-center justify-between">
        
        <div class="flex items-center gap-10">
            <a href="{{ route('admin.home') }}" class="flex items-center p-5 gap-2 ">
                <div class="bg-primary rounded-md ">
                    <img id="logoIcon" src="{{ asset('assets\images\lathalayaLogo.png') }}" alt="lathalaya Icon" class="w-auto  h-10">
                </div>
                <span class="text-xl font-bold text-text-primary tracking-tight">Lathalaya</span>
            </a>

            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('admin.home') }}" class="nav-text {{ Request::routeIs('admin.home') ? 'text-primary border-primary font-bold' : 'text-primary hover:text-neutral-gray'}}">Home</a>
                <a href="#" class="nav-text {{ Request::routeIs('admin.create') ? 'text-primary border-primary font-bold' : 'text-primary hover:text-neutral-gray'}}">Create Article</a>
                <a href="{{ route('admin.dashboard') }}" class="nav-text {{ Request::routeIs('admin.dashboard') ? 'text-primary border-primary font-bold' : 'text-primary hover:text-neutral-gray'}}">Dashboard</a>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="flex items-center gap-3 bg-neutral-light px-3 py-1.5 rounded-lg ring-1 ring-black/5">
                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white text-xs font-bold">
                    {{ substr($user->first_name ?? 'A', 0, 1) }}{{ substr($user->last_name ?? 'A', 0, 1) }}
                </div>
                <div class="hidden sm:block text-left leading-tight">
                    <p class="text-sm  text-text-primary">{{ $user->first_name ?? 'Guest Admin' }} {{ $user->last_name ?? '' }}</p>
                    <p class="text-[10px] text-neutral-gray uppercase tracking-wider">Admin</p>
                </div>
            </div>

            <button onclick="document.getElementById('confirmSignOutModal').classList.remove('hidden')" class=" text-neutral-gray hover:text-primary transition-colors p-1 pr-5 cursor-pointer">
                <svg class="icons" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
            </button>
        </div>

    </div>
</nav>

<x-confirm-signout-modal id="confirmSignOutModal" type="dashboard"/>