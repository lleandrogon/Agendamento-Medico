<?php

namespace App\Services;

use App\Interfaces\PatientAuthInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientAuthService
{
    public $patientAuthInterface;

    public function __construct(PatientAuthInterface $patientAuthInterface)
    {
        $this->patientAuthInterface = $patientAuthInterface;
    }

    public function storePatient($request) {
        $patient = $this->mapPatientFormData($request);

        return $this->patientAuthInterface->storePatient($patient);
    }

    protected function mapPatientFormData($request) {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'phone_number' => $request->phone_number
        ];
    }

    public function patientLogin($request) {
        return Auth::attempt($request);
    }
}
