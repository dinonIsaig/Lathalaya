@extends('layouts.app')

@section('title', 'Account Type')

@push('styles')
<style>
    body {
        background: linear-gradient(160deg, #F6F9FF 70%, #C8ECF6 80%);
        min-height: 100vh;
        background-repeat: no-repeat;
    }
</style>

@endpush

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center relative overflow-hidden">

    <div class="flex justify-center">
        <div class=" p-4 rounded-lg inline-block w-1/5">
            <img src="{{ asset('assets/images/lathalayaLogo.png') }}" alt="Logo">
        </div>
    </div>

    <h1 class="text-2xl font-bold text-text-primary max-sm:text-md">I'm signing as...</h1>
    <p class="text-[#4A5565] text-md mb-8 max-sm:text-sm tracking-tight">Select your account type</p>

    <div class="flex flex-col md:flex-row gap-6 p-8 bg-gray-50 min-h-screen justify-center items-start">
        
        <div class="bg-white rounded-3xl shadow-lg p-8 w-full max-w-sm border border-gray-100 transition-transform hover:scale-105">
            <div class="h-4 w-full rounded-full bg-gradient-to-r from-[#175668] to-[#2EAACE] mb-8"></div>
            
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Editor</h2>
            <p class="text-slate-500 text-lg leading-relaxed">
                Review and publish content from authors
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-8 w-full max-w-sm border border-gray-100 transition-transform hover:scale-105">
            <div class="h-4 w-full rounded-full bg-gradient-to-r from-[#175668] to-[#2EAACE] mb-8"></div>
            
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Administrator</h2>
            <p class="text-slate-500 text-lg leading-relaxed">
                Full control over content and users
            </p>
        </div>

    </div>
@endsection