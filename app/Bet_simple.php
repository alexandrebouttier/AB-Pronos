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

    // Retourne le nombre total de pronostics
    public static function countAllBets()
    {
        $bet_combi = DB::table('bet_combi')
            ->count();

        $bet_simple = DB::table('bet_simple')
            ->count();

        $nbBets = $bet_combi + $bet_simple;
        return $nbBets;
    }
    // Retourne le nombres de paris selon le type "Simple" , "Combiné"
    public function countBetsForType($type)
    {
        if ($type == "Simple") {
            $table = "bet_simple";
        } elseif ($type == "Combiné") {
            $table = "bet_combi";
        }
        $nb = DB::table($table)
            ->count();
        return $nb;
    }
    // Retourne le nombres de paris selon le résultat "Gagné" , "Perdu" ,"Rembourser" "En attente"
    public static function countBetsForResult($result)
    {
        $bet_combi = DB::table('bet_combi')
            ->where('result', '=', "$result")
            ->count();

        $bet_simple = DB::table('bet_simple')
            ->where('result', '=', "$result")
            ->count();
        $nbBets = $bet_combi + $bet_simple;
        return $nbBets;
    }
    // Retourne le nombres de paris selon le sport "Football" , "Tennis"
    public function countBetsForSport($sport)
    {
        $bet_combi = DB::table('bet_combi')
            ->select(\DB::raw('sport,sport_2,sport_3,sport_4'))
            ->where('sport', '=', "$sport")
            ->where('sport_2', '=', "$sport")
            ->where('sport_3', '=', "$sport")
            ->where('sport_4', '=', "$sport")
            ->count();
        $bet_simple = DB::table('bet_simple')
            ->where('sport', '=', "$sport")
            ->count();
        $nbBets = $bet_combi + $bet_simple;
        return $nbBets;
    }

    // Retourne le nombre de paris cloturer
    public static function countBetsIsClosed()
    {
        $bet_combi = DB::table('bet_combi')
            ->where('result', '<>', "En attente")
            ->count();

        $bet_simple = DB::table('bet_simple')
            ->where('result', '<>', "En attente")
            ->count();
        $nbBets = $bet_combi + $bet_simple;
        return $nbBets;

    }

    // Récupere les paris cloturer "10 derniers"

    public static function getBetsIsClosed()
    {
        $bet_combi = DB::table('bet_combi')
            ->select(\DB::raw('event,event_2,event_3,event_4,sport,type,result,date_event,stake,cost,null AS prognosis,prognosis_1,prognosis_2,prognosis_3,prognosis_4 '))
            ->where('result', '<>', "En attente");

        $bet_simple = Bet_simple::select(\DB::raw('event,null AS event_2,null AS event_3,null AS event_4,sport,type,result,date_event,stake,cost,prognosis,null AS prognosis_1,null AS prognosis_2,null AS prognosis_3,null AS prognosis_4'))
            ->where('result', '<>', "En attente")
            ->unionAll($bet_combi)
            ->orderBy('date_event', 'DESC')
            ->take(10)
            ->get();

        return $bet_simple;
    }
    public static function getAllBetsIsClosed()
    {
        $bet_combi = DB::table('bet_combi')
            ->select(\DB::raw('event,event_2,event_3,event_4,sport,type,result,date_event,stake,cost,null AS prognosis,prognosis_1,prognosis_2,prognosis_3,prognosis_4 '))
            ->where('result', '<>', "En attente");

        $bet_simple = Bet_simple::select(\DB::raw('event,null AS event_2,null AS event_3,null AS event_4,sport,type,result,date_event,stake,cost,prognosis,null AS prognosis_1,null AS prognosis_2,null AS prognosis_3,null AS prognosis_4'))
            ->where('result', '<>', "En attente")
            ->unionAll($bet_combi)
            ->orderBy('date_event', 'DESC')
            ->simplePaginate(20);

        return $bet_simple;
    }
    // Récupere les paris en cours"
    public static function getBetsIsOpen()
    {
        $bet_combi = DB::table('bet_combi')
            ->select(\DB::raw('event,event_2,event_3,event_4,id,created_at,type,cost,date_event'))
            ->where('result', '=', "En attente");

        $bet_simple = DB::table('bet_simple')
            ->select(\DB::raw('event,null AS event_2,null AS event_3,null AS event_4,id,created_at,type,cost,date_event'))
            ->where('result', '=', "En attente")
            ->unionAll($bet_combi)
            ->orderBy('date_event', 'DESC')
            ->simplePaginate(6);
        return $bet_simple;
    }
    public static function getBet()
    {
        $id =request('id');
        $bet_combi = DB::table('bet_combi')
            ->select(\DB::raw('event,event_2,event_3,event_4,id,created_at,type,stake,cost,date_event'))
            ->where('id', '=', $id);

        $bet_simple = DB::table('bet_simple')
            ->select(\DB::raw('event,null AS event_2,null AS event_3,null AS event_4,id,created_at,type,stake,cost,date_event'))
            ->where('id', '=', $id)
            ->unionAll($bet_combi)
            ->get();
        return $bet_simple;
    }
    // Retourne l'icone du sport
    public function getIconSport()
    {
        $icon = '';
        switch ($this->sport) {
            case 'Football':
                $icon = 'football';
                break;
            case 'Tennis':
                $icon = 'tennis';
                break;
        }
        switch ($this->type) {
            case 'Combiné':
                $icon = 'combi';
                break;
        }
        return $icon;
    }

    // Retourne l'icone du résultat
    public function getIconResult()
    {
        $icon = '';
        switch ($this->result) {
            case 'Gagné':
                $icon = 'win';
                break;
            case 'Perdu':
                $icon = 'lose';
                break;
            case 'Rembourser':
                $icon = 'cancel';
                break;
        }
        return $icon;
    }
    // Retourne les gains
    public function getGains()
    {
        $result = $this->result;
        $stake = $this->stake;
        $cost = $this->cost;

        if ($result == "Gagné") {
            $gains = $stake * $cost - $stake;
        } elseif ($result == "Perdu") {
            $gains = -$stake;
        } else {
            $gains = $stake;
        }
        $gains = number_format($gains, 2);

        return $gains;
    }

    // Retourne le total des mises
    public function getStakeSum()
    {
        $bet_combi = DB::table('bet_combi')
            ->select(\DB::raw('stake'))
            ->where('result', '<>', "En attente");

        $bet_simple = Bet_simple::select(\DB::raw('stake'))
            ->where('result', '<>', "En attente")
            ->unionAll($bet_combi)
            ->sum('stake');
        return $bet_simple;
    }

    // Retourne le montant des paris perdant
    public function getLoseBetSum()
    {

        $bet_combi = DB::table('bet_combi')
            ->select(\DB::raw('stake'))
            ->where('result', '=', "Perdu");

        $bet_simple = Bet_simple::select(\DB::raw('stake'))
            ->where('result', '=', "Perdu")
            ->unionAll($bet_combi)
            ->sum('stake');
        return $bet_simple;
    }
// Retourne le montant des gains net

    public function getGainsSum()
    {

    }
    public function getRoi()
    {
        $sumStake = $this->getStakeSum();
        $sumLose = $this->getLoseBetSum();
        $sumGain = $this->getGainsSum();

    }

}
