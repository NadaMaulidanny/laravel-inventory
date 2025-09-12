<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:user'])->group(function(){
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard.dashboardUser');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard.dashboardAdmin');

    // Route::get('/managemen-pengguna', [SuperAdminController::class, 'manageUser'])->name('superadmin.manageUser');
    // Route::get('/tambah-pengguna', [SuperAdminController::class, 'addUser'])->name('superadmin.addUser');
    // Route::post('/tambah-pengguna', [SuperAdminController::class, 'store'])->name('superadmin.storeUser');
    // Route::get('/edit-pengguna/{id}', [SuperAdminController::class, 'edit'])->name('superadmin.editUser');
    // Route::put('/perbarui-pengguna/{id}', [SuperAdminController::class, 'update'])->name('superadmin.updateUser');
    // Route::delete('/hapus-pengguna/{id}', [SuperAdminController::class, 'delete'])->name('superadmin.deleteUser');
});

Route::middleware(['auth', 'role:super'])->group(function(){
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard.dashboardSuper');

    Route::get('/managemen-pengguna', [SuperAdminController::class, 'manageUser'])->name('managemenUser.manageUser');
    Route::get('/tambah-pengguna', [SuperAdminController::class, 'addUser'])->name('managemenUser.addUser');
    Route::post('/tambah-pengguna', [SuperAdminController::class, 'store'])->name('managemenUser.storeUser');
    Route::get('/edit-pengguna/{id}', [SuperAdminController::class, 'edit'])->name('managemenUser.editUser');
    Route::put('/perbarui-pengguna/{id}', [SuperAdminController::class, 'update'])->name('managemenUser.updateUser');
    Route::delete('/hapus-pengguna/{id}', [SuperAdminController::class, 'delete'])->name('managemenUser.deleteUser');
    Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');

    Route::get('/daftar-kategori', [KategoriController::class, 'index'])->name('kategori.kategoriList');
    Route::get('/tambah-kategori', [KategoriController::class, 'add'])->name('kategori.kategoriAdd');
    Route::post('/tambah-kategori', [KategoriController::class, 'store'])->name('kategori.kategoriStore');
    Route::get('/edit-kategori/{id}', [KategoriController::class, 'edit'])->name('kategori.kategoriEdit');
    Route::put('/perbarui-kategori/{id}', [KategoriController::class, 'update'])->name('kategori.kategoriUpdate');
    Route::delete('/hapus-kategori/{id}', [KategoriController::class, 'delete'])->name('kategori.kategoriDelete');
    Route::get('/kategori/cetak', [LaporanController::class, 'kategori'])->name('kategori.cetak');
});



require __DIR__.'/auth.php';
