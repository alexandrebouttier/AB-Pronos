<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bet_simple;
class BetController extends Controller
{
    public function index()
    {
        return view('pages/bet');
    }
}
