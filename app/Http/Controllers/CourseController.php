<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller{
    function create(Request $request ){
        Course::create([
            'name' => $request->name,
            'teacher_name' => $request->teacher_name
        ]);

        $courses = Course::all();
        return view("course",["courses"=> $courses]);
    }

    function view(array $params){
        $courseId = $params['id'];
        $course = Course::find($courseId);
        return view('course/view',['course'=>$course]);
    }

    function list(){
        $courses = Course::list();
        return view("list_courses");
    }

    function delete(){

    }

    function edit(){

    }

    function assignTrainer(){

    }

    function join(Request $request){

    }
}
