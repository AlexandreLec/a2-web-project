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

//idea description page
Route::get('/events/desc/{id}', 'EventDescController@show');
Route::post('/events/desc/{id}', 'EventDescController@storepic');

//new participate event
Route::get('/events/participate','EventIdeaController@create');
Route::post('/events/participate','EventIdeaController@store');
Route::get('/event/subscribe/{id}','EventController@subscribe');
Route::get('/event/unscribe/{id}','EventController@unscribe');

//add new goodie
Route::get('/article','ArticleController@create');
Route::post('/article','ArticleController@store');
Route::post('/goodie/category', 'ArticleCategoryController@create');
Route::delete('/goodie/category/{id}', 'ArticleCategoryController@delete');

Route::post('/events/insert','EventController@insert');
Route::delete('/events/{id}','EventController@delete');

//eventPast route
Route::get('/events/past', 'EventController@past');

//eventSoon route
Route::get('/events/soon', 'EventController@event');

//DetailEvenSoon
Route::get('/events/soon/{id}','EventController@detail');

//Liker and have the number of vote
Route::get('/idea/poll/add/{id}', 'EventIdeaController@addPoll');
Route::get('/idea/poll/{id}', 'EventIdeaController@getPoll');

//Shop routes
Route::get('/shop', 'ShopController@index');

//Download all route
Route::get('/picture/events/{id}', 'EventController@downloadzip');

Route::post('/shop/basket', 'ShopController@saveBasket');
Route::get('/shop/basket', 'ShopController@retrieveBasket');
Route::get('/shop/confirm', function(){
	return view('shop.confirm');
});
Route::post('/shop/command', 'ShopController@command');

//Notification route
Route::get('/notification','NotificationController@notif');

//DeleteNotif route
Route::get('/signin/delete','NotificationController@deletenotif');
