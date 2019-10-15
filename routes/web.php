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

Route::group(['middleware' => 'role:admin'], function() {

// Company.......................................
Route::get('company', 'Admin\Company\IndexController@index')->name('company-list');
Route::get('add-company', 'Admin\Company\IndexController@create')->name('add-company');
Route::post('add-company', 'Admin\Company\IndexController@store')->name('store-company');

Route::get('add-company/{id}', 'Admin\Company\IndexController@create')->name('add-edit-company');
Route::post('add-company/{id}', 'Admin\Company\IndexController@store')->name('store-company');

Route::get('delete-company/{id}', 'Admin\Company\IndexController@destroy')->name('delete-company');


// Store.......................................
Route::get('store', 'Admin\Store\IndexController@index')->name('store-list');
Route::get('add-store', 'Admin\Store\IndexController@create')->name('add-store');
Route::post('add-store', 'Admin\Store\IndexController@store')->name('store-store');

Route::get('add-store/{id}', 'Admin\Store\IndexController@create')->name('add-edit-store');
Route::post('add-store/{id}', 'Admin\Store\IndexController@store')->name('store-store');

Route::get('delete-store/{id}', 'Admin\Store\IndexController@destroy')->name('delete-store');


});

Route::get('/home', 'HomeController@index')->name('home');
