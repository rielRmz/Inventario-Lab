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

/*
|--------------------------------------------------------------------------
|Reportes de Equipos
|--------------------------------------------------------------------------
*/
Route::get('reportes/Equipo/Full',[PDFController::class, 'EquiposFull'])->name('report.equipoFull.pdf');
Route::get('reportes/Equipo/{marca}',[PDFController::class, 'Equipos'])->name('report.equipo.pdf');
/*
|--------------------------------------------------------------------------
|Reportess de Laboratorios
|--------------------------------------------------------------------------
*/
Route::get('reportes/Labs/Full',[PDFController::class, 'LaboratoriosFull'])->name('report.labFull.pdf');
Route::get('reportes/Labs/{lab}',[PDFController::class, 'Laboratorios'])->name('report.lab.pdf');
