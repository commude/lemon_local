<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| user Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@top')->name('top')->middleware('guest');
Route::get('/index', 'HomeController@index')->name('index')->middleware('guest');
Route::view('/guide', 'user.guide')->name('guide');

// 終了ページは別サーバーに置くため、削除
// Route::get('/close', 'HomeController@close')->name('close');

Route::group(['prefix' => 'line', 'as' => 'line.', 'middleware' => 'guest'], function() {
    Route::get('/login', 'LineController@index');
    Route::post('/login', 'LineController@login')->name('login');
    Route::get('/callback', 'LineController@loginCallback')->name('callback');
    Route::get('/callback/error', 'LineController@error')->name('error');

    Route::get('/testlogin/{user}', 'LineController@testLogin')->name('testlogin')->middleware('regenerate.token');
});

Route::group(['middleware' => 'auth'], function() {
    Route::view('/qa', 'user.qa')->name('qa');
    Route::get('/mypage', 'MypageController@index')->name('mypage');
    Route::get('/logout', 'LineController@logout')->name('user.logout');

    Route::get('/barcodeForm', 'StampController@create')->name('barcodeForm');
    Route::get('/getStamp', 'StampController@index');
    Route::post('/getStamp', 'StampController@store')->name('getStamp')->middleware('regenerate.token');

    Route::get('/lottery', 'LotteryController@index');
    Route::post('/lottery', 'LotteryController@lottery')->name('lottery');
    Route::get('/lotteryResult', 'LotteryResultController@index');
    Route::post('/lotteryResult', 'LotteryResultController@lotteryResult')->name('lotteryResult');

    Route::get('/btcForm', 'BtcController@index');
    Route::post('/btcForm', 'BtcController@create')->name('btcForm');

});
