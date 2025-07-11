<?php

namespace App\Providers;

use App\Interfaces\AppointmentInterface;
use App\Interfaces\PatientAuthInterface;
use App\Interfaces\PatientInterface;
use App\Repositories\AppointmentRepository;
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
        $this->app->bind(AppointmentInterface::class, AppointmentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
