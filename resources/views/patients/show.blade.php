@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/patients/show.css') }}">
@endsection

@section('content')
    <header>
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                @auth
                    <strong><span>Olá <span class="name">{{ Auth::user()->name }}</span>!</span></strong>
                @endauth
            </div>
            <div class="col-lg-6 d-none d-lg-flex justify-content-end align-items-center">
                <ul class="d-flex mt-3">
                    <li>
                        <a href="{{ route('appointment.create') }}">Agendar</a>
                    </li>
                    <form action="{{ route('patient.logout') }}" method="POST">
                        @csrf
                        <button type="submit">
                            <li>Logout</li>
                        </button>
                    </form>
                </ul>
            </div>
            <div class="col-6 d-flex d-lg-none justify-content-end align-items-center">
                <i onclick="navToggle()" class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div id="nav-responsive" class="nav-responsive d-none d-lg-none">
            <ul>
                <li>
                    <a href="{{ route('appointment.create') }}">Agendar</a>
                </li>
                <form action="{{ route('patient.logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        <li>
                            <a href="{{ 'patient.logout' }}">Logout</a>
                        </li>
                    </button>
                </form>
            </ul>
        </div>
    </header>
    <main class="main-container">
        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif
        
        <h2 class="table-title">Consultas</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Profissional</th>
                    <th>Especialidade</th>
                    <th>Status</th>
                    <th>Remarcar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($appointments as $appointment)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($appointment->date)) }} às {{ date('H:i', strtotime($appointment->time)) }}</td>
                        <td>{{ $appointment->employee }}</td>
                        <td>{{ $appointment->specialty }}</td>
                        <td class="status">{{ $appointment->status }}</td>
                        <td>
                            <a href="{{ route('appointment.edit', $appointment->id) }}">
                                <i class="fa-solid fa-calendar-days"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('appointment.destroy', $appointment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <p class="text-center">Não há consultas marcadas.</p>
                @endforelse
            </tbody>
        </table>

        @php
            $current = $appointments->currentPage();
            $last = $appointments->lastPage();
            $maxLinks = 5;

            $start = max($current - floor($maxLinks / 2), 1);
            $end = $start + $maxLinks - 1;

            if ($end > $last) {
                $end = $last;
                $start = max($end - $maxLinks + 1, 1);
            }
         @endphp

        <nav class="pagination-container">
            <ul class="pagination">
                <li class="page-item">
                    <a href="{{ $appointments->previousPageUrl() }}" class="page-link  {{ $appointments->onFirstPage() ? 'disabled' : '' }}">Voltar</a>
                </li>

                @for ($page = $start; $page <= $end; $page++)
                    <li class="page-item {{ $current == $page ? 'active' : '' }}">
                        <a href="{{ $appointments->url($page) }}" class="page-link">{{ $page }}</a>
                    </li>
                @endfor

                <li class="page-item">
                    <a href="{{ $appointments->nextPageUrl() }}" class="page-link {{ $appointments->hasMorePages() ? '' : 'disabled' }}">Avançar</a>
                </li>
            </ul>
        </nav>
    </main>
@endsection

<script src="{{ asset('js/components/patients/show.js') }}"></script>