<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'App\Http\Controllers\Admin\Info'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::group(['prefix' => 'information', 'as' => 'information.'], function () {
            Route::get('/', [
                'as' => 'index',
                'uses' => 'InfoController@index'
            ]);
            Route::post('/store', [
                'as' => 'store',
                'uses' => 'InfoController@store'
            ]);
            Route::get('/{info}/edit', [
                'as' => 'edit',
                'uses' => 'InfoController@edit'
            ]);
            Route::put('{info}/update', [
                'as' => 'update',
                'uses' => 'InfoController@update'
            ]);
            Route::delete('{info}/destroy', [
                'as' => 'destroy',
                'uses' => 'InfoController@destroy'
            ]);
            Route::get('/createPDF/{page}', [
                'as' => 'createPDF',
                'uses' => 'InfoController@createPDF'
            ]);
        });
    });
});


