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
//自分の投稿
Route::get('post/mypost','PostController@mypost')->name('post.mypost');
//自分の返信コメント
Route::get('post/mycomment','PostController@mycomment')->name('post.mycomment');
//投稿機能
Route::get('post/create','PostController@create')->name('post.create'); //新規投稿表示
Route::post('post','PostController@store')->name('post.store'); //新規投稿実行
Route::get('post','PostController@index')->name('post.index'); //投稿一覧ページ
Route::get('post/{post}','PostController@show')->name('post.show'); //投稿個別表示
Route::get('post/{post}/edit','PostController@edit')->name('post.edit'); //投稿編集フォームの表示
Route::put('post/{post}','PostController@update')->name('post.update'); //編集したデーターを保存
Route::delete('post/{post}','PostController@destroy')->name('post.destroy'); //データー削除

//コメント機能
Route::post('post/comment/store','CommentController@store')->name('comment.store'); //コメントを保存
//お問い合わせ機能
Route::get('contact/create','ContactController@create')->name('contact.create');
Route::post('contact/store','ContactController@store')->name('contact.store');
