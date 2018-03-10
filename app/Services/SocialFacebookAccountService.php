<?php

namespace App\Services;
use App\SocialFacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return ['access', $account->user];
        } else {


            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {


                 $email=$providerUser->getEmail();
                 $name= $providerUser->getName();
                 $provider_user_id=$providerUser->getId();
                 $provider='facebook';

                return ['notAccess',view('register',compact('email','name','provider_user_id','provider'))];


            }
            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);


            $account->user()->associate($user);
            $account->save();

            return ['access',$user];
        }
    }
}