<?php

namespace App\courseModels\foundations;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  public function answers()
  {
    return $this->hasMany('App\courseModels\foundations\Answer');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
