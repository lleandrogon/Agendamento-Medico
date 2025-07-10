<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;

class EmployeeAuthService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function employeeLogin($request) {
        return Auth::guard('employee')->attempt($request);
    }
}
