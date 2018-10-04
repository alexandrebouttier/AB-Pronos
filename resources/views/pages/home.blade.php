@extends('layouts/default')

@section('content')

@include('partials/jumbotron')

<!--
<section id="whychoose">
    <div class="container">
        <h2 class="text-center">Pourquoi choisir ABPronos ?</h2>
        <h5 class="text-center">Les bonnes raisons de me suivre</h5>
        <div class="row">
            <div class="col-md-4">
                <div class="bloc"> <img class="img-fluid" src="img/vip.png">
                    <p>Accédez gratuitement à mes pronostics</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bloc"> <img class="img-fluid" src="img/mail.png">
                    <p>Recevez un e-mail à chaque nouveau pronostic</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bloc"> <img class="img-fluid" src="img/stats.png">
                    <p>Accéder à tout l'historique des pronostics publié ainsi que mes statistiques</p>
                </div>
            </div>
        </div>
    </div>
</section>
 -->

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
                        <th scope="col">Profit</th>
                        <th scope="col">Résultat</th>
                    </tr>

                </thead>
                <tbody>
                    @if ($nbBets>0)
                    @foreach ($bets as $bet)
                    <tr>

                        <td><img class="sport_logo" src="img/{{ $bet->getIconSport()}}.png" alt=""></td>
                        <td>
                            @if($bet-> type == "Combiné")
                                 @if($bet-> event && $bet-> event_2 )
                                 <a href="pronostic/{{ $bet -> type}}/{{ $bet -> id}}">{{str_limit($bet-> event." + ".$bet-> event_2 ,45,' ...')}}</a>
                            @elseif($bet-> event && $bet-> event_2  && $bet-> event_3)
                            <a href="pronostic/{{ $bet -> type}}/{{ $bet -> id}}"> {{str_limit($bet-> event." + ".$bet-> event_2 ."+". $bet-> event_3 ,45,' ...')}}</a>
                            @elseif($bet-> event && $bet-> event_2  && $bet-> event_3 && $bet-> event_4)
                            <a href="pronostic/{{ $bet -> type}}/{{ $bet -> id}}">{{str_limit($bet-> event." + ".$bet-> event_2 ."+". $bet-> event_3."+". $bet-> event_4  ,45,' ...')}}</a>
                            @endif
                        @else
                            <a href="pronostic/{{ $bet -> type}}/{{ $bet -> id}}">{{str_limit($bet -> event, 45, ' [...]')}}</a>
                        @endif
                    </td>

                        <td>{{date("d/m/Y",strtotime($bet->date_event))}}</td>
                        <td>
                                @if($bet-> type == "Combiné")
                                @if($bet-> event && $bet-> event_2 )
                               {{str_limit($bet-> prognosis_1." + ".$bet-> prognosis_2 ,45,'...')}}
                           @elseif($bet-> event && $bet-> event_2  && $bet-> event_3)
                           {{str_limit($bet-> prognosis_1." + ".$bet-> prognosis_2 ."+". $bet-> prognosis_3 ,45,' ...')}}
                           @elseif($bet-> event && $bet-> event_2  && $bet-> event_3 && $bet-> event_4)
                           {{str_limit($bet-> prognosis_1." + ".$bet-> prognosis_2 ."+". $bet-> prognosis_3."+". $bet-> prognosis_4  ,45,' ...')}}
                           @endif
                       @else
                           {{str_limit($bet -> prognosis, 45, '...')}}
                       @endif
                           </td>
                        <td>{{ $bet -> cost}}</td>
                        <td>{{ $bet -> stake}}</td>
                        <td>{{ $bet->getGains()}}</td>

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
        <div style="margin-top:3em; margin-bottom:1em;" class="text-center">
            <a href="{{ url ('/historique') }}" class="btn btn-info my-2 my-sm-0 text-uppercase">Accéder à l'historique complet</a>
        </div>
        <p class="text-center text-bold">OU</p>
        <div style="margin-top:1em; margin-bottom:3em;" class="text-center">
            <a href="{{ url ('/pronostics') }}" class="btn btn-success my-2 my-sm-0 text-uppercase">Voir les pronostics
                en
                cours</a>
        </div>


    </div>
    <!-- // container -->

