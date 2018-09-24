<?php

namespace App\Http\Controllers;

use App\Bet_simple;

class BetsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bets = Bet_simple::getBetsIsOpen();
        $nbBets =Bet_simple::countBetsForResult("En attente");
        return view('pages/bets', [
            'nbBets'=> $nbBets,
            'bets' => $bets,

        ]);
    }

}
