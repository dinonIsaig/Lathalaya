@props(['ids'])

<div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-y-auto h-180">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="text-black text-xs font-semibold uppercase bg-slate-50 border-b border-gray-100">
                <th class="px-6 py-4">Editor ID</th>
                <th class="px-6 py-4">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($ids as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">
                        {{ $item->editor_number }}
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-semibold rounded-full border
                            {{ $item->status === 'Active'
                                ? 'bg-green-100 text-green-700 border-green-200'
                                : 'bg-red-100 text-red-600 border-red-200'
                            }}">
                            
                            <span class="h-1.5 w-1.5 rounded-full
                                {{ $item->status === 'Active' ? 'bg-green-500' : 'bg-red-500' }}">
                            </span>

                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="px-6 py-8 text-center text-gray-500">
                        No editor IDs found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
