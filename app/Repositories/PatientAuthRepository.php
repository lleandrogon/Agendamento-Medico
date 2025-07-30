<?php

namespace App\Repositories;

use App\Interfaces\PatientAuthInterface;
use App\Models\User;

class PatientAuthRepository implements PatientAuthInterface
{
    public function storePatient($request) {
        return User::create($request);
    }

    public function findByEmail($email) {
        return User::where('email', $email)->first();
    }
}
