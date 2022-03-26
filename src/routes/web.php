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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/top', 'TopController@index')->name('top');
  Route::get('/admin', 'TopController@admin')->name('admin');
  Route::post('/post', 'TopController@post')->name('post');
  Route::get('/delete/{id}', 'TopController@deleteAccount')->name('delete');
  Route::get('/content_delete/{id}', 'TopController@deleteContent')->name('content_delete');
  Route::get('/make_admin/{id}', 'TopController@makeAdmin')->name('make.admin');
  Route::post('/admin/name/edit', 'TopController@editName')->name('edit.name');
  Route::post('/admin/contents/name_edit', 'TopController@editContentName')->name('edit.content_name');
  Route::get('/admin/contents/edit', 'TopController@editContent')->name('admin.contents');
});