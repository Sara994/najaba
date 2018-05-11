<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
class CreateTrainerDataForExisting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        $trainers = User::where('role','like','TRAINER')->get();
        foreach($trainers as $trainer){
            if( is_null($trainer->trainer_data)){
                App\TrainerData::create([
                    'user_id'=>$trainer->id,
                    'samples' => ' ',
                    'accomplishments' => ' ',
                    'occupation' => ' ',
                    'resume' => ' '
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
