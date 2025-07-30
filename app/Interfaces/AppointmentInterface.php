<?php

namespace App\Interfaces;

interface AppointmentInterface
{
    public function getSpecialities();

    public function getAppointmentById($id);

    public function storeAppointment($request);

    public function updateAppointment($request, $id);

    public function getRandomEmployeeBySpecialty($specialty_id);

    public function destroyAppointment($id);
}
