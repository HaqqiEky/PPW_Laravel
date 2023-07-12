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

Route::middleware(['auth'])->group(function () {

    // Route untuk index item
    Route::get('/Barang/Table', [ItemController::class, 'index'])->name('barang.index');

    // Route untuk show item
    Route::get('/Barang/Show/{item}', [ItemController::class, 'show'])->name('barang.show');

    // Route untuk create item
    Route::get('/Barang/Create', [ItemController::class, 'create'])->name('barang.create');
    Route::post('/Barang/Store', [ItemController::class, 'store'])->name('barang.store');

    // Route untuk edit item
    Route::get('/Barang/Edit/{item}', [ItemController::class, 'edit'])->name('barang.edit');
    Route::put('/Barang/Update/{item}', [ItemController::class, 'update'])->name('barang.update');

    // Route untuk hapus item
    Route::delete('/Barang/Destroy/{item}', [ItemController::class, 'destroy'])->name('barang.destroy');
});

