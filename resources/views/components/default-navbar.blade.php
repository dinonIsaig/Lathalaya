<nav x-data="{ mobileMenuOpen: false }" class="bg-white border-b border-neutral-light w-full sm:px-8 lg:px-18 mb-15 shadow-md fixed top-0 left-0 z-50 p-2">
    <div class="max-w-full mx-auto flex items-center justify-between">

        <div class="flex-1 md:flex-none flex items-center justify-start gap-10">
            <button @click="mobileMenuOpen = true" class="md:hidden text-neutral-gray hover:text-primary p-2 focus:outline-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <a href="{{ route('lathalaya') }}" class="hidden md:flex items-center p-5 gap-2">
                <div class="bg-primary rounded-md">
                    <img id="logoIcon" src="{{ asset('assets/images/lathalayaLogo.png') }}" alt="lathalaya Icon" class="w-auto h-10">
                </div>
                <span class="text-xl font-bold text-text-primary tracking-tight">Lathalaya</span>
            </a>

            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('lathalaya') }}" class="nav-text {{ Request::routeIs('lathalaya') ? 'text-primary border-primary font-bold' : 'text-primary hover:text-neutral-gray'}}">Home</a>
            </div>
        </div>

        <div class="flex-none md:hidden flex items-center justify-center">
            <a href="{{ route('lathalaya') }}" class="flex items-center gap-2">
                <div class="bg-primary rounded-md">
                    <img id="logoIconMobile" src="{{ asset('assets/images/lathalayaLogo.png') }}" alt="lathalaya Icon" class="w-auto h-8">
                </div>
            </a>
        </div>

        <div class="flex-1 flex items-center justify-end">
            <div class="hidden sm:flex items-center gap-3">
                <a href="{{ route('author.sign-in') }}" class="normal-btn-outline">Log In</a>
                <a href="{{ route('author.sign-up') }}" class="normal-btn">Sign Up</a>
            </div>
            <div class="sm:hidden w-10"></div>
        </div>

    </div>

    <div x-show="mobileMenuOpen" style="display: none;" @click="mobileMenuOpen = false" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/50 z-[60]"></div>

    <div x-show="mobileMenuOpen" style="display: none;" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="fixed top-0 left-0 h-full w-64 bg-white shadow-xl z-[70] flex flex-col p-6">
        <div class="flex items-center justify-between mb-8">
            <h3 class="text-xl font-bold text-gray-700">Menu</h3>
            <button @click="mobileMenuOpen = false" class="text-gray-400 hover:text-primary cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div class="flex flex-col space-y-6">
            <a href="{{ route('lathalaya') }}" class="nav-text {{ Request::routeIs('lathalaya') ? 'text-primary border-primary font-bold' : 'text-primary hover:text-neutral-gray'}}">Home</a>
            <hr class="border-neutral-light">
            <div class="flex flex-col gap-3">
                <a href="{{ route('author.sign-in') }}" class="text-center py-2 border border-primary text-primary rounded-lg font-semibold">Log In</a>
                <a href="{{ route('author.sign-up') }}" class="text-center py-2 bg-primary text-white rounded-lg font-semibold">Sign Up</a>
            </div>
        </div>
    </div>
</nav>
