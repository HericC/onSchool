$(function () {
    $('.copyLink').on('click', function () {
        const inputTemp = window.document.createElement('input');
        inputTemp.value = this.value;
        document.body.appendChild(inputTemp);
        inputTemp.select();
        window.document.execCommand('copy');
        document.body.removeChild(inputTemp);
    });


    $('#navbarSearch').keyup(function () {
        const search = this.value;
        if (search !== '') {
            const request = { palavra: search }

            $.post('/user/search', request, 'json')
                .done(function (data) {
                    console.log(data);
                    $('#resultado').html(data);
                });
        } else {
            $('#resultado').html('');
        }
    });
});