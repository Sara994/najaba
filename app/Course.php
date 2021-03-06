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

    function rating(){
        $students = StudentCourse::where('course_id',$this->id)->get();
        $count = 0;
        $total = 0;
        foreach($students as $student){
            if($student->rating > -1){
                $count++;
                $total += $student->rating;
            }
        }
        return $count == 0 ? 0: $total/$count;
    }

    function category(){
        $categories = [
            '',
            'التربية والتعليم',
            'العلوم',
            'التقنية والتكنولوجيا',
            'الثقافة والفن',
            'الطب',
            'الهندسة',
            'العلوم الاجتماعية',
            'الاقتصاد والادارة',
            'علوم الشريعة'
        ];
        return $this->category? $categories[$this->category]:'';
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
