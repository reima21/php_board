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

//Route::get('/', function () {
//    return view('welcome');
//});


//Top
//Route::get('/', 'WelcomeController@index');
Route::resource('bbc', 'PostsController');

//Post
Route::get('post', 'PostsController@post');

Route::get('bbc/detail', 'PostsController@show');



//Comment
//Route::get('comment', 'PagesController@comment');
Route::resource('comment', 'CommentsController');

//
//Route::resource('bbc', 'PostsController');

