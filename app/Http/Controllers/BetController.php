<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bet_simple;
class BetController extends Controller
{
    public function index()
    {
        $bets = Bet_simple::getBet();
        return view('pages/bet',[
            'id' => request('id'),
            'bets' => $bets,
        ]);
    }
}


