<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

// Rute root
Route::get('/', [ItemController::class, 'index'])->name('barang.index');
Route::get('/Barang/Create', [ItemController::class, 'create'])->name('barang.create');
Route::get('/Barang/{item}', [ItemController::class, 'show'])->name('barang.show');
Route::post('/Barang/Store', [ItemController::class, 'store'])->name('barang.store');
Route::get('/Barang/Edit/{item}', [ItemController::class, 'edit'])->name('barang.edit');
Route::put('/Barang/Update/{item}', [ItemController::class, 'update'])->name('barang.update');
Route::delete('/Barang/Delete/{item}', [ItemController::class, 'destroy'])->name('barang.destroy');