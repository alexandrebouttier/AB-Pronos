@extends('layouts/default')

@section('content')

@include('partials/jumbotron')

<!-- Début Section lastbets table -->
<section>
    <div class="container">
        <h2 class="text-center">Derniers résultats</h2>
        <h5 class="text-center">Mes 10 derniers pronostics</h5>
        <div class="table-responsive wow bounceInUp">
            <table class="table table-hover table-striped">
                <thead>

                <tr>
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
                        @if ($nbBets>0)
                        @foreach ($bets as $bet)
            <tr>        
                        
                        <td><img class="sport_logo" src="img/{{ $bet->getIconSport()}}.png" alt=""></td>
                        <td>{{ucfirst(str_limit($bet -> event, 45, ' [...]'))}}</td>
                        <td>{{ $bet -> date_event}}</td>
                        <td>{{ucfirst(str_limit($bet -> prognosis, 45, ' [...]'))}}</td>
                        <td>{{ $bet -> cost}}</td>
                        <td>{{ $bet -> stake}}</td>
                        <td></td>
                   
                        <td><img class="img-result" src="img/{{ $bet->getIconResult()}}.png" alt=""></td>
                    </tr>
                        @endforeach

                        @else
                        <div class="center alert alert-primary" role="alert">
                             Oops , Il y a aucun pronostics !
                         </div>
                        @endif

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

<section id="stats">
    <div class="container">
        <h2 class="text-center">Mes statistiques</h2>
        <h5 class="text-center">Mes stats de mes pronostics</h5>
    </section>
@endsection
