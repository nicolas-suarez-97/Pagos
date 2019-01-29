<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transation extends Model
{
  //relacion entre rol y usuario
  public function users()
  {
      return $this
          ->belongsToMany('App\User')
          ->withTimestamps();
  }
}
