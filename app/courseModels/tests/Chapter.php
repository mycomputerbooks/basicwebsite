<?php

namespace App\courseModels\tests;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{

    public function chapterComments()
    {
        return $this->hasMany('App\courseModels\tests\ChapterComment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
