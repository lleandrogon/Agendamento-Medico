<?php

use App\Http\Controllers\Admin\EmployeeAuthController;
use App\Http\Controllers\PatientAuthController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.path');
});

Route::prefix('paciente')->group(function() {
    Route::get('login', [PatientAuthController::class, 'patientAuth'])->name('patient.auth');
    Route::get('registrar', [PatientAuthController::class, 'patientRegister'])->name('patient.register');
    Route::post('registrar', [PatientAuthController::class, 'storePatient'])->name('patient.post');
    Route::post('login', [PatientAuthController::class, 'patientLogin'])->name('patient.login');

    Route::get('home', [PatientController::class, 'index'])->name('patient.index');
});

Route::prefix('funcionario')->group(function() {
    Route::get('login', [EmployeeAuthController::class, 'employeeAuth'])->name('employee.auth');
    Route::get('/registrar', [EmployeeAuthController::class, 'employeeRegister'])->name('employee.register');
});