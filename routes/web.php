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

//登录接口
Route::any('login','Home\UserController@login');
//注册接口
Route::any('register','Home\UserController@register');
//退出接口
Route::any('secede','Home\UserController@secede');

//微信支付
Route::any('weiXin','Home\WeiXinController@weiXin');
//支付宝支付接口
Route::any('aliPay','Home\AliPayController@aliPay');