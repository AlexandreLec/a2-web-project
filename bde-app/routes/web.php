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

Route::get('/ideas', function () {
    return view('ideas');
});
Route::post('/signin', 'LoginController@login');
Route::get('/users', function (){
	return App\User::all();
});

//User management
Route::post('/users/update/{n}', 'UserController@update');
Route::get('/users/delete/{id}', 'UserController@delete');

//add a new user
Route::get('/register', 'UserController@register');
Route::post('/register', 'UserController@store');


Route::get('/events','Events@index');

Route::get('/events/ideas', 'EventIdeaController@index');


//new idea submission
Route::get('/events/ideas/create','EventIdeaController@create');
Route::post('/events/ideas/create','EventIdeaController@store');

Route::get('/events/ideas/{id}', 'EventIdeaController@show');



Route::get('/article', function (){
    return view('article');
});

Route::get('/idea/poll/add/{id}', 'EventIdeaController@addPoll');
Route::get('/idea/poll/{id}', 'EventIdeaController@getPoll');


