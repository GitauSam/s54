<?php

use App\Http\Controllers\LotteryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/lottery/{number}/{country}', [LotteryController::class, 'lottery']);

Route::get('/test', function() {
    // $countries = new Countries();
    // $currency = $countries->whereNameCommon('Brazil')->pluck('currencies')[0][0];

});
