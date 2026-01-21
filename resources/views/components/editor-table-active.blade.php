@props(['editors'])

<div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between h-180">

    <div class="w-full overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-black text-xs font-semibold uppercase bg-slate-50 border-b border-gray-100">
                    <th class="px-6 py-4">Editor ID</th>
                    <th class="px-6 py-4">Full Name</th>
                    <th class="px-6 py-4 text-center">Email</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($editors as $editor)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $editor->editor_number }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $editor->full_name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                            {{ $editor->email }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                            No active editors found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-4 border-t border-gray-100 bg-white">
        <x-pagination :items="$editors" :type="'editors'" />
    </div>

</div>
