@props(['article'])

<div class="flex flex-wrap transition-all duration-200 hover:scale-105 hover:shadow-xl">
    <div class="bg-white rounded-lg shadow-md overflow-hidden top-4 max-w-2xl">

        <img src="{{ asset('assets/images/articleImg.png') }}" 
             alt="Article Image" 
             class="object-cover h-35 w-full">

        <div class="pl-4 py-5 pr-30">
            <div class="flex items-center gap-3 mb-3">

                <span class="category-tag">{{ $article->category }}</span>

                <span class="text-gray-400 text-xs">{{ $article->created_at->format('F d, Y') }}</span>
            </div>


            <h1 class="text-gray-900 text-lg font-bold leading-tight mb-4">
                {{ $article->title }}
            </h1>

            <p class="text-gray-500 text-sm">
                By {{ $user->first_name ?? 'Unknown' }} {{ $user->last_name ?? 'Author' }}
            </p>
        </div>
    </div>
</div>