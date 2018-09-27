<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bet_simple;
class BetController extends Controller
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
        $bets = Bet_simple::getBet();
        return view('pages/bet',[
            'type' => request('type'),
            'id' => request('id'),
            'bets' => $bets,
        ]);
    }
}


