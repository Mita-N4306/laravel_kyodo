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
//新規登録
Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup'); //新規登録フォーム表示
Route::post('signup','Auth\RegisterController@register')->name('signup.post'); //新規登録処理を実行
//ログイン・ログアウト
Route::get('login','Auth\LoginController@showLoginForm')->name('login'); //ログインフォーム表示
Route::post('login','Auth\LoginController@login')->name('login.post'); //ログイン実行
Route::get('logout','Auth\LoginController@logout')->name('logout'); //ログアウト実行

Route::get('/', 'UsersController@index')->name('top');
