<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function __invoke(UserRepository $user_repo, int $user_id) : Object{

        return $user_repo->getUser($user_id);

    }
}
