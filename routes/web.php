<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUpdateArticleController;
use App\Http\Controllers\Editor\EditorDashboardController;
use App\Http\Controllers\Editor\EditorUpdateArticleController;
use App\Http\Controllers\Author\AuthorDashboardController;
use App\Http\Controllers\ArticleController;


Route::get('/', function () {
    return view('lathalaya');
})->name('lathalaya');

Route::prefix('pam')->group(function () {

    // Admin Routes
    Route::prefix('admin')->group(function () {
            Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
            Route::delete('/dashboard', [AdminDashboardController::class, 'destroy'])->name('admin.dashboard.destroy');
            Route::get('/update-article/{id}', [AdminUpdateArticleController::class, 'index'])->name('admin.update-article');



    });

    // Editor Routes
    Route::prefix('editor')->group(function () {
            Route::get('/dashboard', [EditorDashboardController::class, 'index'])->name('editor.dashboard');
            Route::get('/update-article', [EditorUpdateArticleController::class, 'index'])->name('editor.update-article');
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


        Route::get('/create', [ArticleController::class, 'index'])->name('author.create-article');

        Route::post('/store', [ArticleController::class, 'store'])->name('author.store-article');

        Route::get('/author/article/{id}', [ArticleController::class, 'show'])->name('author.article-view');

        Route::get('/dashboard', [AuthorDashboardController::class, 'index'])->name('author.dashboard');

        Route::get('/home', function () {
            return view('author.home');
        })->name('author.home');

});
