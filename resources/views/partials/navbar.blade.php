<!-- Début Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-electro ">
    <div class="container">
        <a class="navbar-brand" href="/">ABPronostics</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url ('/') }}">Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url ('/pronostics') }}">Pronostics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url ('/#stats') }}">Stats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url ('/historique') }}">Historique</a>
                </li>

            </ul>
            @guest
                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('login') }}" role="button">Connexion</a>
                    <a class="btn btn-primary my-2 my-sm-0" href="{{ route('register') }}" role="button">Inscription</a>
        @else
        <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a>
                </div>

              </div>

        @endguest


        </div>
    </div>
    <!-- // Container -->
</nav>
<!-- // Fin Navbar -->

