<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\Models\preusersData;
use App\Models\Preuser;
use App\Observers\PreuserObserver;

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
        Preuser::observe(PreuserObserver::class);
    }
}
