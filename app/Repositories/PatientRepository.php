<?php

namespace App\Repositories;

use App\Interfaces\PatientInterface;
use App\Models\User;

class PatientRepository implements PatientInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getPatients() {
        return User::all();
    }

    public function storePatient($request) {
        return User::create($request);
    }
}
