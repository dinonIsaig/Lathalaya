<div x-show="open"
    x-data="{
        selectedCategories: [],
        selectedRange: 'All Time'
    }"
    x-transition.opacity
    @keydown.escape.window="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4"
    style="display: none">

    <div
        @click.outside="open = false"
        class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl overflow-hidden">
        <div class="flex items-center justify-between px-8 py-6 border-b border-gray-100">
            <h1 class="text-lg font-semibold">Filter Articles</h1>
            <button
                @click="open = false"
                class="text-neutral-gray hover:text-text-primary transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="p-8 space-y-8">
            <section>
                <h3 class="mb-4 font-medium">Categories</h3>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @php
                        $categories = [
                            'Politics', 'Business', 'Technology', 'Health',
                            'Sports', 'Lifestyle', 'Entertainment', 'Obituaries'
                        ];
                    @endphp

                    @foreach($categories as $category)
                        <button
                            @click="
                                selectedCategories.includes('{{ $category }}')
                                    ? selectedCategories = selectedCategories.filter(c => c !== '{{ $category }}')
                                    : selectedCategories.push('{{ $category }}')"

                            :class="selectedCategories.includes('{{ $category }}')
                                ? 'bg-button text-white border-button'
                                : 'border-gray-200 text-gray-600 hover:border-button hover:bg-tags-bg hover:text-button'"
                            class="w-full py-2.5 px-2 border rounded-xl text-sm font-medium transition-all">
                            {{ $category }}
                        </button>
                    @endforeach
                </div>
            </section>

            <section>
                <h3 class="mb-4 font-medium">Date Range</h3>
                <div class="flex flex-wrap gap-3">
                    <button
                        @click="selectedRange = 'All Time'"
                        :class="selectedRange === 'All Time'
                            ? 'bg-button text-white'
                            : 'border border-gray-200 text-gray-600 hover:bg-gray-50'"
                        class="px-6 py-3 rounded-xl font-medium transition-colors">
                        All Time
                    </button>

                    @foreach(['Today', 'This Week', 'This Month', 'This Year'] as $range)
                        <button
                            @click="selectedRange = '{{ $range }}'"
                            :class="selectedRange === '{{ $range }}'
                                ? 'bg-button text-white'
                                : 'border border-gray-200 text-gray-600 hover:bg-gray-50'"
                            class="px-6 py-3 rounded-xl text-sm font-medium transition-colors">
                            {{ $range }}
                        </button>
                    @endforeach
                </div>
            </section>

            <section>
                <h3 class="mb-4 font-medium">Author</h3>
                <input
                    type="text"
                    placeholder="Search by author name..."
                    class="input-field w-full">
            </section>
        </div>

        <div class="px-8 py-6 bg-neutral-light flex items-center justify-between border-t border-gray-100">
            <button
                @click="selectedCategories = []; selectedRange = 'All Time'"
                class="text-sm font-bold text-neutral-gray hover:text-red-500 transition-colors">
                Clear All
            </button>

            <div class="flex items-center gap-4">
                <button
                    @click="open = false"
                    class="px-8 py-2.5 border border-gray-300 bg-white text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-colors">
                    Cancel
                </button>

                <button
                    @click="open = false"
                    class="normal-btn !rounded-xl !px-8 !py-2.5 font-semibold">
                    Apply Filters
                </button>
            </div>
        </div>
    </div>
</div>
