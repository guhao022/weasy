<?php

Route::group([
    'middleware' => ['web', 'admin'],
    'prefix' => config("admin.route.prefix").'/wechat',
    'namespace' => 'Modules\Weasy\Controllers',
], function() {

    Route::get('/', 'HomeController@index')->name('weasy.home');

    Route::group(['prefix' => 'wxmp'], function (){
        Route::get('/', 'MPController@index')->name('weasy.mp.index');
        Route::get('create', 'MPController@create')->name('weasy.mp.create');
        Route::post('store', 'MPController@store')->name('weasy.mp.store');
        Route::get('edit/{id}', 'MPController@edit')->name('weasy.mp.update');
        Route::put('update/{id}', 'MPController@update')->name('weasy.mp.update');
        Route::delete('destroy', 'MPController@destroy')->name('weasy.mp.destroy');
    });
});