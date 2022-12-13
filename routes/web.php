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
use App\Http\Controllers\AuthorController;
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PostController@home');
Route::get('/posts', 'PostController@index');
Route::get('/posts/{id}', 'PostController@show');
//Route::resource('/posts', 'PostController');

Route::post('/author/login',[AuthorController::class, 'login']);
Route::post('/author/signup',[AuthorController::class, 'signup']);

Route::post('/posts/{id}/like','LikeController@update');


Route::group(['middleware'=>['auth:sanctum']], function(){
	Route::delete('/posts/{id}','PostController@destroy');
	Route::post('/posts/store', 'PostController@store');
	Route::patch('/posts/{id}/edit','PostController@update');
	Route::match(['get'],'/posts/{id}/edit','PostController@edit');
    Route::post('/logout',[AuthorController::class, 'logout']);
    //return $request->user();
});

Route::post('/author/create', 'AuthorController@store');