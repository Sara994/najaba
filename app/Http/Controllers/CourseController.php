<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Auth;

class CourseController extends Controller{
    function create(Request $request ){
        $fields = $request->except(['photo','intro_video']);

        $url = $request->intro_video;
        parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
        if(isset($vars['v']))
            $fields['intro_video'] = "https://www.youtube.com/embed/" . $vars['v'];

        $fields['trainer_id'] = Auth::user()->id;
        if($request->file('photo')){
            $path = $request->file('photo')->store('photos');
            $fields['photo'] = $path;
        }
        Course::create($fields);

        return redirect("user/courses");
    }

    function view($courseId,Request $request){
        $course = Course::find($courseId);
        $path = explode('/',$request->path());
        if(sizeof($path) != 3)
            return view('course/course_content',['id'=>$courseId,'course'=>$course]);
        else{
            $path = $path[2];
            if(!in_array($path,['course_content','comments','details']))
                return view('course/course_content',['id'=>$courseId,'course'=>$course]);
            
            return view('course/'.$path,['id'=>$courseId,'course'=>$course]);
        }
    }

    function list(){
        $courses = Course::orderby('created_at','desc')->get();
        return view("courses_list",['courses'=>$courses]);
    }

    function search(Request $request){
        $courses = Course::where('name','like',"%$request->needle%")->orderby('created_at','desc')->get();;
        return view("courses_list",['courses'=>$courses]);
    }
}
