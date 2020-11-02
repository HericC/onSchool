<header class="navbar navbar-dark bg-primary sticky-top">
    <a href="{{ url('/home') }}" class="navbar-brand ml-5">
        <img src="/img/icon-home.png" alt="Logo" style="width: 40px">
        <span class="align-middle ml-1">onSchool</span>
    </a>

    @guest
    <section class="dropdown">
        <a href="{{ route('login') }}" class="btn btn-outline-light">Entrar</a>
        <a href="{{ route('register') }}" class="btn btn-outline-light">Registre-se</a>
    </section>
    @else
    <section action="" method="post" style="width: 60%;">
        <input type="text" class="form-control" name="navbarSearch" id="navbarSearch" placeholder="Procure outros Estudantes" required>
        <ul class="m-0 p-0 listFriends" id="resultado"></ul>
    </section>

    <section class="dropdown">
        <button type="button" class="btn border border-dark mr-4" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="img/toggle-icon.png" alt="Icone Toggle" style="width: 20px">
        </button>

        <article class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <button class="dropdown-item" data-toggle="modal" data-target="#modalEditarPerfil">Editar Perfil</button>
            <section class="dropdown-divider"></section>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="dropdown-item text-danger">Sair</button>
            </form>
        </article>
    </section>
    @endguest
</header>