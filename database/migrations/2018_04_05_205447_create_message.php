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
            $b->unsignedInteger('from_id');
            $b->unsignedInteger('to_id');

            $b->foreign('course_id')->references('id')->on('course');
            $b->foreign('from_id')->references('id')->on('users');
            $b->foreign('to_id')->references('id')->on('users');
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