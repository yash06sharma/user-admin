<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\Models\preusersData;
use App\User;
use App\Observers\PreUserObserver;

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
        User::observe(PreUserObserver::class);
    }
}
