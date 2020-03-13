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
Route::any('/home', 'IndexController@welcome'); //首页列表页
Route::get('/index/questions', 'IndexController@questions');


Route::get('/table', 'IndexController@table')->name('table'); //table页

Route::group(['middleware' => 'auth'],function($route){
    $route->get('/investigation/edit/{id}', 'InvestigationController@edit'); //编辑页
    $route->post('/investigation/save', 'InvestigationController@save'); //提交数据 更新和添加
    $route->post('/investigation/del', 'InvestigationController@del'); //删除
    $route->get('/investigation/fill/{id}', 'InvestigationController@fill'); //填表页面
    $route->post('/investigation/fillSubmit', 'InvestigationController@fillSubmit'); //填表页面
    $route->get('/investigation/data/{id}', 'InvestigationController@data'); //数据页面
    $route->get('/investigation/export/{id}', 'InvestigationController@export'); //数据页面
});


Route::get('/index', 'IndexController@index');

Auth::routes();

