@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="flex h-screen bg-neutral-light">
    <div class="flex-1 pt-30 overflow-auto">
        <div class="p-4 px-18 max-md:px-8">
            @include('components.author-navbar')

            <div class="flex justify-between items-center mb-10">
                <a href="{{ route('author.home') }}" class="flex items-center text-gray-600 hover:text-button transition-colors font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"></path></svg>
                    Back to Articles
                </a>
            </div>

            <header class="mb-8">
                <div class="inline-block bg-button px-3 py-1 rounded-full">
                    <span class="text-white font-bold tracking-wider text-xs">
                        {{ $article->Category }}
                    </span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mt-2 mb-4 leading-tight">
                    {{ $article->title }}
                </h1>
                <div class="flex items-center text-gray-500 text-sm">
                    <span class="font-medium text-slate-800">By {{ $article->author->name ?? 'Author Name' }}</span>
                    <span class="mx-2">•</span>
                    <span>{{ $article->created_at->format('M d, Y') }}</span>
                </div>
            </header>

            <div class="w-full h-[450px] rounded-[24px] overflow-hidden shadow-lg mb-10 border border-gray-100">
                @if($article->cover_image)
                    <img src="{{ asset('storage/' . $article->cover_image) }}" 
                         alt="{{ $article->title }}" 
                         class="w-full h-full object-cover">
                @else
                    <img src="{{ asset('assets/images/sampleCover.png') }}" 
                         alt="Default Cover" 
                         class="w-full h-full object-cover">
                @endif
            </div>

            <article class="p-2 mb-6">
                <div class=" max-w-none text-gray-700 leading-relaxed text-lg  whitespace-pre-line">{{ $article->content }}</div>
            </article>

            <hr class="border-gray-300 mb-10 mx-auto ">

            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-white font-bold">
                    {{ strtoupper(substr($article->author->name ?? 'AN', 0, 2)) }}
                </div>

                <div>
                    <h4 class="font-bold text-slate-900">{{ $article->author->name ?? 'Author Name' }}</h4>
                    <p class="text-sm text-gray-500">Contributing Writer</p>
                </div>
            </div>

            
        </div>
    </div>
</div>

<x-confirm-submitted-modal id="confirmSubmittedModal" />

@endsection

@push('scripts')
<script>
    
    @if(session('success'))
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('confirmSubmittedModal');
            if (modal) {
                modal.classList.remove('hidden');
            }
        });
    @endif
</script>
@endpush