</section>
<!-- // Fin Section lastbets table -->
<div style="margin-top:1em;"class="pub text-center">
        <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='728' height='90' src="https://wlbetclicfr.adsrv.eacdn.com/I.ashx?btag=a_2738b_694c_&affid=1931&siteid=2738&adid=694&c=" ></iframe>
</div>

<!-- Début Section stats -->
<section id="stats">
    <div class="container">
        <h2 class="text-center">Statistiques</h2>
        <p>{{ $bet->getRoi()}}</p>
        <h5 class="text-center">Mes stats de mes pronostics</h5>
        <div class="row">
            <div class="col-md-4">
                <div id="stats_reussite" class="shadow" style="min-width:300px; max-width: 350px; height: 350px;  margin: 0 auto; margin-bottom:2em;"></div>
            </div>
            <div class="col-md-4">
                <div id="type_pari" class="shadow" style="min-width:300px; max-width: 350px; height: 350px;  margin: 0 auto; margin-bottom:2em;"></div>
            </div>
            <div class="col-md-4">
                <div id="stats_sport" class="shadow" style="min-width:300px; max-width: 350px; height: 350px;  margin: 0 auto; margin-bottom:2em;"></div>
            </div>
        </div>
</section>

<!-- // Fin Section stats -->
@guest
<!-- Début Section ads_subscription -->
<section id="ads_subscription">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <img src="img/vip.png" alt="">
            </div>

            <div class="col-md-6">
                <h2>Inscription 100% gratuite</h2>
                <p>Vous n'avez absolument rien à payer au moment de votre inscription.<br> Un simple formulaire
                    d'inscription et le tour est joué !<br> Que demander de mieux ?
                </p>
                <a href="{{ url ('/register') }}" class="btn btn-success my-2 my-sm-0 text-uppercase">S'inscrire</a>
            </div>
        </div>
    </div>

</section>
<!-- // Fin Section ads_subscription -->
@endguest


<div class="container">
<h2 class="text-center">Derniers Tweets</h2>
<h5 class="text-center">Mes derniers Tweets</h5>
<div class="row">
        <div class="col-md-12 text-center">
                <a style="margin: 0 auto;" class="twitter-timeline text-center" data-lang="fr" data-width="600" data-height="600" data-theme="light" href="https://twitter.com/AB_Pronostics?ref_src=twsrc%5Etfw">Tweets by AB_Pronostics</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</div>


</div>


</div>



<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script>
    Highcharts.chart('stats_reussite', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Taux de réussite pour {{ $nbAllBets}}  pronostics'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Taux',
            colorByPoint: true,
            data: [{
                name: 'Paris gagnants',
                y:   {{$bet->countBetsForResult("Gagné")}},
                sliced: true,
                color: '#2ecc71',
                selected: true
            }, {
                color: '#e74c3c',
                name: 'Paris perdants',
                y: {{$bet->countBetsForResult("Perdu")}}
            },
                {
                    color: 'orange',
                    name: 'Paris rembourser/annuler',
                    y:  {{$bet->countBetsForResult("Rembourser")}}
                }]
        }]
    });
    Highcharts.chart('stats_sport', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Sports les plus joué'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Taux',
            colorByPoint: true,
            data: [
                {
                    color: '#27ae60',
                    name: 'Football',
                    y: {{$bet->countBetsForSport("Football")}}
                },
                {
                    color: '#f1c40f',
                    name: 'Tennis',
                    y: {{$bet->countBetsForSport("Tennis")}}
                }]
        }]
    });
    Highcharts.chart('type_pari', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        }, credits: {
            enabled: false
        },
        title: {
            text: 'Types de paris'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Taux',
            colorByPoint: true,
            data: [
                {
                    color: '#2c3e50',
                    name: 'Combiné',
                    y:  {{$bet->countBetsForType("Combiné")}}
                },
                {
                    color: '#2980b9',
                    name: 'Simple',
                    y:  {{$bet->countBetsForType("Simple")}}
                }]
        }]
    });
</script>
@endsection
