<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

});

require __DIR__.'/auth.php';

Route::middleware('auth','role:admin')->group(function () {
    Route::get('/dashboard',[AdminController::class ,'index'])->name('dashboard');
    Route::get('/dashboard/user/{user}',[AdminController::class ,'show'])->name('admin.user.show');
    Route::put('/dashboard/{user}/grantPermissions',[AdminController::class ,'update'])->name('admin.user.update');
    Route::put('/dashboard/{user}/removePermissions',[AdminController::class ,'remove'])->name('admin.user.remove');
});

Route::middleware('auth','permissions')->group(function () {
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}/edit',[OrderController::class,'edit'])->name('orders.edit');
    Route::delete('/orders/{order}/destroy',[OrderController::class,'destroy'])->name('orders.destroy');
    Route::get('/orders/{order}/show',[OrderController::class,'show'])->name('orders.show');
    Route::put('/orders/{order}',[OrderController::class,'update'])->name('orders.update');
    Route::put('/orders/{order}/changeStatus',[OrderController::class,'changeStatus'])->name('orders.changeStatus');
});