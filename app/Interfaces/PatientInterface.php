<?php

namespace App\Interfaces;

interface PatientInterface
{
    public function getPatients();

    public function storePatient($request);
}
