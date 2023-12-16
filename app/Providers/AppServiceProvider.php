<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('idnum', function ($attribute, $value, $parameters, $validator) {
            // Validate that the input consists only of numeric characters
            return preg_match('/^\d+$/', $value);
        });
    }
}
