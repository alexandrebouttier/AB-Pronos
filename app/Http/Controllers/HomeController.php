<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home(){
        $team = \App\User::where('is_tipster', 1)->get();
        return view('pages/home', [
            'team' => $team,
        ]);
    }
  
}
