<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    ProductController,
    CategoryController,
    BrandController,
    CartController,
    OrderController,
    CouponController,
    NewsController,
    BannerController,
    PageController
};

Route::get('/', [HomeController::class,'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('news', NewsController::class);
    Route::resource('banners', BannerController::class);
    // Cart & Checkout
    Route::get('cart', [CartController::class,'index'])->name('cart.index');
    Route::post('cart/add',[CartController::class,'add'])->name('cart.add');
    Route::post('cart/checkout',[CartController::class,'checkout'])->name('cart.checkout');
});


Route::middleware(['auth','role:admin'])
     ->prefix('admin')->name('admin.')
     ->group(function(){
        Route::resource('products', Admin\ProductController::class);
        Route::resource('order-items', Admin\OrderItemController::class);
        // …và các resource khác tương tự
     });



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
