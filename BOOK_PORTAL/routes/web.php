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
Route::any('search/{q]' , 'SearchController@show');

#AutoComplete

Route::get('/autocomplete', 'SearchController@index');
Route::post('/autocomplete/fetch', 'SearchController@fetch')->name('autocomplete.fetch');

#/AutoComplete

Route::any('/', 'PagesController@index');

Route::get('/dashboard', 'PagesController@dashboard');

Route::get('/bookCategory', 'BooksController@index');

Route::get('/bookCategory/{id}', 'BooksController@show');

Route::get('/recommended', 'PagesController@recommend');


Route::resource('posts','PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('bookgenre','genreCont');

Route::resource('review','reviewCont');

Route::resource('book','ratingCont');

Route::get('bookCategory/book/{id}', 'ratingCont@show');
