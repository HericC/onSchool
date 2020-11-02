@extends('layouts.layout')

@section('content')

<section class="container card mt-5">

    <article class="card-body">
        <form action="{{ route('register') }}" method="post">
            @csrf
            
            <legend>Cadastro</legend>

            <fieldset class="form-group">
                <label for="name" class="ml-1 mt-4">Nome:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="email" class="ml-1 mt-4">E-mail:</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="password" class="ml-1 mt-4">Senha:</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="password_confirmation" class="ml-1 mt-4">Confirmar Senha:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password">
            </fieldset>

            <section class="mt-4">
                <small class="ml-3">Já tem uma Conta? <a href="{{ route('login') }}" class="">Faça o Login!</a></small>
                <button type="submit" class="btn btn-primary float-right">Cadastrar</button>
            </section>
        </form>
    </article>

</section>

@endsection