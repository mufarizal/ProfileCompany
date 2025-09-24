<?php

use App\Http\Controllers\AdminGigan\BannerController;
use App\Http\Controllers\AdminGigan\DashboardController;
use App\Http\Controllers\AdminGigan\FooterController;
use App\Http\Controllers\AdminGigan\LandingPage_PartnerController;

use App\Http\Controllers\AdminGigan\ServicePage1Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Guest\LandingPageController;
use App\Http\Controllers\Guest\ServicePageController;
use Illuminate\Support\Facades\Route;

/*
-----------------------------------------------
GUEST
-----------------------------------------------
*/
// routes/web.php
Route::get('/', [LandingPageController::class, 'index'])->name('frontend.landingpage');
Route::get('/services', [ServicePageController::class,'index'])->name('frontend.services');
Route::post('/services/contact', [ServicePageController::class,'contact'])->name('services.contact');

// Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('guest.portfolio');
// Route::get('/services', [HomeController::class, 'services'])->name('guest.services');
// Route::get('/contact', [HomeController::class, 'contact'])->name('guest.contact');
/*
-----------------------------------------------
Auth
-----------------------------------------------
*/
Route::get('/gigan-login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/gigan-login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



/*
-----------------------------------------------
Admin
-----------------------------------------------
*/
Route::prefix('gigan/admin')->name('admin.gigan.')->middleware(['auth','is_admin'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // FOOTER
    Route::get('/footer', [FooterController::class, 'edit'])->name('footer.edit');
    Route::post('/footer', [FooterController::class, 'update'])->name('footer.update');

    /*
    Landing Page
    */

    Route::resource('landing-pages', LandingPage_PartnerController::class);

    Route::post('landing-pages/{landingPage}/partners', [LandingPage_PartnerController::class, 'storePartner'])->name('landing-pages.partners.store');
    Route::put('partners/{partner}', [LandingPage_PartnerController::class, 'updatePartner'])->name('partners.update');
    Route::delete('partners/{partner}', [LandingPage_PartnerController::class, 'destroyPartner'])->name('partners.destroy');

     Route::prefix('services')->group(function(){
    Route::get('/', [ServicePage1Controller::class,'index'])->name('services.index'); // index services + banner
    Route::get('/create', [ServicePage1Controller::class,'create'])->name('services.create');
    Route::post('/store', [ServicePage1Controller::class,'store'])->name('services.store');
    Route::get('/{service}/edit', [ServicePage1Controller::class,'edit'])->name('services.edit');
    Route::put('/{service}', [ServicePage1Controller::class,'update'])->name('services.update');
    Route::delete('/{service}', [ServicePage1Controller::class,'destroy'])->name('services.destroy');

    // banner update
    Route::put('/banner/{banner}', [ServicePage1Controller::class,'updateBanner'])->name('services.banner.update');

    // pengunjung messages
    Route::get('/messages', [ServicePage1Controller::class,'messages'])->name('services.messages');
});
});

