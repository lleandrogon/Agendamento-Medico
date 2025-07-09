<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeAuthController extends Controller
{
    public function employeeAuth() {
        return view('auth.employee');
    }

    public function employeeLogin() {
        
    }
}
