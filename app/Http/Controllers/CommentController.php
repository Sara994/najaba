<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller{
    function create(Requet $request){
        App\Cmment::create([
            'comment' => $request->comment,
            'poster_id' => Auth::user()->id,
            'course_id' => $request->course_id
        ]);
    }

    function delete(Request $request){
        App\Cmment::delete($request->id);
    }
}
