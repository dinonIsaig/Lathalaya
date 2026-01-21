@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')

<div class="flex h-screen bg-neutral-light">
    <div class="flex-1 pt-30 overflow-auto">
        <div class="p-4 px-18 max-md:px-8">
            @include('components.admin-navbar')

            <form action="{{ route('admin.update-article.submit', $article->article_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="max-w-[1440px] mx-auto bg-white rounded-xl shadow-sm border border-gray-100 mt-6">

                    <div class="border-b border-gray-100 px-6 py-4 flex justify-between items-center">
                        <h1 class="text-text-primary">Edit Article</h1>
                        <span class="category-tag">
                            Author ID: {{ $article->author_id }}
                        </span>
                    </div>

                    <div class="px-6 py-6 space-y-6">

                        <div class="space-y-2">
                            <label class="input-label font-semibold"> Article Title * </label>
                            <input type="text" id="article-title" name="title" 
                                value="{{ old('title', $article->title) }}" 
                                class="input-field text-lg !pl-4" placeholder="Enter article title"/>
                        </div>

                        <div class="space-y-2">
                            <label class="input-label font-semibold"> Cover Image </label>
                            <div>
                                <div class="mt-3 border border-gray-200 rounded-xl overflow-hidden bg-neutral-light w-full aspect-[17/9] md:aspect-[3/1]">
                                    <img id="preview-image" 
                                        src="{{ $article->cover_image ? asset('storage/' . $article->cover_image) : asset('assets/images/articleImg.png') }}" 
                                        class="w-full h-full object-cover"/>
                                </div>


                                <button type="button" onclick="document.getElementById('image-input').click()" 
                                        class="normal-btn-outline mt-3 inline-flex items-center gap-2"> 
                                    Change Cover Image 
                                </button>
                                <input type="file" id="image-input" name="cover_image" class="hidden" accept="image/*" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="input-label font-semibold"> Category * </label>
                                <select id="article-category" name="category" class="input-field !pl-4">
                                    <option value="">Select a category</option>
                                    @php
                                        $categories = [
                                            'Politics & Government', 
                                            'Business & Finance', 
                                            'Technology & Science', 
                                            'Health & Fitness', 
                                            'Sports', 
                                            'Lifestyle & Travel', 
                                            'Entertainment', 
                                            'Environment & Nature', 
                                            'Obituaries'
                                        ];
                                    @endphp
                                    @foreach($categories as $category)
                                        <option value="{{ $category }}" {{ old('category', $article->category) == $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label class="input-label font-semibold"> Status * </label>
                                <select id="article-status" name="status" class="input-field !pl-4">
                                    <option value="Pending" {{ $article->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Published" {{ $article->status == 'Published' ? 'selected' : '' }}>Published</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="input-label font-semibold"> Article Content * </label>
                            <div class="bg-neutral-light border border-gray-300 rounded-t-xl px-3 py-2 flex items-center gap-2">
                                <button type="button" title="Heading">H</button>
                                <button type="button" title="Bold">B</button>
                                <button type="button" title="Italic">I</button>
                                <button type="button" title="List">List</button>
                                <button type="button" title="Link">🔗</button>
                            </div>
                            <textarea id="article-content" name="content"
                                    class="block w-full h-80 px-4 py-3 border border-t-0 border-gray-300 rounded-b-xl focus:border-tags focus:outline-none focus:ring-1 focus:ring-tags resize-none sm:text-sm"
                            >{{ old('content', $article->content) }}</textarea>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                            <button type="button" class="cancel-btn w-auto px-8 text-center" onclick="window.history.back()">
                                Cancel
                            </button>

                            <button id="update-btn" type="submit" class="normal-btn px-10">
                                Save Changes
                            </button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection