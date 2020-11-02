<section class="modal fade" id="modalEditarTurma{{ $turma->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleEditarTurma" aria-hidden="true">
    <article class="modal-dialog" role="document">
        <form action="" method="post" class="modal-content formEditarTurma">
            @csrf

            <input type="hidden" name="id" value="{{ $turma->id }}" hidden>

            <header class="modal-header">
                <h5 class="modal-title" id="modalTitleEditarTurma">Alterar Nome da Turma</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>

            <main class="modal-body m-0">
                <input type="text" name="editarNameTurma" id="editarNameTurma" class="form-control" value="{{ $turma->name }}" required>
            </main>

            <footer class="modal-footer">
                <button type="submit" class="btn btn-primary">Editar</button>
            </footer>
        </form>
    </article>
</section>