@extends('layouts/default')

@section('content')

<!-- Début Section lastbets table -->
<section>
    <div class="container">
        <h2 class="text-center">Historique</h2>
        <h5 class="text-center">L'historique de tous mes pronostics</h5>
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
                              <a href="pronostic/{{ $bet -> id}}"> {{str_limit($bet-> event." + ".$bet-> event_2 ,45,' ...')}}</a>
                            @elseif($bet-> event && $bet-> event_2  && $bet-> event_3)
                            <a href="pronostic/{{ $bet -> id}}"> {{str_limit($bet-> event." + ".$bet-> event_2 ."+". $bet-> event_3 ,45,' ...')}}</a>
                            @elseif($bet-> event && $bet-> event_2  && $bet-> event_3 && $bet-> event_4)
                            <a href="pronostic/{{ $bet -> id}}">{{str_limit($bet-> event." + ".$bet-> event_2 ."+". $bet-> event_3."+". $bet-> event_4  ,45,' ...')}}</a>
                            @endif
                        @else
                        <a href="pronostic/{{ $bet -> type}}/{{ $bet -> id}}">{{str_limit($bet -> event, 45, ' [...]')}}</a>
                        @endif
                    </td>
                        <td>{{ date("d/m/Y", strtotime($bet->date_event))}}</td>
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
                        Oops , Il y a aucun historique !
                    </div>
                    @endif

                </tbody>
            </table>
            <div style="margin-left:3em;">
                {{ $bets->links() }}
            </div>

        </div>
        <!-- // table-responsive -->




    </div>
    <!-- // container -->

</section>
<!-- // Fin Section lastbets table -->
@endsection
