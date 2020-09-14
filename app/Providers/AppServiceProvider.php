<?php

namespace App\Providers;

use App\Sort;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // 全域變數
        view()->share('sorts',Sort::all());

    //     View::composer(
    //         'frontend.*', function($view){
    //            $view->with('sorts', Sort::all());
    //        }
    //    );

    //    view()->composer(
    //        'frontend.*',
    //        \App\Http\View\Composers\SortsComposer::class
    //    );

    }
}
