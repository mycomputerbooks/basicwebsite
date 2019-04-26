<?php

namespace App\courseModels\foundations;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
  public function question()
  {
    return $this->belongsTo('App\courseModels\foundations\Question');
  }

  public function user()
  {
    return $this->belongsTo('App\User');

  }
}
