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
        //$test = Bet_simple:: test();
      
      

        return view('pages/home', [
            //'test' =>$test,
            'nbBets' => $nbBets,
            'bets' => $bets,
            'nbTipsters' => $nbTipsters,
            'tipsters' => $tipsters,
        ]);
    }

}
