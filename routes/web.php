<?php
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Order;

// Halaman Utama/Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Fitur Utama Toko (Harus Login & Verifikasi)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Halaman Dashboard Dinamis (Sudah Diperbaiki dari Error Typo)
    Route::get('/dashboard', function () {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $recentOrders = Order::with('product')->latest()->take(5)->get();

        return view('dashboard', compact('totalProducts', 'totalOrders', 'recentOrders'));
    })->name('dashboard');

    // Route Otomatis untuk CRUD Produk & Order
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
});

// Manajemen Profile Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Mengatur Autentikasi Bawaan Breeze (Login, Register, Logout)
require __DIR__.'/auth.php';


Route::get('/', [HomeController::class, 'index'])->name('home');
