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

/*--------------
 W E B   A P I
--------------*/
Route::get('/admin/{file?}', 'HomeController@index');
Route::post('/add/{thing}', 'CreationController@things');
Route::post('/discordToggle', 'CreationController@discordToggle');
Route::post('/discordInit', 'CreationController@discordInit');
Route::post('/colors', 'CreationController@colors');
Route::post('/delete', 'DeletionController@things');

/*--------------
 J S O N   A P I
--------------*/
Route::get('/json/app', 'JsonController@app');
Route::get('/json/discord-roles', 'JsonController@discordRoles');


// Route::get('fire', function () {
//     // this fires the event
//     event(new App\Events\TurnOnDiscord('web.php'));
//     return "event fired";
// });
