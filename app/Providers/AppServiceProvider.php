<?php

namespace App\Providers;
use App\Models\User;
use App\Observers\RelayStateObserver;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
{
    User::observe(RelayStateObserver::class);
}
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
    
}
