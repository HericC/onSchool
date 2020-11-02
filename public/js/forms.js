$(function () {
    $('#formPublicar').on('submit', function (event) {
        event.preventDefault();
        const $form = $(this).serialize();

        ajax("/conteudo/postarPostagem", $form, 'Postagem Publicada com Sucesso!', 'Não foi possivel realizar a publicação!');
    });

    $('#formAtividade').on('submit', function (event) {
        event.preventDefault();
        const $form = $(this).serialize();

        ajax("/conteudo/postarAtividade", $form, 'Atividade adicionada com Sucesso!', 'Não foi possivel adicionar a atividade!');
    });

    $('.formComments').on('submit', function (event) {
        event.preventDefault();
        const $form = $(this).serialize();

        ajax("/conteudo/postarComments", $form, 'Comentário publicado com Sucesso!', 'Não foi possivel publicar o comentário!');
    });

    $('.formEditarPostagem').on('submit', function (event) {
        event.preventDefault();
        const $form = $(this).serialize();

        ajax('/conteudo/editarPostagem', $form, 'Postagem editada com sucesso!', 'Não foi possivel editar a postagem!');
    });

    $('.formEditarAtividade').on('submit', function (event) {
        event.preventDefault();
        const $form = $(this).serialize();

        ajax('/conteudo/editarAtividade', $form, 'Atividade editada com sucesso!', 'Não foi possivel editar a Atividade!');
    });

    // 

    $('#formCriarTurma').on('submit', function (event) {
        event.preventDefault();
        const $form = $(this).serialize();

        ajax('/turmas/criarTurma', $form, 'Turma Registrada com Sucesso!', 'Não foi possivel registrar a turma!');
    });

    $('#formEntrarTurma').on('submit', function (event) {
        event.preventDefault();
        const $form = $(this).serialize();

        ajax('/turmas/entrarTurma', $form, 'Êxito ao entrar na turma!', 'Não foi possivel entrar na turma!');
    });

    $('.formEditarTurma').on('submit', function (event) {
        event.preventDefault();
        const $form = $(this).serialize();

        ajax('/turmas/editarTurma', $form, 'Nome da turma alterado com sucesso!', 'Não foi possivel alterar o nome da turma!');
    });
});