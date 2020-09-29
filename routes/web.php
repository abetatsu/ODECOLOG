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

// Route::get('/', function () {
//     return view('welcome');
// });

use Psy\VersionUpdater\GitHubChecker;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentController');
Route::resource('users', 'UserController');
Route::resource('records', 'RecordController');
Route::resource('photos', 'PhotoGalleryController');

Route::get('posts/{post}/favorites', 'FavoriteController@store')->name('favorites');
Route::get('posts/{post}/removefavorites', 'FavoriteController@destroy')->name('removefavorites');
Route::get('posts/{post}/countfavorites', 'FavoriteController@countfavorite');
Route::get('posts/{post}/hasfavorites', 'FavoriteController@hasfavorite');

Route::get('posts/{post}/unfavorites', 'UnfavoriteController@store')->name('unfavorites');
Route::get('posts/{post}/removeunfavorites', 'UnfavoriteController@destroy')->name('removeunfavorites');
Route::get('posts/{post}/countunfavorites', 'UnfavoriteController@countunfavorite');
Route::get('posts/{post}/hasunfavorites', 'UnfavoriteController@hasunfavorite');

Route::get('/contact', 'ContactController@index');
Route::post('/confirm', 'ContactController@confirm')->name('confirm');
