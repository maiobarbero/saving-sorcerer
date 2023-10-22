<?php


use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

/**
 * 
 * Login & Logout
 * 
 */
Route::get('/', [IndexController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->middleware(['auth']);

/**
 * 
 * Basic CRUD routes
 * 
 */
Route::resource('transactions',TransactionController::class)->middleware(['auth']);


// @todo Analitycs

Route::get('/dashboard', [IndexController::class, 'dashboard'])->middleware(['auth']);



// @todo User settings (bank_account CRUD, budget CRUD)

Route::middleware(['auth'])->group(function () { });