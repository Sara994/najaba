<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        App\User::create([
            'name'=>'Abdulrahman',
            'email'=>'abdu@hot.com',
            'password'=>bcrypt('123123123')
        ]);
        
        App\User::create([
            'name'=>'Haifa',
            'email'=>'haifa@hot.com',
            'password'=>bcrypt('123123123')
        ]);
        

        for($i = 0 ; $i< 10;$i++){
            App\Course::create([
                'name'=>"Course " . $i,
                'teacher_name'=>"Teacher name" . $i
            ]);
        }
        
    }
}
