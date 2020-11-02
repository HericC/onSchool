<section class="modal fade" id="modalPublicar" tabindex="-1" role="dialog" aria-labelledby="modalTitlePublicar" aria-hidden="true">
    <article class="modal-dialog" role="document">
        <form action="" method="post" class="modal-content" id="formPublicar">
            @csrf

            <header class="modal-header">
                <h5 class="modal-title" id="modalTitlePublicar">Postagem</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>

            <main class="modal-body m-0">
                <section class="form-group mb-3">
                    <select name="turmaPostagem" id="turmaPostagem" class="form-control" required>
                        <option value="null" selected disabled>Selecione a Turma</option>
                        @foreach($turmas as $turma)
                        <option value="{{$turma->id}}">{{$turma->name}}</option>
                        @endforeach
                    </select>
                </section>

                <section class="form-group">
                    <textarea class="form-control" name="descricaoPostagem" id="descricaoPostagem" cols="30" rows="3" placeholder="Texto" required></textarea>
                </section>

                <section class="row mt-3">
                    <span class="col">Arquivos adicionados</span>
                    <button class="btn p-0 col-1"><span aria-hidden="true" class="text-danger">&times;</span></button>
                </section>
            </main>

            <footer class="modal-footer">

                <button class="btn btn-success fileUpload">
                    <label for="" class="m-0">Inserir Arquivo</label>
                    <input type="file" class="upload" name="inserirArquivoPostagem" id="inserirArquivoPostagem">
                </button>

                <button type="submit" class="btn btn-primary">Postar</button>
            </footer>
        </form>
    </article>
</section>