<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourse extends Migration
{
    public function up(){
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location');
            $table->string('duration');
            $table->string('time');
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->string('intro_video')->nullable();
            $table->integer('number_of_seats');
            $table->unsignedinteger('trainer_id');
            $table->timestamps(); // created_at , updated_at
            $table->foreign('trainer_id')->references('id')->on('users');
        });
    }


    /**
     * 
     * 1- php artisan make:migration CreateCourse
     * 2- php artisan make:model Course
     * 3- php artisan make:controller 
     * 4- create route   ( routers/web.php)
     * 5- create view  ( resources/views)
     * 
     * 
     * 
     * 
     * 
     * 
     */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('course');
    }
}
