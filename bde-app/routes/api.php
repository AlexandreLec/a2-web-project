<?php

use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/event', 'EventController@index');

Route::get('/event/users/{id}', 'EventController@participants');

Route::get('/event/users/csv/{id}', 'EventController@participantsCsv');

Route::get('/users', 'UserController@list');

Route::get('/users/{id}', 'UserController@get');

Route::get('/ideas', 'EventIdeaController@getAll');

Route::get('/idea/{id}/poll', 'EventIdeaController@addPoll');


Route::get('/shop/goodies', 'ShopController@goodies');

Route::get('/goodie/category', 'ArticleCategoryController@index');

//events' pictures
Route::get('/event/pictures/{id}', 'EventController@eventImgs');

//event picture comments
Route::get('/event/pictures/{id}/comments', 'CommentController@getComments');
Route::post('/event/pictures/{id}/comments', 'CommentController@addComment');

