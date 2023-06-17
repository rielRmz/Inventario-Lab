<?php

use App\Http\{Controllers\Admin\PDFController};
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
|Rutas para el CRUD de Roles
|--------------------------------------------------------------------------
*/
Route::resource('reportes',PDFController::class)
    ->names('report.reportes');

Route::get('reportes/Generar/Full',[PDFController::class, 'EquiposFull'])->name('report.equipoFull.pdf');
Route::get('reportes/Generar/{marca}',[PDFController::class, 'Equipos'])->name('report.equipo.pdf');
