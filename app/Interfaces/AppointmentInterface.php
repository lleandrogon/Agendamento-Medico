<?php

namespace App\Interfaces;

interface AppointmentInterface
{
    public function getSpecialities();

    public function storeAppointment($request);

    public function getRandomEmployeeBySpecialty($specialty_id);
}
