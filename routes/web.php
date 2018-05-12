<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/course', function(){
    $courses = App\Course::all();
    return view('course',['courses'=>$courses]);
});

Route::post('/course/create', 'CourseController@create');
Route::get('/course/category/{id}','CourseController@listByCategory');

Route::group(['prefix'=>'course'],function(){
    Route::get('create', function(){
        return view('course/create',['id' => Auth::user()->id,'user'=>Auth::user()]);
    })->middleware('auth');
    Route::post('create','CourseController@create' )->middleware('auth');
    
    Route::get('/{id}/course_content', 'CourseController@view');
    Route::get('/{id}/comments', 'CourseController@view');
    Route::post('/{id}/comments', 'CommentController@create');
    Route::get('/{id}/details', 'CourseController@view');
    Route::get('/{id}/files', 'CourseController@view');
    Route::post('/{id}/files','CourseController@addFiles')->middleware('auth');
    Route::post('/search','CourseController@search');
    Route::get('/latest','CourseController@list');
    Route::get('/{id}/register',function($courseId){
        App\StudentCourse::create([
            'student_id'=>Auth::user()->id,
            'course_id'=>$courseId
        ]);
        return redirect('course/'.$courseId);
    });
    Route::get('/others',function(){return view('all_courses');});
    Route::get('/{id}', 'CourseController@view');
    Route::get('/{id}/delete', 'CourseController@delete')->middleware('auth');
    Route::get('/{id}/edit', function($courseId){
        $course = App\Course::find($courseId);
        return view('course/edit',['id'=>Auth::user()->id, 'course'=>$course]);
    })->middleware('auth');
    Route::post('/{id}/edit','CourseController@edit')->middleware('auth');
    Route::get('/{id}/archieve','CourseController@archieve')->middleware('auth');
});

Route::group(['prefix'=>'user'],function(){
    Route::get('/','UserController@my')->middleware('auth');
    Route::get('courses','UserController@my')->middleware('auth');
    Route::get('messages','UserController@messages')->middleware('auth');
    Route::get('messages/{id}','UserController@messages')->middleware('auth');
    Route::get('profile','UserController@my')->middleware('auth');
    Route::get('edit','UserController@my')->middleware('auth');
    Route::post('edit','UserController@edit')->middleware('auth');
    Route::get('/editresume',function(){
        $user = Auth::user();
        return view('user/editresume',['user'=>$user]);
    })->middleware('auth');
    
    Route::post('resume','UserController@addTrainerData')->middleware('auth');
    
    Route::get('/{id}','UserController@view');
    Route::get('/{id}/courses','UserController@view');
    Route::get('/{id}/messages',function(){return redirect('user/messages');});
    Route::get('/{id}/profile','UserController@view');
    Route::get('/{id}/resume',function($userId){
        $user = App\User::find($userId);
        return view('user/resume',['user'=>$user]);
    });
    Route::get('search/{needle}','UserController@search');
});

Route::group(['prefix'=>'trainer'],function(){
    Route::get('/',function(){return view('trainer.profile');});
    Route::get('profile',function(){return view('trainer.profile');});
    Route::get('messages',function(){return view('trainer.messages');});
});

Route::get('/faq', function(){return view('faq');})->name('faq');
Route::get('/contactus', function(){return view('contactus');})->name('contactus');
Route::get('/aboutus', function(){return view('aboutus');})->name('aboutus');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('files/{filename}', function ($filename){
    $file = App\CourseFile::where('path','like','files/' . $filename)->first();
    return response()->download(storage_path('app/files/' . $filename),$file->filename);
});


Route::get('photos/{filename}', function ($filename){
    return Image::make(storage_path('app/photos/' . $filename))->response();
});

Route::post('message', 'MessageController@create');
Route::post('message/reply', 'MessageController@reply');
Route::get('/course/{courseId}/message/create', function(){return view('message/create');});

