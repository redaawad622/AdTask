<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreRegisterData;
use App\SocialFacebookAccount;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class sessionController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

    }

    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('/lists');
        }

        return view('Login');
    }


    public function register(StoreRegisterData $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();


        if ( isset($request->provider_user_id))
        {
            $account=new SocialFacebookAccount();
            $account->provider_user_id=$request->provider_user_id;
            $account->provider=$request->provider;
            $account->user_id=$user->id;
            $account->save();

        }
        auth()->login($user);
        return redirect('/lists');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');

    }

    public function checkEmail()
    {
        $exist = User::where('email', $this->request->input('email'))->first();

        if (count($exist) > 0) {

            return response()->json([
                'success' => true,
                'user' => $exist,

            ], 200);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }


    }

    public function login()
    {
        if (Auth::attempt(['email' => $this->request->input('email'), 'password' => $this->request->input('password')])) {
            return redirect()->to('/lists');
        }
        return redirect()->back()->with('error', 'the password is noy correct !!!')->withInput();
    }
}