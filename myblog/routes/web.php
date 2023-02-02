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
    return view('welcome');
});
Route::get('/test', function () {
    return view('testdb');
});
Route::get('/test1', function () {
    dd(env('DB_DATABASE'));
});

Route::get('articles', 'App\Http\Controllers\Article@index');
Route::get('bisat','App\Http\Controllers\ArticleController@index')->name('article.index');
Route::get('show/{id}','App\Http\Controllers\ArticleController@show')->name('article.show');
Route::middleware(['auth'])->group(function () {
Route::get('create','App\Http\Controllers\ArticleController@create')->name('article.create');
Route::get('edit/{id}','App\Http\Controllers\ArticleController@edit')->name('article.edit');
Route::PUT('update/{id}','App\Http\Controllers\ArticleController@update')->name('article.update');
Route::DELETE('destroy/{id}','App\Http\Controllers\ArticleController@destroy')->name('article.destroy');
Route::post('store','App\Http\Controllers\ArticleController@store')->name('article.store');
});
Route::get('/auteur/{auth}', function ($id) {
    return view('auteur');
});
Route::get('/ajouter', function ($id) {
    return view(ajouter);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
