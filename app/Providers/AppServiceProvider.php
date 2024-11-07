<?php

namespace App\Providers;

use App\Models\Label;
use App\Policies\LabelPolicy;
use Illuminate\Support\Facades\Gate;
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
        if (config('app.https_force')) {
            \URL::forceScheme('https');
        }

        Gate::guessPolicyNamesUsing(function (string $modelClass) {
            return 'App\Policies\\' . class_basename($modelClass) . 'Policy';
        });
    }
}
