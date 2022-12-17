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

Route::middleware(['guest'])->group(function() {
    Route::get('/', function() { return view('auth.login'); });
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/sns/', 'PostController@index');
Route::post('/sns/create', 'PostController@create')->name('post.create');
Route::post('/sns/delete', 'PostController@delete')->name('post.delete');


Auth::routes();