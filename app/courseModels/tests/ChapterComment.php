<?php

namespace App\courseModels\tests;

use Illuminate\Database\Eloquent\Model;

class ChapterComment extends Model
{
    public function chapter()
    {
        return $this->belongsTo('App\courseModels\tests\Chapter');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
