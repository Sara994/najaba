<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('message',function(Blueprint $b){
            $b->increments('id');
            $b->string('title');
            $b->longText('content');
            $b->unsignedInteger('course_id')->nullable();
            $b->unsignedInteger('trainer_id');
            $b->unsignedInteger('student_id');

            $b->foreign('course_id')->references('id')->on('course');
            $b->foreign('trainer_id')->references('id')->on('users');
            $b->foreign('student_id')->references('id')->on('users');
            $b->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message');
    }
}