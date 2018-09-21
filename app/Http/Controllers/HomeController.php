<?php

namespace App\Http\Controllers;

use App\Bet_simple;

//use App\Http\Controllers\BetsController;

class HomeController extends Controller
{

    public function home()
    {

        $bets = Bet_simple::getBetsIsClosed();
        $nbBets = Bet_simple::countBetsIsClosed();
        $nbAllBets = Bet_simple::countAllBets();

        return view('pages/home', [
            'nbAllBets' => $nbAllBets,
            'nbBets' => $nbBets,
            'bets' => $bets,
        ]);
    }

}
