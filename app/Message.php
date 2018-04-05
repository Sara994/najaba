<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model{
    protected $table = 'message';

    protected $fillable = ['content','title','course_id','trainer_id','student_id'];

    protected $hidden = [];

    public function course(){
        return $this->hasOne('App\Course', 'id');
    }
    public function trainer(){
        return $this->hasOne('App\User', 'id');
    }
    public function student(){
        return $this->hasOne('App\User', 'id');
    }
}