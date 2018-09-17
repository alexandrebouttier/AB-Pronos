<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bet_simple;

//use App\Http\Controllers\BetsController;

class HomeController extends Controller
{
   
    public function home()
    {
    
        $nbTipsters = User::countTipsters();
        $tipsters = User::getTeam();
        $bets = Bet_simple::getBetsIsClosed();
        $nbBets = Bet_simple:: countBetsIsClosed();
        $sport = Bet_simple::getIconSport();
        //$test = Bet_simple:: test();
      
       // $username = User::getUsername();

        return view('pages/home', [
            //'test' =>$test,
            'sport'=> $sport,
            'nbBets' => $nbBets,
            'bets' => $bets,
            'nbTipsters' => $nbTipsters,
            'tipsters' => $tipsters,
            //'username'=>$username
        ]);
    }

}
