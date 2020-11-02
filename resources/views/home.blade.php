@extends('layouts.layout')

@section('content')

<section class="mt-4">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <article class="row">
        @include('partials._menuPerfil')
        @include('partials._conteudo')
        @include('partials._menuTurmas')
    </article>

    <article>
        <!-- <form action="#" method="post" class="card bg-dark" id="chat">
            <input type="text" class="form-control" name="" id="" placeholder="Chat">
        </form> -->
    </article>
</section>


@endsection