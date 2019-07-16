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
Route::get('/front','Front\FrontController@index');
Route::get('lang/{locale}', 'Front\FrontController@lang');
Route::group(['namespace'=>'Wx'],function(){
    Route::get('/checkSignature','WxPublicPlatformController@initCheck');
    Route::get('/test_access_token','WxPublicPlatformController@testAccessToken');
    Route::get('/upload_logo','WxPublicPlatformController@uploadLogo');
});