@extends('layouts.app')

@section('title', 'Account Type')

@push('styles')
<style>
    body {
        background: linear-gradient(160deg, #F6F9FF 70%, #C8ECF6 100%);
        min-height: 100vh;
        margin: 0;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center p-6">

    <div class="mb-6 flex justify-center">
        <div class="w-24 md:w-32">
            <img src="{{ asset('assets/images/lathalayaLogo.png') }}" alt="Logo" class="w-full h-auto">
        </div>
    </div>

    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-slate-900">I'm signing as...</h1>
        <p class="text-slate-500 text-lg">Select your account type</p>
    </div>

    <div class="flex flex-col md:flex-row gap-8 w-full max-w-5xl justify-center items-stretch">
        
        <a href="{{ route('editor.dashboard') }}" class="flex-1 max-w-sm group">
            <div class="h-full bg-white rounded-3xl shadow-xl p-8 border border-gray-100 transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="h-3 w-full rounded-full bg-gradient-to-r from-[#175668] to-[#2EAACE] mb-8"></div>
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Editor</h2>
                <p class="text-slate-500 text-base leading-relaxed">
                    Review and publish content from authors
                </p>
            </div>
        </a>

        <a href="{{ route('admin.home') }}" class="flex-1 max-w-sm group">
            <div class="h-full bg-white rounded-3xl shadow-xl p-8 border border-gray-100 transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="h-3 w-full rounded-full bg-gradient-to-r from-[#175668] to-[#2EAACE] mb-8"></div>
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Administrator</h2>
                <p class="text-slate-500 text-base leading-relaxed">
                    Full control over content and users
                </p>
            </div>
        </a>

    </div>
</div>
@endsection