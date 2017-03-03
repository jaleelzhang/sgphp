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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog/page/{page}', 'BlogController@blogList');

Route::get('/blog/{type}/page/{page}', 'BlogController@blogListByType');

Route::get('/blog/profile/{id}', 'BlogController@blogDetails');

Route::get('/tutorial/page/{page}', function () {
    view('errors/503');
});

Route::get('/video/page/{page}', function () {
    view('errors/503');
});

Route::get('/traveling/page/{page}', function () {
    view('errors/503');
});

Route::get('/contact', function () {
    view('errors/503');
});
