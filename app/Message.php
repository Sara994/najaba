<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model{
    protected $table = 'message';

    protected $fillable = ['content','title','course_id','trainer_id','trainee_id'];

    protected $hidden = [];

    public function course(){
        return $this->hasOne('App\Course', 'course_id', 'id');
    }
    public function trainer(){
        return $this->hasOne('App\User', 'trainer_id', 'id');
    }
    public function trainee(){
        return $this->hasOne('App\User', 'trainee_id', 'id');
    }
}