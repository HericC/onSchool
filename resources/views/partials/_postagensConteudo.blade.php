<section class="card-header">
    @foreach ($users as $user)
    @if ($user->id === $conteudo->autor_id)
    <figure class="rounded-circle">
        <img src="storage/{{ $user->foto }}" alt="Foto do Perfil">
    </figure>
    <span class="float-left m-0 ml-2 mt-1">{{ $user->name }}</span>
    @break
    @endif
    @endforeach
</section>

<section class="card-body">
    <section>
        <p class="text-secondary"><small>{{ $turma->name }} - Postado em {{ $conteudo->created_at }}</small></p>

        <p>{{$conteudo->descricao}}</p>
    </section>

    <section>
        <article class="btn-group-sm text-right" role="group">

            @if ($conteudo->autor_id === Auth::user()->id || $turma->prof_id === Auth::user()->id)
            <button class="btn btn-success" data-toggle="modal" data-target="#modalEditarPostagem{{ $conteudo->id }}">Editar</button>
            <a href="/conteudo/excluirPostagem/{{$conteudo->id}}" class="btn btn-danger">Excluir</a>
            @endif

        </article>
        @include('partials/modals/_modalEditarPostagem')
    </section>
</section>

<footer class="card-footer">
    <section>
        <h4>Comentários</h4>

        @foreach($comentsPostagems as $comentPostagem)
        @if ($comentPostagem->postagem_id === $conteudo->id )
        @include('partials/_comments')
        @endif
        @endforeach

        <section>
            <form action="" method="post" class="input-group ml-1 formComments">
                <input type="text" class="form-control" name="comments" id="comments" placeholder="Comentar" required>
                <input type="hidden" name="turmaComments" value="{{ $conteudo->id }}" hidden>
                <input type="hidden" name="tipoConteudoComments" value="{{ $conteudo->tipoConteudo }}" hidden>

                <section class="input-group-append">
                    <button type="submit" class="btn btn-primary" id="btnComments">Enviar</button>
                </section>
            </form>
        </section>
    </section>
</footer>