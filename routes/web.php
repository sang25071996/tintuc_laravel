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

Route::get('/', function () {
    return view('welcome');
});
	Route::get('admin/login','Admin\LoginController@getlogin')->name('getlogin');
	Route::post('admin/login','Admin\LoginController@postlogin')->name('postlogin');
	Route::get('admin/logout','Admin\LoginController@logout')->name('getlogout');
	Route::prefix('admin')->middleware('admin_login')->namespace('Admin')->group(function(){

		Route::get('/','DashboardController@index')->name('admin.dashboard');
		Route::get('trang-chu', 'DashboardController@index')->name('admin.dashboard');
		Route::prefix('category')->group(function(){
			Route::get('list','CategoryController@index')->name('admin.category.index');
			Route::get('add','CategoryController@create')->name('admin.category.create');
			Route::post('add','CategoryController@store')->name('admin.category.store');
			Route::get('delete/{id}','CategoryController@destroy')->name('admin.category.destroy');
			Route::get('edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
			Route::post('edit/{id}','CategoryController@update')->name('admin.category.update');
		});
		Route::prefix('news')->group(function(){
			Route::get('list','NewsController@index')->name('admin.news.index');
			Route::get('add','NewsController@create')->name('admin.news.create');
			Route::post('add','NewsController@store')->name('admin.news.store');
			Route::get('delete/{id}','NewsController@destroy')->name('admin.news.destroy');
			Route::get('edit/{id}', 'NewsController@edit')->name('admin.news.edit');
			Route::post('edit/{id}','NewsController@update')->name('admin.news.update');
		});
		Route::prefix('user')->group(function(){
			Route::get('list','UserController@index')->name('admin.user.index');
			Route::get('add','UserController@create')->name('admin.user.create');
			Route::post('add','UserController@store')->name('admin.user.store');
			Route::get('delete/{id}','UserController@destroy')->name('admin.user.destroy');
			Route::get('edit/{id}', 'UserController@edit')->name('admin.user.edit');
			Route::post('edit/{id}','UserController@update')->name('admin.user.update');
		});
});

