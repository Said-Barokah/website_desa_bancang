<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
Route::middleware('verified.check')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/news', [FrontPostController::class, 'index'])->name('front.posts.index');
    Route::get('/news/{slug}', [FrontPostController::class, 'showPost'])->name('front.posts.show');
    Route::get('/categories/{slug}/news',[FrontPostController::class, 'showPostCategory'])->name('front.posts.categories');
    Route::get('/account/setting',[AccountController::class, 'index'])->name('account.setting.index')->middleware(['auth','verified']);
    Route::middleware(['auth','role:admin|super admin','verified'])->prefix('dashboard')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/posts/trash', [PostController::class, 'trash'])->name('posts.trash');
        Route::post('/posts/trash/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
        Route::delete('/posts/{id}/delete-permanent', [PostController::class, 'deletePermanent'])->name('posts.deletePermanent');
        Route::resource('/posts', PostController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/tags', TagController::class);
    });
});


