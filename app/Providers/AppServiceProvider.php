<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

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
        // Observer wird zentral registriert
        \App\Profile::observe(\App\Observers\ProfileObserver::class);

        // Ab Laravel 8
        // Log::sharedContext([
        //     'dataId' => 123,
        // ]);
    }
}
