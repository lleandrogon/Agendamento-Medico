<?php

namespace App\Repositories;

use App\Interfaces\PatientInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientRepository implements PatientInterface
{
    public function getUserAppointments() {
        $authId = Auth::id();

        return DB::select("SELECT * FROM appointments INNER JOIN employees INNER JOIN specialities WHERE user_id = $authId ORDER BY date");
    }
}
