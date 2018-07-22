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
    return view('index');
});
Route::post('/shorten', 'UrlController@processUrl')->name('shorten');
Auth::routes();
Route::get('{hash}', 'UrlController@redirectHash')->where('hash', '[0-9a-zA-Z]{6}');