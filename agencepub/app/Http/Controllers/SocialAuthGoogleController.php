<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
  use App\User;
  use Socialite;
  use Auth; 
  use Exception;

class SocialAuthGoogleController extends Controller
{
    public function redirect(){
    	return Socialite::driver('google')->redirect();
    }
    public function callback()
    {
      try{
        $googleUser = Socialite::driver('google')->stateless()->user();
        $exitUser=User::where('email',$googleUser->email)->first(); 
        if($exitUser){
        	Auth:loginUsingId($exitUser->id,true);
        }else{
         $user=new User;
         $user->name=$googleUser->name;
         $user->email=$googleUser->email;
         $user->google_id=$googleUser->id;
         $user->password=md5(rand(1,10000));
         $user->save();
         Auth::loginUsingId($user->id,true);
        }
        return redirect()->to('/pubs');

      }catch(Exception $e){
        return 'error';
      }   }
}
