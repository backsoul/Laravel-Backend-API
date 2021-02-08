<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FinancesController;
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
    //routes here
    Route::get('finances', [FinancesController::class, 'getAllFinances']);
    Route::get('finance/{id}', [FinancesController::class, 'getFinance']);
    Route::post('finances', [FinancesController::class, 'createFinance']);
    Route::put('finance/{id}', [FinancesController::class, 'updateFinance']);
    Route::delete('finance/{id}',[FinancesController::class, 'deleteFinance']);
