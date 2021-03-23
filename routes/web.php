<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin','namespace'=>'Backend'], function() {
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('/home', 'HomeController@index');
    Route::resource('users', 'UserController')->except('show');
    Route::resource('categories', 'CategoryController')->except('show');
    Route::resource('tags', 'TagController')->except('show');
    Route::resource('posts', 'PostController')->except('show');
    Route::resource('pages', 'PageController')->except('show');
    Route::resource('comments', 'CommentController')->except('show');
    Route::resource('settings', 'SettingController')->except('show');
    Route::post('comments/{id}/reply', 'CommentController@replyComments')->name('comments.replycomments');
});


Auth::routes();

Route::get('/', 'HomeController@homePage')->name('home.page');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'HomeController@category')->name('category.home.index');
Route::get('/author/{id}', 'HomeController@author')->name('author.home.index');
Route::get('/post/{id}', 'HomeController@post')->name('post.index');
Route::post('comments', 'HomeController@addComments')->name('comments.addcomments');
Route::post('comments/{id}/reply', 'HomeController@replaycomments')->name('comments.replaycomments');
Route::get('contact-us', 'HomeController@contactus')->name('contactus.home');
Route::post('contact-us/send', 'HomeController@sendMessage')->name('sendMessage.home');
Route::get('page/{id}/{slug}', 'HomeController@page')->name('page.index');
