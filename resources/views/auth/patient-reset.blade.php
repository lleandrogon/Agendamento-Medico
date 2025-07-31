@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/auth/patient-reset.css') }}">
@endsection

@section('content')
    <div class="reset-container">
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('patient.email') }}" method="POST">
            @csrf
            <label for="email" class="label">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
            <div class="button-container">
                <button type="submit" class="button">Enviar Email</button>
            </div>
        </form>
    </div>
@endsection