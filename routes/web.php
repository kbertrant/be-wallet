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

Route::get('/confirm-account', 'AccountController@confirmAccount')->name('confirm.account');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');

Route::get('transactions/checkout', 'TransactionController@checkout')->name('checkout');
Route::post('transactions/checkout', 'TransactionController@postCheckout')->name('checkout.post');

Route::get('transfers/search-users', 'TransferController@getUserByIdAndEmail');
Route::get('transfers/users/data', 'TransferController@getData');
Route::resource('transfers', 'TransferController');
Route::resource('transactions', 'TransactionController');

Route::post('applications/token', 'ApplicationController@getToken');

Route::resource('applications', 'ApplicationController');
