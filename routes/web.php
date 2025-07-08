<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.path');
});

Route::prefix('paciente')->group(function() {
    Route::get('login', [AuthController::class, 'patientAuth'])->name('patient.auth');
    Route::get('registrar', [AuthController::class, 'patientRegister'])->name('patient.register');
    Route::post('registrar', [AuthController::class, 'storePatient'])->name('patient.post');
});

Route::prefix('funcionario')->group(function() {
    Route::get('login', [AuthController::class, 'employeeAuth'])->name('employee.auth');
});