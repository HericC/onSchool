<button class="card-header btn btn-light" data-toggle="collapse" data-target="#collapseAtividades{{ $conteudo->id }}" aria-expanded="false" aria-controls="collapseAtividades">
    <figure>
        <img src="img/icon-atividades.png" alt="Icone Atividades">
    </figure>
    <span class="float-left m-0 ml-2 mt-1">{{ $conteudo->titulo }}</span>

    @if (false)
    <span class="float-right ml-5 text-success">Entregue</span>
    @elseif (false)
    <span class="float-right ml-5 text-success">Entregue com Atraso</span>
    @else
    <span class="float-right ml-5 text-secondary">Prazo de Entrega: {{ $conteudo->entrega }}</span>
    @endif
</button>

<section class="collapse" id="collapseAtividades{{ $conteudo->id }}">
    <article class="card-body">
        <section>
            <p class="text-secondary"><small>{{ $turma->name }} - Postado em {{ $conteudo->created_at }}</small></p>

            <p>{{ $conteudo->descricao }}</p>
        </section>

        <section>
            <article class="btn-group-sm text-right" role="group">

                @if ($turma->prof_id !== Auth::user()->id)
                <button class="btn btn-success fileUpload">
                    <label for="" class="m-0">Entregar Atividade</label>
                    <input type="file" class="upload" name="entregarAtividade" id="entregarAtividade">
                </button>
                @else
                <button class="btn btn-success" data-toggle="modal" data-target="#modalEditarAtividade{{ $conteudo->id }}">Editar</button>
                <a href="/conteudo/excluirAtividade/{{$conteudo->id}}" class="btn btn-danger">Excluir</a>
                @endif
            </article>
            @include('partials/modals/_modalEditarAtividade')
        </section>
    </article>

    <footer class="card-footer">
        <section>
            <h4>Comentários</h4>

            @foreach($comentsAtividades as $comentAtividade)
            @if ($comentAtividade->atividade_id === $conteudo->id )
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
</section>