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
            'password'=>bcrypt('123123123'),
            'role'=>'TRAINER'
        ]);
        
        App\User::create([
            'name'=>'Haifa',
            'email'=>'haifa@hot.com',
            'password'=>bcrypt('123123123'),
            'role'=>'STUDENT'
        ]);

        
        App\Course::create([
            'name'=>"كتابة التقارير الاعلامية ",
            'trainer_id'=>1,
            'location'=>'ق5 مبنى علوم الحاسب',
            'duration'=>'ثلاث ايام',
            'time'=>'7:30pm',
            'number_of_seats'=>35
        ]);
        App\Message::create([
            'title'=>"كتابة التقارير الاعلامية ",
            'content'=>"Hello there ... I am just testing",
            'from_id'=>1,
            'to_id'=>2,
            'course_id'=>1,
        ]);
    }
}
