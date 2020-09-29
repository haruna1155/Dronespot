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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout.get');
    Route::get('/mypage','UsersController@mypage')->name('users.mypage');
    Route::resource('/posts', 'PostsController', ['except' => ['index', 'show']]);
});

Route::get('/','TopPageController@index')->name('welcome');
Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');

// ユーザ登録
Route::get('/signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('/signup', 'Auth\RegisterController@register')->name('signup.post');
// 認証
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login.post');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function() {
        Route::get('/favorites', 'UsersController@favorites')->name('users.favorites');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'posts/{id}'], function () {
        Route::post('/favorite', 'FavoritesController@store')->name('favorite');
        Route::delete('/unfavorite', 'FavoritesController@destroy')->name('unfavorite');
    });
});
