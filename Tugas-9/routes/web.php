<?php

use App\Http\Controllers\MatkulController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main',[MatkulController::class,'main']);
Route::get('/matkul/create',[MatkulController::class,'create']);
Route::post('/matkul/simpan',[MatkulController::class,'simpan'])->name('simpan');
Route::get('/matkul/hapus/{id}',[MatkulController::class,'hapus'])->name('hapus');
Route::get('/matkul/ubah/{id}',[MatkulController::class,'ubah']);
Route::any('/matkul/update/{id}',[MatkulController::class,'update']);
Route::get('image/{filename}','MatkulController@displayImage')->name('image.displayImage');
// Route::get('/matkul/export',[MatkulController::class,'export']);