<?php

    namespace App\Repositories\Contracts;

    use App\UsersPokemon;

    class UsersHatedPokemonRepository{

        private function model() : object {
            return new UsersPokemon;
        }

        public function addUsersPokemon(object $data) : void {

            self::model()->create(['user_id' => $data->user_id, 'pokemon_id' => $data->pokemon_id, 'pokemon_name' => $data->pokemon_name, 'is_hate' => 1]);
        }
    }
