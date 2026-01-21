@props(['route'])

<div
    x-show="open"
    style="display: none"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"

    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
>
    <div
        @click.away="open = false"
        class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 overflow-hidden"
    >
        <div class="flex justify-between items-center p-4 border-b border-gray-100">
            <h3 class="text-lg font-bold text-gray-900">Add Editor Account</h3>
            <button @click="open = false" class="text-gray-400 hover:text-gray-500">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form action="{{ $route }}" method="POST">
            @csrf
            <div class="p-6">
                <label for="editor_number" class="block text-sm font-bold text-gray-900 mb-2">
                    Editor Number
                </label>
                <input
                    type="text"
                    name="editor_number"
                    id="editor_number"
                    placeholder="Enter editor number..."
                    class="w-full rounded-md border p-2 border-gray-300 shadow-sm text-sm placeholder-gray-400"
                    required
                >
            </div>

            <div class="flex justify-end gap-3 px-6 py-4 bg-gray-50 border-t border-gray-100">
                <button
                    type="button"
                    @click="open = false"
                    class="cancel-btn flex w-1/4 items-center justify-center px-3 md:px-2"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    class="normal-btn flex w-1/4 items-center justify-center px-3 md:px-2"
                >
                    Add Editor
                </button>
            </div>
        </form>
    </div>
</div>
