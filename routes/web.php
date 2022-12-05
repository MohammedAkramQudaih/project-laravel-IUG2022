<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\DBController;
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


// Route::get('test', function () {
//     return view('admin.master');
// });


Route::get('admin/',[DBController::class,'index'])->name('admin.index');


Route::get('admin/stores',[StoreController::class,'index'])->name('admin.stores.index');
Route::get('admin/stores/create',[StoreController::class,'create'])->name('admin.stores.create');
Route::post('admin/stores/',[StoreController::class,'store'])->name('admin.stores.store');
Route::get('admin/stores/edit/{store}',[StoreController::class,'edit'])->name('admin.stores.edit');
Route::put('admin/stores/{store}',[StoreController::class,'update'])->name('admin.stores.update');
Route::delete('admin/stores/{store}',[StoreController::class,'destroy'])->name('admin.stores.destroy');
Route::post('admin/stores/restore/{store}',[StoreController::class,'restore'])->name('admin.stores.restore');
Route::get('admin/stores/{store}',[StoreController::class,'show'])->name('admin.stores.show');
// Route::post('admin/stores/restore/{id}', 'App\Http\Controllers\Room\RoomController@restore');

Route::get('admin/products',[ProductController::class,'index'])->name('admin.products.index');
Route::get('admin/products/create',[ProductController::class,'create'])->name('admin.products.create');
Route::post('admin/products/',[ProductController::class,'store'])->name('admin.products.store');
Route::get('admin/products/edit/{product}',[ProductController::class,'edit'])->name('admin.products.edit');
Route::put('admin/products/{product}',[ProductController::class,'update'])->name('admin.products.update');
Route::delete('admin/products/{product}',[ProductController::class,'destroy'])->name('admin.products.destroy');
Route::get('admin/products/{product}',[ProductController::class,'show'])->name('admin.product.show');


