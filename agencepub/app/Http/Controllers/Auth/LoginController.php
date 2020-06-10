<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\SocialAccount;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/pubs';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function credentials(Request $request){
        $request['is_activated']=1;
        return $request->only('email','password','is_activated');
    }
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback(){
        $provider= Socialite::driver('facebook')->user();
        $account=SocialAccount::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if ($account) {
            $user=$account->user;
        }else{
            $akun =new SocialAccount([
            'provider_user_id'=>$provider->getId(),
            'provider'=>'facebook'
            ]);
            $orang=User::where('email',$provider->getEmail())->first();
            if(!$orang){
                $orang=User::create([
                    'name'=>$provider->getName(),
                    'email'=>$provider->getEmail(),
                    'password'=>'',
                    'is_activated'=>'1'
                ]);
            }
            $akun->user()->associate($orang);
            $akun->save();
            $user=$orang;
        }
        auth()->login($user);
        return redirect()->to('/pubs');
    }
    
     public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        $provider= Socialite::driver('google')->user();
        $account=SocialAccount::where('provider','google')->where('provider_user_id',$provider->getId())->first();
        if ($account) {
            $user=$account->user;
        }else{
            $akun =new SocialAccount([
            'provider_user_id'=>$provider->getId(),
            'provider'=>'google'
            ]);
            $orang=User::where('email',$provider->getEmail())->first();
            if(!$orang){
                $orang=User::create([
                    'name'=>$provider->getName(),
                    'email'=>$provider->getEmail(),
                    'password'=>'',
                    'is_activated'=>'1'
                ]);
            }
            $akun->user()->associate($orang);
            $akun->save();
            $user=$orang;
        }
        auth()->login($user);
        return redirect()->to('/pubs');
    }
    
}
