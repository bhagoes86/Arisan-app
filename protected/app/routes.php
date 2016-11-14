<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'index', 'uses' => 'FrontendController@getIndex'));

Route::post('saveAnggota', array('as' => 'tambahAnggota', 'uses' => 'FrontendController@tambahAnggota'));

Route::post('updatedAnggota', array('as' => 'editAnggota', 'uses' => 'FrontendController@editAnggota'));

Route::post('hapusAnggota', array('as' => 'hapusAnggota', 'uses' => 'FrontendController@hapusAnggota'));

Route::post('bayarAnggota', array('as' => 'bayarAnggota', 'uses' => 'FrontendController@bayarAnggota'));

Route::get('pemenang', array('as' => 'pemenang', 'uses' => 'FrontendController@pemenang'));

Route::get('log-bayar', array('as' => 'getlogbayar', 'uses' => 'FrontendController@getBayar'));

Route::get('log-menang', array('as' => 'getlogmenang', 'uses' => 'FrontendController@getlogmenang'));

Route::post('updatedPemenang', array('as' => 'updatedPemenang', 'uses' => 'FrontendController@updatedPemenang'));

