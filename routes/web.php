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


Route::get('sobre', function () {
    return view('about');
});

Auth::routes();

Route::get('contact-us', 'ContactUSController@contactUS');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactUSPost']);

Route::resource('files', 'FileController');
Route::resource('subscriptions', 'SubscriptionController');
Route::resource('posts', 'PostController');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/show/{id}', 'HomeController@show')->name('show');
Route::get('/eventos', 'HomeController@event')->name('evento');
Route::get('/artigos', 'HomeController@artigo')->name('artigo');
Route::get('/inscricoes', 'HomeController@inscricao')->name('inscricao');
Route::get('/home', 'HomeController@index')->name('home');
