<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/social-media', [PageController::class, 'social']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/news', [PageController::class, 'news']);
Route::get('/news/{id}', [PageController::class, 'showNewsDetail']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['admin.auth'])->group(function () {

    // Dashboard & Laporan PDF
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/report/pdf', [AdminController::class, 'downloadReport']);

    // Fitur Management CRUD Artikel
    Route::get('/admin/article/create', [AdminController::class, 'create']);
    Route::post('/admin/article/store', [AdminController::class, 'store']);
    Route::get('/admin/article/{id}/edit', [AdminController::class, 'edit']);
    Route::put('/admin/article/{id}/update', [AdminController::class, 'update']);     // Menggunakan PUT untuk Keamanan Data
    Route::delete('/admin/article/{id}/delete', [AdminController::class, 'destroy']); // Menggunakan DELETE untuk Hapus Data

    // Fitur Management CRUD Menu/Layanan (Produk Baru Dapur MBG)
    Route::get('/admin/products', [ProductController::class, 'index']);
    Route::get('/admin/products/create', [ProductController::class, 'create']);
    Route::post('/admin/products/store', [ProductController::class, 'store']);
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/admin/products/{id}/update', [ProductController::class, 'update']);    // Menggunakan PUT untuk Keamanan Data
    Route::delete('/admin/products/{id}/delete', [ProductController::class, 'destroy']); // Menggunakan DELETE untuk Hapus Data
});

