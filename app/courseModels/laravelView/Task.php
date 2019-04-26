<?php

namespace App\courseModels\laravelView;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'body',
        'user_id'
    ];
}
