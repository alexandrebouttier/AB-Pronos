<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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

}
