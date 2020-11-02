function ajax(url, $form, msg_success, msg_error) {
    $.post(url, $form, 'json')
        .done(function (data) {
            // console.log(data);
            if (data) {
                alert(msg_success);
                window.location.reload();
            } else {
                alert(msg_error);
            }

        }).fail(function (data) {
            // console.log(data);
            if (data.status === 404) {
                alert('Erro: 404 Not Found - Destino da Requisição não Encontrada!');
            } else if (data.status === 500) {
                alert('Erro: 500 Internal Server Error - Houve um erro interno no servidor!');
            } else {
                alert('Erro Desconhecido!');
            }
        });
}