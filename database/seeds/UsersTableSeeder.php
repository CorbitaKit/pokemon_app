<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\UserInfromation;
use App\UserAddressInformation;
use App\UserInformation;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++){
           $new_user = new User;

           $new_user->email = Str::random(10).'@pokemon.com';
           $new_user->password = Hash::make('password');

           $new_user->save();

            self::saveUserInformation($new_user->id);
        }
    }

    private static function saveUserInformation(int $user_id) : void{
        $gender = ['Male','Female','Other'];
        $rand_number = mt_rand(1262055681,1262055681);
        $user_info = new UserInformation;

        $user_info->firstname = Str::random(10);
        $user_info->lastname = Str::random(10);
        $user_info->gender = $gender[rand(0,2)];
        $user_info->bday = date('Y-m-d',$rand_number);
        $user_info->phone = $rand_number;
        $user_info->user_id = $user_id;
        $user_info->save();
    }


}
