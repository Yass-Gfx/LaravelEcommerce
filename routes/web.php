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

// Route::group(['prefix' => LaravelLocalization::setLocale(),
//     'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
//     /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
//     Route::get('/', function () {
//         return View::make('welcome');
//     });

//     Route::get('test', function () {
//         return 'Test Route';
//     });
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
