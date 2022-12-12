<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseTransactionController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\DBController;
use App\Http\Controllers\Website\SiteController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });




// Dashboard Routes
Route::get('admin/',[DBController::class,'index'])->name('admin.index');

// Store Routes
Route::get('admin/stores',[StoreController::class,'index'])->name('admin.stores.index');
Route::get('admin/stores/create',[StoreController::class,'create'])->name('admin.stores.create');
Route::post('admin/stores/',[StoreController::class,'store'])->name('admin.stores.store');
Route::get('admin/stores/edit/{store}',[StoreController::class,'edit'])->name('admin.stores.edit');
Route::put('admin/stores/{store}',[StoreController::class,'update'])->name('admin.stores.update');
Route::delete('admin/stores/{store}',[StoreController::class,'destroy'])->name('admin.stores.destroy');
Route::post('admin/stores/restore/{store}',[StoreController::class,'restore'])->name('admin.stores.restore');
// Route::get('admin/stores/{store}',[StoreController::class,'show'])->name('admin.stores.show');

// Product Routes
Route::get('admin/products',[ProductController::class,'index'])->name('admin.products.index');
Route::get('admin/products/create',[ProductController::class,'create'])->name('admin.products.create');
Route::post('admin/products/',[ProductController::class,'store'])->name('admin.products.store');
Route::get('admin/products/edit/{product}',[ProductController::class,'edit'])->name('admin.products.edit');
Route::put('admin/products/{product}',[ProductController::class,'update'])->name('admin.products.update');
Route::delete('admin/products/{product}',[ProductController::class,'destroy'])->name('admin.products.destroy');
Route::post('admin/products/restore/{product}',[ProductController::class,'restore'])->name('admin.products.restore');
// Route::get('admin/products/{product}',[ProductController::class,'show'])->name('admin.product.show');

// Purchase_transaction Route
Route::get('admin/purchaseTransaction',[PurchaseTransactionController::class,'index'])->name('admin.PurchaseTransaction.index');
Route::get('admin/purchaseTransaction/total',[PurchaseTransactionController::class,'total'])->name('admin.PurchaseTransaction.total');

// Site Route
Route::get('/',[SiteController::class,'index'])->name('website.index');
Route::get('store/{id}',[SiteController::class,'store'])->name('website.store');
Route::get('product/{id}',[SiteController::class,'product'])->name('website.product');
Route::post('product/buy', [SiteController::class,'buy'])->name('website.broduct.buy');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
