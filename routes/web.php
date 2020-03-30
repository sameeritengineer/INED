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

// Route::get('/', function () {
//     //return view('welcome');
//     return view('web.home.index');
// });

Auth::routes();
Route::group([
    'namespace'=>'Web',
    'as' => 'web.',
],function(){
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('all-editorial/{slug?}', 'HomeController@showalleditorial')->name('all-editorial');
	Route::get('ined-library', 'LibraryController@index')->name('ined-library');
	//Route::get('ined-library/{categorySlug}/{typeSlug}', 'LibraryController@single')->name('ined-library-single');
	//Route::get('ined-library-detail/{categorySlug}', 'LibraryController@detail')->name('ined-library-detail');

});



//Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('ined_admin')->middleware(['auth','can:isAllowed,"Admin:"'])->group(function () {
       Route::get('/','Admin\DashboardController@dashboard')->name('dashboard');
       Route::resource('categories','Admin\CategoryController');
       Route::resource('libraries','Admin\LibraryController');
       Route::resource('boards','Admin\BoardController');
       Route::resource('news','Admin\NewsController');
       Route::post('subcategories','Admin\CategoryController@subcategories')->name('subcategories');
});