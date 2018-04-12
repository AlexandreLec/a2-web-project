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

Route::get('/register', 'UsersController@create');
Route::post('/register', 'UsersController@store');

Route::get('/article', function (){
    return view('article');
});

Route::get('/isubmit', function () {
    return view('isubmit');

});