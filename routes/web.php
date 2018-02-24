<?php

use App\Task;

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

//blog index
Route::get('/blog', 'PostsController@index')->name('home');

//posts 
Route::get('/blog/posts/create', 'PostsController@create');
Route::get('/blog/posts/{post}', 'PostsController@show');
Route::post('/blog/posts', 'PostsController@store');

//comments
Route::post('/blog/{post}/comments', 'CommentsController@store');


// auth section 
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');


Route::get('/login', 'SessionController@create');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');

//tasks
Route::get('/tasks', 'TasksController@index');

Route::get('/tasks/{task}', 'TasksController@show');






