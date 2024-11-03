<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ButtonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [ButtonController::class, 'index'])->name('dashboard');
    Route::post('/buttons/store', [ButtonController::class, 'store'])->name('buttons.store');
    Route::put('/buttons/{id}', [ButtonController::class, 'update'])->name('buttons.update');
    Route::delete('/buttons/{id}', [ButtonController::class, 'destroy'])->name('buttons.destroy');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
