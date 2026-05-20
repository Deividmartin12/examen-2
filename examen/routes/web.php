<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamiliasController;
use App\Http\Controllers\CategoriasController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('familias', FamiliasController::class);
    Route::resource('categorias', CategoriasController::class);
});