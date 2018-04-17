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
Route::get('/course/create', function(){ return view('course/create');});
Route::post('/course/create', 'CourseController@create');

// Route::group(['prefix'=>'course'],function(){
//     Route::get('/{id}', function($id){ return view('course/course_content',['course'=>['name'=>$id]]);});
//     Route::get('/{id}/course_content', function($id){ return view('course/course_content',['id'=>$id]);});
//     Route::get('/{id}/comments', function($id){ return view('course/comments',['id'=>$id]);});
//     Route::get('/{id}/details', function($id){ return view('course/details',['id'=>$id]);});
// });


Route::group(['prefix'=>'course'],function(){
    Route::get('create', function(){ return view('course/create');} )->middleware('auth');
    Route::post('create','CourseController@create' )->middleware('auth');

    Route::get('/{id}', 'CourseController@view');
    Route::get('/{id}/course_content', 'CourseController@view');
    Route::get('/{id}/comments', 'CourseController@view');
    Route::get('/{id}/details', 'CourseController@view');

    
});


Route::group(['prefix'=>'user'],function(){
    Route::get('/','UserController@my')->middleware('auth');
    Route::get('courses','UserController@my')->middleware('auth');
    Route::get('messages','UserController@my')->middleware('auth');
    Route::get('profile','UserController@my')->middleware('auth');
    Route::get('edit','UserController@my')->middleware('auth');
    Route::post('edit','UserController@edit')->middleware('auth');

    Route::get('search/{needle}','UserController@search');
    Route::get('/{id}','UserController@view');
    Route::get('/{id}/courses','UserController@view');
    Route::get('/{id}/messages','UserController@view');
    Route::get('/{id}/profile','UserController@view');
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

Route::get('photos/{filename}', function ($filename)
{
    return Image::make(storage_path('app/photos/' . $filename))->response();
});


Route::post('/course/{courseId}/message/create', 'MessageController@create');
Route::get('/course/{courseId}/message/create', function(){return view('message/create');});

