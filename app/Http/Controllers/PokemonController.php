<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PokemonRepository;

class PokemonController extends Controller
{

    private $pokemon_repo;

    public function __construct(PokemonRepository $pokemon_repo){
        $this->pokemon_repo = $pokemon_repo;
    }
    public function index(PokemonRepository $pokemon_repo,int $offset) : String{
        $pokemons = $this->pokemon_repo->fetchPokemonList($offset);

        return $pokemons;
    }

    public function getPokemon(int $pokemon_id) : String{
        $pokemon = $this->pokemon_repo->fetchPokemon($pokemon_id);

        return $pokemon;
    }

    public function getPokemonByName(string $pokemon_name) : ?String {
        $pokemon = $this->pokemon_repo->fetchPokemonByName($pokemon_name);

        return $pokemon ? $pokemon : null;
    }



}
