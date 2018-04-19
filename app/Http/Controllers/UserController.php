<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
            'level' => $request->level
        ];
        if($request->file('profile_picture')){
            $userData['profile_picture'] = $request->file('profile_picture')->store('photos');
        }
        
        Auth::user()->update($userData);


        
        return redirect('user/profile');
    }

    function search($needle){
        return json_encode(User::where('name','like',"%$needle%")->get());
    }
}
