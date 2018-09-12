<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class HomeController extends Controller
{
    public function home(){
        $nbTipsters =User::countTipsters();
        $tipsters = User::getTeam();
        return view('pages/home', [
            'nbTipsters' => $nbTipsters,
            'tipsters' => $tipsters
        ]);
    }
  
}
