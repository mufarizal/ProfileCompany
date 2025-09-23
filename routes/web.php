<?php

use App\Http\Controllers\AdminGigan\BannerController;
use App\Http\Controllers\AdminGigan\DashboardController;
use App\Http\Controllers\AdminGigan\FooterController;
use App\Http\Controllers\AdminGigan\PageController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gigan-login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/gigan-login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN
Route::prefix('gigan/admin')->name('admin.gigan.')->middleware(['auth','is_admin'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //pages
    Route::resource('pages', PageController::class)->only(['index','edit','update']);

    // FOOTER
    Route::get('/footer', [FooterController::class, 'edit'])->name('footer.edit');
    Route::post('/footer', [FooterController::class, 'update'])->name('footer.update');

    //banner
    Route::resource('banner', BannerController::class);
});

