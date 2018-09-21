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

        $nbBets= $bet_combi + $bet_simple;
       return $nbBets;
       }
   
  // Retourne le nombre total de pronostics gagnant
     public static function countBetsWin()
     {
      $bet_combi = DB::table('bet_combi')
      ->where('result', '=', "Gagné")
      ->count();

      $bet_simple = DB::table('bet_simple')
      ->where('result', '=', "Gagné")
      ->count();
      $nbBets= $bet_combi + $bet_simple;
    return $nbBets;
     }
  // Retourne le nombre total de pronostics perdu
  public static function countBetsLose()
  {
   $bet_combi = DB::table('bet_combi')
   ->where('result', '=', "Perdu")
   ->count();

   $bet_simple = DB::table('bet_simple')
   ->where('result', '=', "Perdu")
   ->count();
   $nbBets= $bet_combi + $bet_simple;
 return $nbBets;
  }

   // Retourne le nombre total de pronostics rembourser/annuler
   public static function countBetsRefund()
   {
    $bet_combi = DB::table('bet_combi')
    ->where('result', '=', "Rembourser")
    ->count();
 
    $bet_simple = DB::table('bet_simple')
    ->where('result', '=', "Rembourser")
    ->count();
    $nbBets= $bet_combi + $bet_simple;
  return $nbBets;
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
        ->select(\DB::raw('event,event_2,event_3,event_4,id,user_id,created_at,type,cost,date_event'))
        ->where('result', '=', "En attente");
        
        $bet_simple = DB::table('bet_simple')
        ->select(\DB::raw('event,null AS event_2,null AS event_3,null AS event_4,id,user_id,created_at,type,cost,date_event'))
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
 

   
}
