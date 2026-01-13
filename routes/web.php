<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;


Route::get('/', function () {
    return view('lathalaya');
})->name('lathalaya');

Route::prefix('pam')->group(function () {
        // Admin Routes
    Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');


    });

    // Editor Routes
    Route::prefix('editor')->group(function () {


    });
});


// Author Routes
Route::prefix('author')->group(function () {


});
