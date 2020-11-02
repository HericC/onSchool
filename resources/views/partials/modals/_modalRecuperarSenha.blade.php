<section class="modal fade" id="modalRecuperarSenha" tabindex="-1" role="dialog" aria-labelledby="modalTitleRecuperarSenha" aria-hidden="true">
    <article class="modal-dialog" role="document">
        <form action="#" method="post" class="modal-content">
            @csrf

            <header class="modal-header">
                <h5 class="modal-title" id="modalTitleRecuperarSenha">Redefinição de Senha!</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>

            <main class="modal-body m-0">
                <label for="recuperarSenha" class="ml-1">Informe seu E-mail:</label>
                <input type="text" name="recuperarSenha" id="recuperarSenha" class="form-control">
            </main>

            <footer class="modal-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </footer>
        </form>
    </article>
</section>