<?php

namespace App\Providers;

use App\Observers\LogsObserver;
use App\Models\Logs;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
    public function boot(): void
    {
        Logs::observe(LogsObserver::class);
    }
}
