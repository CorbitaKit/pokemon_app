<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Factory\UsersPokemonFactory;

class UsersPokemonController extends Controller
{


    public  function __invoke(Request $request) :  object{

        $users_pokemon_factory = new UsersPokemonFactory;

        $mode = $users_pokemon_factory->initializeUsersModeToPokemon($request->mode);

        $mode->addUsersPokemon($request);

        return response('created',201);
    }

}
