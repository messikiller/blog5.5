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

Route::get('/', 'ArticleController@index')->name('home.index');
Route::get('/view/{id}', 'ArticleController@view')->name('home.view');

Route::get('/login', 'Admin\AuthController@login')->name('admin.auth.login');
Route::post('/login', 'Admin\AuthController@check')->name('admin.auth.login');
Route::get('/logout', 'Admin\AuthController@logout')->name('admin.auth.logout');

Route::group([
    'middleware' => 'login',
    'namespace'  => 'Admin',
    'prefix'     => 'admin'
], function () {
    Route::get('/', 'IndexController@index')->name('admin.index.index');
    Route::get('/welcome', 'IndexController@welcome')->name('admin.index.welcome');

    Route::get('/article/index', 'ArticleController@index')->name('admin.article.index');
    Route::get('/article/add', 'ArticleController@add')->name('admin.article.add');
});
