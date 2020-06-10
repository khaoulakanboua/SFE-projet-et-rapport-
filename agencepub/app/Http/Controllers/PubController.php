<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pub;
use App\User;
use Auth;
use Hash;
use App\Http\Requests\pubrequest;
use illuminate\Http\UploadedFile;
use App\Experience;
class PubController extends Controller
{
   public function __construct(){
       $this->middleware('auth');
   }
   public function index(){
      if(Auth::user()->is_admin){ 
         $listpub=Pub::all();
      }else{
              $listpub =Auth::user()->pubs;

      }

     return view('pub.index',['pubs'=>$listpub]);
   }
   public function create(){
   	return view('pub.create');
   }

   public function search(Request $request){
    $search =$request->get('search');
    $pubs=DB::table('pubs')->where('titre','like','%'.$search.'%')->paginate(5);
    return view('pub.index',['pubs'=>$pubs]);
   }

   public function store(pubrequest $request){
   	$pub= new Pub();
      $pub->titre= $request->input('titre');
      $pub->user_id=Auth::user()->id;
      $pub->presentation= $request->input('presentation');
      $pub->tel= $request->input('tel');
      if($request->hasFile('photo')){
               $pub->photo=$request->photo->store('image');

      }
      $pub->save();
      session()->flash('success','La pub à été bien enregistée!!!');
      return redirect('pubs');


   }
   public function edit($id){

   	$pub=Pub::find($id);
      $this->authorize('update',$pub);
      return view('pub.edit',['pub'=>$pub]);
   }
   public function update(pubrequest $request,$id){
   	$pub=Pub::find($id);
            $this->authorize('update',$pub);

      $pub->titre=$request->input('titre');
      $pub->presentation=$request->input('presentation');
      $pub->tel=$request->input('tel');
      if($request->hasFile('photo')){
               $pub->photo=$request->photo->store('image');

      }
      $pub->save();
      return redirect('pubs');

   }
   public function show($id){
      return view('pub.show',['id'=>$id]);
   }
   public function destroy(Request $request,$id){
      $pub=Pub::find($id);
            $this->authorize('delete',$pub);

   	$pub->delete();
      return redirect('pubs');
   }

   public function getExperiences($id){
      $pub = Pub::find($id);
      return $pub->experiences()->orderBy('debut','desc')->get();
   }
   public function addExperience(Request $request){
          $experience = new Experience;
          $experience->titre = $request->titre;
          $experience->body = $request->body;
          $experience->debut = $request->debut;
          $experience->fin = $request->fin;
          $experience->pub_id = $request->pub_id;
          $experience->save();
          return Response()->json(['etat'=>true,'id'=>$experience->id]);

   }
   public function updateExperience(Request $request){
          $experience = Experience::find($request->id);
          $experience->titre = $request->titre;
          $experience->body = $request->body;
          $experience->debut = $request->debut;
          $experience->fin = $request->fin;
          $experience->pub_id = $request->pub_id;
          $experience->save();
          return Response()->json(['etat'=>true]);
   }
   public function deleteExperience($id){
         $experience=Experience::find($id);
         $experience->delete();
        return Response()->json(['etat'=>true]);

   }
   public function editer(){
    if(Auth::user()){
      $user=User::find(Auth::user()->id);
      if($user){
      return view('user.edit')->withUser($user);
    }else{
      return redirect()->back();
    }
    }else{
      return redirect()->back();
    }
   }
   public function updater(Request $request){
      $user=User::find(Auth::user()->id);
      if($user){
        $validate=null;
        if(Auth::user()->email==$request['email']){
            $validate=$request->validate([
                      'name'=>'required|min:2',
                      'email'=>'required|email'
                    ]);
        }else{
           $validate=$request->validate([
                      'name'=>'required|min:2',
                      'email'=>'required|email|unique:users'
                    ]);
        }
        if ($validate) {
          
        
        
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->save();
        $request->session()->flash('succes','votre information à été bien modifié!');
        return redirect()->back();

     }else{
      return redirect()->back();
     }}else{
      return redirect()->back();
    }
   }
   public function passwordEdit(){
    if(Auth::user()){
      return view('user.password');
    
    }else{
      return redirect()->back();
    }
   }
   public function passwordUpdate(Request $request){
    $validate=$request->validate([
                      'oldPassword'=>'required|min:8',
                      'password'=>'required|min:8|required_with:password_confirmation'
                    ]);
    $user =User::find(Auth::user()->id);
    if ($user) {
      if (Hash::check($request['oldPassword'],$user->password) && $validate) {
        $user->password=Hash::make($request['password']);
        $user->save();
        $request->session()->flash('succes','your password have been updated!');
        return redirect()->back();
      }else{
        $request->session()->flash('error','your password did not match!');
        return redirect()->route('password.edit');
      }
    }
   }
   public function profile($id){
    $user=User::find($id);
    if ($user) {
      return view('user.profile')->withUser($user);
    }else{
    return redirect()->back();
    }
   }
}
