<?php

use App\Http\{Controllers\Admin\ComponenteController,
    Controllers\Admin\EquipoController,
    Controllers\Admin\EstatusController,
    Controllers\Admin\LaboratorioController,
    Controllers\Admin\MainController,
    Controllers\Admin\MarcaController,
    Controllers\Admin\PDFController,
    Controllers\Admin\RolesController,
    Controllers\Admin\SoftwareController,
    Controllers\Admin\TipoComponenteController,
    Controllers\Admin\TipoEquipoController,
    Controllers\Admin\TipoSoftwareController,
    Controllers\Admin\UserController};
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
|Ruta main
|--------------------------------------------------------------------------
*/
Route::get('',[MainController::class, 'index'])
    ->name('admin.home');
/*
|--------------------------------------------------------------------------
|Rutas para el CRUD de Roles
|--------------------------------------------------------------------------
*/
Route::resource('roles',RolesController::class)
    ->names('admin.roles');
/*
|--------------------------------------------------------------------------
|Rutas para el CRUD de Roles
|--------------------------------------------------------------------------
*/
Route::resource('reportes',PDFController::class)
    ->names('admin.reportes');
/*
|--------------------------------------------------------------------------
|Rutas para el CRUD de Laboratorios
|--------------------------------------------------------------------------
*/
Route::resource('labs',LaboratorioController::class)
    ->names('admin.labs');
/*
|--------------------------------------------------------------------------
|Rutas para el CRUD de Marcas
|--------------------------------------------------------------------------
*/
Route::resource('marcas',MarcaController::class)
    ->names('admin.marcas');
/*
|--------------------------------------------------------------------------
|Rutas para el CRUD de Estatus
|--------------------------------------------------------------------------
*/
Route::resource('status',EstatusController::class)
    ->names('admin.status');
/*
|--------------------------------------------------------------------------
|Rutas para el CRUD de TipoComponente
|--------------------------------------------------------------------------
*/
Route::resource('tipoComp',TipoComponenteController::class)
    ->parameters(['tipoComp'=>'comp'])->names('admin.tipoComp');
/*
|--------------------------------------------------------------------------
|Rutas para el CRUD de TipoEquipo
|--------------------------------------------------------------------------
*/
Route::resource('tipoEquipo',TipoEquipoController::class)
    ->except('show')
    ->parameters(['tipoEquipo'=>'equipo'])
    ->names('admin.tipoEquipo');
/*
|--------------------------------------------------------------------------
|Rutas para el CRUD de Tipo Software
|--------------------------------------------------------------------------
*/
Route::resource('tipoSoft',TipoSoftwareController::class)
    ->except('show')
    ->parameters(['tipoSoft'=>'soft'])
    ->names('admin.tipoSoft');
/*
|--------------------------------------------------------------------------
| Rutas para el CRUD de Software
|--------------------------------------------------------------------------
| En este hacemos un llamado al controlador de TipoSoftware para extraer informacion de este
|--------------------------------------------------------------------------
*/
Route::resource('software',SoftwareController::class)
    ->parameters(['software'=>'soft'])->names('admin.software');
/*
|--------------------------------------------------------------------------
| Rutas para el CRUD de Componentes
|--------------------------------------------------------------------------
| En este hacemos un llamado al controlador de TipoComponente para extraer informacion de este
|--------------------------------------------------------------------------
*/
Route::resource('componente',ComponenteController::class)
    ->parameters(['componente'=>'comp'])->names('admin.componente');
/*
|--------------------------------------------------------------------------
| Rutas para el CRUD de Equipos
|--------------------------------------------------------------------------
| En este hacemos un llamado al controlador de TipoEquipos para extraer informacion de este.
|--------------------------------------------------------------------------
*/
Route::resource('equipo',EquipoController::class)->names('admin.equipo');
Route::get('equipo/Generar/PDF',[EquipoController::class, 'pdf'])->name('admin.equipo.pdf');
/*
|--------------------------------------------------------------------------
| Rutas para el CRUD de Usuarios
|--------------------------------------------------------------------------
| Por un lado, en este crud asignaremos roles a los usuarios.
| Por otro, modificaremos los datos que el usuario alla ingresado al momento de darse de alta en la aplicacion.
|--------------------------------------------------------------------------
*/
Route::controller(UserController::class)->group(function (){
    Route::GET('profile/user','index')->name('profile.perfil.index');
    Route::GET('profile/user/{user}/assign','assignRoles')->name('profile.perfil.assignRoles'); //vista asignar permisos
    Route::put('profile/user/{user}/store','storeRoles')->name('profile.perfil.storeRoles'); //almacernar permiso
    Route::delete('profile/user/{user}','destroy')->name('profile.perfil.destroy');

    Route::get('profile/user/edit','edit')->name('profile.perfil.edit'); //vista principal
    Route::post('profile/user/update','update')->name('profile.perfil.update');
});

