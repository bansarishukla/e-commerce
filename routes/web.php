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

use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    });
    Route::resource('/product','ProductController');
    Route::post('/product/{id}','ProductController@update');
    Route::resource('/category','CategoryController');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/display','ProductController@getProduct');
