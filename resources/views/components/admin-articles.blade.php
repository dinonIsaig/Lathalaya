@props(['article'])

    <td class="px-4 py-4 flex items-center gap-2 ">
        <img src="{{ $article->cover_image ? asset('storage/'.$article->cover_image) : asset('assets/images/defaultImg.jpg') }}" 
             class="w-12 h-10 rounded-lg object-cover" 
             alt="Article Thumbnail">
        <div class="min-w-0"> 
            <p class="font-bold text-black text-sm truncate">{{ Str::limit($article->title, 25) }}</p>
            <p class="text-slate-500 text-xs truncate w-20 md:w-48">
                {{ Str::limit(strip_tags($article->content), 40) }}
            </p>
        </div>
    </td>


    <td class="px-2 py-4 text-sm text-slate-600 md:px-6 whitespace-nowrap">
        {{ $article->author->full_name ?? 'Unknown' }}
    </td>


    <td class="px-6 py-4 text-center">
        <span class="category-tag">{{ $article->category }}</span>
    </td>

    <td class="px-6 py-4 text-sm text-slate-500">
        {{ $article->created_at->format('M d, Y') }}
    </td>

