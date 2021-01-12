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


  Route::get('/tags', 'TagsController@index');
  Route::get('/tags/new', 'TagsController@new');
  Route::post('/tags', 'TagsController@create');
  Route::get('/tags/edit/{tag}', 'TagsController@edit');
  Route::post('/tags/edit/{tag}', 'TagsController@edit');
  Route::patch('/tags/{tag}', 'TagsController@update');
  Route::delete('/tags/delete/{tag}', 'TagsController@destroy');



  Route::get('/users/{user}', 'UsersController@show')->name('users.show');
  // Route::post('/users/ajax', function (\Illuminate\Http\Request $request) {
  //   $data = $request->all();
  //   $id = $request->post_id;
  //   return $id;
  // });
  Route::post('/users/ajax', 'UsersController@ajax');

  // Route::post('/users',function (\Illuminate\Http\Request $request) {
  //   $data = $request->all();
  //   $id = $request->post_id;
  //   return $id;
  // });

  Route::get('/users/{user}/edit', 'UsersController@edit');
  Route::patch('/users/{user}', 'UsersController@update');


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
