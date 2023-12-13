<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/product',[productController::class, 'readAll'])->name('product');
Route::get('/product/Motorcycles',[productController::class, 'readMotorcycles'])->name('productMotorcycles');
Route::get('/product/ClassicCars',[productController::class, 'readClassicCars'])->name('productClassicCars');
Route::get('/product/Planes',[productController::class, 'readPlanes'])->name('productPlanes');
Route::get('/product/Trains',[productController::class, 'readTrains'])->name('productTrains');
Route::get('/product/Ships',[productController::class, 'readShips'])->name('productShips');
Route::get('/product/TrucksBuses',[productController::class, 'readTrucksBuses'])->name('productTrucksBuses');
Route::get('/product/VintageCars',[productController::class, 'readVintageCars'])->name('productVintageCars');
Route::get('/product/{productCode}',[productController::class, 'detaildata'])->name('readDetail');

