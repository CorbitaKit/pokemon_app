<?php

    namespace App\Repositories;

    use App\User;
    use Auth;
    class UserRepository{

        private  function model() : Object{
            return new User;
        }


        public function getUser(int $user_id) : Object{
            return self::model()->with('information','favorite','like','hate')->where('id',$user_id)->first();

        }


    }
