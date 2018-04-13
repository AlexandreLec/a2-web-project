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
Route::get('/admin', 'UserController@admin');
Route::get('/logout', 'LoginController@logout');
//Route::get('/admin/user/edit/{id}', 'UserController@create');
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


Route::get('/events','Events@index');

Route::get('/events/ideas', 'EventIdeaController@index');

Route::get('/events/ideas/{id}', 'EventIdeaController@show');

//new idea submission
Route::get('/events/ideas/create','EventIdeaController@create');
Route::post('/events/ideas/create','EventIdeaController@store');


Route::get('/article', function (){
    return view('article');
});

Route::get('/idea', function (){
    return view('event/idea');
});