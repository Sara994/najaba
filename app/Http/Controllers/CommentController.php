<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cmment;

class CommentController extends Controller{
    function create(Request $request){
        Cmment::create([
            'comment' => $request->comment,
            'poster_id' => Auth::user()->id,
            'course_id' => $request->course_id
        ]);

        return redirect('course/'.$request->course_id.'/comments');
    }

    function delete(Request $request){
        App\Cmment::delete($request->id);
    }
}
