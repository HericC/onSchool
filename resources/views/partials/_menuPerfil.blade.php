<aside class="col-2" id="asideMenuPerfil">
    <section class="card rounded bg-light ml-3">
        <header class="card-header">
            <article class="text-center">
                <figure class="rounded-circle imgMenuPerfil">
                    <img src="storage/{{ Auth::user()->foto }}" alt="Foto do Perfil" title="Foto de Perfil de {{ Auth::user()->name }}">
                </figure>
            </article>

            <hr>

            <article>
                <ul class="p-0">
                    <li><span style="font-size: 26px">{{ Auth::user()->name }}</span></li>
                    <li><small><b>E-mail:</b><span> {{ Auth::user()->email }}</span></small></li>
                    <li><small><b>Data de Nascimento:</b><span> {{ Auth::user()->nascimento }}</span></small></li>
                    <li><small><b>Instituição:</b><span> {{ Auth::user()->instituicao }}</span></small></li>
                    <li><small><b>Curso:</b><span> {{ Auth::user()->curso }}</span></li></small>
                    <li><small><b>Cidade:</b><span> {{ Auth::user()->cidade }}</span></small></li>
                </ul>
            </article>
        </header>

        <section class="card-body">
            <article>
                <h6><b>Favoritos</b></h6>
                <ul class="pl-4">
                    <li>Lorem Ipsum</li>
                    <li>Lorem Ipsum</li>
                    <li>Lorem Ipsum</li>
                    <li>Lorem Ipsum</li>
                </ul>
            </article>
            <hr>
            <article>
                <h6><b>Atividades</b></h6>
                <ul class="pl-4">
                    <li>Lorem Ipsum</li>
                    <li>Lorem Ipsum</li>
                    <li>Lorem Ipsum</li>
                    <li>Lorem Ipsum</li>
                </ul>
            </article>
        </section>

        <footer class="card-footer text-center">
            <small>&copy; Heric Macedo Oliveira Silva</small>
        </footer>
    </section>
</aside>