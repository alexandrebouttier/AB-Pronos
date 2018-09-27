<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Bet_simple;


class HistoryController extends Controller
{
    public function history()
    {

        $bets = Bet_simple::getAllBetsIsClosed();
        $nbBets = Bet_simple::countBetsIsClosed();
        $nbAllBets = Bet_simple::countAllBets();
        return view('pages/history', [

            'nbAllBets' => $nbAllBets,
            'nbBets' => $nbBets,
            'bets' => $bets,
        ]);
    }

}
