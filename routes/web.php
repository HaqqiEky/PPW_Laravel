<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

// Rute register
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Rute login
Route::get('/login', [SessionsController::class, 'create'])->name('login.create');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');

// Rute logout
Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');

// Rute dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/Barang/Table', [ItemController::class, 'index'])->name('dashboard.index');
});

// Rute Administrator
Route::middleware('auth', 'administrator')->group(function () {
    Route::get('/Barang', [ItemController::class, 'index'])->name('barang.index');
    Route::get('/Barang/Create', [ItemController::class, 'create'])->name('barang.create');
    Route::post('/Barang/Store', [ItemController::class, 'store'])->name('barang.store');
    Route::get('/Barang/{item}', [ItemController::class, 'show'])->name('barang.show');
    Route::get('/Barang/Edit/{item}', [ItemController::class, 'edit'])->name('barang.edit');
    Route::put('/Barang/Update/{item}', [ItemController::class, 'update'])->name('barang.update');
    Route::delete('/Barang/Delete/{item}', [ItemController::class, 'destroy'])->name('barang.destroy');
});

// Rute pembeli
Route::middleware('auth', 'pembeli')->group(function () {
    Route::get('/Pembeli/Barang', [ItemController::class, 'index'])->name('pembeli.barang.index');
});