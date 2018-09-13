<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet_simple extends Model
{
    protected $table = 'Bet_simple';

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
}
