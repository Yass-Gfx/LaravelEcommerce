<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest:admin', 'namespace' => 'Admin'], function () {
    Route::get('login', 'LoginController@getLogin')->name('getadmin.login');
    Route::post('login', 'LoginController@Login')->name('admin.login');
});


Route::group(['middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
});



// Route::group(['prefix' => LaravelLocalization::setLocale(),
//     'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
//     /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
//     Route::get('/', function () {
//         return View::make('welcome');
//     });
// });