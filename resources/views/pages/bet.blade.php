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
                        le  <time class="entry-date published updated" datetime="2018-09-26T13:07:04+00:00">{{ date("d/m/Y à H:i", strtotime($bet->created_at))}}</time>
                    </span>

                    <div class="table-responsive-md"> Pari {{ $bet->type}} <br>
                        Résultat:{{ $bet->result}}
                         <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Match</th>
                                    <th scope="col">Sélection</th>
                                    <th scope="col">Cote</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($bet->event)
                                <tr>
                                    <td> <b>{{$bet->event}}</b> <br> {{ date("d/m/Y", strtotime($bet->date_event))}} à {{ date("H:i", strtotime($bet->hour_event))}} <br> <img class="sport_logo"
                                            src="/img/.png">
                                            {{$bet->competition}}</td>
                                    <td> <b>{{$bet->prognosis}}</b></td>
                                    <td> <b>{{$bet->cost}}</b></td>
                                </tr>
                                @endif

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
