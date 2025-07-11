<?php

namespace App\Repositories;

use App\Interfaces\PatientInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientRepository implements PatientInterface
{
    public function getUserAppointments() {
        return DB::table('appointments')
            ->join('employees', 'appointments.employee_id', '=', 'employees.id')
            ->join('specialities', 'employees.specialty_id', '=', 'specialities.id')
            ->where('appointments.user_id', Auth::id())
            ->orderByDesc('appointments.date')
            ->paginate(10);
    }
}
