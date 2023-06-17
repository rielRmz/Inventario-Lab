<?php

use App\Http\Controllers\History\MainController;
use App\Http\Controllers\History\componenteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas para el historial
|--------------------------------------------------------------------------
*/
Route::get('',[MainController::class, 'index'])->name('historial.home');

