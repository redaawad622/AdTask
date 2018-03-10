<?php

namespace App\Http\Controllers;

use App\Services\SocialGithubAccountService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class SocialAuthGithubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback(SocialGithubAccountService $service)
    {


        $user = $service->createOrGetUser(Socialite::driver('github')->user());
        if(in_array('notAccess',$user))
        {
            return $user[1];
        }

        auth()->login($user[1]);

        return redirect()->to('/lists');

    }
}
