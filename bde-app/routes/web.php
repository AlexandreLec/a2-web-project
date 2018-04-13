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

Route::get('/register', function (){
    return view('register');
});

Route::get('/events','Events@index');

Route::get('/events/ideas', 'EventIdeaController@index');

//new idea submission
Route::get('/events/ideas/create','EventIdeaController@create');
Route::post('/events/ideas/create','EventIdeaController@store');

Route::get('/artcicle', function (){
    return view('article');
});

