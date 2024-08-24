@extends('site.layout')
@section('title', 'Login')
@section('conteudo')
    <div class="row container">
        @if ($mensagem = Session::get('erro'))
            <div class="card red accent-4">
                <div class="card-content white-text">
                    <span class="card-title">Erro!</span>
                    <p>{{ $mensagem }}</p>
                </div>
            </div>
        @endif

        <div class="col s12 m12">
            <div class="">
                <form action="{{ route('login.auth') }}" method="POST">
                    @csrf
                    <div class="center-align">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email">
                    </div>
                    <div class="center-align">
                        <label for="password">Senha:</label>
                        <input type="password" name="password">
                    </div>
                    <div class="center-align">
                        <button class="btn waves-effect waves-light green center-align" type="submit">Entrar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
