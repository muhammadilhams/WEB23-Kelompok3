<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

// All Listings.
Route::get('/',[ListingController::class, 'index']);        // Instead of callback, pass array containing Controller class and method name.


// Show create listing form.
Route::get("/listings/create", [ListingController::class, 'create']);


// Store listing
Route::post("/listings", [ListingController::class, 'store']);

Route::get('dashboard', function () {
    return view('dashboard');
});


// Single Listing.
// Route Model Binding.     (Errors like 404 not found are built-in)
Route::get("/listings/{listing}", [ListingController::class, 'show']);



// Order of routes in this file matters, if 'show' route was placed above 'create' route, then
// the application would look for a listing with id = 'create', and return 404.

// Common Resource Routes:
// index - Show all resources.
// show - Show a single resource.
// create - Show form to create a new resource.
// store - Store new resource.
// edit - Show form to edit resource.
// update - Update resource.
// destroy - Delete resource.

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
