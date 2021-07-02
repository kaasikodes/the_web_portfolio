<?php

use Illuminate\Http\Request;

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

// List articles
Route::get('articles', 'ArticlesController@index');
// List article
Route::get('articles/{article}', 'ArticlesController@show');
//create article
Route::post('article', 'ArticlesController@store');
//store article
Route::put('article', 'ArticlesController@store');
//delete article
Route::delete('article', 'ArticlesController@destroy');

Route::view('test','test');



// MAIN APPLICATION
Route::get('projects/{category}', 'ProjectsController@fetchCategory');

// This is a fix for the developer projects page
Route::get('projects/projects/{category}', 'ProjectsController@fetchCategory');


// messages
Route::post('messages/create','MessagesController@store');
