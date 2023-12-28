<?php

use App\Enums\AdminType;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false, 'reset' => false, 'confirm' => false, 'verify' => false]);

Route::group(['middleware' => 'auth:admin'], function() {
    Route::get('/', 'DataController@index')->name('index')->middleware('paginate');
    Route::post('/csv-export', 'DataController@csvExport')->name('csvExport');

    Route::group(['prefix' => 'download', 'as' => 'download.', 'middleware' => ['role:'.AdminType::SUPER_LEVEL.'|'.AdminType::TOP_LEVEL.'|'.ADMINTYPE::MID_LEVEL]], function () {
        Route::get('/', 'DailyDataController@index')->name('index');
        Route::post('/', 'DailyDataController@export')->name('export');
    });

    Route::group(['prefix' => 'rate_change', 'as' => 'rateChange.', 'middleware' => ['role:'.AdminType::SUPER_LEVEL.'|'.AdminType::TOP_LEVEL]], function () {
        Route::get('/', 'LotteryRateController@create')->name('create');
        Route::post('/', 'LotteryRateController@store')->name('store')->middleware('regenerate.token');
    });

    Route::group(['prefix' => 'win_limit_change', 'as' => 'lotteryChange.', 'middleware' => ['role:'.AdminType::SUPER_LEVEL]], function () {
        Route::get('/', 'WinLimitController@index')->name('index');
        Route::post('/', 'WinLimitController@csvImport')->name('csvUpdate')->middleware('regenerate.token');
    });
});
