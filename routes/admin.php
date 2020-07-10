<?php

use Illuminate\Support\Facades\Route;

define('PAGINATION_COUNT', 10);

Route::group(['middleware' => 'guest:admin', 'namespace' => 'Admin'], function () {
    Route::get('login', 'LoginController@getLogin')->name('getadmin.login');
    Route::post('login', 'LoginController@Login')->name('admin.login');
});


Route::group(['middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    /* Languages Routes */
    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', 'LanguageController@index')->name('admin.languages');
        Route::get('/create', 'LanguageController@create')->name('admin.languages.create');
        Route::get('/store', 'LanguageController@store')->name('admin.languages.store');
    });
});



// Route::group(['prefix' => LaravelLocalization::setLocale(),
//     'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
//     /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
//     Route::get('/', function () {
//         return View::make('welcome');
//     });
// });