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
        'name','teacher_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * The columns that will not be retrieved from DB
     * @var array
     */
    protected $hidden = [
        
    ];

    // function messages(){

    // }
}
