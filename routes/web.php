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


Route::get('/', 'HomeController@index')->name('home');
Route::post('/edit/text','HomeController@editText');
Route::get('/news/list', 'NewsController@index')->name('news');
Route::post('/news/create', 'NewsController@addNews');
Route::get('/gallery', 'GalleryController@index')->name('gallery');
Route::post('/gallery/add_img', 'GalleryController@add_img');
Route::get('/news/{id}', 'NewsController@getNews')->name('getNews');
Route::post('/news/delete','NewsController@deleteNews');