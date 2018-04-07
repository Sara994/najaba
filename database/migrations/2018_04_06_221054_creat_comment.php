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
          Schema::create('comment', function (Blueprint $b) {
              $b->increments('id');
              $b->string('comment');
              $b->unsignedInteger('course_id')->nullable();
              $b->unsignedInteger('poster_id');

              $b->foreign('course_id')->references('id')->on('course');
              $b->foreign('poster_id')->references('id')->on('users');
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
        Schema::dropIfExists('comment');
    }
}
