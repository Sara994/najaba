<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Course;
use Auth;

class MessageController extends Controller{
    function create(Request $request,$courseId){
        
        $trainer = User::find(1);
        $student =  Auth::user();
        $course = Course::find($courseId);

        Message::create([
            'course_id'=>$course->id,
            'trainer_id'=> $trainer->id,
            'student_id' => $student->id,
            'content'=>$request->content,
            'title'=>$request->title
        ]);

        // $message = new Message;
        // $message->content = $request->content;
        // $message->title = $request->title;
        // $message->course()->associate($course);
        // $message->trainer()->associate($trainer);
        // $message->student()->associate($student);
        // $message->save();

        return view('message/view');
    }

    function list(){
        Message::list();
    }
    function edit(){}
    function delete(){}
}