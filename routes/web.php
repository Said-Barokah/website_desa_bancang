<?php

use App\Http\Controllers\AccountSettingController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApparatusPositionController;
use App\Http\Controllers\BPDStructureController;
use App\Http\Controllers\ManagementPositionController;
use App\Http\Controllers\VillagerController;
use App\Http\Controllers\VillageApparatusStructureController;
use App\Http\Controllers\UserAccountSettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;

Route::middleware('guest')->group(function(){
    Route::get('/password/email', [ForgotPasswordController::class,'index'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class,'forgot'])->name('password.email');
    Route::get('/reset-password/{token}',[ForgotPasswordController::class,'reset'])->name('password.reset');
    Route::post('/reset-password',[ForgotPasswordController::class,'update'])->name('password.update');
});
Route::middleware('verified.check')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/news', [FrontPostController::class, 'index'])->name('front.posts.index');
    Route::get('/news/{slug}', [FrontPostController::class, 'showPost'])->name('front.posts.show');
    Route::get('/categories/{slug}/news', [FrontPostController::class, 'showPostCategory'])->name('front.posts.categories');
    Route::get('/tags-news/{slug}', [FrontPostController::class, 'tagNews'])->name('tag-news.index');
    Route::middleware(['auth', 'role:admin|super admin', 'verified'])->prefix('dashboard')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/posts/trash', [PostController::class, 'trash'])->name('posts.trash');
        Route::post('/posts/trash/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
        Route::delete('/posts/{id}/delete-permanent', [PostController::class, 'deletePermanent'])->name('posts.deletePermanent');
        Route::resource('/posts', PostController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/tags', TagController::class);
        Route::post('posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::resource('apparatus-position', ApparatusPositionController::class);
        Route::resource('village-apparatus-structure', VillageApparatusStructureController::class);
        Route::post('village-apparatus-structure/{id}', [VillageApparatusStructureController::class, 'update'])->name('village-apparatus-structure.update');
        Route::resource('villagers', VillagerController::class);
        Route::resource('management-position', ManagementPositionController::class);
        Route::resource('BPD-structure', BPDStructureController::class);
        Route::post('BPD-structure/{id}', [BPDStructureController::class, 'update'])->name('BPD-structure.update');
        Route::get('account-setting', [AccountSettingController::class, 'index'])->name('account-setting.index');
        Route::post('account-setting', [AccountSettingController::class, 'update'])->name('account-setting.update');
        Route::post('account-setting-password', [AccountSettingController::class, 'updatePassword'])->name('account-setting-password.update');
    });

    Route::middleware(['auth', 'role:user', 'verified'])->group(function () {
        Route::post('account-setting', [UserAccountSettingController::class, 'update'])->name('user-account-setting.update');
        Route::post('account-setting-password', [UserAccountSettingController::class, 'updatePassword'])->name('user-account-setting-password.update');
    });

    Route::middleware(['auth', 'role:super admin', 'verified'])->prefix('dashboard')->group(function () {
        Route::resource('users', UserController::class);
        Route::post('users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::post('users-setting-password/{id}', [UserController::class, 'updatePassword'])->name('users-setting-password.update');
    });
});
