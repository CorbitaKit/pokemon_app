<?php

    namespace App\Repositories;
    use PokePHP\PokeApi;


    class PokemonRepository{
        private $pokemon_api;

        public function __construct(){
            $this->pokemon_api = new PokeApi;
        }
        public function fetchPokemonList(int $offset) : String {

            return $this->pokemon_api->resourceList('pokemon', '40', $offset);
        }

        public function fetchPokemon(int $pokemon_id) : String {
            return $this->pokemon_api->pokemon($pokemon_id);
        }

        public  function fetchPokemonByName(string $pokemon_name) : ?string {
            $pokemon = $this->pokemon_api->pokemon(strtolower($pokemon_name));

            return $pokemon ? $pokemon : null;

        }


    }
