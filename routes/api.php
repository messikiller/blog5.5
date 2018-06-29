<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'namespace' => 'Api'
], function () {
    Route::get('/article/list', 'ArticleController@list')->name('api.article.list');
    Route::get('/article/view/{id}', 'ArticleController@view')->name('api.article.view');
});