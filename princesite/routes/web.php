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
Route::get('/checkSignature','WxPublicPlatformController@initCheck');
Route::get('/checkSignature',function(){
    $token = 'luo_test_token';
    $timestamp = $_GET['timestamp'];
    $nonce = $_GET['token'];
    $signature = $_GET['signature'];
    $tmpArr = array($timestamp,$nonce,$token);
    sort($tmpArr, SORT_STRING);
    $tmpStr = implode('', $tmpArr);
    $tmpStr = sha1( $tmpStr );
    if($tmpStr == $signature){
        return TRUE;
    }else{
        return FALSE;
    }
});