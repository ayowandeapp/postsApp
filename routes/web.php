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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostController@home');
Route::post('/posts/store', 'PostController@store');
Route::match(['get'],'/posts/{id}/edit','PostController@edit');
Route::patch('/posts/{id}/edit','PostController@update');
Route::get('/posts/{id}', 'PostController@show');
Route::delete('/posts/{id}','PostController@destroy');
//Route::resource('/posts', 'PostController');

Route::post('/author/store', 'AuthorController@store');