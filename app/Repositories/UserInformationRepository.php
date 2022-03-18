<?php

    namespace App\Repositories;

    use App\UserInformation;

    class UserInformationRepository{

        private function model() : object {
            return new UserInformation;
        }

        public function updateUserInformation(object $user) : void {
            $user_information = self::model()->findOrFail($user->id);

            $new_bday = date_create($user->bday);

            $user_information->update([
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'gender' => $user->gender,
                'bday' => date_format($new_bday,'Y-m-d'),
                'phone' => $user->phone
            ]);
        }
    }
