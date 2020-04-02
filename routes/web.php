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
  Route::any('search', 'HomeController@search')->name('search');
  /* editorial Board Routes Starts*/
	Route::get('all-editorial/{slug?}', 'BoardController@showalleditorial')->name('all-editorial');
  Route::get('all-editorial-category/{categorySlug}', 'BoardController@categoryeditorial')->name('all-editorial-category');
  /* editorial Board Routes Starts*/
  /* Ined Library Routes Starts*/
  Route::get('ined-library', 'LibraryController@index')->name('ined-library');
	Route::get('ined-library/{categorySlug}/{typeSlug}', 'LibraryController@single')->name('ined-library-single');
	Route::get('ined-library-detail/{categorySlug}', 'LibraryController@detail')->name('ined-library-detail');
  /* Ined Library Routes Ends*/
  /* Pages Route Starts */
  Route::get('about-us', 'HomeController@about')->name('about-us');
  Route::get('privacy-policy', 'HomeController@privacy')->name('privacy-policy');
  Route::get('terms-of-use', 'HomeController@term')->name('terms-of-use');
  Route::get('contact-us', 'ContactController@index')->name('contact-us');
  Route::get('news-and-events', 'NewsController@index')->name('news-and-events');
  Route::get('meet-the-team', 'TeamController@index')->name('meet-the-team');
  Route::post('contact-us', 'ContactController@store')->name('contact-submit');
  Route::post('subscribe', 'ContactController@subscribe')->name('subscribe');
  /* Pages Route Ends */

});



//Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('ined_admin')->middleware(['auth','can:isAllowed,"Admin:"'])->group(function () {
       Route::get('/','Admin\DashboardController@dashboard')->name('dashboard');
       Route::get('leads','Admin\DashboardController@leads')->name('leads');
       Route::get('subscribers','Admin\DashboardController@subscribers')->name('subscribers');
       Route::get('downloadleads','Admin\DashboardController@downloadleads')->name('downloadleads');
       Route::resource('categories','Admin\CategoryController');
       Route::resource('libraries','Admin\LibraryController');
       Route::resource('boards','Admin\BoardController');
       Route::resource('team','Admin\TeamController');
       Route::resource('member','Admin\MemberController');
       Route::resource('news','Admin\NewsController');
       Route::post('subcategories','Admin\CategoryController@subcategories')->name('subcategories');
});