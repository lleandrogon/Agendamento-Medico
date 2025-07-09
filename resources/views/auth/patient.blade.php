@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/components/auth/patient.css') }}">
@endsection

@section('content')
    <main class="main-container">
        <div class="row">
            <div class="image-container col-md-6 d-none d-lg-block">
                {{-- Div para implementação de background --}}
            </div>
            <div class="login-container col-12 col-lg-6">
                <form action="{{ route('patient.login') }}" method="POST">
                    @csrf
                    @if (session('success'))
                        <div class="success">{{ session('success') }}</div>
                    @endif
                    <h2 class="title">Login</h2>
                    <div class="mb-3">
                        <label for="email" class="label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu email">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="label">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha">
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="forgot-password mb-3">
                        <div>
                            <a href="">Esqueceu a senha?</a>
                        </div>
                    </div>
                    @if (session('error'))
                        <p class="error">{{ session('error') }}</p>
                    @endif
                    <div class="button-container">
                        <a href="{{ route('patient.register') }}" class="register-button button">Registrar</a>
                        <button type="submit" class="button">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection