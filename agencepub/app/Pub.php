<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Pub extends Model
{
      use SoftDeletes;
      protected $dates=['deleted_at'];

      public function experiences(){
      	return $this->hasMany('App\Experience');
      }
     
}
