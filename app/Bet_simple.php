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
     // Récupere les paris en cours"
     public static function getBetsIsOpen()
     {
        $bet_combi = DB::table('bet_combi')
        ->select(\DB::raw('event,id,user_id,created_at,type,cost,date_event'))
        ->where('result', '=', "En attente");
        
        $bet_simple = DB::table('bet_simple')
        ->select(\DB::raw('event,id,user_id,created_at,type,cost,date_event'))
        ->where('result', '=', "En attente")
        ->unionAll($bet_combi)
        ->simplePaginate(6);
        return $bet_simple;    
     }
   
 
 // Retourne l'icone du sport
    public function getIconSport()
    {
        $icon = '';
        switch ($this->sport)
        {
            case 'Football':
                $icon = 'football';
                break;
            case 'Tennis':
                $icon = 'tennis';
                break;    
        }
        switch ($this->type)
        {
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
         switch ($this->result)
         {
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
