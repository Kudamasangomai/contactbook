<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;//to avoid string errors in mysql
use Illuminate\Support\Facades\View;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;
use DB;

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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
       view()->composer('layouts.base', function ($view) 
       {
            $view->with('total_auth_contacts', $total_contacts = Contact::where('user_id', auth()->user()->id)->count());


        });

     

    }
}
