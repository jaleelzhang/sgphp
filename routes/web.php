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
    return view('errors.404');
});

Route::get('/video/page/{page}', function () {
    return view('errors.404');
});

Route::get('/traveling/page/{page}', function () {
    return view('errors.404');
});

Route::get('/contact', function () {
    return view('errors.404');
});

/**
 * The backend's routes
 */

Route::get('/jaleelman', function() {
    if(Session('admin')) return view('admin.home'); else return view('admin.login');
});

Route::group(['prefix' => 'jaleelman'], function() {
    Route::post('login', 'admin\HomeController@login');
    Route::get('logout', 'admin\HomeController@logout');
});

Route::group(['middleware' => ['admin'], 'prefix' => 'jaleelman'], function () {
    Route::get('/home', function() {
        return view('admin.home');
    });

    Route::resource('/blog', 'blog\BlogController', ['except' => ['show', 'index', 'edit']]);

    Route::get('/blog/{id}/{page}/edit', 'blog\BlogController@edit');


    Route::get('/posts', 'admin\HomeController@postList');

    Route::get('/account', function() {
        return view('admin.account');
    });

    Route::get('/setting', function() {
       return view('admin.setting');
    });

    Route::get('/adminList', function() {
        return view('admin.adminList');
    });

    Route::get('/blogdetail/{id}', 'admin\HomeController@blogDetail');
});