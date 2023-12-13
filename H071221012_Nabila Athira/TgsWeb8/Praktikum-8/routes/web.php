<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Mendefinisikan rute GET untuk URL utama ('/'). Ketika pengguna mengakses halaman utama situs,
// fungsi anonim yang diberikan akan dijalankan. Fungsi ini mengembalikan tampilan 'home' dan mengirimkan data judul ("Home").
Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

// Mendefinisikan rute GET untuk URL '/product'. Ketika pengguna mengakses URL ini,
// metode 'index' dari 'ProductController' akan dipanggil. Digunakan untuk menampilkan daftar produk.
Route::get('/product', [ProductController::class, 'index']);
    
// Mendefinisikan rute GET untuk URL '/products/search'. Ketika pengguna mengakses URL ini,
// metode 'search' dari 'ProductController' akan dipanggil. Nama rute ('products.search') digunakan untuk menghasilkan URL.
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

// Mendefinisikan rute GET dengan parameter dinamis '{productName}' untuk URL '/products/{productName}'.
// Ketika pengguna mengakses URL ini, metode 'showProduct' dari 'ProductController' akan dipanggil.
// Nama rute ('products.show') digunakan untuk menghasilkan URL dengan menggunakan fungsi route() dalam tampilan atau kode lainnya.
// Parameter '{productName}' akan berisi nilai yang diberikan oleh pengguna dan digunakan untuk menampilkan detail produk dengan nama tersebut.
Route::get('/products/{productName}', [ProductController::class, 'showProduct'])->name('products.show');


// routes