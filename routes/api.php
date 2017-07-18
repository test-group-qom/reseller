<?php

use Illuminate\Http\Request;
use App\Http\middleware\authorization;
use App\Http\middleware\checkroll;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('delete', 'costumer');
Route::resource('showById','costumer');
Route::get('showAll','costumer@index');
Route::post('storeCostumer', 'costumer@store');
Route::post('storeAdmin', 'admin@store')->middleware(authorization::class.":admin");
Route::post('storeReseller', 'reseller@store');
Route::resource('rolls', 'rollsctr');
Route::resource('login', 'login');
Route::resource('logout', 'logout');
Route::resource('forgetToken', 'forgetToken');
Route::resource('saveNewPassword', 'saveNewPassword');
Route::post('towParameter','towParameter@store')->middleware(checkroll::class.":admin,reseller");

