<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
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
        return view('pages/bets', [
            'bets' => $bets,
            
        ]);
    }


}
