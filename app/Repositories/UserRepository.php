<?php

    namespace App\Repositories;

    use App\User;
    use App\UserInformation;
    use Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    class UserRepository{

        private  function model() : Object{
            return new User;
        }


        public function getUser(int $user_id) : Object{
            return self::model()->with('information','favorite','like','hate')->where('id',$user_id)->first();

        }

        public  function registerUser(object $request) : void {
            DB::beginTransaction();
            try{

                $new_user =  self::model();

                $new_user->email = $request->email;
                $new_user->password = Hash::make($request->password);

                $new_user->save();

                self::saveUserInformation($new_user->id,$request);

                DB::commit();


            }catch(\Exception $e){
                DB::rollback();
                dd($e);
            }
        }

        private function saveUserInformation(int $user_id,object $request){

                $new_bday = date_create($request->bday);
                $new_user_info = new UserInformation;

                $new_user_info->user_id = $user_id;
                $new_user_info->phone = $request->phone_number;
                $new_user_info->gender = $request->gender;
                $new_user_info->bday = date_format($new_bday,"Y-m-d");
                $new_user_info->firstname = $request->firstname;
                $new_user_info->lastname = $request->lastname;
                $new_user_info->save();
        }


    }
