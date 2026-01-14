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
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="flex items-center gap-3">
                <button class=" normal-btn-outline">
                    Log In
                </button>

                <button class=" normal-btn">
                    Sign Up
                </button>
            </div>

            <button class=" text-neutral-gray hover:text-primary transition-colors p-1">
                <svg class="icons" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

    </div>
</nav>
