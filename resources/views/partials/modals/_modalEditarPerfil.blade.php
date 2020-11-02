<section class="modal fade" id="modalEditarPerfil" tabindex="-1" role="dialog" aria-labelledby="modalTitleEditarPerfil" aria-hidden="true">
    <article class="modal-dialog" role="document">
        <form action="/user/editarPerfil" method="post" class="modal-content" id="formEditarPerfil" enctype="multipart/form-data">
            @csrf

            <header class="modal-header">
                <h5 class="modal-title" id="modalTitleEditarPerfil">Editar Perfil!</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>

            <main class="modal-body m-0 row">
                <section class="col-3 p-0">
                    <figure class="imgMenuPerfil">
                        <img src="storage/{{ Auth::user()->foto }}" alt="Foto de Perfil">
                    </figure>

                    <button class="btn btn-success fileUpload pl-2 pr-2">
                        <label for="uploadFoto" class="m-0">Upload File</label>
                        <input type="file" class="upload" name="uploadFoto" id="uploadFoto">
                    </button>
                </section>

                <section class="col-9 p-0">
                    <label for="editarName" class="m-0 ml-1 mr-1"><b>Nome:</b></label>
                    <input type="text" class="form-control mb-2" name="editarName" id="editarName" value="{{ Auth::user()->name }}" required>

                    <label for="editarEmail" class="m-0 ml-1 mr-1"><b>E-mail:</b></label>
                    <input type="email" class="form-control" name="editarEmail" id="editarEmail" value="{{ Auth::user()->email }}" required>
                </section>

                <section class="col-12 mt-4">
                    <label for="editarInstituicao" class="m-0 ml-1 mr-1"><b>Instituição:</b></label>
                    <input type="text" class="form-control mb-2" name="editarInstituicao" id="editarInstituicao" value="{{ Auth::user()->instituicao }}">

                    <label for="editarCurso" class="m-0 ml-1 mr-1"><b>Curso:</b></label>
                    <input type="text" class="form-control mb-2" name="editarCurso" id="editarCurso" value="{{ Auth::user()->curso }}">

                    <label for="editarCidade" class="m-0 ml-1 mr-1"><b>Cidade:</b></label>
                    <input type="text" class="form-control mb-2" name="editarCidade" id="editarCidade" value="{{ Auth::user()->cidade }}">

                    <label for="editarNascimento" class="m-0 ml-1 mr-1"><b>Data de Nascimento:</b></label>
                    <input type="date" class="form-control" name="editarNascimento" id="editarNascimento" value="{{ Auth::user()->nascimento }}">
                </section>
            </main>

            <footer class="modal-footer">
                <button type="submit" class="btn btn-primary">Aplicar Edição</button>
            </footer>
        </form>
    </article>
</section>