<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\ProductoController;
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

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'customers'], function () {
        Route::get('/', [CustomerController::class,'list']);
        Route::get('/validate/{email}', [CustomerController::class,'validate_user']);
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductoController::class,'list']);
    });
    Route::group(['prefix' => 'invoices'], function () {
        Route::get('/', [InvoiceController::class,'list']);
    });
});

