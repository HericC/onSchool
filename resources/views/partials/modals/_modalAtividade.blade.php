<section class="modal fade" id="modalAtividade" tabindex="-1" role="dialog" aria-labelledby="modalTitleAtividade" aria-hidden="true">
    <article class="modal-dialog" role="document">
        <form action="" method="post" class="modal-content" id="formAtividade">
            @csrf

            <header class="modal-header">
                <h5 class="modal-title" id="modalTitleAtividade">Atividade</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>

            <main class="modal-body m-0">
                <section class="form-group mb-3">
                    <select name="turmaAtividade" id="turmaAtividade" class="form-control" required>
                        <option value="0" selected disabled>Selecione a Turma</option>
                        @foreach($turmas as $turma)
                        <option value="{{$turma->id}}">{{$turma->name}}</option>
                        @endforeach
                    </select>
                </section>

                <section class="form-group form-row">
                    <article class="col mr-3">
                        <label for="titulo" class="ml-1 mb-0">Titulo da Atividade</label>
                        <input type="text" name="tituloAtividade" id="tituloAtividade" class="form-control" placeholder="Titulo" required>
                    </article>

                    <article class="col-6">
                        <label for="prazoEntrega" class="ml-1 mb-0">Prazo de Entrega</label>
                        <input type="datetime-local" name="prazoEntregaAtividade" id="prazoEntregaAtividade" class="form-control" required>
                    </article>
                </section>

                <section class="form-group">
                    <textarea class="form-control" name="descricaoAtividade" id="descricaoAtividade" cols="30" rows="3" placeholder="Texto" required></textarea>
                </section>

                <section class="row mt-3">
                    <span class="col">Arquivos adicionados</span>
                    <button class="btn p-0 col-1"><span aria-hidden="true" class="text-danger">&times;</span></button>
                </section>
            </main>

            <footer class="modal-footer">

                <button class="btn btn-success fileUpload">
                    <label for="" class="m-0">Inserir Arquivo</label>
                    <input type="file" class="upload" name="inserirArquivoAtividade" id="inserirArquivoAtividade">
                </button>

                <button type="submit" class="btn btn-primary">Postar</button>
            </footer>
        </form>
    </article>
</section>