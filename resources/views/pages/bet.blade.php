@extends('layouts/default')

@section('content')

<div class="container">
    <h2 class="text-center">Pronostic N°{{$id}}</h2>
</div>

<section>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                    @foreach ($bets as $bet)
                <div class="bet">

                    <a href="/pronostics" class="btn btn-info">RETOUR</a>
                    <br>
                    <span class="posted-on">Publié
                        le  <time class="entry-date published updated" datetime="2018-09-26T13:07:04+00:00">{{ date("m/d/Y à H:i", strtotime($bet->created_at))}}</time>
                    </span>

                    <div class="table-responsive-md"> Pari {{ $bet->type}} <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Match</th>
                                    <th scope="col">Sélection</th>
                                    <th scope="col">Cote</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td> <b> Paris SG - Reims</b> <br> 26/09/2018 à 21H00 <br> <img class="sport_logo"
                                            src="/img/.png">
                                        France, Ligue 1 Conforama</td>
                                    <td> <b>Paris SG gagne de 2 ou +</b></td>
                                    <td> <b>1.32</b></td>
                                </tr>
                                <tr>
                                    <td> <b> Leganes - FC Barcelone</b> <br> 26/09/2018 à 21H00 <br> <img class="sport_logo"
                                            src="https://www.teambet.fr/wp-content/themes/teambet/img/football.png">
                                        Espagne, Liga</td>
                                    <td> <b>Résultat du match FC Barcelone</b></td>
                                    <td> <b>1.20</b></td>
                                </tr>
                            </tbody>
                        </table>

                        <span> Cote totale : {{ $bet->cost}}</span>
                        <br>
                        <span>Mise totale : {{ $bet->stake }}€ </span>
                        <br>
                        <span> Gains potentiels : 5.80 €</span>

                    </div>


                </div>
                @endforeach

            </div>
        </div>
    </div>

</section>


@endsection
