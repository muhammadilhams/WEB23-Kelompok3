<?php

use App\Http\Controllers\GenshinController;
use App\Models\Genshin;
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

Route::get('/', [GenshinController::class, "index"])->name("char");

Route::get('/viewchar/{id}', [GenshinController::class,'viewchar'])->name('viewchar');

Route::get('/addchar', [GenshinController::class, "addchar"])->name("addchar");
Route::post('/insertchar', [GenshinController::class,'insertchar'])->name('insertchar');

Route::get('/editchar/{id}', [GenshinController::class,'editchar'])->name('editchar');
Route::post('/updatechar/{id}', [GenshinController::class,'updatechar'])->name('updatechar');

Route::get('/deletechar/{id}', [GenshinController::class,'deletechar'])->name('deletechar');
