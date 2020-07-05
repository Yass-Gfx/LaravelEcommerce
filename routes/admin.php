<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('admin.dashboard');
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