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
            Route::post('store', 'AccountController@store')->name('weasy.account.store');
            Route::get('edit/{id}', 'AccountController@edit')->name('weasy.account.update');
            Route::put('update/{id}', 'AccountController@update')->name('weasy.account.update');
            Route::delete('destroy', 'AccountController@destroy')->name('weasy.account.destroy');
        });

    });


});