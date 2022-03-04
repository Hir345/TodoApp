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
    Route::get('/board','App\Http\Controllers\CategoryController@index');
    // ログイン後のトップページ
    Route::post('/board','App\Http\Controllers\CategoryController@logout');
    //ログアウト

    Route::get('/board/{id}','App\Http\Controllers\CategoryController@detail');
    //タスクの詳細表示
    Route::post('/board/{id}','App\Http\Controllers\CategoryController@delTodo');
    //todoの削除

    Route::get('/add','App\Http\Controllers\CategoryController@addCategory');
    //タスク作成ページ
    Route::post('/add','App\Http\Controllers\CategoryController@createCategory');
    //タスクの作成

    Route::get('/board/{id}/edit','App\Http\Controllers\CategoryController@edit');
    //タスク編集ページ
    Route::post('/board/{id}/edit','App\Http\Controllers\CategoryController@update');
    //タスクの編集

    Route::get('/board/{id}/del','App\Http\Controllers\CategoryController@delete');
    //タスク削除ページ
    Route::post('/board/{id}/del','App\Http\Controllers\CategoryController@remove');
    //タスク削除

    Route::get('/board/{id}/addTodo','App\Http\Controllers\CategoryController@addTodo');
    //todo作成ページ
    Route::post('/board/{id}/addTodo','App\Http\Controllers\CategoryController@createTodo');
    //todo作成
});
