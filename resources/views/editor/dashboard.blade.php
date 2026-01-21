@extends('layouts.app')

@section('title', 'Editor Dashboard')

@section('content')

@if (session('success'))
    <div id="alert-success" class="absolute top-10 right-200 z-[100] tracking-wide flex items-center p-4 px-10 mb-4 text-green-800 rounded-lg bg-green-50 border border-green-300 shadow-lg transition-opacity duration-500" role="alert">
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session('error'))
    <div id="alert-error" class="absolute top-10 right-200 z-[100] flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 border border-red-300 shadow-lg" role="alert">
        <div class="ms-3 text-sm font-medium">
            {{ session('error') }}
        </div>
    </div>
@endif

<div class="flex h-screen bg-neutral-light">
    <div class="flex-1 pt-30 overflow-auto">
        <div class="p-4 px-18 max-md:px-8">
            @include('components.editor-navbar')

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-admin mb-2">Dashboard</h1>
                <p class="text-neutral-gray">Manage all articles and users</p>
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
                
            <div class="mb-10">
                <div class="flex items-center gap-2 overflow-x-auto pb-5">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h2 class="font-bold text-black text-lg">Pending Review</h2>
                </div>

                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-black text-xs font-semibold uppercase bg-slate-50 ">
                                <th class="px-6 py-4">Title</th>
                                <th class="px-6 py-4">Author</th>
                                <th class="px-6 py-4 text-center">Category</th>
                                <th class="px-6 py-4">Published</th>
                                <th class="px-6 py-4 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">     
                            @forelse($pendingArticles as $article)  
                            <tr class="hover:bg-slate-50 transition-colors">                                
                                <x-admin-articles :article="$article" />
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-3">
                                        <button onclick="window.location='{{ route('admin.article-view', $article->article_id) }}'" class="read-btn">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </button>

                                        <button onclick="window.location='{{ route('admin.update-article.edit', $article->article_id) }}'" class="edit-btn">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </button>                                     

                                        <button onclick="openPublishModal({{ $article->article_id }})" class="normal-btn py-1 text-sm">Publish</button>
                                    </div>
                                </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-slate-500">
                                        No pending articles found.
                                    </td>
                                </tr>
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div>
                <div class="flex items-center gap-2 overflow-x-auto pb-5">
                    <div class="text-green-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h2 class="font-bold text-black text-lg">Published Articles</h2>
                </div>

                
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-x-auto mb-5">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-black text-xs font-semibold uppercase bg-slate-50 ">
                                <th class="px-6 py-4">Title</th>
                                <th class="px-6 py-4">Author</th>
                                <th class="px-6 py-4 text-center">Category</th>
                                <th class="px-6 py-4">Published</th>
                                <th class="px-6 py-4 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">     
                            @forelse($publishedArticles as $article)  
                            <tr class="hover:bg-slate-50 transition-colors">                                
                                <x-admin-articles :article="$article" />
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-3">
                                        <button onclick="window.location='{{ route('admin.article-view', $article->article_id) }}'" class="read-btn">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>

                                        <button onclick="window.location='{{ route('admin.update-article.edit', $article->article_id) }}'" class="edit-btn">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>

                                        <button onclick="openDeleteModal({{ $article->article_id }})" class="delete-btn">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-slate-500">
                                        No pending articles found.
                                    </td>
                                </tr>
                                @endforelse
                        </tbody>                    
                        
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>

<x-confirm-publish-modal id="confirmPublishModal" type="dashboard"/>
<x-confirm-deletion-modal id="confirmDeletionModal" type="dashboard" />

@endsection

@push('scripts')
    @vite('resources/js/deletion.js')
@endpush

