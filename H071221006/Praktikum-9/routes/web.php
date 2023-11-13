<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/produks',  [ProdukController::class, 'index']);

Route::get('/produks', [ProdukController::class, 'index'])->name('produks.index');

Route::get('/produks/create', [ProdukController::class, 'create'])->name('produks.create');

Route::post('/produks', [ProdukController::class, 'store'])->name('produks.store');

Route::get('/produks/{produk}', [ProdukController::class, 'show'])->name('produks.show');

Route::get('/produks/{produk}/edit', [ProdukController::class, 'edit'])->name('produks.edit');

Route::put('/produks/{produk}', [ProdukController::class, 'update'])->name('produks.update');

Route::delete('/produks/{produk}', [ProdukController::class, 'destroy'])->name('produks.destroy');
