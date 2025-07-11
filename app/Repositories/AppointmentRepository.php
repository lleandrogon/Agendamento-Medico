<?php

namespace App\Repositories;

use App\Interfaces\AppointmentInterface;
use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Specialty;

class AppointmentRepository implements AppointmentInterface
{
    public function getSpecialities() {
        return Specialty::all();
    }

    public function storeAppointment($request) {
        return Appointment::create($request);
    }

    public function getRandomEmployeeBySpecialty($specialty_id) {
        return Employee::where('specialty_id', $specialty_id)->inRandomOrder()->first();
    }
}
