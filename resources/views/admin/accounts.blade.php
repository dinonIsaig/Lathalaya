@extends('layouts.app')

@section('title', 'Account Dashboard')

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
            @include('components.admin-navbar')

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-admin mb-2">Accounts Dashboard</h1>
                <p class="text-neutral-gray">Manage and monitor all editor accounts in the system </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pb-5">
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 flex justify-between items-start">
                    <div>
                        <p class="text-slate-500 text-xs font-medium mb-1">Total Editors</p>
                        <h1 class="text-2xl font-bold text-slate-900">{{ $totalEditorsCount }}</h1>
                    </div>
                    <div class="text-button bg-purple-100 rounded-lg p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 flex justify-between items-start">
                    <div>
                        <p class="text-slate-500 text-xs font-medium mb-1">Active Editors</p>
                        <h1 class="text-2xl font-bold text-slate-900">{{ $activeCount }}</h1>
                    </div>
                    <div class="text-[#007A55] bg-green-100 rounded-lg p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.5 19c0-2.35-2-4.5-5.5-4.5S4.5 16.65 4.5 19c0 1 .5 2 2 2h7c1.5 0 2-1 2-2Z" />
                        <circle cx="10" cy="10" r="3.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11l2.5 2.5L23 8" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 flex justify-between items-start">
                    <div>
                        <p class="text-slate-500 text-xs font-medium mb-1">Inactive Editors</p>
                        <h1 class="text-2xl font-bold text-slate-900">{{ $inactiveCount }}</h1>
                    </div>
                    <div class="text-gray-500 bg-gray-300 rounded-lg p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.5 19c0-2.35-2-4.5-5.5-4.5S4.5 16.65 4.5 19c0 1 .5 2 2 2h7c1.5 0 2-1 2-2Z" />
                        <circle cx="10" cy="10" r="3.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l5 5m0-5l-5 5" />
                        </svg>
                    </div>
                </div>
            </div>

            <div x-data="{ open : false }">
                <div class="flex justify-end mb-4">
                    <button
                        type="button"
                        @click="open = true"
                        class="normal-btn flex items-center p-2 md:px-3 gap-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        <span>Add Account</span>
                    </button>
                </div>

                <x-admin-add-editor-modal :route="route('admin.add-editor')" />
            </div>

            <div class="gap-6 flex flex-col md:flex-row">

                <div class="mb-10 md:w-2/3 w-full">
                    <div class="bg-gray-100 flex items-center gap-2 overflow-x-auto p-2 rounded-t-xl">
                        <div class="text-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </div>
                        <h2 class="font-bold text-black text-lg">Active Editor Profiles</h2>
                    </div>

                    <x-editor-table-active :editors="$activeEditors" />
                </div>

                <div class="mb-10 md:w-1/3 w-full">
                    <div class="bg-gray-100 flex items-center gap-2 overflow-x-auto p-2 rounded-t-xl">
                        <div class="text-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>
                        </div>
                        <h2 class="font-bold text-black text-lg">Editor IDs</h2>
                    </div>

                    <x-editor-table-ids :ids="$allEditorIds" />

                </div>

            </div>


        </div>
    </div>
</div>
@endsection
