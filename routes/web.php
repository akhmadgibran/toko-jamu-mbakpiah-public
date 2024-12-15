<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

// Route::get('/', function () {
//     return view('welcome');
// });




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcomeV2');
})->name('home');

// Route::get('/build', function () {
//     return view('admin.order.show');
// });



Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');

// ! Route untuk autentikasi user ber-usertype user (user route)
Route::middleware(['auth', 'userMiddleware', 'verified'])->group(function () {
    Route::get('home', [UserController::class, "index"])->name("user.home");

    // Route::get('product', [ProductController::class, 'userIndex'])->name('user.product.index');

    // Route::get('product/{id}', [ProductController::class, 'show'])->name('user.product.show');

    Route::get('cart', [CartController::class, 'index'])->name('user.cart.index');

    Route::post('cart/store', [CartController::class, 'store'])->name('user.cart.store');

    Route::patch('/cart/{id}/quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('user.cart.destroy');

    Route::get('checkout', [CheckoutController::class, 'index'])->name('user.checkout.index');

    Route::post('checkout/payment', [CheckoutController::class, 'store'])->name('user.checkout.store');

    // Route::get('checkout', [CartController::class, 'checkout'])->name('user.checkout');

    Route::get('order', [OrderController::class, 'indexUser'])->name('user.order.index');

    Route::post('order', [OrderController::class, 'userOrderFiltered'])->name('user.order.filtered');

    Route::get('order/{id}', [OrderController::class, 'userShowOrder'])->name('user.order.show');
});

// ! Route untuk autentikasi user ber-usertype admin (admin route)
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, "index"])->name("admin.dashboard");

    // * Route group inside a route group, this for ProductController group
    Route::controller(ProductController::class)->group(function () {
        // * Route for products method adminIndex()
        Route::get('admin/product',  "adminIndex")->name("admin.product.index");

        // * Route for create method create()
        Route::get('admin/product/create',  "create")->name("admin.product.create");

        // * Route for store method store()
        Route::post('admin/product',  "store")->name("admin.product.store");

        // * Route for edit form method edit()
        Route::get('admin/product/edit/{id}',  "edit")->name("admin.product.edit");

        // * Route for update progress method update()
        Route::put('admin/product/edit/{id}',  "update")->name("admin.product.update");

        // * Route for destroy method destroy()
        Route::delete('admin/product/{id}',  "destroy")->name("admin.product.destroy");
    });

    Route::controller(OrderController::class)->group(function () {

        Route::get('/admin/order', [OrderController::class, 'indexAdmin'])->name('admin.order.index');

        Route::post('admin/order', [OrderController::class, 'adminOrderFiltered'])->name('admin.order.filtered');

        Route::get('admin/order/{id}', [OrderController::class, 'adminShowOrder'])->name('admin.order.show');

        Route::post('admin/order/{id}', [OrderController::class, 'adminUpdateOrder'])->name('admin.order.update');
    });
    // // * Route for products method adminIndex()
    // Route::get('admin/product', [ProductController::class, "adminIndex"])->name("admin.product.index");

    // // * Route for create method create()
    // Route::get('admin/product/create', [ProductController::class, "create"])->name("admin.product.create");

    // // * Route for store method store()
    // Route::post('admin/product', [ProductController::class, "store"])->name("admin.product.store");

    // // * Route for edit form method edit()
    // Route::get('admin/product/edit/{id}', [ProductController::class, "edit"])->name("admin.product.edit");

    // // * Route for update progress method update()
    // Route::put('admin/product/edit/{id}', [ProductController::class, "update"])->name("admin.product.update");

    // // * Route for destroy method destroy()
    // Route::delete('admin/product/{id}', [ProductController::class, "destroy"])->name("admin.product.destroy");
});
