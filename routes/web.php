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
Route::match(['get'],'/posts/{id}edit/',[
    'uses'=>'PostController@edit'
]);
Route::get('/posts/{id}', 'PostController@show');
Route::resource('/posts', 'PostController');