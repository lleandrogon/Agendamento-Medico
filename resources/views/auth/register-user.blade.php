@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/auth/register-user.css') }}">
@endsection

@section('content')
    <div class="register-container">
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
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="name" class="label">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Digite seu nome completo">
                        @error('name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="email" class="label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu email">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="password" class="label">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha">
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="phone_number" class="label">Telefone</label>
                        <input type="tel" name="phone_number" id="phone_number" class="form-control" placeholder="Digite seu número de telefone">
                        @error('phone_number')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="button-container col-12 d-flex justify-content-center">
                        <button type="submit" class="button">Registrar</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
@endsection