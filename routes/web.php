<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// ! Route untuk autentikasi user ber-usertype user (user route)
Route::middleware(['auth', 'userMiddleware', 'verified'])->group(function () {
    Route::get('dashboard', [UserController::class, "index"])->name("dashboard");
});

// ! Route untuk autentikasi user ber-usertype admin (admin route)
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, "index"])->name("admin.dashboard");
});
