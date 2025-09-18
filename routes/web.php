<?php

use App\Http\Controllers\AdminGigan\DashboardController;
use App\Http\Controllers\AdminGigan\FooterController;
use App\Http\Controllers\AuthController;
use App\Models\FooterSetting;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gigan-login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/gigan-login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('gigan/admin')->name('admin.gigan.')->middleware(['auth','is_admin'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // FOOTER
    Route::get('/footer', [FooterController::class, 'edit'])->name('footer.edit');
    Route::post('/footer', [FooterController::class, 'update'])->name('footer.update');
});

