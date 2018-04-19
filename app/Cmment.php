<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cmment extends Model{
    protected $table = 'comment';

    protected $fillable = ['comment','course_id','poster_id'];

    protected $hidden = [];

    public function course(){
        return $this->hasOne('App\Course', 'course_id', 'id');
    }
    public function poster(){
        return User::find($this->poster_id);
    }
}