<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        App\User::create([
            'name'=>'Abdulrahman',
            'email'=>'abdu@hot.com',
            'password'=>bcrypt('123123123')
        ]);

        App\Course::create([
            'name'=>"Course 1",
            'teacher_name'=>"Teacher name"
        ]);
    }
}
