<?php

namespace App\courseModels\tests;

use Illuminate\Database\Eloquent\Model;

class DogComment extends Model
{
    public function dog()
    {
        return $this->belongsTo('App\courseModels\tests\Dog');
    }
}
