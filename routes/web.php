<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUpdateArticleController;
use App\Http\Controllers\Admin\AdminArticleController;

use App\Http\Controllers\Editor\EditorDashboardController;
use App\Http\Controllers\Editor\EditorUpdateArticleController;
use App\Http\Controllers\Author\AuthorDashboardController;
use App\Http\Controllers\ArticleController;


Route::get('/', function () {
    return view('lathalaya');
})->name('lathalaya');

Route::prefix('pam')->group(function () {

    Route::get('account-type', function () {
        return view('account-type');
    })->name('pam.account.type');

    // Admin Routes
    Route::prefix('admin')->group(function () {
            Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
            Route::delete('/dashboard', [AdminDashboardController::class, 'destroy'])->name('admin.dashboard.destroy');
            Route::put('/update-article/{id}', [AdminUpdateArticleController::class, 'update'])->name('admin.update-article.submit');
            Route::get('/update-article/{id}', [AdminUpdateArticleController::class, 'index'])->name('admin.update-article.edit');
            Route::get('/admin/article/{id}', [AdminArticleController::class, 'show'])->name('admin.article-view');
            Route::get('/create', [AdminArticleController::class, 'index'])->name('admin.create-article');
            Route::post('/store', [AdminArticleController::class, 'store'])->name('admin.store-article');
            Route::patch('/publish-article/{id}', [AdminArticleController::class, 'publish'])->name('admin.article.publish');


    });

    // Editor Routes
    Route::prefix('editor')->group(function () {
            Route::get('/dashboard', [EditorDashboardController::class, 'index'])->name('editor.dashboard');
            Route::delete('/dashboard', [EditorDashboardController::class, 'destroy'])->name('editor.dashboard.destroy');
            Route::put('/update-article/{id}', [EditorUpdateArticleController::class, 'update'])->name('editor.update-article.submit');
            Route::get('/update-article/{id}', [EditorUpdateArticleController::class, 'index'])->name('editor.update-article.edit');
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
