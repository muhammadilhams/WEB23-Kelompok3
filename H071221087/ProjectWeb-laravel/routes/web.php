<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, "home"])->name("homepage");

Route::get('/novel', function () {
    return view('novels');
});

// Route::get('/', function () {
//     return view('footer');
// });

Route::get('/buku{kategori}', [BookController::class, 'show'])->name('book.category');

Route::get('/detail/{id}', [BookController::class,'detail'])->name('detail');

Route::get('/masuk', function () {
    return view('auth.login');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/seller', [BookController::class,'seller'])->name('seller');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/addregist', [AuthController::class, 'addregist'])->name('addregist');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::post('/addbooks', [BookController::class, 'addbooks'])->name('addbooks');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
