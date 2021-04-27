<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
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
Route::group(['prefix'=>'bank'],function(){
    Route::get('users',[BankController::class,'index']);
    Route::get('deposit',[BankController::class,'deposit']);
    Route::post('withdrow',[BankController::class,'withdrow']);
    Route::post('returnBiddersMoney',[BankController::class,'returnBiddersMoney']);
    Route::post('completePayment',[BankController::class,'checkOut']);
});
