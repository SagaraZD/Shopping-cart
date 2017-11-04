<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  //Type Relationship
  public function type(){
    return $this->belongsTo('App\Type');
  }
}
