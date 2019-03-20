<?php

namespace App\Providers;

use App\Model\User;
use App\Models\borrow_items;
use App\Models\cart_items;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        view()->composer('*', function ($view){
            $orders = cart_items::where('user_id','=',auth()->id())->where('is_order','=',0)->get();
            $view->with('cart',count($orders));
        });

        view()->composer('*', function ($view){
            $orders = borrow_items::where('user_id','=',auth()->id())->where('status','=',0)->get();
            $view->with('borrow',count($orders));
        });

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
