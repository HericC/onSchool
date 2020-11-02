<aside class="col-2" id="asideMenuTurmas">
    <section class="container pt-1 pb-1 rounded bg-light mr-3 mb-3">
        <h3 class="ml-2 pt-2">Turmas</h3>

        <ul class="p-0" id="listTurmas">
            <li class="btn-group mb-2">
                <button type="button" class="btn btn-dark btnTurmas">Mostrar Todos</button>
            </li>

            @if ($turmas)
            @foreach ($turmas as $turma)
            <li class="btn-group mb-2">
                <button type="button" class="btn btn-info btnTurmas" title="{{ $turma->name }}">{{$turma->name}}</button>
                <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

                <section class="dropdown-menu" id="menuTurmas">
                    @if (Auth::user()->id === $turma->prof_id)
                    <button class="dropdown-item" data-toggle="modal" data-target="#modalEditarTurma{{ $turma->id }}">Alterar Nome</button>
                    @endif
                    <button class="dropdown-item copyLink" value="{{ $turma->link }}">Copiar Link de Convite</button>
                    <section class="dropdown-divider"></section>
                    <a href="/turmas/sairTurma/{{ $turma->id }}" class="dropdown-item text-danger">Sair da Turma</a>
                </section>
                @include('partials/modals/_modalEditarTurma')
            </li>
            @endforeach
            @endif
        </ul>

    </section>

    <section class="container pt-1 pb-1 rounded bg-light mr-3">
        <h3 class="ml-2 pt-2">Amigos</h3>

        <ul class="p-0 listFriends">
            <li class="p-2 mb-2 rounded">
                <figure class="rounded-circle mt-1">
                    <img src="img/icon-default.png" alt="Foto do Perfil" title="Foto de Perfil de Anônimo">
                </figure>
                <span class="float-left m-0 ml-2 mt-2">Anônimo</span>

                @if (true)
                <small class="float-right mt-2 text-success">Online</small>
                @else
                <small class="float-right mt-2 text-secondary">Offline</small>
                @endif
            </li>

            <li class="p-2 mb-2 rounded">
                <figure class="rounded-circle mt-1">
                    <img src="img/icon-default.png" alt="Foto do Perfil" title="Foto de Perfil de Anônimo">
                </figure>
                <span class="float-left m-0 ml-2 mt-2">Anônimo</span>

                @if (true)
                <small class="float-right mt-2 text-success">Online</small>
                @else
                <small class="float-right mt-2 text-secondary">Offline</small>
                @endif
            </li>

            <li class="p-2 mb-2 rounded">
                <figure class="rounded-circle mt-1">
                    <img src="img/icon-default.png" alt="Foto do Perfil" title="Foto de Perfil de Anônimo">
                </figure>
                <span class="float-left m-0 ml-2 mt-2">Anônimo</span>

                @if (false)
                <small class="float-right mt-2 text-success">Online</small>
                @else
                <small class="float-right mt-2 text-secondary">Offline</small>
                @endif
            </li>

            <li class="p-2 mb-2 rounded">
                <figure class="rounded-circle mt-1">
                    <img src="img/icon-default.png" alt="Foto do Perfil" title="Foto de Perfil de Anônimo">
                </figure>
                <span class="float-left m-0 ml-2 mt-2">Anônimo</span>

                @if (false)
                <small class="float-right mt-2 text-success">Online</small>
                @else
                <small class="float-right mt-2 text-secondary">Offline</small>
                @endif
            </li>
        </ul>
    </section>
</aside>