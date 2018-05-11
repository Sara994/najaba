<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Course;
use Auth;

class MessageController extends Controller{
    function create(Request $request){
        $fields = $request->all();
        $fields['from_id'] = Auth::user()->id;
        Message::create($fields);

        return redirect('/user/messages');
    }

    function reply(Request $request){
        $msg_id = $request->msg_id;
        $message = Message::find($msg_id);
        $fields['from_id'] = Auth::user()->id;
        $fields['to_id'] = $fields['from_id'] == $message->from->id ? $message->from->id : $message->to->id;

        $fields['content'] = $request->reply;
        $fields['reply_to'] = $msg_id;
        $fields['title'] = $message->title;
        Message::create($fields);

        return redirect('/user/messages');
    }

    function list(){
        Message::list();
    }
    function edit(){}
    function delete(){}
}