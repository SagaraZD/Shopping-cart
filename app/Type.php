<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
  //Products Relationship
  public function product(){
    return $this->hasMany('App\Product');
  }
}
