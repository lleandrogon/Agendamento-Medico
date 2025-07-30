@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/patients/edit-appointment.css') }}">
@endsection

@section('content')
    <main>
        <a href="{{ route('patient.show', $user_id) }}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h1>Marcar Consulta</h1>
        <form action="{{ route('appointment.update', $appointment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="date" class="label">Data</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $appointment->date }}">
                @error('date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="time" class="label">Horário</label>
                <input type="time" name="time" id="time" class="form-control" value="{{ $appointment->time }}">
                @error('time')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="specialty" class="label">Especialidade</label>
                <select name="specialty" id="specialty" class="form-control">
                    @foreach ($specialities as $specialty)
                        <option value="{{ $specialty->id }}">{{ $specialty->specialty }}</option>
                    @endforeach
                </select>
                @error('specialty')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="button-container">
                <button type="submit" class="button">Remarcar</button>
            </div>
        </form>
    </main>
@endsection