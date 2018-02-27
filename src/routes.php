<?php

Route::group([
    'middleware' => ['web', 'admin'],
    'prefix' => config("admin.route.prefix"),
    'namespace' => 'Modules\Weasy\Controllers',
], function() {

    Route::group(['prefix' => 'weasy'], function (){

        Route::get('/', 'HomeController@index')->name('weasy.home');

        Route::group(['prefix' => 'account'], function (){
            Route::get('/', 'AccountController@index')->name('weasy.account.index');
            Route::get('create', 'AccountController@create')->name('weasy.account.create');
            Route::post('create', 'AccountController@store')->name('weasy.account.create');
            Route::get('update/{id}', 'AccountController@edit')->name('weasy.account.update');
            Route::put('update/{id}', 'AccountController@update')->name('weasy.account.update');
            Route::delete('destroy', 'AccountController@destroy')->name('weasy.account.destroy');
            Route::post('chose/{id}', 'AccountController@chose')->name('weasy.account.chose');
        });

        Route::group(['prefix' => 'menu', 'middleware' => 'account'], function (){
            Route::get('/', 'MenusController@index')->name('weasy.menu.index');
            Route::post('store', 'MenusController@store')->name('weasy.menu.store');
            Route::get('update/{id}', 'MenusController@edit')->name('weasy.menu.update');
            Route::put('update/{id}', 'MenusController@update')->name('weasy.menu.update');
            Route::delete('destroy', 'MenusController@destroy')->name('weasy.menu.destroy');
        });

    });


});