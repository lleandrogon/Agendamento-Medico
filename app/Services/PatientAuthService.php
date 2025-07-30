<?php

namespace App\Services;

use App\Interfaces\PatientAuthInterface;
use App\Mail\ResetPatientPasswordMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    public function sendEmailResetPassword($request) {
        $patient = $this->patientAuthInterface->findByEmail($request->email);

        if (!$patient) {
            return false;
        }

        $token = Str::random(60);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $patient->email],
            [
                'token' => Hash::make($token),
                'created_at' => Carbon::now()
            ]
        );

        Mail::to($patient->email)->send(new ResetPatientPasswordMail($token));

        return true;
    }

    public function patientLogout() {
        return Auth::logout();
    }
}
