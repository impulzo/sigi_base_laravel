<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\InventoryController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//inventory
Route::get('/v1/inventories/movements/{type}', [InventoryController::class,'getMovements']);
Route::get('/v1/inventories/offices', [InventoryController::class,'getOffices']);

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'inventories'], function () {
        Route::get('/movements/{type}', [InventoryController::class,'getMovements']);
        Route::get('/offices', [InventoryController::class,'getOffices']);
    });
    Route::group(['prefix' => 'customers'], function () {
        Route::get('/validate/{email}', [CustomerController::class,'validateUser']);
    });
});
