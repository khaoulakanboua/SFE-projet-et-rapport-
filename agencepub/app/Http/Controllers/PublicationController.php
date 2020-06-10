<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\User;
use Illuminate\Support\Facades\Auth;

use DB;

class PublicationController extends Controller
{
	public function __construct(){
     $this->middleware('auth');
   }
     public function index(){
//if(Auth::user()->is_admin){ 
         $listpub=Publication::all();
   // }else{  $listpub =Auth::user()->publications;

     
      //}

     return view('publication.index',['publications'=>$listpub]);
      }
       public function create(){
   	return view('publication.create');

   }
   public function store(Request $request){
   	$pub= new Publication();
      $pub->titre= $request->input('titre');
      $pub->user_id=Auth::user()->id;
      $pub->explication= $request->input('explication');
      if($request->hasFile('photo')){
               $pub->photo=$request->photo->store('image');

      }
      $pub->save();
      session()->flash('success','La pub à été bien enregistée!!!');
     return redirect('publications');


   }
   public function edit($id){

   	$pub=Publication::find($id);
      $this->authorize('update',$pub);
      return view('publication.edit',['publication'=>$pub]);
   }
   public function update(Request $request,$id){
   	
   	$pub=Publication::find($id);
           $this->authorize('update',$pub);

      $pub->titre=$request->input('titre');
      $pub->explication=$request->input('explication');
      if($request->hasFile('photo')){
               $pub->photo=$request->photo->store('image');

      }
      $pub->save();
      return redirect('publications');

   }
   public function show($id){
     /* return view('publication.show',['id'=>$id]);*/
   }
   public function destroy(Request $request,$id){
      $pub=Publication::find($id);
            $this->authorize('delete',$pub);

   	$pub->delete();
      return redirect('publications');
   }    

  
   }
  