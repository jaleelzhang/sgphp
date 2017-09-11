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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'blog\BlogController@index');

Route::group(['prefix' => 'blog'], function() {
    Route::get('type/{type}', 'blog\BlogController@index');
    Route::get('/', 'blog\BlogController@index');
    Route::get('/create', 'blog\BlogController@create');
    Route::get('{id}', 'blog\BlogController@show');
});

Route::get('/tutorial/page/{page}', function () {
    return view('errors.503');
});

Route::get('/video/page/{page}', function () {
    return view('errors.503');
});

Route::get('/traveling/page/{page}', function () {
    return view('errors.503');
});

Route::get('/contact', function () {
    return view('errors.503');
});

//The backend's routes

Route::get('/jaleelman', function() {
    return view('admin.login');
});

Route::post('/login', 'admin\HomeController@login');
Route::get('/logout', 'admin\HomeController@logout');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/home', function() {
        return view('admin.home');
    });

    Route::resource('/blog', 'blog\BlogController', ['except' => ['show', 'index']]);

    Route::get('/posts', 'admin\HomeController@postList');
});