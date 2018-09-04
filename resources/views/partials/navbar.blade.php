<!-- Début Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">TeamBet</a>
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
                    <a class="nav-link" href="#team">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url ('/pronostics') }}">Pronostics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stats">Stats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact">Contact</a>
                </li>
            </ul>

            <a class="btn btn-primary my-2 my-sm-0" href="register" role="button">Inscription</a>
            <a class="btn btn-outline-success my-2 my-sm-0" href="login" role="button">Connexion</a>
        </div>
    </div>
    <!-- // Container -->
</nav>
<!-- // Fin Navbar -->