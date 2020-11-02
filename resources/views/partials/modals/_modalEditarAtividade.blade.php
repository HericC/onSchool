<section class="modal fade" id="modalEditarAtividade{{ $conteudo->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleEditarAtividade" aria-hidden="true">
    <article class="modal-dialog" role="document">
        <form action="/conteudo/editarAtividade" method="post" class="modal-content formEditarAtividade">
            @csrf

            <input type="hidden" name="id" value="{{ $conteudo->id }}" hidden>

            <header class="modal-header">
                <h5 class="modal-title" id="modalTitleEditarAtividade">Editar Atividade</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>

            <main class="modal-body m-0">
                <section class="form-group form-row">
                    <article class="col mr-3">
                        <label for="titulo" class="ml-1 mb-0">Titulo da Atividade</label>
                        <input type="text" name="editarTituloAtividade" id="editarTituloAtividade" class="form-control" value="{{ $conteudo->titulo }}" required>
                    </article>

                    <article class="col-6">
                        <label for="prazoEntrega" class="ml-1 mb-0">Prazo de Entrega</label>
                        <input type="datetime-local" name="editarPrazoEntregaAtividade" id="editarPrazoEntregaAtividade" class="form-control" value="<?php echo date('Y-m-d\TH:i:s', strtotime($conteudo->entrega)); ?>" required>
                    </article>
                </section>

                <section class="form-group">
                    <textarea class="form-control" name="editarDescricaoAtividade" id="editarDescricaoAtividade" cols="30" rows="3" required>{{ $conteudo->descricao }}</textarea>
                </section>

                <section class="row mt-3">
                    <span class="col">Arquivos adicionados</span>
                    <button class="btn p-0 col-1"><span aria-hidden="true" class="text-danger">&times;</span></button>
                </section>
            </main>

            <footer class="modal-footer">

                <button class="btn btn-success fileUpload">
                    <label for="" class="m-0">Inserir Arquivo</label>
                    <input type="file" class="upload" name="editarInserirArquivoAtividade" id="editarInserirArquivoAtividade">
                </button>

                <button type="submit" class="btn btn-primary">Editar</button>
            </footer>
        </form>
    </article>
</section>