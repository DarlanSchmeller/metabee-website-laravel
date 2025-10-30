<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;

class RateLimitServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('global', function ($request) {
            return Limit::perMinute(60)->by($request->ip());
        });

        RateLimiter::for('auth', function ($request) {
            return Limit::perMinute(10)->by($request->ip());
        });

        RateLimiter::for('message-form', function ($request) {
            return Limit::perMinute(5)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
