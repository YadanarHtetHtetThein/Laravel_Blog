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

Route::get('/', function () {
    return view('index');
})->name('home');


Route::group(['prefix'=>'articles'], function(){
    Route::get('/', 'ArticleController@index')->name('article#index');
    Route::get('details/{id}', 'ArticleController@show')->name('article#detail');
    Route::get('create', 'ArticleController@create')->name('article#create');
    Route::post('create', 'ArticleController@store')->name('article#store');
    Route::get('edit/{id}', 'ArticleController@edit')->name('article#edit');
    Route::post('edit/{id}', 'ArticleController@update')->name('article#update');
    Route::get('destory/{id}', 'ArticleController@destroy')->name('article#delete');
});

Route::group(['prefix'=>'comments'], function(){
    Route::post('store','CommentController@store')->name('comment#store');
    Route::get('delete/{id}','CommentController@destroy')->name('comment#destory');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
