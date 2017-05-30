<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
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
        'name',
        'email',
        'username',
        'password',
        'alliance_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the gumballs associated with the user.
     *
     * @return HasMany
     */
    public function gumballs()
    {
        return $this->hasMany('App\UserGumball', 'user_id')
            ->join('gumballs', 'gumballs.id', 'user_gumballs.gumball_id');
    }

    /**
     * Get the factions gumballs associated with the user.
     *
     * @param  $faction  integer
     *
     * @return HasMany
     */
    public function factionGumballs($faction)
    {
        return $this->hasMany('App\UserGumball', 'user_id')
            ->join('gumballs', 'gumballs.id', 'user_gumballs.gumball_id')
            ->where('gumballs.faction_id', '=', $faction);
    }
}
