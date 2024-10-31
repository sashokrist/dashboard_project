<?php

use App\Http\Controllers\ButtonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ButtonController::class, 'index']);
Route::get('/configure/{id}', [ButtonController::class, 'configure'])->name('configure');
Route::post('/configure/{id}', [ButtonController::class, 'store']);
Route::get('/edit/{id}', [ButtonController::class, 'edit'])->name('edit');
Route::delete('/delete/{id}', [ButtonController::class, 'destroy'])->name('delete');
