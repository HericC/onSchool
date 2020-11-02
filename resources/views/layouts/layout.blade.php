<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>onSchool</title>
    <link rel="shortcut icon" href="/img/icon-home.png" type="image/x-icon">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap-4.3.1-dist/bootstrap.css">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>

    @include('partials._navbar')
    @yield('content')

    <!-- JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="/js/bootstrap-4.3.1-dist/bootstrap.js"></script>

    <!-- Ajax Jquery -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <!-- JS Personalizado -->
    <script src="js/ajax.js"></script>
    <script src="js/user.js"></script>
    <script src="js/forms.js"></script>

</body>

</html>