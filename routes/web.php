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
    
    //ブログ編集
    Route::get('/post/edit/{id}', 'App\Http\Controllers\PostController@showEdit')->name('edit');
    //更新
    Route::post('/post/update', 'App\Http\Controllers\PostController@exeUpdate')->name('update');
    
    //ブログ削除
    Route::post('/post/delete/{id}', 'App\Http\Controllers\PostController@exeDelete')->name('delete');

    Route::get('search','App\Http\Controllers\PostController@search')->name('search');
    Route::get('search/{char}','App\Http\Controllers\PostController@search')->name('search_char');

    Route::get('/profile/{id}','App\Http\Controllers\ProfileController@user_profile')->name('user_profile');
    //ユーザー設定
    Route::get('/profile/edit/{id}','App\Http\Controllers\ProfileController@user_edit')->name('user_edit');

    Route::resource('user', 'App\Http\Controllers\UserController');
    
    Route::post('/post/{comment_id}/comments','App\Http\Controllers\CommentsController@store');

    //コメント取消処理
        Route::get('/comments/{comment_id}', 'App\Http\Controllers\CommentsController@destroy');
    
});

//ブログ詳細画面を表示
Route::get('/post/{id}', 'App\Http\Controllers\PostController@showDetail')->name('show');

require __DIR__.'/auth.php';
