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

Route::get('/pass', function()
{
	$pass = Hash::make('mm644');
    return "<html><h1>password is $pass</h1></html>";
});


Route::get('/', function () {
    return "<html><h1>test.php</h1></html>";
});








