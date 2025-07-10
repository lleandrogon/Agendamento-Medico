<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployeeLoginRequest;
use App\Services\Admin\EmployeeAuthService;
use Illuminate\Http\Request;

class EmployeeAuthController extends Controller
{
    public $employeeAuthService;

    public function __construct(EmployeeAuthService $employeeAuthService)
    {
        $this->employeeAuthService = $employeeAuthService;
    }

    public function employeeAuth() {
        return view('auth.employee');
    }

    public function employeeLogin(EmployeeLoginRequest $request) {
        $isAuthenticated = $this->employeeAuthService->employeeLogin($request->only('registration', 'password'));

        if (!$isAuthenticated) {
            return redirect()->back()->with('error', 'Email e/ou senha incorretos!'); 
        }

        return redirect()->route('employee.index');
    }
}
