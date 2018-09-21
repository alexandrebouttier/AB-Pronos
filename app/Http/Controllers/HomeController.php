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
    
        $bets = Bet_simple::getBetsIsClosed();
        $nbBets = Bet_simple:: countBetsIsClosed();
        $nbAllBets = Bet_simple::countAllBets();
        $nbBetsWin= Bet_simple::countBetsWin();
        $nbBetsLose= Bet_simple::countBetsLose();
        $nbBetsRefund = Bet_simple::countBetsRefund();
    
      
      

        return view('pages/home', [
            'nbBetsRefund'=>$nbBetsRefund,
            'nbBetsLose'=>$nbBetsLose,
            'nbBetsWin' =>$nbBetsWin,
            'nbAllBets' => $nbAllBets,
            'nbBets' => $nbBets,
            'bets' => $bets,
        ]);
    }

}
