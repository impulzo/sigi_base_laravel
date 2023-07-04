<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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
    return redirect('/admin');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::group(['prefix' => 'customers'], function () {
        Route::post('/store_modal', [CustomerController::class, 'store_modal'])->name('customers.store_modal');
    });
    Route::group(['prefix' => 'products'], function () {
        Route::post('/store_modal', [ProductController::class, 'store_modal'])->name('products.store_modal');
    });
    Route::group(['prefix' => 'reports'], function () {
        Route::get('/invoices', [ReportController::class, 'invoices'])->name('reports.invoices');
        Route::post('/invoices/range', [ReportController::class, 'getInvoices'])->name('reports.range');
        Route::post('/invoices/range/pdf', [ReportController::class, 'invoicesPdf'])->name('reports.range.pdf');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
