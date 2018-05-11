<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerData extends Model
{
    protected $table = "trainer_data";

    protected $fillable = ['resume','accomplishments','samples','user_id','occupation'];

    function user(){
        return $this->hasOne('App\User','user_id','id');
    }
}
