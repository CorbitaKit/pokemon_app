<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    public function getUser(UserRepository $user_repo, int $user_id) : Object{

        return $user_repo->getUser($user_id);

    }

    public function registerUser(UserRequest $request,UserRepository $user_repo){
       $user_repo->registerUser($request);

       return redirect()->route('login');
    }


}
