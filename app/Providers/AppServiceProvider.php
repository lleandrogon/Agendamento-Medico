<?php

namespace App\Providers;

use App\Interfaces\PatientAuthInterface;
use App\Repositories\PatientAuthRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PatientAuthInterface::class, PatientAuthRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
