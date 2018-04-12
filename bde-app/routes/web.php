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



Route::get('/', 'LoginController@index');
Route::get('/logout', 'LoginController@logout');
Route::get('/ideas', function () {
    return view('ideas');
});
Route::post('/signin', 'LoginController@login');
Route::get('/users', function (){
	return App\User::all();
});



//add a new user
Route::get('/register', 'UsersController@create');
Route::post('/register', 'UsersController@store');


Route::get('/isubmit', function () {
    return view('isubmit');
});

Route::get('/events','Events@index');

Route::get('/events/ideas', 'EventIdeaController@index');

//new idea submission
Route::get('/isubmit','EventIdeaController@create');
Route::post('/isubmit','EventIdeaController@store');


Route::get('/article', function (){
    return view('article');
});