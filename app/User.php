<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function information(){
        return $this->hasOne(UserInformation::class);
    }

    public function favorite(){
        return $this->hasOne(UsersPokemon::class,'user_id')->where('is_favorite',1);
    }


    public function like(){
        return $this->hasMany(UsersPokemon::class,'user_id')->where('is_like',1);
    }

    public function  hate(){
        return $this->hasMany(UsersPokemon::class,'user_id')->where('is_hate',1);
    }


}
