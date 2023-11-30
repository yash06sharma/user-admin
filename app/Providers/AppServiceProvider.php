<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\Models\preusersData;
use App\Models\preusersData;
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
        preusersData::observe(PreUserObserver::class);
    }
}
