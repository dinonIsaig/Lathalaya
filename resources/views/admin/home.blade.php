@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="flex h-screen bg-neutral-light">
    <div class="flex-1 pt-30 overflow-auto">
        <div class="p-4 px-18 max-md:px-8">
            @include('components.admin-navbar')

            <div class="mb-6 flex justify-end">
                <a href="{{ route('admin.create-article') }}" class="normal-btn flex items-center px-3 md:px-4">
                    <svg class="w-4 h-4 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    <span class="hidden sm:inline-block ml-1 tracking-tight text-base">Create Article</span>
                </a>
            </div>

            @if($headerArticle)
                <a href="{{ route('admin.article-view', $headerArticle->article_id) }}" class="block no-underline group mb-12">
                    <div class="relative rounded-2xl overflow-hidden aspect-[17/9] md:aspect-[3/1] shadow-lg">
                        <img src="{{ $headerArticle->cover_image ? asset('storage/' . $headerArticle->cover_image) : asset('assets/images/articleImg.png') }}"
                             alt="{{ $headerArticle->title }}"
                             class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex flex-col justify-end p-6 md:p-12">
                            <span class="bg-tags text-white text-xs px-3 py-1 rounded-full w-fit mb-4">
                                {{ $headerArticle->category ?? 'Featured' }}
                            </span>
                            <h1 class="text-white text-2xl md:text-5xl font-extrabold leading-tight max-w-4xl">
                                {{ $headerArticle->title }}
                            </h1>
                            <p class="text-gray-300 text-sm md:text-base mt-4 flex items-center gap-2">
                                <span>By {{ $headerArticle->author->first_name }} {{ $headerArticle->author->last_name ?? 'Unknown' }}</span>
                                <span class="opacity-50">•</span>
                                <span>{{ $headerArticle->created_at->format('M d, Y') }}</span>
                            </p>
                        </div>
                    </div>
                </a>
            @endif

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

            <div class="flex justify-center mb-10">
                @if($publishedArticles->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 w-full">
                        @foreach($publishedArticles as $article)
                            <x-latest-articles-home :article="$article" route="admin.article-view" />
                        @endforeach
                    </div>
                @else
                    <div class="w-full py-20 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4 text-gray-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">No results found</h3>
                        <p class="text-gray-500 mt-1 mb-6">We couldn't find any articles matching your current filters.</p>
                        <a href="{{ url()->current() }}" class="px-6 py-2 bg-button text-white rounded-lg font-semibold hover:opacity-90 transition-opacity">
                            Clear Filters
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection