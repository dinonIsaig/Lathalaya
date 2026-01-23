@php
    $user = request()->is('pam/author*') ? Auth::guard('author')->user() : Auth::user();
@endphp

<nav x-data="{ mobileMenuOpen: false }" class="bg-white border-b border-neutral-light w-full sm:px-8 lg:px-18 mb-15 shadow-md fixed top-0 left-0 z-50">
    <div class="max-w-full mx-auto flex items-center justify-between">

        <div class="flex items-center gap-10">
            <button @click="mobileMenuOpen = true" class="md:hidden text-neutral-gray hover:text-primary p-2 focus:outline-none ml-4 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <a href="{{ route('author.home') }}" class="flex items-center p-5 gap-2 ">
                <div class="bg-primary rounded-md ">
                    <img id="logoIcon" src="{{ asset('assets/images/lathalayaLogo.png') }}" alt="lathalaya Icon" class="w-auto  h-10">
                </div>
                <span class="text-xl font-bold text-text-primary tracking-tight">Lathalaya</span>
            </a>

            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('author.home') }}" class="nav-text {{ Request::routeIs('author.home') ? 'text-primary border-primary font-bold' : 'text-primary hover:text-neutral-gray'}}">Home</a>
                <a href="{{ route('author.create-article') }}" class="nav-text {{ Request::routeIs('author.create-article') ? 'text-primary border-primary font-bold' : 'text-primary hover:text-neutral-gray'}}">Create Article</a>
                <a href="{{ route('author.dashboard') }}" class="nav-text {{ Request::routeIs('author.dashboard') ? 'text-primary border-primary font-bold' : 'text-primary hover:text-neutral-gray'}}">My Submissions</a>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="flex items-center gap-3 bg-neutral-light px-3 py-1.5 rounded-lg ring-1 ring-black/5">
                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white text-xs font-bold">
                    {{ strtoupper(substr(($user->first_name ?? 'G'), 0, 1) . substr(($user->last_name ?? 'A'), 0, 1)) }}
                </div>
                <div class="hidden sm:block text-left leading-tight">
                    <p class="text-sm  text-text-primary">{{ ($user->first_name ?? 'Guest') . ' ' . ($user->last_name ?? 'Author') }}</p>
                    <p class="text-[10px] text-neutral-gray uppercase tracking-wider">Author</p>
                </div>
            </div>

            <button onclick="document.getElementById('confirmSignOutModal').classList.remove('hidden')" class=" text-neutral-gray hover:text-primary transition-colors p-1 pr-5 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
            </button>
        </div>
    </div>

    <div x-show="mobileMenuOpen"
         style="display: none;"
         @click="mobileMenuOpen = false"
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/50 z-[60]">
    </div>

    <div x-show="mobileMenuOpen"
         style="display: none;"
         x-transition:enter="transition ease-in-out duration-300 transform"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in-out duration-300 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="fixed top-0 left-0 h-full w-64 bg-white shadow-xl z-[70] flex flex-col p-6">

        <div class="flex items-center justify-between mb-8">
            <h3 class="text-xl font-bold text-gray-700">Menu</h3>
            <button @click="mobileMenuOpen = false" class="text-gray-400 hover:text-primary cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="flex flex-col space-y-4">
            <a href="{{ route('author.home') }}" class="nav-text {{ Request::routeIs('author.home') ? 'text-primary border-primary font-bold' : 'text-primary hover:text-neutral-gray'}}">Home</a>
            <a href="{{ route('author.create-article') }}" class="nav-text {{ Request::routeIs('author.create-article') ? 'text-primary border-primary font-bold' : 'text-primary hover:text-neutral-gray'}}">Create Article</a>
            <a href="{{ route('author.dashboard') }}" class="nav-text {{ Request::routeIs('author.dashboard') ? 'text-primary border-primary font-bold' : 'text-primary hover:text-neutral-gray'}}">My Submissions</a>
        </div>
    </div>
</nav>

<x-confirm-signout-modal id="confirmSignOutModal" type="author"/>
