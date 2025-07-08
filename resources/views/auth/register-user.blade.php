@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/auth/register-user.css') }}">
@endsection

@section('content')
    <div class="arrow-container">
        <div class="arrow-background">
            <a href="{{ route('patient.auth') }}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
    </div>
    <main class="main-container">
        <div class="title-container">
            <h1 class="title">Registre-se</h1>
            <h5 class="subtitle">Venha fazer parte da nossa família!</h5>
        </div>
        <form action="{{ route('patient.post') }}" method="POST">
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <label for="name" class="label">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Digite seu nome completo">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="email" class="label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu email">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="password" class="label">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="phone_number" class="label">Telefone</label>
                    <input type="tel" name="phone_number" id="phone_number" class="form-control" placeholder="Digite seu número de telefone">
                </div>
                <div class="button-container col-12 d-flex justify-content-center">
                    <button type="submit" class="button">Registrar</button>
                </div>
            </div>
        </form>
    </main>
@endsection