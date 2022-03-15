<?php

    namespace App\Repositories;
    use App\UsersPokemon;

    class UsersPokemonRepository{

        private function model() : object {
            return  new UsersPokemon;
        }

        public  function addAsFavoritePokemon(object $data) :  void  {

            self::model()->create(['user_id' => $data->user_id, 'pokemon_id' => $data->pokemon_id, 'is_favorite' => 1]);
        }
    }
