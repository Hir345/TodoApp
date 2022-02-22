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

Route::get('/','App\Http\Controllers\Hellocontroller@index');
//トップページ

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware('auth')->group(function(){
    // ログイン後のトップページaaaa
    Route::get('/board','App\Http\Controllers\CategoryController@index');
    //ログアウト
    Route::post('/board','App\Http\Controllers\CategoryController@logout');

    //タスクの詳細表示
    Route::get('/board/{id}','App\Http\Controllers\CategoryController@detail');
    //todoの削除
    Route::post('/board/{id}','App\Http\Controllers\CategoryController@delTodo');

    //タスク作成ページ
    Route::get('/add','App\Http\Controllers\CategoryController@addCategory');
    //タスクの作成
    Route::post('/add','App\Http\Controllers\CategoryController@createCategory');

    //タスク編集ページ
    Route::get('/board/{id}/edit','App\Http\Controllers\CategoryController@edit');
    //タスクの編集
    Route::post('/board/{id}/edit','App\Http\Controllers\CategoryController@update');

    //タスク削除ページ
    Route::get('/board/{id}/del','App\Http\Controllers\CategoryController@delete');
    //タスク削除
    Route::post('/board/{id}/del','App\Http\Controllers\CategoryController@remove');

    //todo作成ページ
    Route::get('/board/{id}/addTodo','App\Http\Controllers\CategoryController@addTodo');
    //todo作成
    Route::post('/board/{id}/addTodo','App\Http\Controllers\CategoryController@createTodo');
});

/*Route::get('/board','App\Http\Controllers\CategoryController@index');

Route::get('/board/{id}','App\Http\Controllers\CategoryController@detail');

Route::post('/board/{id}','App\Http\Controllers\CategoryController@delTodo');

Route::get('/add','App\Http\Controllers\CategoryController@addCategory');

Route::post('/add','App\Http\Controllers\CategoryController@createCategory');

Route::get('/board/{id}/edit','App\Http\Controllers\CategoryController@edit');

Route::post('/board/{id}/edit','App\Http\Controllers\CategoryController@update');

Route::get('/board/{id}/del','App\Http\Controllers\CategoryController@delete');

Route::post('/board/{id}/del','App\Http\Controllers\CategoryController@remove');

Route::get('/board/{id}/addTodo','App\Http\Controllers\CategoryController@addTodo');

Route::post('/board/{id}/addTodo','App\Http\Controllers\CategoryController@createTodo');*/
