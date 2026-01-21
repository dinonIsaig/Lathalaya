<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUpdateArticleController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminAccountController;


use App\Http\Controllers\LathalayaController;
use App\Http\Controllers\Editor\EditorDashboardController;
use App\Http\Controllers\Editor\EditorUpdateArticleController;
use App\Http\Controllers\Author\AuthorDashboardController;
use App\Http\Controllers\ArticleController;

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Author\AuthorAuthController;
use App\Http\Controllers\Editor\EditorAuthController;


Route::get('/', [LathalayaController::class, 'index'])->name('lathalaya');

Route::prefix('pam')->group(function () {

    Route::get('/', function () {
        return view('account-type');
    })->name('pam.account.type');

    // Admin Routes
    Route::prefix('admin')->group(function () {
            Route::get('/sign-in', [AdminAuthController::class, 'showSignInForm'])->name('admin.sign-in.form');
            Route::post('/sign-in', [AdminAuthController::class, 'signIn'])->name('admin.sign-in');
            Route::post('/sign-out', [AdminAuthController::class, 'signOut'])->name('admin.sign-out');
            Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home')->middleware('auth:admin');
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth:admin');
            Route::delete('/dashboard', [AdminDashboardController::class, 'destroy'])->name('admin.dashboard.destroy');
            Route::put('/update-article/{id}', [AdminUpdateArticleController::class, 'update'])->name('admin.update-article.submit');
            Route::get('/update-article/{id}', [AdminUpdateArticleController::class, 'index'])->name('admin.update-article.edit');
            Route::get('/admin/article/{id}', [AdminArticleController::class, 'show'])->name('admin.article-view');
            Route::get('/create', [AdminArticleController::class, 'index'])->name('admin.create-article');
            Route::post('/store', [AdminArticleController::class, 'store'])->name('admin.store-article');
            Route::patch('/publish-article/{id}', [AdminArticleController::class, 'publish'])->name('admin.article.publish');
            Route::get('/accounts', [AdminAccountController::class, 'index'])->name('admin.accounts')->middleware('auth:admin');
            Route::post('/admin/accounts/add', [AdminAccountController::class, 'store'])->name('admin.add-editor');

    });

    // Editor Routes
    Route::prefix('editor')->group(function () {
            Route::get('/sign-in', [EditorAuthController::class, 'showSignInForm'])->name('editor.sign-in.form');
            Route::post('/sign-in', [EditorAuthController::class, 'signIn'])->name('editor.sign-in');
            Route::get('/sign-up', [EditorAuthController::class, 'showSignUpForm'])->name('editor.sign-up.form');
            Route::post('/sign-up', [EditorAuthController::class, 'signUp'])->name('editor.sign-up');
            Route::post('/sign-out', [EditorAuthController::class, 'signOut'])->name('editor.sign-out');
            Route::get('/dashboard', [EditorDashboardController::class, 'index'])->name('editor.dashboard')->middleware('auth:editor');
            Route::get('/update-article', [EditorUpdateArticleController::class, 'index'])->name('editor.update-article');
    });

});


// Author Routes
    Route::prefix('author')->group(function () {


    Route::get('/sign-in', [AuthorAuthController::class, 'showSignInForm'])->name('author.sign-in.form');
    Route::post('/sign-in', [AuthorAuthController::class, 'signIn'])->name('author.sign-in');
    Route::get('/sign-up', [AuthorAuthController::class, 'showSignUpForm'])->name('author.sign-up.form');
    Route::post('/sign-up', [AuthorAuthController::class, 'signUp'])->name('author.sign-up');
    Route::post('/sign-out', [AuthorAuthController::class, 'signOut'])->name('author.sign-out');

        Route::get('/create', [ArticleController::class, 'index'])->name('author.create-article')->middleware('auth:author');

        Route::post('/store', [ArticleController::class, 'store'])->name('author.store-article');

        Route::get('/author/article/{id}', [ArticleController::class, 'show'])->name('author.article-view');

        Route::get('/dashboard', [AuthorDashboardController::class, 'index'])->name('author.dashboard')->middleware('auth:author');

        Route::get('/home', function () {
            return view('author.home');
        })->name('author.home');

});
