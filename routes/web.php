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

Route::resource('/posts', 'PostController');
Route::resource('/comments', 'CommentController', ['except' => ['destroy']]);
Route::delete('/comments/{comment}/{post}', 'CommentController@destroy');
Route::resource('/users', 'UserController');
Route::resource('/records', 'RecordController');
Route::resource('/photos', 'PhotoGalleryController');

Route::get('/posts/{post}/favorites', 'FavoriteController@store')->name('favorites');
Route::get('/posts/{post}/remove/favorites', 'FavoriteController@destroy')->name('removefavorites');
Route::get('/posts/{post}/count/favorites', 'FavoriteController@countFavorite');
Route::get('/posts/{post}/has/favorites', 'FavoriteController@hasFavorite');

Route::get('/posts/{post}/unfavorites', 'UnfavoriteController@store')->name('unfavorites');
Route::get('/posts/{post}/remove/unfavorites', 'UnfavoriteController@destroy')->name('removeunfavorites');
Route::get('/posts/{post}/count/unfavorites', 'UnfavoriteController@countUnfavorite');
Route::get('/posts/{post}/has/unfavorites', 'UnfavoriteController@hasUnfavorite');

Route::get('/contact', 'ContactController@index');
Route::post('/confirm', 'ContactController@confirm')->name('confirm');

Route::get('/terms/tos', 'TermsController@tos')->name('tos');
Route::get('/terms/privacyPolicy', 'TermsController@privacyPolicy')->name('privacyPolicy');
