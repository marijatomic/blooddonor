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

Route::get('index/claim/ucreate', 'ClaimController@userCreate')->name('claim_ucreate');
Route::post('index/claim/ucreate', 'ClaimController@userStore');

Route::get('/claims', 'ClaimControlle@index')->name('claims');
Route::get('/claims/{id}','ClaimController@show')->where('id', '[0-9]+');

