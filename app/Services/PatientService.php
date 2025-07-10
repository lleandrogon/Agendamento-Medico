<?php

namespace App\Services;

use App\Interfaces\PatientInterface;
use Illuminate\Support\Facades\Hash;

class PatientService
{
    public $patientInterface;

    public function __construct(PatientInterface $patientInterface)
    {
        $this->patientInterface = $patientInterface;
    }

    public function getUserAppointments() {
        return $this->patientInterface->getUserAppointments();
    }
}
