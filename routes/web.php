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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index','LandPage1Controller@index');
Route::get('/index1','LandPage2Controller@index');
Route::get('/index2','LandPage3Controller@index');

Route::get('/searchUsers', 'UserController@searchUsers')->name('search_user');


//Chat
Route::get('/chat','ChatController@index');
Route::get('/chat/conversations', 'ChatController@getConversations')->name('conversations1'); //vraća sve razgovore prijavljenog korisnika

