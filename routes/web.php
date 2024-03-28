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

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

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
    Route::get('/top','PostsController@index')->name('top'); //ログインユーザーのトップページ
    Route::post('/posts','PostsController@store')->name('posts.store');
     //ユーザーアイコンの変更を取得する
    Route::post('/storage/images', 'PostsController@store')->name('storage.images');
    Route::get('/posts/edit/{post_id}','PostsController@edit')->name('posts.edit');
    Route::put('/posts/update/{post_id}','PostsController@update')->name('posts.update');
    Route::get('/profile','UsersController@profile')->name('profile');
    Route::get('/follow/{user_id}','UsersController@followProfile')->name('follow.profile');
    Route::get('/follower/{user_id}','UsersController@followerProfile')->name('follower.profile');
    Route::get('/search','UsersController@search');
    Route::get('/follow-list','PostsController@followList');
    Route::get('/follower-list','PostsController@followerList');
    Route::post('/follow/{user_id}','UsersController@follow')->name('follow');
    Route::post('/unfollow/{user_id}','UsersController@unfollow')->name('unfollow');
    //プロフィール編集機能
    Route::post('/profile/update','UsersController@updateProfile');//プロフィール編集画面
    Route::get('profile/update','UsersController@showUpdateForm');//プロフィール編集画面を表示
    Route::delete('/posts/destroy/{post_id}', 'PostsController@destroy')->name('posts.destroy');//投稿の削除
    // ログインしていないユーザー(gest）がログイン後のページに直接アクセスした場合、
    // ログインページにリダイレクトされるようになる！
    Route::get('/logout','Auth\LoginController@logout')->name('logout');
});
