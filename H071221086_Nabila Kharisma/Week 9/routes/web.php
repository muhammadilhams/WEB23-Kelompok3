<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakeupProductController;

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

// routes/web.php




// routes/web.php



Route::resource('makeup-products', MakeupProductController::class);

// Tambahkan rute khusus untuk halaman index
Route::get('/makeup-products', [MakeupProductController::class, 'index'])->name('makeup-products.index');
