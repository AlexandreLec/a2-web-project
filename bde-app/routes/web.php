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
Route::delete('/users/{id}', 'UserController@delete');

//add a new user
Route::get('/register', 'UserController@register');
Route::post('/register', 'UserController@store');


Route::get('/events','Events@index');

Route::get('/events/ideas', 'EventIdeaController@index');

Route::get('/events/category','EventCategoryController@index');

//new idea submission
Route::get('/events/ideas/create','EventIdeaController@create');
Route::post('/events/ideas/create','EventIdeaController@store');
Route::delete('/events/ideas/{id}', 'EventIdeaController@delete');
Route::get('/events/ideas/{id}', 'EventIdeaController@show');

//new participate event
Route::get('/events/participate','EventIdeaController@create');
Route::post('/events/participate','EventIdeaController@store');

//add new goodie
Route::get('/article','ArticleController@create');
Route::post('/article','ArticleController@store');

Route::post('/events/insert','EventController@insert');
Route::delete('/events/{id}','EventController@delete');



Route::get('/idea/poll/add/{id}', 'EventIdeaController@addPoll');
Route::get('/idea/poll/{id}', 'EventIdeaController@getPoll');

//Shop routes
Route::get('/shop', 'ShopController@index');

Route::post('/shop/basket', 'ShopController@saveBasket');
Route::get('/shop/basket', 'ShopController@retrieveBasket');
