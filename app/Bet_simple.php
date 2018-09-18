<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bet_simple extends Model
{
    protected $table = 'Bet_simple';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Retourne le nombre de paris cloturer
    public static function countBetsIsClosed()
    {
        return Bet_simple::where('result', '<>', "En attente")->count();
    }

    // Récupere les paris cloturer "10 derniers"
    public static function getBetsIsClosed()
    {
        return Bet_simple::where('result', '<>', "En attente")->orderBy('date_event', 'desc')->take(10)->get();

    }

 
    /* public static function getIconSport()
    {
    
      
      if ($this->sport == "Football") {
          return '<img class="sport_logo" src="public/img/football.png" alt="">';
      }
       elseif ($this->sport == "Tennis") {
        return '<img class="sport_logo" src="public/img/tennis.png" alt="">';

       } 
    }*/

    public static function test(){
        $bet_combi = DB::table("bet_combi")
    ->select("bet_combi.event");
        $bet_simple = DB::table("bet_simple")
    ->select("bet_simple.event")
   
    ->unionAll($bet_combi)
    ->get();
    print_r($bet_simple);
    }
}
