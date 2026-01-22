@extends('layouts.app')

@section('title', 'Home')

@section('content')


<div class="flex h-screen bg-neutral-light">

    <div class="flex-1 pt-30 overflow-auto">

        <div class="p-4 px-18 max-md:px-8 ">
            @include('components.admin-navbar')

            <div class="mb-6 flex justify-end">
                <button onclick="window.location='{{ route('admin.create-article') }}'"
                    class="normal-btn flex items-center px-3 md:px-4">
                    <svg class="w-4 h-4 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    <span class="hidden sm:inline-block ml-1 tracking-tight text-base">Create Article</span>
                </button>
            </div>

        <a href="{{ route('admin.article-view', $headerArticle->article_id) }}" class="block no-underline group">
            <div class="justify-center w-full mb-10">
                @if($headerArticle)
                    <div class="top-4 right-4 flex items-center mb-2">
                        <div class="bg-black hover:opacity-93 transition-all rounded-xl relative overflow-hidden w-full aspect-[17/9] md:aspect-[3/1]">
                            <img src="{{ $headerArticle->cover_image ? asset('storage/' . $headerArticle->cover_image) : asset('assets/images/articleImg.png') }}"
                                                            alt="{{ $headerArticle->title }}"
                                                            class="object-cover rounded-lg w-full h-full">

                            <div class="absolute bottom-0 left-0 flex flex-col p-5 md:p-10 text-white bg-gradient-to-t from-black/80 to-transparent w-full">
                                <span class="bg-tags text-xs px-2 py-1 md:text-xs rounded-2xl w-fit">
                                    {{ $headerArticle->category ?? 'General' }}
                                </span>

                                <h1 class="text-white text-lg sm:text-lg md:text-2xl lg:text-4xl font-bold mt-2 max-w-4xl leading-tight">
                                    {{ $headerArticle->title }}
                                </h1>

                                <p class="text-xs md:text-sm opacity-80 mt-2">
                                    By {{ $headerArticle->author->full_name ?? 'Unknown' }} &#10240; • &#10240; {{ $headerArticle->created_at->format('F d, Y') }}
                                </p>

                            </div>
                        </div>
                    </div>
                @else
                    <p class="text-center text-gray-500">No featured stories available.</p>
                @endif
            </div>
        </a>

            <div x-data="{ open : false }">
                <div class="flex justify-end mb-4">
                    <button type="button" @click="open = true" class="normal-btn flex items-center px-3 md:px-4">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 6H21M6 12H18M10 18H14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="hidden sm:inline-block ml-1 tracking-tight text-base">Filter</span>
                    </button>
                </div>
                @include('components.filter')
            </div>

            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Latest Stories</h2>

            <div class="flex justify-center mb-4">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">
                    @foreach($publishedArticles as $article)
                        <x-latest-articles-home :article="$article" route="admin.article-view" />
                    @endforeach
                </div>

            </div>

        </div>

    </div>
</div>


@endsection


