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

# ------------------ Index Route ------------------------
Route::any('/', 'IndexController@welcome'); //首页列表页
Route::get('/index/questions', 'IndexController@questions');


Route::get('/table', 'IndexController@table')->name('table'); //table页
Route::get('/edit/{id}', 'IndexController@edit')->name('edit'); //建表页

Route::post('/investigation/save', 'InvestigationController@save'); //建表页

Route::get('/index', 'IndexController@index');

Auth::routes();

