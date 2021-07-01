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






Route::get('/', 'HomeController@index')->name('index');

Auth::routes();



// User Controller
Route::get('/register', 'UserController@create')->name('register');
Route::get('/login', 'UserController@login')->name('login');


// About Controller
Route::get('/about','AboutController@show')->name('about.show');
Route::get('/about/index','AboutController@index')->name('about.index');
Route::get('/about/edit','AboutController@edit')->name('about.edit');
Route::get('/about/create','AboutController@create')->name('about.create'); 
Route::post('/about/store','AboutController@store')->name('about.store');
Route::put('/about/update','AboutController@update')->name('about.update');

// Projects Controller
Route::resource('projects',ProjectsController::class);


// Contact Controller
Route::resource('contact',ContactController::class);

// Resume Controller
Route::resource('resume',ResumeController::class);
Route::get('resume/{resume}/download','ResumeController@download')->name('resume.download');

