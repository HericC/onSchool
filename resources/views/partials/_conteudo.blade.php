<main class="p-3 col rounded bg-light">
    @include('partials/modals/_modalEditarPerfil')

    <header class="rounded bg-info p-2 mb-5">
        <section class="text-center">
            <article class="btn-group p-2" role="group">
                <button class="btn btn-light">Recentes</button>
                <button class="btn btn-light">Postagens</button>
                <button class="btn btn-light">Atividades</button>
                <button class="btn btn-light">Enquetes</button>
            </article>

            <article class="float-right p-2" role="group">
                <button class="btn btn-outline-light mr-2" data-toggle="modal" data-target="#modalEntrarTurma">Entrar numa Turma</button>
                @include('partials/modals/_modalEntrarTurma')

                <button class="btn btn-outline-light" data-toggle="modal" data-target="#modalCriarTurma">Criar Turma</button>
                @include('partials/modals/_modalCriarTurma')
            </article>
        </section>
    </header>

    <section class="p-3">
        <header class="row ml-0 mr-3 mb-2">
            <span class="col">Todos - Recentes</span>

            <button class="btn btn-success btn-sm mr-1" data-toggle="modal" data-target="#modalPublicar">Publicar</button>
            @include('partials/modals/_modalPublicar')

            @if (true)
            <button class="btn btn-success btn-sm mr-1" data-toggle="modal" data-target="#modalAtividade">Adicionar Atividade</button>
            @include('partials/modals/_modalAtividade')
            @endif

            @if (true)
            <button class="btn btn-success btn-sm">Criar Enquete</button>
            @endif
        </header>

        <section class="rounded bg-info p-3">
            @if ($conteudos)
            @foreach($conteudos as $keyConteudo => $conteudo)
            @foreach ($turmas as $turma)
            @if ($turma->id === $conteudo->turma_id)
            <article class="card mb-3">

                @if($conteudo->tipoConteudo === 0)
                @include('partials/_postagensConteudo')

                @elseif($conteudo->tipoConteudo === 1)
                @include('partials/_atividadesConteudo')

                @else
                <span>error</span>
                @endif

            </article>
            @break
            @endif
            @endforeach
            @endforeach
            @endif
        </section>
    </section>
</main>