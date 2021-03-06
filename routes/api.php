<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/get-pokemon-list/{offset}','PokemonController@index');
Route::get('/get-pokemon/{pokemon_id}','PokemonController@getPokemon');

Route::get('/get-user-info/{user_id}','UserController@getUser');

Route::post('/add-users-pokemon','UsersPokemonController');

Route::get('/get-pokemon-by-name/{pokemon_name}','PokemonController@getPokemonByName');


Route::post('/update-user-information','UserInformationController');

Route::get('/get-user-list/{user_id}','UserController@getUsers');
