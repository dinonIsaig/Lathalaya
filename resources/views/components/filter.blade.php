<div x-data="{ open: false }" x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4">
    
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl overflow-hidden">
        
        <div class="flex items-center justify-between px-8 py-6 border-b border-gray-100">
            <h1>Filter Articles</h1>
            <button @click.away="open = false" class="cursor-pointer text-neutral-gray hover:text-text-primary transition-colors">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="p-8 space-y-8">
            
            <section>
                <h3 class="mb-4">Categories</h3>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @php
                        $categories = ['Politics', 'Business', 'Technology', 'Health', 'Sports', 'Lifestyle', 'Entertainment', 'Obituaries'];
                    @endphp
                    @foreach($categories as $category)
                        <button class="w-full py-2.5 px-2 border border-gray-200 rounded-xl text-sm font-medium text-gray-600 hover:border-button hover:bg-tags-bg hover:text-button transition-all">
                            {{ $category }}
                        </button>
                    @endforeach
                </div>
            </section>

            <section>
                <h3 class="mb-4">Date Range</h3>
                <div class="flex flex-wrap gap-3">
                    <button class="px-6 py-3 bg-button text-white rounded-xl font-medium shadow-sm">
                        All Time
                    </button>
                    
                    @foreach(['Today', 'This Week', 'This Month', 'This Year'] as $range)
                        <button class="px-6 py-3 border border-gray-200 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 transition-colors">
                            {{ $range }}
                        </button>
                    @endforeach
                </div>
            </section>

            <section>
                <h3 class="mb-4">Author</h3>
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Search by author name..." 
                        class="input-field"
                    >
                </div>
            </section>
        </div>

        <div class="px-8 py-6 bg-neutral-light flex items-center justify-between border-t border-gray-100">
            <button class="cursor-pointer text-sm font-bold text-neutral-gray hover:text-red-500 transition-colors"> Clear All </button>
            <div class="flex items-center gap-4">
                <button @click="open = false" class="cursor-pointer px-8 py-2.5 border border-gray-300 bg-white text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-colors"> Cancel </button>
                <button class="normal-btn !rounded-xl !px-8 !py-2.5 font-semibold"> Apply Filter </button>
            </div>
        </div>
    </div>
</div>