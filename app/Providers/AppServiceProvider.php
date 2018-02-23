<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Teste;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menu = Teste::all()->sortBy('order')->where('parent_id', '=', null)->load('submenus');
        View::share('menu', $menu);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
