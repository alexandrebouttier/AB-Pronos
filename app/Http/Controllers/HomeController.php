<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home(){
        $nbTipsters =\App\User::where('is_tipster', 1)->count();
        $tipsters = \App\User::where('is_tipster', 1)->get();
        return view('pages/home', [
            'nbTipsters' => $nbTipsters,
            'tipsters' => $tipsters
        ]);
    }
  
}
