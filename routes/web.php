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

Route::get('/', function () {
    return view('welcome');
})->name('home.page');


Route::group(['prefix' => 'admin','namespace'=>'Backend'], function() {
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('/home', 'HomeController@index');
    Route::resource('users', 'UserController')->except('show');
    Route::resource('categories', 'CategoryController')->except('show');
    Route::resource('tags', 'TagController')->except('show');
    Route::resource('posts', 'PostController')->except('show');
    Route::resource('pages', 'PageController')->except('show');
    Route::resource('comments', 'CommentController')->except('show');
    Route::post('comments/{id}/reply', 'CommentController@replyComments')->name('comments.replycomments');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'HomeController@category')->name('category.home.index');
