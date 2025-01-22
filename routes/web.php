<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;

// Ruta inicial: accessible sense autenticació
Route::get('/', [CategoryController::class, 'index'])->name('categories.index');

// Rutes públiques per veure categories i jocs
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');

// Dashboard: accessible sense restriccions
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Funcionalitats protegides per a usuaris loggejats
Route::middleware(['auth'])->group(function () {
    // Crear, modificar o eliminar categories
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

    // Valorar un joc
    Route::post('/games/{game}/rate', [GameController::class, 'rate'])->name('games.rate');
});
