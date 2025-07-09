<?php

namespace App\Repositories;

use App\Interfaces\PatientAuthInterface;
use App\Models\User;

class PatientAuthRepository implements PatientAuthInterface
{
    public function storePatient($request) {
        return User::create($request);
    }
}
