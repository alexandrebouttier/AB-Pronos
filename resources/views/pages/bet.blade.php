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

                    <a style="margin-top:1em; margin-bottom:1em;" href="/pronostics" class="btn btn-info">RETOUR</a>
                    <br>
                    <span class="posted-on text-bold">Publié
                        le  <time class="entry-date published updated" datetime="2018-09-26T13:07:04+00:00">{{ date("d/m/Y à H:i", strtotime($bet->created_at))}}</time> - {{ $bet->type}}
                    </span>

                    <div class="table-responsive-md">
                      <img style="margin-top:1em; margin-bottom:1em;" class="img-result" src="/img/{{ $bet->getIconResult()}}.png" alt="">
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
                                    <td> <b>{{$bet->event}}</b> <br> {{ date("d/m/Y", strtotime($bet->date_event))}} à {{ date("H:i", strtotime($bet->hour_event))}} <br>
                                        @if($bet->sport == "Football")
                                        <img class="sport_logo" src="/img/football.png" alt="">
                                        @elseif($bet->sport == "Tennis")
                                        <img class="sport_logo" src="/img/tennis.png" alt="">
                                        @endif
                                            {{$bet->competition}}</td>
                                    <td>
                                        <b>
                                            @if($bet->type == "Simple")
                                                {{$bet->prognosis}}
                                            @elseif($bet->type == "Combiné")
                                                {{$bet->prognosis_1}}
                                            @endif
                                       </b></td>
                                    <td> <b>
                                            @if($bet->type == "Simple")
                                            {{$bet->cost}}
                                        @elseif($bet->type == "Combiné")
                                        {{$bet->cost_1}}
                                        @endif

                                    </b></td>
                                </tr>
                                @endif

                                @if ($bet->event_2)
                                <tr>
                                    <td> <b>{{$bet->event_2}}</b> <br> {{ date("d/m/Y", strtotime($bet->date_event_2))}} à {{ date("H:i", strtotime($bet->hour_event_2))}} <br>
                                        @if($bet->sport == "Football")
                                        <img class="sport_logo" src="/img/football.png" alt="">
                                        @elseif($bet->sport == "Tennis")
                                        <img class="sport_logo" src="/img/tennis.png" alt="">
                                        @endif
                                            {{$bet->competition_2}}</td>
                                    <td> <b>{{$bet->prognosis_2}}</b></td>
                                    <td> <b>{{$bet->cost_2}}</b></td>
                                </tr>
                                @endif

                                @if ($bet->event_3)
                                <tr>
                                    <td> <b>{{$bet->event_2}}</b> <br> {{ date("d/m/Y", strtotime($bet->date_event_2))}} à {{ date("H:i", strtotime($bet->hour_event_2))}} <br>
                                        @if($bet->sport_2 == "Football")
                                        <img class="sport_logo" src="/img/football.png" alt="">
                                        @elseif($bet->sport_3 == "Tennis")
                                        <img class="sport_logo" src="/img/tennis.png" alt="">
                                        @endif
                                            {{$bet->competition_2}}</td>
                                    <td> <b>{{$bet->prognosis_2}}</b></td>
                                    <td> <b>{{$bet->cost_2}}</b></td>
                                </tr>
                                @endif

                                @if ($bet->event_4)
                                <tr>
                                    <td> <b>{{$bet->event_2}}</b> <br> {{ date("d/m/Y", strtotime($bet->date_event_2))}} à {{ date("H:i", strtotime($bet->hour_event_2))}} <br>
                                        @if($bet->sport_4 == "Football")
                                        <img class="sport_logo" src="/img/football.png" alt="">
                                        @elseif($bet->sport_4 == "Tennis")
                                        <img class="sport_logo" src="/img/tennis.png" alt="">
                                        @endif
                                            {{$bet->competition_2}}</td>
                                    <td> <b>{{$bet->prognosis_2}}</b></td>
                                    <td> <b>{{$bet->cost_2}}</b></td>
                                </tr>
                                @endif

                            </tbody>
                        </table>

                        <span> Cote totale : {{ $bet->cost}}</span>
                        <br>
                        <span>Mise totale : {{ $bet->stake }}€ </span>
                        <br>
                            @if($bet->result == "Gagné")
                                <span class="green text-bold">Bénéfice: +{{ $bet->getGains()}}€</span>
                                @elseif($bet->result == "Perdu")
                                <span class="red text-bold">Perte: {{ $bet->getGains()}}€</span>
                            @elseif($bet->result == "Rembourser")
                                <span class="text-bold">Bénéfice: {{ $bet->getGains()}}€</span>
                            @elseif($bet->result == "En attente")
                                <span class="text-bold">Bénéfice potentiel: +{{ $bet->getGains()}}€</span>
                        @endif

                    </div>

                    <div style="margin-top:1em;"class="pub text-center">
                            <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='728' height='90' src="https://wlbetclicfr.adsrv.eacdn.com/I.ashx?btag=a_2738b_694c_&affid=1931&siteid=2738&adid=694&c=" ></iframe>
                    </div>

                </div>
                @endforeach


            </div>
        </div>
    </div>

</section>


@endsection
