<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.home');
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