<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('ined_admin')->middleware(['auth','can:isAllowed,"Admin:"'])->group(function () {
       Route::get('/','Admin\DashboardController@dashboard')->name('dashboard');
       Route::resource('categories','Admin\CategoryController');
       Route::resource('libraries','Admin\LibraryController');
       Route::resource('boards','Admin\BoardController');
       Route::post('subcategories','Admin\CategoryController@subcategories')->name('subcategories');
});