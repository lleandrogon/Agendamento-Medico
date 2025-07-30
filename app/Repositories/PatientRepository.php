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
            ->select(
                'appointments.id as id',
                'appointments.date as date',
                'appointments.time as time',
                'appointments.status as status',
                'employees.name as employee',
                'specialities.specialty as specialty'
            )
            ->paginate(10);
    }
}
