<?php

use Illuminate\Support\Facades\Route;

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

// routes/web.php

use App\Http\Controllers\ProductController;

Route::get('/product', [ProductController::class, 'products']);
Route::get('/product/{productCode}', [ProductController::class, 'show'])->name('product.details');
Route::get('/productlines', [ProductController::class, 'search'])->name('productlines');

Route::get('/', function () {
    return view('home');
});
