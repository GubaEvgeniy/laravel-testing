<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group([
    'prefix' => 'cabinet',
    'as' => 'cabinet.',
    'namespace' => 'Cabinet',
    'middleware' => ['auth'],
], function () {
    Route::group([
        'prefix' => 'billing',
        'as' => 'billing.',
        'namespace' => 'Billing'
    ], function () {
        Route::get('/wallets', 'WalletsController@show')->name('wallets.show');
        Route::post('/wallets', 'WalletsController@action')->name('wallets.action');
    });
});

Route::group([
    'prefix' => 'benefits',
    'as' => 'benefits.',
    'namespace' => 'Benefits',
    'middleware' => ['auth'],
], function () {
    Route::post('/', 'BenefitsController@calculate')->name('calculate');
    Route::post('/refuse', 'BenefitsController@refuse')->name('refuse');
    Route::post('/accept', 'BenefitsController@accept')->name('accept');
});
