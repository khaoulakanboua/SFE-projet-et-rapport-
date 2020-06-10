<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use DB;
use Mail;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function register(Request $request){
        $input=$request->all();
        $validator=$this->validator($input);
        if($validator->passes()){
            $user=$this->create($input)->toArray();
            $user['link']=str::random(30);
DB::table('users_activations')->insert(['user_id'=>$user['id'], 'token'=>$user['link']]);
        Mail::send('mail.activation',$user,function($sms) use ($user){
            $sms->to($user['email']);
            $sms->subject('scqq.blogspot.com - Activation Code');

        });
        return redirect()->to('login')->with('Success',"We sent activation code, please check your email");

        }
        return back()->with('Error',$validator->errors());

    }
    public function userAvtivation($token){
        $check =DB::table('users_activations')->where('token',$token)->first();
        if(!is_null($check)){
            $user=User::find($check->user_id); 
            if($user->is_activated==1){
            return redirect()->to('login')->with('Success',"User are already actived");

            }
        $user->update(['is_activated'=>1]);
        DB::table('users_activations')->where('token',$token)->delete();
        return redirect()->to('login')->with('Success',"user active successfully");
        }
       return redirect()->to('login')->with('warning',"your token is invalid");
    }
}
