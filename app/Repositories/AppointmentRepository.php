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

    public function getAppointmentById($id) {
        return Appointment::where('id', $id)->first();
    }

    public function storeAppointment($request) {
        return Appointment::create($request);
    }

    public function updateAppointment($request, $id)
    {
        return Appointment::where('id', $id)->update($request);
    }

    public function getRandomEmployeeBySpecialty($specialty_id) {
        return Employee::where('specialty_id', $specialty_id)->inRandomOrder()->first();
    }

    public function destroyAppointment($id)
    {
        return Appointment::destroy($id);
    }
}
