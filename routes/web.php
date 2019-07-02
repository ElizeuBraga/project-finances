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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/carteira', 'walletController@index')->name('wallet')->middleware('auth');
Route::post('/carteira', 'walletController@store')->name('wallet')->middleware('auth');
Route::get('/fontes', 'IncomesController@create')->name('income')->middleware('auth');
Route::post('/fontes', 'IncomesController@store')->name('income')->middleware('auth');
Route::post('/carteira/{id}', 'walletController@destroy')->middleware('auth');
Route::get('/produto', 'productController@index')->name('product')->middleware('auth');
Route::get('/categoria', 'categoryController@index')->name('category')->middleware('auth');
Route::get('/relatorios', 'reportController@index')->name('report')->middleware('auth');
Route::get('/freelances', 'freelanceController@index')->name('freelances')->middleware('auth');
Route::post('/freelances', 'freelanceController@store')->name('freelances.submit')->middleware('auth');

