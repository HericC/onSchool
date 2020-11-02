<section class="modal fade" id="modalEditarPostagem{{ $conteudo->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleEditarPostagem" aria-hidden="true">
    <article class="modal-dialog" role="document">
        <form action="" method="post" class="modal-content formEditarPostagem">
            @csrf

            <input type="hidden" name="id" value="{{ $conteudo->id }}" hidden>

            <header class="modal-header">
                <h5 class="modal-title" id="modalTitleEditarPostagem">Editar Postagem</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>

            <main class="modal-body m-0">
                <section class="form-group">
                    <textarea class="form-control" name="editarDescricaoPostagem" id="editarDescricaoPostagem" cols="30" rows="3" required>{{ $conteudo->descricao }}</textarea>
                </section>

                <section class="row mt-3">
                    <span class="col">Arquivos adicionados</span>
                    <button class="btn p-0 col-1"><span aria-hidden="true" class="text-danger">&times;</span></button>
                </section>
            </main>

            <footer class="modal-footer">

                <button class="btn btn-success fileUpload">
                    <label for="" class="m-0">Inserir Arquivo</label>
                    <input type="file" class="upload" name="editarInserirArquivoPostagem" id="editarInserirArquivoPostagem">
                </button>

                <button type="submit" class="btn btn-primary">Editar</button>
            </footer>
        </form>
    </article>
</section>