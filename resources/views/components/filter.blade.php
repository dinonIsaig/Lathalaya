<form method="GET" action="{{ url()->current() }}"
    x-data="{
        selectedCategories: @js(request()->input('categories', [])),
        selectedRange: '{{ request('date_range', 'All time') }}'
    }">
    
    <input type="hidden" name="date_range" :value="selectedRange">
    <template x-for="category in selectedCategories" :key="category">
        <input type="hidden" name="categories[]" :value="category">
    </template>

    <div x-show="open"
         x-transition.opacity
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4"
         style="display: none;">
         
        <div class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl overflow-hidden" @click.outside="open = false">
            
            <div class="flex items-center justify-between px-8 py-6 border-b border-gray-100">
                <h2 class="text-xl font-semibold text-gray-900">Filter Articles</h2>
                <button type="button" @click="open = false" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="space-y-2">
                <section class="p-8">
                    <h3 class="mb-4 font-medium text-gray-900">Categories</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        @foreach(['Politics','Business','Technology','Health','Sports','Lifestyle','Entertainment','Obituaries'] as $category)
                            <button type="button"
                                @click="
                                    selectedCategories.includes('{{ $category }}')
                                    ? selectedCategories = selectedCategories.filter(c => c !== '{{ $category }}')
                                    : selectedCategories.push('{{ $category }}')
                                "
                                :class="selectedCategories.includes('{{ $category }}')
                                    ? 'bg-button text-white border-transparent'
                                    : 'border-gray-200 text-gray-600 hover:bg-gray-50'"
                                class="border rounded-xl py-2.5 text-sm font-medium transition-colors">
                                {{ $category }}
                            </button>
                        @endforeach
                    </div>
                </section>

                <section class="px-8 pb-8">
                    <h3 class="mb-4 font-medium text-gray-900">Date Range</h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach(['All time', 'Today', 'This week', 'This month', 'This year'] as $range)
                            <button type="button"
                                @click="selectedRange = '{{ $range }}'"
                                :class="selectedRange === '{{ $range }}' 
                                    ? 'bg-button text-white border-transparent' 
                                    : 'border-gray-200 text-gray-600 hover:bg-gray-50'"
                                class="px-5 py-2.5 rounded-xl border text-sm font-medium transition-colors">
                                {{ $range }}
                            </button>
                        @endforeach
                    </div>
                </section>
            </div>

            <div class="px-8 py-6 flex justify-between items-center border-t border-gray-100 bg-gray-50/50">
                <a href="{{ url()->current() }}" class="text-sm font-semibold text-red-500 hover:text-red-600 transition-colors">
                    Clear All
                </a>
                <div class="flex gap-3">
                    <button type="button" @click="open = false" 
                        class="text-sm font-semibold text-gray-600 px-6 py-2 hover:text-gray-900 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="px-8 py-2.5 bg-button text-white rounded-xl font-semibold shadow-sm hover:opacity-90 transition-opacity">
                        Apply Filters
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>