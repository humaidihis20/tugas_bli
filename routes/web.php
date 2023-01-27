<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\DashboardController as DashboardDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Item\ItemController as ItemItemController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Order\PembayaranController;
use App\Http\Controllers\Order\PembelianController;
use App\Http\Controllers\Order\PenjualanController;
use App\Http\Controllers\Price\PriceController;
use App\Http\Controllers\UoM\UoMController;
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

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::get('/dashboard', [DashboardDashboardController::class, 'index'])->name('dashboard');

Route::get('/items', [ItemItemController::class, 'index'])->name('items');
Route::get('/items/create', [ItemItemController::class, 'create'])->name('items.create');
Route::post('/items/store', [ItemItemController::class, 'store'])->name('items.store');
Route::get('/items/edit/{id}', [ItemItemController::class, 'edit'])->name('items.edit');
Route::put('/items/update/{id}', [ItemItemController::class, 'update'])->name('items.update');
Route::get('/items-delete/{id}', [ItemItemController::class, 'destroy']);
Route::get('uom/{id}', [ItemItemController::class, 'getinfo']);

Route::get('/users', [DashboardDashboardController::class, 'users'])->name('users');

Route::get('/purchase', [PembelianController::class, 'index'])->name('purchase');
Route::get('/purchase/create', [PembelianController::class, 'create'])->name('purchase.create');
Route::post('/purchase/store', [PembelianController::class, 'store'])->name('purchase.store');
Route::get('purchaseitem/{id}', [PriceController::class, 'getinfo']);

Route::get('/payments', [PembayaranController::class, 'index'])->name('payments');

Route::get('/sale', [PenjualanController::class, 'index'])->name('sale');
Route::post('/search-date-sale', [PenjualanController::class, 'show'])->name('search-date-sale');

Route::get('/price', [PriceController::class, 'index'])->name('price');
Route::get('/price/create', [PriceController::class, 'create'])->name('price.create');
Route::post('/price/store', [PriceController::class, 'store'])->name('price.store');
Route::get('priceitem/{id}', [PriceController::class, 'getinfo']);

Route::get('/uoms', [UoMController::class, 'index'])->name('uoms');
Route::get('/uoms/create', [UoMController::class, 'create'])->name('uoms.create');
Route::post('/uoms/store', [UoMController::class, 'store'])->name('uoms.store');

// Route::middleware('kasir')->group(function () {
// Route::group(['middleware' => ['auth', 'kasir']], function () {
//     Route::get('/purchase', [PembelianController::class, 'index'])->name('purchase');
//     Route::get('/purchase/create', [PembelianController::class, 'create'])->name('purchase.create');
//     Route::post('/purchase/store', [PembelianController::class, 'store'])->name('purchase.store');
//     Route::get('purchaseitem/{id}', [PriceController::class, 'getinfo']);
// });

// // Route::middleware('superadmin')->group(function () {
// Route::group(['middleware' => ['auth', 'superadmin']], function () {
//     Route::get('/items', [ItemItemController::class, 'index'])->name('items');
//     Route::get('/items/create', [ItemItemController::class, 'create'])->name('items.create');
//     Route::post('/items/store', [ItemItemController::class, 'store'])->name('items.store');
//     Route::get('uom/{id}', [ItemItemController::class, 'getinfo']);

//     Route::get('/users', [DashboardDashboardController::class, 'users'])->name('users');

//     Route::get('/price', [PriceController::class, 'index'])->name('price');
//     Route::get('/price/create', [PriceController::class, 'create'])->name('price.create');
//     Route::post('/price/store', [PriceController::class, 'store'])->name('price.store');
//     Route::get('priceitem/{id}', [PriceController::class, 'getinfo']);

//     Route::get('/purchase', [PembelianController::class, 'index'])->name('purchase');
//     Route::get('/purchase/create', [PembelianController::class, 'create'])->name('purchase.create');
//     Route::post('/purchase/store', [PembelianController::class, 'store'])->name('purchase.store');
//     Route::get('purchaseitem/{id}', [PriceController::class, 'getinfo']);

//     Route::get('/uoms', [UoMController::class, 'index'])->name('uoms');
//     Route::get('/uoms/create', [UoMController::class, 'create'])->name('uoms.create');
//     Route::post('/uoms/store', [UoMController::class, 'store'])->name('uoms.store');
// });

// // Route::middleware('adminstock')->group(function () {
// Route::group(['middleware' => ['auth', 'adminstock']], function () {
//     Route::get('/items', [ItemItemController::class, 'index'])->name('items');
//     Route::get('/items/create', [ItemItemController::class, 'create'])->name('items.create');
//     Route::post('/items/store', [ItemItemController::class, 'store'])->name('items.store');
//     Route::get('uom/{id}', [ItemItemController::class, 'getinfo']);

//     Route::get('/uoms', [UoMController::class, 'index'])->name('uoms');
//     Route::get('/uoms/create', [UoMController::class, 'create'])->name('uoms.create');
//     Route::post('/uoms/store', [UoMController::class, 'store'])->name('uoms.store');
// });

require __DIR__ . '/auth.php';
