<?php

use App\Http\Controllers\V1\Api\BankAccountController;
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

Route::namespace('Api')->group(function () {
    // bank Account Routes
    Route::apiResource('bankAccount', 'BankAccountController')->only(['index' , 'store']);
    Route::get('bankAccount/balance', [BankAccountController::class, 'balance'])->name('bankAccount.balance');

    Route::apiResource('transfer', 'TransferController')->only(['store']);
});
