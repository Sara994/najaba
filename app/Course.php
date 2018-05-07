<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    /**
     * The attributes that are mass assignable.
     * The columns that we will fill 
     *
     * @var array
     */
    protected $fillable = [
        'name','trainer_id','time','location','duration','number_of_seats','description','content','intro_video','photo','category'
    ];

    function studnets(){
        return $this->hasMany('App\User','student_course','course_id','student_id');
    }

    function trainer(){
        return $this->hasOne('App\User','id','trainer_id');
    }

    function messages(){
        return $this->hasMany('App\Message', 'course_id', 'id');
    }

    function comments(){
        return Cmment::where('course_id',$this->id)->get();
    }

    function files(){
        return $this->hasMany('App\CourseFile','course_id','id');
    }
}
