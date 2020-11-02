@extends('layouts.layout')

@section('content')

<section class="container card mt-5">

    <article class="card-body">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <legend>Login</legend>

            <fieldset class="form-group">
                @error('email')
                <small class="text-center" role="alert" style="display: block">
                    <strong class="ml-2 text-danger">Essas credenciais não correspondem aos nossos registros.</strong>
                </small>
                @enderror

                <label for="email" class="ml-1 mt-4">E-mail:</label>
                <input type="email" name="email" id="email" class="form-control @error('email') @enderror" value="{{ old('email') }}" autocomplete="email" required autofocus>

                <label for="password" class="ml-1 mt-4">Senha:</label>
                <input type="password" name="password" id="password" class="form-control @error('password') @enderror" autocomplete="current-password" required>

                @if (Route::has('password.request'))
                <label for="btnModalRecuperarSenha" class="ml-2 btn-link"><small>Esqueci minha senha!</small></label>
                @endif
            </fieldset>

            <section class="mt-4">
                <small class="ml-3">Não tem uma Conta? <a href="{{ route('register') }}" class="">Registre-se!</a></small>
                <button type="submit" class="btn btn-primary float-right">Entrar</button>
            </section>
        </form>

        <button data-toggle="modal" data-target="#modalRecuperarSenha" id="btnModalRecuperarSenha" hidden></button>
        @include('partials/modals/_modalRecuperarSenha')
    </article>

</section>

@endsection