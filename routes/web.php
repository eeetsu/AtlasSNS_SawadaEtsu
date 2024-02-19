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

 //Route::get('/', function () {
   // return view('welcome');
 //});
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// ログアウト中のページ
Route::middleware(['guest'])->group(function () {
    Route::get('/login','Auth\LoginController@login')->name('login');
    Route::post('/login','Auth\LoginController@login');
    Route::get('/register','Auth\RegisterController@register');
    Route::post('/register','Auth\RegisterController@register');
    Route::get('/added','Auth\RegisterController@added')->name('added');
    Route::post('/added','Auth\RegisterController@added');
});

// ログイン中のページ
Route::middleware(['auth'])->group(function () {
    Route::get('/top','PostsController@index');
    Route::post('/posts','PostsController@store')->name('posts.store');
    Route::get('/profile','UsersController@profile');
    Route::get('/search','UsersController@search');
    Route::get('/follow-list','PostsController@followList');
    Route::get('/follower-list','PostsController@followerList');
    Route::post('/follow/{user_id}','UsersController@follow');
    Route::post('/unfollow/{user_id}','UsersController@unfollow');
});

// ログインしていないユーザー(gest）がログイン後のページに直接アクセスした場合、
// ログインページにリダイレクトされるようになる！
Route::middleware(['auth'])->group(function () {
    Route::get('/logout','Auth\LoginController@logout')->name('logout');
});
