@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/auth/patient-reset-form.css') }}">
@endsection

@section('content')
    <div class="reset-container">
        <form action="{{ route('patient.password.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="email" class="label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="label">Senha</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="label">Confirmar Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            <div class="button-container mb-3">
                <button type="submit" class="button">Confirmar</button>
            </div>
        </form>
    </div>
@endsection