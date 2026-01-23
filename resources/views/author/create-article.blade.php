@extends('layouts.app')

@section('title', 'Create Article')

@section('content')
    

<div class="flex h-screen bg-neutral-light">

    <div class="flex-1 pt-30 overflow-auto">

        <div class="p-4 px-18 max-md:px-8 ">
            @include('components.author-navbar')

            <div class="max-w-full mx-auto my-2 bg-white border border-gray-100 rounded-[10px] shadow-sm overflow-hidden">
                <div class="flex flex-col items-start shrink-0 self-stretch pt-4 pb-4 px-6 bg-white border-b border-solid border-[#E5E7EB] mb-6">
                    <h1 class="text-2xl font-bold text-text-primary leading-tight">Create New Article</h1>
                </div>

            <form action="{{ route('author.store-article') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="px-6 pt-1 pb-4 space-y-6">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Article Title *</label>
                    <input type="text" name="title" placeholder="Enter a compelling headline..." 
                            class="w-full px-4 py-3 border border-gray-200 rounded-[10px] focus:outline-none focus:ring-2 focus:ring-button focus:border-transparent">
                </div>

                <div class="px-6 pt-1 pb-4 space-y-6">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Cover Image</label>
                    <div class="overflow-hidden rounded-lg border border-gray-200 mb-3">
                        @if(isset($article) && $article->cover_image)
                            <img id="cover_preview" src="{{ asset('storage/' . $article->cover_image) }}" 
                                    alt="{{ $article->title }}" 
                                    class="w-full h-48 object-cover">
                        @else
                            <img id="cover_preview" src="{{ asset('assets/images/sampleCover.png') }}" 
                                    alt="Default Cover" 
                                    class="w-full h-48 object-cover">
                        @endif
                    </div>

                <label class="cursor-pointer flex items-center w-fit px-4 py-2 border border-gray-200 rounded-[10px] text-sm font-medium text-neutral-950 hover:bg-gray-50">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Add Cover Image</span>
                    <input type="file" id="cover_input" name="cover_image" class="hidden" accept="image/*">
                </label>
                </div>

                <div class="px-6 pt-1 pb-4 space-y-6">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Category *</label>
                    <div class="relative">
                        <select name="category" 
                                class="w-full px-4 py-3 border border-gray-200 rounded-[10px] bg-white appearance-none focus:outline-none focus:ring-2 focus:ring-button focus:border-transparent cursor-pointer">
                            <option value="" disabled selected>Select a category...</option>
                            <option value="Politics & Government">Politics & Government</option>
                            <option value="Business & Finance">Business & Finance</option>
                            <option value="Technology & Science">Technology & Science</option>
                            <option value="Health & Fitness">Health & Fitness</option>
                            <option value="Sports">Sports</option>
                            <option value="Lifestyle & Travel">Lifestyle & Travel</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Environment & Nature">Environment & Nature</option>
                            <option value="Obituaries">Obituaries</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div  class="px-6 pt-1 pb-4 space-y-6">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Article Content *</label>
                    <div class="border border-gray-200 rounded-[10px] overflow-hidden">
                        <div class="flex items-center space-x-4 px-4 py-2 border-b border-gray-100 bg-gray-50 text-gray-500">
                            <button type="button" class="font-serif font-bold">T</button>
                            <button type="button" class="font-bold">B</button>
                            <button type="button" class="italic">I</button>
                            <button type="button">List</button>
                            <button type="button">🔗</button>
                        </div>
                        <textarea name="content" rows="10" placeholder="Write your article content here..." 
                                  class="w-full px-4 py-4 focus:outline-none text-gray-600 italic"></textarea>
                    </div>
                </div>

                <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center rounded-b-lg">
                    <a href="{{ route('author.home') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="bg-button text-white px-6 py-1 rounded-[10px] hover:bg-primary-dark transition-colors cursor-pointer font-semibold">
                        Submit for Review
                    </button>
                </div>

            </form>

        
                
            </div>
        </div>
    </div>
</div>

<x-confirm-submitted-modal id="confirmSubmittedModal" />

@endsection

@push('scripts')
    @vite(['resources/js/article-cover.js'])

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

