<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiBarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagerController;

// Route form login
Route::get('/', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware manual
Route::middleware(function ($request, $next) {
    if (!session('user') || !session('role')) {
        return redirect()->route('login.form');
    }
    return $next($request);
})->group(function () {

    // Hanya untuk ADMIN
    Route::middleware(function ($request, $next) {
        if (session('role') !== 'admin') {
            abort(403, 'Hanya admin yang boleh mengakses.');
        }
        return $next($request);
    })->group(function () {
        Route::get('/dashboard/admin', [DashboardController::class, 'index'])->name('dashboard.admin');
        Route::resource('barang', BarangController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('transaksibarang', TransaksiBarangController::class);
    });

    // Hanya untuk MANAGER
    Route::middleware(function ($request, $next) {
        if (session('role') !== 'manager') {
            abort(403, 'Hanya manager yang boleh mengakses.');
        }
        return $next($request);
    })->group(function () {
        Route::get('/manager/dashboard', [ManagerController::class, 'dashboard'])->name('dashboard.manager');
        Route::get('/manager/barang', [ManagerController::class, 'barang'])->name('manager.barang');
        Route::get('/manager/transaksibarang', [ManagerController::class, 'transaksibarang'])->name('manager.transaksibarang');
    });
});
