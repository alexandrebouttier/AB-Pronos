@extends('layouts/default')

@section('content')

@include('partials/jumbotron')
<!-- Début Team -->
<section id="team">
    <div class="container">
        <h2 class="text-center">Team</h2>
        <h5 class="text-center">Notre équipe de tipsters</h5>
        <div class="row">
        @foreach ($tipsters as $tipster)
                    <div class="col-md-4">
                        <div class=" shadow wow slideInRight  card text-center animated"
                             style="width: 18rem; visibility: visible; animation-name: slideInRight;">
                            <img class="card-img center" src="img/{{ $tipster -> avatar}}">
                            <div class="card-body">
                                <h5 class="card-title text-bold">
                                {{ $tipster -> name}}
                                </h5>
                                <a href="profil?tipster={{ $tipster -> name}}" class="btn btn-outline-info my-2 my-sm-0">VOIR PROFIL & STATS</a>
                            </div>
                        </div>
                    </div>

           @endforeach
              
        </div>
        <!-- // row -->
    </div>
    <!-- // container -->

</section>
<!-- // Fin Team -->


<!-- Début Section lastbets table -->
<section>
    <div class="container">
        <h2 class="text-center">Derniers résultats</h2>
        <h5 class="text-center">Nos 10 derniers pronostics</h5>
        <div class="table-responsive wow bounceInUp">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th scope="col">Tipster</th>
                    <th></th>
                    <th scope="col">Evénement</th>
                    <th scope="col">Date</th>
                    <th scope="col">Pronostic</th>
                    <th scope="col">Côte</th>
                    <th scope="col">Mise</th>
                    <th scope="col">Gains</th>
                    <th scope="col">Résultat</th>
                </tr>
                </thead>
                <tbody>

             

                </tbody>
            </table>
        </div>
        <!-- // table-responsive -->

        <div style="margin-top:3em; margin-bottom:3em;" class="text-center">
            <a href="{{ url ('/pronostics') }}" class="btn btn-success my-2 my-sm-0 text-uppercase">Voir les pronostics en
                cours</a>
        </div>


    </div>
    <!-- // container -->

</section>
@endsection
