<?php

namespace App\Providers;

use App\Models\Footer;
use App\Models\Page;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function($view){
        $footer = Footer::first(); // footer admin
        $view->with(compact( 'footer'));
    });
    }
}
