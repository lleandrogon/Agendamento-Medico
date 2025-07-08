<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function patientAuth() {
        return view('auth.patient');
    }

    public function employeeAuth() {
        return view('auth.employee');
    }

    public function patientRegister() {
        return view('auth.register-user');
    }

    public function storePatient() {
        
    }
}
