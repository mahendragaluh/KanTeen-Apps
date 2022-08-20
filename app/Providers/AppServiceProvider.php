<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.master', function($view){
            $view->with('cart', session()->all());
        });

        view()->composer('layouts.master', function($view){
            $view->with('total', \App\Models\Product::total());
        });
    }
}
