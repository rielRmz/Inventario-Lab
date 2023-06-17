<?php

use App\Http\Controllers\Detail\EquipoComponenteController;
use App\Http\Controllers\Detail\EquipoLaboratorioController;
use App\Http\Controllers\Detail\EquipoSoftwareController;
use App\Http\Controllers\Detail\LaboratorioEquipoController;
use App\Http\Controllers\Detail\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|Ruta principal
|--------------------------------------------------------------------------
*/
Route::get('',[MainController::class, 'index'])->name('details.home');
/*
|--------------------------------------------------------------------------
| Rutas para el CRUD de Detalle de Software
|--------------------------------------------------------------------------
| En este hacemos un llamado los controladores Software y Equipos para mostrar informacion de ambos controladores
|--------------------------------------------------------------------------
*/
Route::controller(EquipoSoftwareController::class)->group(function (){
    Route::get('equipoSoft/{equipoSoft}/show','index')->name('details.equipoSoft.index');
    Route::post('equipoSoft/','store')->name('details.equipoSoft.store');
    Route::get('equipoSoft/{equipoSoft}/create','create')->name('details.equipoSoft.create');
    Route::put('equipoSoft/{equipoSoft}','update')->name('details.equipoSoft.update');
    Route::delete('equipoSoft/{equipoSoft}','destroy')->name('details.equipoSoft.destroy');
    Route::get('equipoSoft/{equipoSoft}/edit','edit')->name('details.equipoSoft.edit');
});
/*
|--------------------------------------------------------------------------
| Rutas para el CRUD de Detalle de Software
|--------------------------------------------------------------------------
| En este hacemos un llamado los controladores Software y Equipos para mostrar informacion de ambos controladores
|--------------------------------------------------------------------------
*/
Route::controller(EquipoLaboratorioController::class)->group(function (){
    Route::get('equipoLab/{equipoLab}/show','index')->name('details.equipoLab.index');
    Route::post('equipoLab/','store')->name('details.equipoLab.store');
    Route::get('equipoLab/{equipoLab}/create','create')->name('details.equipoLab.create');
    Route::put('equipoLab/{equipoLab}','update')->name('details.equipoLab.update');
    Route::delete('equipoLab/{equipoLab}','destroy')->name('details.equipoLab.destroy');
    Route::get('equipoLab/{equipoLab}/edit','edit')->name('details.equipoLab.edit');
});
/*
|--------------------------------------------------------------------------
| Rutas para el CRUD de Detalle de Software
|--------------------------------------------------------------------------
| En este hacemos un llamado los controladores Software y Equipos para mostrar informacion de ambos controladores
|--------------------------------------------------------------------------
*/
Route::controller(EquipoComponenteController::class)->group(function (){
    Route::get('equipoComp/{equipoComp}/show','index')->name('details.equipoComp.index');
    Route::post('equipoComp/','store')->name('details.equipoComp.store');
    Route::get('equipoComp/{equipoComp}/create','create')->name('details.equipoComp.create');
    Route::put('equipoComp/{equipoComp}','update')->name('details.equipoComp.update');
    Route::delete('equipoComp/{equipoComp}','destroy')->name('details.equipoComp.destroy');
    Route::get('equipoComp/{equipoComp}/edit','edit')->name('details.equipoComp.edit');
});
/*
|--------------------------------------------------------------------------
| Rutas para el CRUD de Detalle de Software
|--------------------------------------------------------------------------
| En este hacemos un llamado los controladores Software y Equipos para mostrar informacion de ambos controladores
|--------------------------------------------------------------------------
*/
Route::controller(LaboratorioEquipoController::class)->group(function (){
    Route::get('labEquipo/{labEquipo}/show','index')->name('details.labEquipo.index');
    Route::post('labEquipo/','store')->name('details.labEquipo.store');
    Route::get('labEquipo/{labEquipo}/create','create')->name('details.labEquipo.create');
    Route::put('labEquipo/{labEquipo}','update')->name('details.labEquipo.update');
    Route::delete('labEquipo/{labEquipo}','destroy')->name('details.labEquipo.destroy');
    Route::get('labEquipo/{labEquipo}/edit','edit')->name('details.labEquipo.edit');
});