@extends('layouts.app')

@section('title', 'Author Dashboard')

@section('content')

<div class="flex h-screen bg-neutral-light">
    <div class="flex-1 pt-30 overflow-auto">
        <div class="p-4 px-18 max-md:px-8">
            @include('components.author-navbar')

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-admin mb-2">My Submissions</h1>
                <p class="text-neutral-gray">Monitor your pending and published articles</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pb-5">
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 flex justify-between items-start">
                    <div>
                        <p class="text-slate-500 text-xs font-medium mb-1">Total Articles</p>
                        <h1 class="text-2xl font-bold text-slate-900">{{ $totalArticles }}</h1>
                    </div>
                    <div class="text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 flex justify-between items-start">
                    <div>
                        <p class="text-slate-500 text-xs font-medium mb-1">Published</p>
                        <h1 class="text-2xl font-bold text-slate-900">{{ $publishedCount }}</h1>
                    </div>
                    <div class="text-green-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 flex justify-between items-start">
                    <div>
                        <p class="text-slate-500 text-xs font-medium mb-1">Pending Review</p>
                        <h1 class="text-2xl font-bold text-slate-900">{{ $pendingCount }}</h1>
                    </div>
                    <div class="text-amber-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="mb-10">
                <div class="flex items-center gap-2 overflow-x-auto pb-5">
                    <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    <h2 class="font-bold text-black text-xl">Submitted Articles</h2>
                </div>

                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-black text-xs font-semibold uppercase bg-slate-50">
                                <th class="px-6 py-4">Title</th>
                                <th class="px-6 py-4 text-center">Category</th>
                                <th class="px-6 py-4 text-center">Modified</th>
                                <th class="px-6 py-4 text-center pr-10">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($articles as $article)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 flex items-center gap-4 w-full min-w-[400px]">
                                    <img src="{{ $article->cover_image ? asset('storage/' . $article->cover_image) : asset('assets/images/defaultImg.jpg') }}" 
                                        class="w-12 h-10 rounded-lg object-cover shrink-0" alt="Article Thumbnail">
                                    <div class="flex-1 min-w-0"> 
                                        <p class="font-bold text-black text-sm line-clamp-1 mb-0.5">{{ $article->title }}</p>
                                        <p class="text-slate-500 text-xs line-clamp-1 ">
                                            {{ Str::limit($article->content, 100) }}
                                        </p>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 text-center">
                                    <span class="category-tag inline-block">{{ $article->Category }}</span>
                                </td>

                                <td class="px-6 py-4 text-sm text-slate-500 text-center whitespace-nowrap">
                                    {{ $article->created_at->format('M d, Y') }}
                                </td>

                                <td class="px-6 py-4 text-center pr-10">
                                    <span class="{{ strtolower($article->status) == 'published' ? 'published' : 'pending' }} inline-block">
                                        {{ ucfirst($article->status ?? 'Pending') }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection