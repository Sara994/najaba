<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller{
    function create(Request $request ){
        Course::create([
            'name' => $request->name,
            'teacherName' => $request->teacher_name
        ]);


        
        return view("course",$courses);
    }
    function list(){
        $courses = Course::list();
        return view("list_courses");
    }
}
