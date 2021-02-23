<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">PassionFroid</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if(Session::get('jwt'))
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Rechercher une image</a>
                </li>
                @if(Session::get('role') == 'national')
                <li class="nav-item">
                    <a class="nav-link" href="/ajout">Ajouter une image</a>
                </li>
                @endif
            </ul>
            <a href="/logout" class="text-danger">Déconnexion</a>
        </div>
        @endif
    </nav>
</header>