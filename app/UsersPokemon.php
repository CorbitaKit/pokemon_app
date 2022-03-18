<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersPokemon extends Model
{
    protected $fillable = ['user_id','pokemon_id','is_favorite','is_like','is_hate','pokemon_name'];
}
