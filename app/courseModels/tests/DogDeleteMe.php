<?php

namespace App\courseModels\tests;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    public function dogComments()
    {
        return $this->hasMany('App\courseModels\tests\DogComment');
    }
}
