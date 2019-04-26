<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function routeNotificationForNexmo()
    {
      return $this->phone;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $appends = array('thumbnail');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions()
    {
        return $this->hasMany('App\courseModels\foundations\Question');
    }

    public function answers()
    {
        return $this->hasMany('App\courseModels\foundations\Answer');
    }

    public function chapters()
    {
        return $this->hasMany('App\courseModels\tests\Chapter');
    }

    public function chapterComment()
    {
        return $this->hasMany('App\courseModels\tests\ChapterComment');
    }

    public function tasks(){
        // return $this->hasMany(App\courseModels\laravelView\Task::class);
        return $this->hasMany('App\courseModels\laravelView\Task');
    }

    public function getThumbnailAttribute()
    {
      $path = pathinfo($this->profile_pic);
      return $path['dirname'].'/'.$path['filename']."-thumb.jpg";
    }

}
