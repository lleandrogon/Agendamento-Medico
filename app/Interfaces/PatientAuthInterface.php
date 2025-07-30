<?php

namespace App\Interfaces;

interface PatientAuthInterface
{
    public function storePatient($request);

    public function findByEmail($email);
}
