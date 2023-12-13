<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
    if (collect(['admin', 'superadmin'])->contains(auth()->user()->role)) {
        return redirect()->route('user.index');
    }

    if (collect(['teacher'])->contains(auth()->user()->role)) {
        return redirect()->route('course.index');
    }

    if (collect(['student'])->contains(auth()->user()->role)) {
        return redirect()->route('home');
    }
})->name('index')->middleware('auth');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'role:student'])->name('home');
Route::get('/explore', [HomeController::class, 'explore'])->middleware(['auth', 'role:student'])->name('explore');
Route::get('/profile', [UserController::class, 'profile'])->middleware(['auth', 'role:student'])->name('profile');

Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => ['auth', 'role:superadmin,admin']], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create_view'])->name('create_view');
    Route::post('/create', [UserController::class, 'create'])->name('create');
    Route::get('/update/{id}', [UserController::class, 'update_view'])->name('update_view');
    Route::post('/update', [UserController::class, 'update'])->name('update');
    Route::post('/deactivate', [UserController::class, 'deactivate'])->name('deactivate');
    Route::post('/activate', [UserController::class, 'activate'])->name('activate');
});

Route::group(['as' => 'course.', 'prefix' => 'course', 'middleware' => ['auth', 'role:superadmin,admin,teacher']], function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/create', [CourseController::class, 'create_view'])->name('create_view');
    Route::post('/create', [CourseController::class, 'create'])->name('create');
    Route::get('/update/{id}', [CourseController::class, 'update_view'])->name('update_view');
    Route::post('/update', [CourseController::class, 'update'])->name('update');
    Route::post('/deactivate', [CourseController::class, 'deactivate'])->name('deactivate');
    Route::post('/activate', [CourseController::class, 'activate'])->name('activate');
    Route::post('/publish', [CourseController::class, 'publish'])->name('publish');
    Route::post('/draft', [CourseController::class, 'draft'])->name('draft');
    Route::post('/delete', [CourseController::class, 'delete'])->name('delete');
    Route::get('/{id}', [CourseController::class, 'details'])->name('details')->withoutMiddleware('role:superadmin,admin,teacher');
    Route::get('/{id}/content/create', [CourseController::class, 'create_content_view'])->name('create_content_view');
    Route::post('/{id}/content/create', [CourseController::class, 'create_content'])->name('create_content');
    Route::get('/{id}/content/update/{content_id}', [CourseController::class, 'update_content_view'])->name('update_content_view');
    Route::post('/{id}/content/update', [CourseController::class, 'update_content'])->name('update_content');
    Route::post('/{id}/content/delete', [CourseController::class, 'delete_content'])->name('delete_content');
    Route::post('/{id}/enroll', [CourseController::class, 'enroll'])->name('enroll')->withoutMiddleware('role:superadmin,admin,teacher')->middleware('role:student');
    Route::post('/{id}/finish-content', [CourseController::class, 'finish_content'])->name('finish_content')->withoutMiddleware('role:superadmin,admin,teacher')->middleware('role:student');
});


Route::group(['as' => 'auth.', 'prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'login_view'])->name('login_view')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
    Route::get('/register', [AuthController::class, 'register_view'])->name('register_view')->middleware('guest');
    Route::post('/regsiter', [AuthController::class, 'register'])->name('register')->middleware('guest');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});


Route::get('/file/{filename}', [FileController::class, 'show_pdf'])->middleware('auth')->name('file.show_pdf');

// UNCOMMENT THIS WHEN RUNNING ON PRODUCTION.
// Route::fallback(function () {
//     abort(404);
// });
