<?php
    namespace App\Factory;
    use App\Repositories\Contracts\UsersFavoritePokemonRepository;
    use App\Repositories\Contracts\UsersLikedPokemonRepository;
    use App\Repositories\Contracts\UsersHatedPokemonRepository;

    class UsersPokemonFactory{

        public function initializeUsersModeToPokemon(String $mode) : object {

            if($mode === 'favorite'){
                return new UsersFavoritePokemonRepository;
            }else if($mode === 'like'){
                return new UsersLikedPokemonRepository;
            }else if($mode === 'hate'){
                return new UsersHatedPokemonRepository;
            }
        }
    }
