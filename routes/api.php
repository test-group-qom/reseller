<?php

use Illuminate\Http\Request;
use App\Http\middleware\authorization;


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

Route::delete('delete/{id}', 'costumer@destroy');
Route::get('showById/{id}','costumer@show');
Route::get('showAll','costumer@index');
Route::post('storeCostumer', 'costumer@store');
Route::post('storeAdmin', 'admin@store');
Route::post('storeReseller', 'reseller@store');
Route::put('updateRoll/{id}', 'rollsctr@update')->middleware(authorization::class.":admin");
Route::delete('deleteRoll/{id}','rollsctr@destroy')->middleware(authorization::class.":admin");
Route::post('login', 'login@store');
Route::post('logout', 'logout@store');
Route::post('forgetToken', 'forgetToken@store');
Route::post('saveNewPassword', 'saveNewPassword@store');
Route::post('auth','auth@store')->middleware(authorization::class.":admin,reseller");
////relate product tabel
Route::get('list','productCtl@index');
Route::get('showOne/{id}','productCtl@show');
Route::delete('destroy/{id}','productCtl@destroy')->middleware(authorization::class.":admin");
Route::post('store/{id}', 'productCtl@store')->middleware(authorization::class.":admin");
Route::put('update/{id}','productCtl@update')->middleware(authorization::class.":admin");
/////relate price tabel
Route::post('pricesave', 'priceCtr@store')->middleware(authorization::class.":admin");
Route::get('priceshow/{id}', 'priceCtr@show');
Route::get('allprice/{id}', 'priceCtr@showall');
