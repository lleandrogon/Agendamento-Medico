<?php

use App\Http\Controllers\Admin\EmployeeAuthController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientAuthController;
use App\Http\Controllers\PatientController;
use App\Http\Middleware\PatientAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.path');
});

Route::resource('patient', PatientController::class)->parameters(['' => 'paciente'])->middleware(PatientAuthMiddleware::class);

Route::prefix('paciente')->group(function() {
    Route::get('login', [PatientAuthController::class, 'patientAuth'])->name('patient.auth');
    Route::get('registrar', [PatientAuthController::class, 'patientRegister'])->name('patient.register');
    Route::get('resetar-senha', [PatientAuthController::class, 'showResetPassword'])->name('patient.reset.show');
    Route::post('paciente-email', [PatientAuthController::class, 'sendEmailResetPassword'])->name('patient.email');
    Route::post('registrar', [PatientAuthController::class, 'storePatient'])->name('patient.post');
    Route::post('login', [PatientAuthController::class, 'patientLogin'])->name('patient.login');  
    Route::post('logout', [PatientAuthController::class, 'patientLogout'])->name('patient.logout')->middleware(PatientAuthMiddleware::class);
});

Route::resource('/employee', EmployeeController::class)->parameters(['' => 'funcionario']);

Route::prefix('funcionario')->group(function() {
    Route::get('login', [EmployeeAuthController::class, 'employeeAuth'])->name('employee.auth');
    Route::get('registrar', [EmployeeAuthController::class, 'employeeRegister'])->name('employee.register');

    Route::post('login', [EmployeeAuthController::class, 'employeeLogin'])->name('employee.login');
});

Route::resource('appointment', AppointmentController::class)->middleware(PatientAuthMiddleware::class);