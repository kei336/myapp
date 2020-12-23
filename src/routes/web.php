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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'auth'], function(){
  Route::get('/', 'PostsController@index');
  Route::get('/posts/{post}', 'PostsController@show')->where('post', '[0-9]+');
  Route::get('/posts/new', 'PostsController@new');
  Route::post('/posts', 'PostsController@create');
  Route::get('/posts/edit/{post}', 'PostsController@edit');
  Route::post('/posts/edit/{post}', 'PostsController@edit');
  Route::patch('/posts/{post}', 'PostsController@update');
  Route::delete('/posts/delete/{post}', 'PostsController@destroy');
});


// Route::get('/users/new', 'UsersController@new');
// Route::post('/users', 'UsersController@create');
// Route::get('users/login', 'UsersController@login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
