<?php

    namespace App\Repositories\Contracts;

    use App\UsersPokemon;

    class UsersLikedPokemonRepository{

        private function model() : object {
            return new UsersPokemon;
        }

        public function addUsersPokemon(object $data) : void {

            self::model()->create(['user_id' => $data->user_id, 'pokemon_id' => $data->pokemon_id, 'is_like' => 1]);
        }
    }