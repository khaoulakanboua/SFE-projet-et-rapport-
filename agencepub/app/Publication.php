<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
	
  
 public function user(){
      	return $this->hasMany('App\User');
      }
     
      public function comments(){
      	return $this->morphMany('App\Comment','commentable')->latest();
      }
     
}

