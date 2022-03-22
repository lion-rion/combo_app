<?php

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
Route::get('/', 'App\Http\Controllers\PostController@show')->name('posts');

Route::group(['middleware' => ['auth']], function() { 
    //ブログ登録画面
    Route::get('/post/create', 'App\Http\Controllers\PostController@showCreate')->name('create');
    
    //ブログ登録
    Route::post('/post/store', 'App\Http\Controllers\PostController@exeStore')->name('store');
    
    //ブログ詳細画面を表示
    Route::get('/post/{id}', 'App\Http\Controllers\PostController@showDetail')->name('show');
    
    //ブログ編集
    Route::get('/post/edit/{id}', 'App\Http\Controllers\PostController@showEdit')->name('edit');
    //更新
    Route::post('/post/update', 'App\Http\Controllers\PostController@exeUpdate')->name('update');
    
    //ブログ削除
    Route::post('/post/delete/{id}', 'App\Http\Controllers\PostController@exeDelete')->name('delete');

    Route::get('/serch','App\Http\Controllers\PostController@serch')->name('serch');
    Route::get('search','App\Http\Controllers\PostController@search')->name('search');

});


require __DIR__.'/auth.php';
