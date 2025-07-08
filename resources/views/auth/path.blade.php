@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/auth/path.css') }}">
@endsection

@section('content')
    <main class="path-container">
        <div class="row d-flex justify-content-center mt-5 mx-2">
            <a href="{{ route('patient.auth') }}" class="col-12 col-md-4">
                <div class="card-container  my-2 my-md-0">
                    <h3 class="card-title">Paciente</h3>
                    <i class="fa-solid fa-user"></i>
                </div>
            </a>
            <a href="{{ route('employee.auth') }}" class="col-12 col-md-4">
                <div class="card-container my-2 my-md-0 my-md-0">
                    <h3 class="card-title">Funcionário</h3>
                    <i class="fa-solid fa-user-doctor"></i>
                </div>
            </a>
        </div>
    </main>
@endsection