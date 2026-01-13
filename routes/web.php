<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('lathalaya');
})->name('lathalaya');

Route::prefix('pam')->group(function () {
        // Admin Routes
    Route::prefix('admin')->group(function () {


    });

    // Editor Routes
    Route::prefix('editor')->group(function () {


    });
});


// Author Routes
Route::prefix('author')->group(function () {


});
