<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserInformationRequest;
use App\Repositories\UserInformationRepository;
class UserInformationController extends Controller
{
    public function  __invoke(UserInformationRequest $request,UserInformationRepository $user_info_repo){
        $user_info_repo->updateUserInformation($request);
    }
}
