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

Route::get('signup','Auth\RegisterController@ShowRegistrationForm')->name('signup'); //新規登録フォーム表示
Route::post('signup','Auth\RegisterController@Register')->name('signup.post'); //新規登録処理を実行

Route::get('/', 'UsersController@index')->name('top');
