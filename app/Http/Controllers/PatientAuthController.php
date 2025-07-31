<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientLoginRequest;
use App\Http\Requests\PatientRequest;
use App\Http\Requests\PatientResetRequest;
use App\Services\PatientAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientAuthController extends Controller
{
    public $patientAuthService;

    public function __construct(PatientAuthService $patientAuthService) {
        $this->patientAuthService = $patientAuthService;
    }

    public function patientAuth() {
        return view('auth.patient');
    }

    public function patientRegister() {
        return view('auth.register-user');
    }

    public function storePatient(PatientRequest $request) {
        $this->patientAuthService->storePatient($request);

        return redirect()->route('patient.auth')->with('success', 'Usuário registrado com sucesso!');
    }

    public function patientLogin(PatientLoginRequest $request) {
        $isAuthenticated = $this->patientAuthService->patientLogin($request->only('email', 'password'));

        if (!$isAuthenticated) {
            return redirect()->back()->with('error', 'Email e/ou senha incorretos!');  
        }

        return redirect()->route('patient.show', Auth::user());
    }

    public function sendEmailResetPassword(Request $request) {
        $this->patientAuthService->sendEmailResetPassword($request);

        return redirect()->back()->with('success', 'Verifique seu email para redefinição de senha!');
    }

    public function showResetPassword() {
        return view('auth.patient-reset');
    }

    public function formResetPassword(Request $request) {
        $token = $request->query('token');

        return view('auth.patient-reset-form', compact('token'));
    }

    public function updatePassword(PatientResetRequest $request) {
        $result = $this->patientAuthService->updatePassword($request);

        if (!$result) {
            return redirect()->route('patient.login')->with('reset-error', 'Erro ao resetar a senha!');
        }

        return redirect()->route('patient.login')->with('reset', 'Senha resetada com sucesso!');
    }

    public function patientLogout() {
        $this->patientAuthService->patientLogout();
        
        return redirect()->route('patient.auth');
    }
}
