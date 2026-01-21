@props(['article'])

<a href="{{ route('admin.article-view', $article->article_id) }}" class="block no-underline group">
    <div class="transition-all duration-200 group-hover:scale-105 group-hover:shadow-xl cursor-pointer w-full h-full">
        <div class="bg-white rounded-lg shadow-md overflow-hidden w-full h-full flex flex-col">
            <img src="{{ $article->cover_image ? asset('storage/' . $article->cover_image) : asset('assets/images/articleImg.png') }}"
                alt="Article Image"
                class="object-cover h-48 w-full">
            <div class="p-5 flex-1 flex flex-col">
                <div class="flex items-center gap-3 mb-3">
                    <span class="category-tag">{{ $article->category }}</span>
                    <span class="text-gray-400 text-xs">{{ $article->created_at->format('F d, Y') }}</span>
                </div>
                <h1 class="text-gray-900 text-lg font-bold leading-tight mb-4 flex-1">
                    {{ $article->title }}
                </h1>
                <p class="text-gray-500 text-sm mt-auto">
                    By {{ $article->author->first_name ?? 'Unknown' }} {{ $article->author->last_name ?? 'Author' }}
                </p>
            </div>
        </div>
    </div>
</a>
