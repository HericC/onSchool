<section class="modal fade" id="modalEntrarTurma" tabindex="-1" role="dialog" aria-labelledby="modalTitleEntrarTurma" aria-hidden="true">
    <article class="modal-dialog" role="document">
        <form action="" method="post" class="modal-content" id="formEntrarTurma">
            @csrf

            <header class="modal-header">
                <h5 class="modal-title" id="modalTitleEntrarTurma">Turma</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>

            <main class="modal-body m-0">
                <input type="text" name="linkTurma" id="linkTurma" class="form-control" placeholder="Insira o link da turma" required>
            </main>

            <footer class="modal-footer">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </footer>
        </form>
    </article>
</section>