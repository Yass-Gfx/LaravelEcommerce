<?php

use Illuminate\Support\Facades\Route;

define('PAGINATION_COUNT', 10);

Route::group(['middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    /* Languages Routes */
    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', 'LanguageController@index')->name('admin.languages');
        Route::get('/create', 'LanguageController@create')->name('admin.languages.create');
        Route::post('/store', 'LanguageController@store')->name('admin.languages.store');
        Route::get('/edit/{id}', 'LanguageController@edit')->name('admin.languages.edit');
        Route::put('/update/{id}', 'LanguageController@update')->name('admin.languages.update');
        Route::get('/delete/{id}', 'LanguageController@destroy')->name('admin.languages.delete');
    });

    /** Main Categories Routes */
    Route::group(['prefix' => 'maincategories'], function () {
        Route::get('/', 'MainCategoriesController@index')->name('admin.maincategories');
        Route::get('/create', 'MainCategoriesController@create')->name('admin.maincategories.create');
        Route::post('/store', 'MainCategoriesController@store')->name('admin.maincategories.store');
        Route::get('/edit/{id}', 'MainCategoriesController@edit')->name('admin.maincategories.edit');
        Route::put('/update/{id}', 'MainCategoriesController@update')->name('admin.maincategories.update');
        Route::get('/delete/{id}', 'MainCategoriesController@destroy')->name('admin.maincategories.delete');
    });
});


Route::group(['middleware' => 'guest:admin', 'namespace' => 'Admin'], function () {
    Route::get('login', 'LoginController@getLogin')->name('getadmin.login');
    Route::post('login', 'LoginController@Login')->name('admin.login');
});


// Route::group(['prefix' => LaravelLocalization::setLocale(),
//     'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
//     /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
//     Route::get('/', function () {
//         return View::make('welcome');
//     });
// });