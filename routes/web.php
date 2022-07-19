<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\FramlilReportController;
use App\Http\Controllers\SupplierReportController;
use App\Http\Controllers\SupplierReport;
use App\Http\Controllers\InventoryReportController;
use App\Http\Controllers\PDFController;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::view('admin', 'home');

//Route::get('sales',[DropdownController::class, 'index']);
//Route::post('store',[DropdownController::class, 'store']);
Route::get('getWeight',[DropdownController::class, 'getWeight'])->name('getWeight');
Route::get('getPrice',[DropdownController::class, 'getPrice'])->name('getPrice');


Route::resource('sizes', 'SizeController');
Route::resource('weights', 'WeightController');
Route::resource('prices', 'PriceController');
Route::resource('fruits', 'FruitController');
Route::resource('farmers', 'FarmerController');
Route::resource('cards', 'CardController');
Route::resource('sales', 'SaleController');
Route::resource('rejects', 'RejectController');
Route::resource('orders', 'OrderController');
Route::resource('suppliers', 'SupplierController');

//Route::post('report','App\Http\Controllers\SupplierController@search')->name('report');

Route::resource('inventories', 'InventoryReportController');
Route::resource('framlils', 'FramlilReportController');
Route::resource('suppliers_report', 'SupplierReportController');
Route::get('framlil/framlilsPDF', [FramlilReportController::class, 'generatePDF']);
Route::get('suppliers_reports/supplierPDF', [SupplierReportController::class, 'generatePDF']);
Route::post('suppliers_reports/report', [SupplierReportController::class, 'search'])->name('report');
Route::get('inventory/inventoriesPDF', [InventoryReportController::class, 'generatePDF']);
//Route::get('inventory/inventoriesPDF', [InventoryReportController::class, 'displayReport']);
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
//Route::get('sales.destroy', [SaleController::class, 'destroy'])->name('destroy');

//Route::delete('category/{category}','SaleController@destroy')->name('sales.destroy');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post("/logout",[LogoutController::class,"store"])->name("logout");
