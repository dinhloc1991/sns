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

Route::get('/user/login', 'UserController@loginGet');
Route::post('/user/login', 'UserController@loginPost')->name('user.login');

Route::get('/sns/', 'PostController@index');
Route::post('/sns/create', 'PostController@create')->name('post.create');
Route::post('/sns/delete', 'PostController@delete')->name('post.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
