<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('comment', function (Blueprint $table) {
              $table->increments('id');
              $table->string('comment');
              $b->unsignedInteger('course_id')->nullable();
              $b->unsignedInteger('trainer_id');
              $b->unsignedInteger('student_id');

              $b->foreign('course_id')->references('id')->on('course');
              $b->foreign('trainer_id')->references('id')->on('users');
              $b->foreign('student_id')->references('id')->on('users');
              $b->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
