<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function bet_simple()
    {
        return $this->hasMany(Bet_simple::class);
    }

    // Récupere et affiche tous les tipsters
    public static function getTeam()
    {

        return User::where('is_tipster', 1)->get();

    }

    // Retourne le nombre de tipsters
    public static function countTipsters()
    {

        return User::where('is_tipster', 1)->count();
    }
    public static function getUsername($id)
    {
        return User::select('name')->where('id', '$id')->first();
    }

}
