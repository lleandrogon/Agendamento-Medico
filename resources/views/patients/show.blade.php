@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/patients/show.css') }}">
@endsection

@section('content')
    <header>
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                @auth
                    <span>Olá <span class="name">{{ Auth::user()->name }}</span></span>
                @endauth
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <ul class="d-flex mt-3">
                    <li>Agendar</li>
                    <form action="{{ route('patient.logout') }}" method="POST">
                        @csrf
                        <button type="submit">
                            <li>Logout</li>
                        </button>
                    </form>
                </ul>
            </div>
        </div>
    </header>
    <main class="main-container">
        <h2 class="table-title">Minhas Consultas</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Profissional</th>
                    <th>Especialidade</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($appointments as $appointment)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($appointment->date)) }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->specialty }}</td>
                    </tr>
                @empty
                    <p class="text-center">Não há consultas marcadas.</p>
                @endforelse
            </tbody>
        </table>
    </main>
@endsection