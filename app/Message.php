<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model{
    protected $table = 'message';

    protected $fillable = ['content','title','course_id','from_id','to_id'];

    protected $hidden = [];

    public function course(){
        return $this->hasOne('App\Course', 'course_id', 'id');
    }
    public function from(){
        return $this->hasOne('App\User', 'from_id', 'id');
    }
    public function to(){
        return $this->hasOne('App\User', 'to_id', 'id');
    }
}