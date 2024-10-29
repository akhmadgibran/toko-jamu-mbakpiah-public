<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
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
    Route::get('home', [UserController::class, "index"])->name("user.home");

    Route::get('product', [ProductController::class, 'userIndex'])->name('user.product.index');

    Route::get('product/{id}', [ProductController::class, 'show'])->name('user.product.show');
});

// ! Route untuk autentikasi user ber-usertype admin (admin route)
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, "index"])->name("admin.dashboard");

    // * Route for products method adminIndex()
    Route::get('admin/product', [ProductController::class, "adminIndex"])->name("admin.product.index");

    // * Route for create method create()
    Route::get('admin/product/create', [ProductController::class, "create"])->name("admin.product.create");

    // * Route for store method store()
    Route::post('admin/product', [ProductController::class, "store"])->name("admin.product.store");

    // * Route for edit form method edit()
    Route::get('admin/product/edit/{id}', [ProductController::class, "edit"])->name("admin.product.edit");

    // * Route for update progress method update()
    Route::put('admin/product/edit/{id}', [ProductController::class, "update"])->name("admin.product.update");

    // * Route for destroy method destroy()
    Route::delete('admin/product/{id}', [ProductController::class, "destroy"])->name("admin.product.destroy");
});
