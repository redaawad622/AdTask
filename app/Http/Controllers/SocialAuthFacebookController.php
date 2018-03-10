<?php

namespace App\Http\Controllers;

use App\Services\SocialFacebookAccountService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthFacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->reRequest()->redirect();
    }

    public function callback(SocialFacebookAccountService $service)
    {


        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        if(in_array('notAccess',$user))
        {
            return $user[1];
        }

        auth()->login($user[1]);

        return redirect()->to('/lists');

    }

}
