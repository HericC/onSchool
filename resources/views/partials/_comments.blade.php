@if($conteudo->tipoConteudo === 0)
@foreach ($users as $user)
@if ($user->id === $comentPostagem->autor_id)
<article class="form-row rounded bg-dark text-white ml-2 mb-1 p-2">
    <section class="col-2">
        <figure class="rounded-circle mt-1">
            <img src="storage/{{ $user->foto }}" alt="Foto do Perfil" title="Foto de Perfil de {{ $user->name }}">
        </figure>
        <span class="float-left m-0 ml-2 mt-2">{{ $user->name }}</span>
    </section>

    <hr>

    <section class="input-group col">
        <input type="text" class="form-control col" name="" id="" value="{{ $comentPostagem->descricao }}" readonly>
        <article class="input-group-append comentExcluir">
            @if ($comentPostagem->autor_id === Auth::user()->id || $turma->prof_id === Auth::user()->id)
            <a href="/conteudo/excluirComentPostagem/{{ $comentPostagem->id }}" class="btn"><span aria-hidden="true">&times;</span></a>
            @endif
        </article>
    </section>
</article>
@break
@endif
@endforeach

@elseif($conteudo->tipoConteudo === 1)
@foreach ($users as $user)
@if ($user->id === $comentAtividade->autor_id)
<article class="form-row rounded bg-dark text-white ml-2 mb-1 p-2">
    <section class="col-2">
        <figure class="rounded-circle mt-1">
            <img src="storage/{{ $user->foto }}" alt="Foto do Perfil" title="Foto de Perfil de {{ $user->name }}">
        </figure>
        <span class="float-left m-0 ml-2 mt-2">{{ $user->name }}</span>
    </section>

    <hr>

    <section class="input-group col">
        <input type="text" class="form-control" name="" id="" value="{{ $comentAtividade->descricao }}" readonly>
        <article class="input-group-append comentExcluir">
            @if ($comentAtividade->autor_id === Auth::user()->id || $turma->prof_id === Auth::user()->id)
            <a href="/conteudo/excluirComentAtividade/{{ $comentAtividade->id }}" class="btn"><span aria-hidden="true">&times;</span></a>
            @endif
        </article>
    </section>
</article>
@break
@endif
@endforeach

@else
<span>error</span>
@endif