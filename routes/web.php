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

$routes = [
    'users' => 'UserController',];

foreach ($routes as $key => $value) {


    Route::get('/' . $key, $value . '@index')->name($key); // Retrieve all data from table
    Route::get('/' . $key . '/{id}', $value . '@show')->where('id', '[0-9]+'); // Retrieve user which corresponds to passed ID
//Create
    Route::get('/' . $key . '/create', $value . '@create')->name($key . '_create');
    Route::post('/' . $key . '/create', $value . '@store');
//Update
    Route::get('/' . $key . '/edit')->name($key . '_edit');
    Route::get('/' . $key . '/edit/{id}', $value . '@edit');
    Route::patch('/' . $key . '/edit/{id}', $value . '@update');
//Destroy
    Route::get('/' . $key . '/delete')->name($key . '_delete');
    Route::get('/' . $key . '/delete/{id}', $value . '@destroy');
}

Route::get('index/claim/ucreate', 'ClaimController@userCreate')->name('claim_ucreate');
Route::post('index/claim/ucreate', 'ClaimController@userStore');

Route::get('/claims', 'ClaimControlle@index')->name('claims');
Route::get('/claims/{id}','ClaimController@show')->where('id', '[0-9]+');

Route::get('/confirm')->name('confirm');
Route::post('/confirm/{id}', 'ClaimController@confirmClaim');

Route::get('/reject')->name('reject');
Route::post('/reject/{id}', 'ClaimController@rejectClaim');

Route::get('/searchUsers', 'UserController@searchUsers')->name('search_user');


//Chat
Route::get('/chat','ChatController@index');
Route::get('/chat/conversations', 'ChatController@getConversations')->name('conversations1'); //vraća sve razgovore prijavljenog korisnika
Route::get('/chat/messages/{conversation_id}', 'ChatController@getMessages')->name('messages');
Route::post('/chat/messages', 'ChatController@createMessage')->name('create_message');

//Ruta za nepročitane notifikacije
Route::get('/markAsRead', function () {

    auth()->user()->unreadNotifications->markAsRead();

    return redirect()->back();

})->name('markRead');

