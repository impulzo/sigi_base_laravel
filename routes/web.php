<?php

use App\Http\Controllers\InvoiceController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['prefix' => 'invoice'], function () {
    //GET catalogs
    Route::get('/regimens',[InvoiceController::class,'getRegimens']);
    Route::get('/currencies',[InvoiceController::class,'getCurrencies']);
    Route::get('/cfdi_types',[InvoiceController::class,'getCfdiTypes']);
    Route::get('/payments_form',[InvoiceController::class,'getPaymentsForm']);
    Route::get('/payments_method',[InvoiceController::class,'getPaymentsMethod']);
    Route::get('/cfdi_use',[InvoiceController::class,'getCfdisUse']);
});
