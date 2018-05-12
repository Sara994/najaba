<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseFile;
use App\StudentCourse;
use App\Cmment;
use App\Message;
use Auth;
use Log;

class CourseController extends Controller{
    /**
     * دالة إنشاء كورس جديد
     */
    function create(Request $request ){
        $fields = $request->except(['photo','intro_video']);

        $url = $request->intro_video;
        parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
        if(isset($vars['v'])){
            $fields['intro_video'] = "https://www.youtube.com/embed/" . $vars['v'];
        }
        
        $fields['trainer_id'] = Auth::user()->id;
        if($request->photo){
            $path = $request->photo->store('photos');
            $fields['photo'] = $path;
        }
        Course::create($fields);

        return redirect("user/courses");
    }

    function rate(Request $request ){
        $course_id = $request->course_id;
        $rating = $request->rating;
        $user_id = Auth::user()->id;

        $student_course = StudentCourse::where('student_id',$user_id)->where('course_id',$course_id)->first();
        if(is_null($student_course)){
            return json_encode(['success'=>false]);

        }else{
            $student_course->update(['rating'=>$rating]);
        }
        
        return json_encode(['success'=>true]);
    }

    function edit($courseId,Request $request ){
        $course = Course::find($courseId);
        if(Auth::user()->id == $course->trainer->id){
            $fields = $request->except(['photo','intro_video']);

            $url = $request->intro_video;
            parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
            if(isset($vars['v'])){
                $fields['intro_video'] = "https://www.youtube.com/embed/" . $vars['v'];
            }
            
            $fields['trainer_id'] = Auth::user()->id;
            if($request->photo){
                $path = $request->photo->store('photos');
                $fields['photo'] = $path;
            }
            $course->update($fields);
        }

        return redirect("user/courses");
    }


    function addFiles($courseId,Request $request){
        $filenames = [];
        
        if(isset($request->photos)){
            for($i = 0; $i < count($request->photos) ;$i++) {
                
                if(!is_null($request->photos[$i])){
                    $file = $request->photos[$i];
                    $filenames[]=$file;
                    $path = $request->photos[$i]->store('files');
                    CourseFile::create([
                        'path'=>$path,
                        'filename'=>$file->getClientOriginalName(),
                        'course_id' => $courseId
                    ]);
                }
            }
        }

        return redirect('/course/' . $courseId . '/files');
    }

    function messageAllStudents($courseId,Request $request){
        $course = Course::find($courseId);
    }

    function delete($courseId){
        $course = Course::find($courseId);
        if(Auth::user()->id == $course->trainer->id){
            StudentCourse::where('course_id',$courseId)->delete();
            Cmment::where('course_id',$courseId)->delete();
            Message::where('course_id',$courseId)->delete();
            CourseFile::where('course_id',$courseId)->delete();
            Course::where('id',$courseId)->delete();
        }
        return redirect('user/courses');
    }

    function archieve($courseId){
        $course = Course::find($courseId);
        Log::info("ARCHIEVED: " . $course->archieved);
        if(Auth::user()->id == $course->trainer->id){
            $course->archieved = true;
            $course->save();
        }
        Log::info("AFTER: " . $course->archieved);
        return redirect('user/courses');
    }

     /**
     * دالة عرض كورس 
     */
    function view($courseId,Request $request){
        $course = Course::find($courseId);
        $path = explode('/',$request->path());
        
        if(sizeof($path) != 3)
            return view('course/course_content',['id'=>$courseId,'course'=>$course]);
        else{
            $path = $path[2];
            if(!in_array($path,['course_content','comments','details','files']))
                return view('course/course_content',['id'=>$courseId,'course'=>$course]);
            
            return view('course/'.$path,['id'=>$courseId,'course'=>$course]);
        }
    }

    function list(){
        $courses = Course::orderby('created_at','desc')->get();
        return view("courses_list",['courses'=>$courses]);
    }
    function listByCategory($categoryId){
        $courses = Course::where('category',$categoryId)->orderby('created_at','desc')->get();
        return view("courses_list",['courses'=>$courses]);
    }

    function search(Request $request){
        $courses = Course::where('name','like',"%$request->needle%")->orderby('created_at','desc')->get();;
        return view("courses_list",['courses'=>$courses]);
    }
}
