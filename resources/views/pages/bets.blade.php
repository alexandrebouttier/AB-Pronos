@extends('layouts/default')

@section('content')

<div class="container">
    <h2 class="text-center">Pronostics</h2>
    <div class="flex_row">
        @foreach ($bets as $bet)
                <div class="card bet_post" style="width: 300px;">

                    <div class="card-body">
                        <h5 class="card-title"> 
                            @if($bet-> type == "Combiné")
                                @if($bet-> event && $bet-> event_2 )
                                    {{str_limit($bet-> event ."+".$bet-> event_2 ,45,' [...]')}}
                                @elseif($bet-> event && $bet-> event_2  && $bet-> event_3)   
                                {{str_limit($bet-> event ."+".$bet-> event_2 ."+". $bet-> event_3 ,45,' [...]')}} 
                                @elseif($bet-> event && $bet-> event_2  && $bet-> event_3 && $bet-> event_4)   
                                {{str_limit($bet-> event ."+".$bet-> event_2 ."+". $bet-> event_3."+". $bet-> event_4  ,45,' [...]')}}        
                                @endif
                            @else 
                                {{str_limit($bet -> event, 45, ' [...]')}}
                            @endif
                            </h5>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Bet N° {{$bet-> id}}</li>
                        <li class="list-group-item">Tipster :{{$bet-> user_id}} </li>
                        <li class="list-group-item">Publié le : 
                        {{  date("m/d/Y à H:i", strtotime($bet->created_at))}}</li>
                        <li class="list-group-item">Type de pari : {{$bet-> type}}</li>
                        <li class="list-group-item">Cote du pari : {{$bet-> cost}}</li>
                        <li class="list-group-item">Date du match : {{$bet-> date_event}}</li>
                    </ul>

                    <div class="card-body text-center bg-white">
                        <a href="#" class="btn btn-info my-2 my-sm-0">Voir le pronostic</a>
                    </div>
                </div>
                @endforeach
                

            <!-- // flex_row -->  
    </div>
    {{ $bets->links() }}
    <!-- // container -->  
</div>



@endsection
