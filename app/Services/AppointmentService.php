<?php

namespace App\Services;

use App\Interfaces\AppointmentInterface;
use Illuminate\Support\Facades\Auth;

class AppointmentService
{
    public $appointmentInterface;

    public function __construct(AppointmentInterface $appointmentInterface)
    {
        $this->appointmentInterface = $appointmentInterface;
    }

    public function getSpecialities() {
        return $this->appointmentInterface->getSpecialities();
    }

    public function storeAppointment($request) {
        $appointment = $this->mapAppointmentFormData($request);

        return $this->appointmentInterface->storeAppointment($appointment);
    }

    protected function mapAppointmentFormData($request) {
        $user_id = Auth::id();

        $employee = $this->appointmentInterface->getRandomEmployeeBySpecialty($request->specialty);

        if (!$employee) {
            throw new \Exception('Nenhum profissional disponível para essa especialidade.');
        }

        return [
            'user_id' => $user_id,
            'employee_id' => $employee->id,
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'agendada'
        ];
    }
}
