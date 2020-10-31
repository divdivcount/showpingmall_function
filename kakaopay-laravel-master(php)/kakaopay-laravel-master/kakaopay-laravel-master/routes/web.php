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
    return view('index');
});

Route::get('/ready/{agent}/{opentype}',     ['as' => 'sample_ready',        'uses' => 'SampleController@ready']);
Route::get('/approve/{agent}/{opentype}',   ['as' => 'sample_approve',      'uses' => 'SampleController@approve']);
Route::get('/cancel/{agent}/{opentype}',    ['as' => 'sample_cancel',       'uses' => 'SampleController@cancel']);
Route::get('/fail/{agent}/{opentype}',      ['as' => 'sample_fail',         'uses' => 'SampleController@fail']);
