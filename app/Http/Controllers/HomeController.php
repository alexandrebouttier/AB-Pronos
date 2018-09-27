<?php

namespace App\Http\Controllers;

use App\Bet_simple;


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
