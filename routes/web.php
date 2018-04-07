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
});

Route::get('/course', function(){
    $courses = App\Course::all();
    return view('course',['courses'=>$courses]);
});
Route::get('/course/create', function(){ return view('course/create');});
Route::post('/course/create', 'CourseController@create');


Route::get('/course/{id}', 'CourseController@view');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/course/{courseId}/message/create', 'MessageController@create');
Route::get('/course/{courseId}/message/create', function(){return view('message/create');});

