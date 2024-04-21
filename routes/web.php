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
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}/edit',[OrderController::class,'edit'])->name('orders.edit');
    Route::get('/orders/{order}/destroy',[OrderController::class,'destroy'])->name('orders.destroy');
    Route::get('/orders/{order}/show',[OrderController::class,'show'])->name('orders.show');

});

require __DIR__.'/auth.php';

Route::middleware('auth','role:admin')->group(function () {
    Route::get('/dashboard',[AdminController::class ,'index'])->name('dashboard');
});