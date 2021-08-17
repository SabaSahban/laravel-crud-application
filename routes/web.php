<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web adfroutes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('property.')->group(function () {
    Route::prefix('property')->group(function () {
        Route::get('/admin', [PropertyController::class, 'index'])->name('index');
        Route::get('/create', [PropertyController::class, 'create'])->name('create');
        Route::post('/store', [PropertyController::class, 'store'])->name('store');
        Route::post('/update/{id}', [PropertyController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [PropertyController::class, 'edit'])->name('edit');
        Route::get('/destroy/{id}', [PropertyController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('currency')->name('currency.')->group(function () {

    Route::get('/show', [CurrencyController::class, 'show'])->name('show');
    Route::get('/create', [CurrencyController::class, 'create'])->name('create');
    Route::post('/store', [CurrencyController::class, 'store'])->name('store');
    Route::post('/update/{id}', [CurrencyController::class, 'update'])->name('update');
    Route::get('/edit/{id}', [CurrencyController::class, 'edit'])->name('edit');
    Route::get('/destroy/{id}', [CurrencyController::class, 'destroy'])->name('destroy');
});
