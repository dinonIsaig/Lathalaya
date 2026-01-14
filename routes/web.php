<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;


Route::get('/', function () {
    return view('lathalaya');
})->name('lathalaya');

Route::prefix('pam')->group(function () {

    // Admin Routes
    Route::prefix('admin')->group(function () {
            Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');


    });

    // Editor Routes
    Route::prefix('editor')->group(function () {


    });

});


// Author Routes
Route::prefix('author')->group(function () {

    Route::get('/sign-in', function () {
        return view('author.sign-in');
    })->name('author.login');

    Route::get('/sign-up', function () {
        return view('author.sign-up');
    })->name('author.register');



});
