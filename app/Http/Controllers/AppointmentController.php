<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Services\AppointmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = Auth::id();
        $specialities = $this->appointmentService->getSpecialities();

        return view('patients.create-appointment', compact('user_id', 'specialities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentRequest $request)
    {
        $appointment = $this->appointmentService->storeAppointment($request);

        if (!$appointment) {
            return back()->with('error', 'Erro ao marcar consulta!');
        }

        $user_id = Auth::id();

        return redirect()->route('patient.show', $user_id)->with('success', 'Consulta marcada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user_id = Auth::id();
        $appointment = $this->appointmentService->getAppointmentById($id);
        $specialities = $this->appointmentService->getSpecialities();

        return view('patients.edit-appointment', compact('user_id', 'appointment', 'specialities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AppointmentRequest $request, string $id)
    {
        $this->appointmentService->updateAppointment($request, $id);

        $user_id = Auth::id();

        return redirect()->route('patient.show', $user_id)->with('success', 'Data alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->appointmentService->destroyAppointment($id);

        $user_id = Auth::id();

        return redirect()->route('patient.show', $user_id);
    }
}
