<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model{
    protected $table ="student_course";

    protected $fillable =['student_id','course_id'];

    function student(){
        return $this->hasOne('App\User','student_id');
    }
    function course(){
        return $this->hasOne('App\Course','course_id');
    }
}