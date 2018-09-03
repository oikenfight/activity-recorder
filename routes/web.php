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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'index',
]);

// // admin
// Route::get('/admin', [
//     'uses' => 'Admin\HomeController@index',
//     'as' => 'index',
// ]);

Route::group(['prefix' => 'admin',], function () {
    // Top
    Route::get('/', [
        'uses' => 'Admin\HomeController@index',
        'as' => 'admin.index',
    ]);

    // Action
    Route::group(['prefix' => 'action'], function () {
        Route::get('/', [
            'uses' => 'Admin\ActionController@index',
            'as' => 'admin.action.index'
        ]);
        Route::get('/create', [
            'uses' => 'Admin\ActionController@create',
            'as' => 'admin.action.create'
        ]);
        Route::post('/', [
            'uses' => 'Admin\ActionController@store',
            'as' => 'admin.action.store'
        ]);
        Route::get('/{Action}', [
            'uses' => 'Admin\ActionController@show',
            'as' => 'admin.action.show'
        ]);
        Route::get('/edit/{Action}}', [
            'uses' => 'Admin\ActionController@edit',
            'as' => 'admin.action.edit'
        ]);
        Route::put('/{Action}', [
            'uses' => 'Admin\ActionController@update',
            'as' => 'admin.action.update'
        ]);
        Route::delete('/{Action}', [
            'uses' => 'Admin\ActionController@destroy',
            'as' => 'admin.action.destroy'
        ]);
    });

    // User
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [
            'uses' => 'Admin\UserController@index',
            'as' => 'admin.user.index'
        ]);
        Route::get('/create', [
            'uses' => 'Admin\UserController@create',
            'as' => 'admin.user.create'
        ]);
        Route::post('/', [
            'uses' => 'Admin\UserController@store',
            'as' => 'admin.user.store'
        ]);
        Route::get('/{User}', [
            'uses' => 'Admin\UserController@show',
            'as' => 'admin.user.show'
        ]);
        Route::get('/edit/{User}}', [
            'uses' => 'Admin\UserController@edit',
            'as' => 'admin.user.edit'
        ]);
        Route::put('/{User}', [
            'uses' => 'Admin\UserController@update',
            'as' => 'admin.user.update'
        ]);
        Route::delete('/{User}', [
            'uses' => 'Admin\UserController@destroy',
            'as' => 'admin.user.destroy'
        ]);
    });
});
