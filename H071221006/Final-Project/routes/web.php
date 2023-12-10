<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DriverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;


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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('detail/{car:slug}', [\App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::post('contact', [\App\Http\Controllers\HomeController::class, 'contactStore'])->name('contact.store');

//Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


// Profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::post('/profile', [ProfileController::class, 'update']);

// User
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/homepage', [UserController::class, 'home'])->name('user.homepage');
Route::get('/user/cars', [UserController::class, 'car'])->name('user.car');
Route::get('/user/drivers', [UserController::class, 'drivers'])->name('user.driver');
Route::get('detail/{car:slug}', [UserController::class, 'detail'])->name('user.detail');
Route::get('/payment', [UserController::class, 'payment'])->name('payment');
Route::post('/payment/store', [UserController::class, 'paymentStore'])->name('payment.store');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
Route::post('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
Route::get('user/search', [UserController::class, 'search'])->name('user.search');


// Route Admin
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function() {
    #Dashboard
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');

    #Cars
    Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
    Route::put('cars/update-image/{id}', [\App\Http\Controllers\Admin\CarController::class, 'updateImage'])->name('cars.updateImage');
    Route::get('cars/create', [\App\Http\Controllers\Admin\CarController::class, 'create'])->name('cars.create');

    #Cars
    Route::resource('messages', \App\Http\Controllers\Admin\MessageController::class)->except(['edit', 'update']);
    Route::get('messages/{message}/edit', [\App\Http\Controllers\Admin\MessageController::class, 'edit'])->name('messages.edit');
    
    #Payments
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('frontend/payments', [PaymentController::class, 'pay'])->name('frontend.payments');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    
    #Drivers
    Route::get('drivers', [DriverController::class, 'index'])->name('drivers.index');
    Route::get('drivers/create', [DriverController::class, 'create'])->name('drivers.create');
    Route::post('drivers', [DriverController::class, 'store'])->name('drivers.store');
    Route::get('drivers/{driver}', [DriverController::class, 'show'])->name('drivers.show');
    Route::get('drivers/{driver}/edit', [DriverController::class, 'edit'])->name('drivers.edit');
    Route::put('drivers/{driver}', [DriverController::class, 'update'])->name('drivers.update');
    Route::delete('drivers/{driver}', [DriverController::class, 'destroy'])->name('drivers.destroy');
    Route::put('drivers/update-image/{id}', [DriverController::class, 'updateImage'])->name('drivers.updateImage');
});
    
Auth::routes(['register' => false]);

