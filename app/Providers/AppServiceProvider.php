<?php

namespace App\Providers;

use App\Interfaces\PatientAuthInterface;
use App\Interfaces\PatientInterface;
use App\Repositories\PatientAuthRepository;
use App\Repositories\PatientRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PatientAuthInterface::class, PatientAuthRepository::class);
        $this->app->bind(PatientInterface::class, PatientRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
