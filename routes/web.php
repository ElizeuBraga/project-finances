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
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::get("lerics/sendWordsToMail", "LericsController@sendWordsToMail");
Route::post("lerics/storeWord", "LericsController@storeWord")->middleware('auth');
Route::post("lerics/sendWordsToMail", "LericsController@sendWordsToMail")->middleware('auth');
Route::resource("lerics", "LericsController")->middleware('auth');

Route::resource("revenues", "RevenuesController")->middleware('auth');
Route::resource("revenue-amounts", "RevenueAmountsController")->middleware('auth');
Route::resource("expenses", "ExpenseController")->middleware('auth');
Route::resource("expense-amounts", "ExpensesAmountController")->middleware('auth');
Route::resource("expense-categories", "ExpensesCategorieController")->middleware('auth');
Route::resource("expense-sub-categories", "ExpensesSubCategorieController")->middleware('auth');

// Route::get('/perfil/{user}', 'UserController@edit')->name('user.edit');
// Route::put('/perfil/{user}/editar', 'UserController@update')->name('user.update');
// Route::get('/perfil', 'UserController@profile')->name('profile');
// Route::get('/carteira', 'WalletController@index')->name('wallet')->middleware('auth');
// Route::post('/carteira', 'WalletController@store')->name('wallet.submit')->middleware('auth');
// Route::get('/fontes', 'IncomesController@create')->name('income')->middleware('auth');
// Route::post('/fontes', 'IncomesController@store')->name('income')->middleware('auth');
// Route::post('/carteira/{id}', 'walletController@destroy')->middleware('auth');
// // Route::get('/produto', 'ProductController@index')->name('product')->middleware('auth');
// Route::get('/produto', 'ProductController@create')->name('product')->middleware('auth');
// Route::post('/produto', 'ProductController@store')->name('product.submit')->middleware('auth');
// Route::get('/categorias', 'CategoryController@create')->name('category')->middleware('auth');
// Route::post('/categorias', 'CategoryController@store')->name('category.submit')->middleware('auth');
// Route::get('/relatorios', 'ReportController@index')->name('report')->middleware('auth');
// Route::get('/freelances', 'FreelanceController@create')->name('freelances')->middleware('auth');
// Route::post('/freelances', 'FreelanceController@store')->name('freelances.submit')->middleware('auth');
// Route::post('/regioes', 'RegionController@store')->middleware('auth');
// Route::post('/taxas', 'RateController@store')->middleware('auth');
// Route::post('/despesas', 'ExpenseController@store')->name('expenses.submit')->middleware('auth');
// Route::get('/despesas', 'ExpenseController@create')->name('expenses')->middleware('auth');
// Route::get('/economize', 'ExpenseController@saveMoney');
// Route::get('/livrosparaler', 'ExpenseController@books');

