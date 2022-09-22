<?php

namespace App\Providers;

use App\Http\Controllers\SmsCenterController;
use Illuminate\Support\ServiceProvider;

class SmsCenterProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SmsCenterController::class, function ($app) {
            return new SmsCenterController();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
