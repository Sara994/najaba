<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Message;

class User extends Authenticatable{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','age','phone_number','national_id','address','university',
        'university_id','major','level','profile_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function courses(){
        return Course::where('trainer_id',$this->id)->get();
    }

    function attending_courses(){
        return $this->belongsToMany('App\Course','student_course','student_id');
    }

    function messages(){
        return Message::where('from_id',$this->id)->orWhere('to_id',$this->id)->get();
    }
    function trainer_data(){
        return $this->hasOne('App\TrainerData','id','user_id');
    }
}