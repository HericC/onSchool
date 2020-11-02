<section class="modal fade" id="modalCriarTurma" tabindex="-1" role="dialog" aria-labelledby="modalTitleCriarTurma" aria-hidden="true">
    <article class="modal-dialog" role="document">
        <form action="" method="post" class="modal-content" id="formCriarTurma">
            @csrf

            <header class="modal-header">
                <h5 class="modal-title" id="modalTitleCriarTurma">Turma</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>

            <main class="modal-body m-0">
                <input type="text" name="nameTurma" id="nameTurma" class="form-control" placeholder="Nome da Turma" required>
            </main>

            <footer class="modal-footer">
                <button type="submit" class="btn btn-primary">Criar</button>
            </footer>
        </form>
    </article>
</section>