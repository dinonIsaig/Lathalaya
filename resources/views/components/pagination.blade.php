@props(['items', 'type'])

<div class="flex items-center justify-between mt-6">
    @php
        $isPaginator = $items instanceof \Illuminate\Pagination\LengthAwarePaginator ||
                        $items instanceof \Illuminate\Contracts\Pagination\Paginator;
    @endphp

    <div class="transaction-counter font-medium p-5">
        @if ($isPaginator)
            Showing {{ $items->firstItem() ?? 0 }} to {{ $items->lastItem() ?? 0 }} of {{ $items->total() }} {{ $type ?? 'records' }}
        @else
            Showing all {{ $items->count() }} {{ $type ?? 'records' }}
        @endif
    </div>


    @if ($isPaginator && $items->hasPages())
        <div class="flex gap-2 p-5">

            @if ($items->onFirstPage())
                <span class="pagination-btn cursor-not-allowed text-gray-400 border-gray-200 bg-gray-50">Previous</span>
            @else
                <a href="{{ $items->previousPageUrl() }}" class="normal-btn hover:bg-white">Previous</a>
            @endif


            @if ($items->hasMorePages())
                <a href="{{ $items->nextPageUrl() }}" class="normal-btn hover:bg-white">Next</a>
            @else
                <span class="pagination-btn cursor-not-allowed text-gray-400 border-gray-200 bg-gray-50">Next</span>
            @endif
        </div>
    @endif
</div>
