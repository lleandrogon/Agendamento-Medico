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
            <div class="login-container col-12 col-md-6">
                <form action="" method="POST">
                    <h2 class="title">Login</h2>
                    <div class="mb-3">
                        <label for="email" class="label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="label">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha">
                    </div>
                    <div class="forgot-password mb-3">
                        <div>
                            <a href="">Esqueceu a senha?</a>
                        </div>
                    </div>
                    <div class="button-container">
                        <a href="{{ route('patient.register') }}" class="register-button button">Registrar</a>
                        <button type="submit" class="button">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection