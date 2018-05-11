<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\TrainerData;
use Auth;

class UserController extends Controller{
    function my(Request $request){
        $user = Auth::user();
        $userId = $user->id;
        $path = explode('/',$request->path());
        if(sizeof($path) != 2)
            return view('user/profile',['id'=>$userId,'user'=>$user]);
        else{
            $path = $path[1];
            if(!in_array($path,['courses','edit','messages','profile']))
                return view('user/profile',['id'=>$userId,'user'=>$user]);
            
            return view('user/'.$path,['path'=>$path,'id'=>$userId,'user'=>$user]);
        }
    }

    function messages($messageId=-1){
        $user = Auth::user();
        $message = Message::find($messageId);
        $userId = $user->id;
        
        return view('user/messages',['message'=>$message, 'id'=>$userId,'user'=>$user]);
    }

    function view($userId,Request $request){
        $user = User::find($userId);
        $path = explode('/',$request->path());
        if(sizeof($path) != 3)
            return view('user/profile',['id'=>$userId,'user'=>$user]);
        else{
            $path = $path[2];
            if(!in_array($path,['courses','messages','profile']))
                return view('user/profile',['id'=>$userId,'user'=>$user]);
            
            return view('user/'.$path,['path'=>$path, 'id'=>$userId,'user'=>$user]);
        }
    }

    function addTrainerData(Request $request){
        $fields = $request->all();
        $fields['user_id'] = Auth::user()->id;
        $data = TrainerData::where('user_id',Auth::user()->id)->first();
        if(is_null($data)){
            TrainerData::create($fields);
        }else{
            $data->update($fields);
        }
        return redirect('user/profile');
    }
    function edit(Request $request){
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'national_id' => $request->national_id,
            'address' => $request->address,
            'university' => $request->university,
            'university_id' => $request->university_id,
            'major' => $request->major,
            'level' => $request->level,
            'nationality' => $request->nationality
        ];
        if($request->file('profile_picture')){
            $userData['profile_picture'] = $request->file('profile_picture')->store('photos');
        }
        Auth::user()->update($userData);

        $trainerData = $request->only(['resume','accomplishments','samples','occupation','instagram','twitter']);
        $trainerData['user_id'] = Auth::user()->id;

        $data = TrainerData::where('user_id',Auth::user()->id)->first();
        if(is_null($data)){
            TrainerData::create($trainerData);
        }else{
            $data->update($trainerData);
        }
        return redirect('user/profile');
    }

    function search($needle){
        return json_encode(User::where('name','like',"%$needle%")->get());
    }
}