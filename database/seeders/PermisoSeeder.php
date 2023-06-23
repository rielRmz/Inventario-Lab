<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Usuario']);

        //MAIN
        Permission::create(['name' => 'admin.home', 'description' => 'ver el dashboard'])->syncRoles([$role1, $role2]);
        //COMPONENTES
        Permission::create(['name' => 'admin.componente.index', 'description' => 'ver el listado de componentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.componente.create', 'description' => 'crear componentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.componente.edit', 'description' => 'editar componentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.componente.destroy', 'description' => 'eliminar componentes'])->syncRoles([$role1, $role2]);
        //EQUIPOS
        Permission::create(['name' => 'admin.equipo.index', 'description' => 'ver el listado de equipos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.equipo.create', 'description' => 'crear equipos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.equipo.edit', 'description' => 'editar equipos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.equipo.destroy', 'description' => 'eliminar equipos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.equipo.show', 'description' => 'ver detalles de equipos'])->syncRoles([$role1, $role2]);
        //LABORATORIOS
        Permission::create(['name' => 'admin.labs.index', 'description' => 'ver el listado de laboratorios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.labs.create', 'description' => 'crear laboratorios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.labs.edit', 'description' => 'editar laboratorios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.labs.destroy', 'description' => 'eliminar laboratorios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.labs.show', 'description' => 'ver detalles de laboratorios'])->syncRoles([$role1, $role2]);
        //SOFTWARES
        Permission::create(['name' => 'admin.software.index', 'description' => 'ver el listado de software'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.software.create', 'description' => 'crear software'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.software.edit', 'description' => 'editar software'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.software.destroy', 'description' => 'eliminar software'])->syncRoles([$role1, $role2]);
        //TIPO COMPONENTE
        Permission::create(['name' => 'admin.tipoComp.index', 'description' => 'ver el listado de tipos de componentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoComp.create', 'description' => 'crear tipos de componentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoComp.edit', 'description' => 'editar tipos de componentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoComp.destroy', 'description' => 'eliminar tipos de componentes'])->syncRoles([$role1, $role2]);
        //TIPO EQUIPO
        Permission::create(['name' => 'admin.tipoEquipo.index', 'description' => 'ver el listado de tipos de equipos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoEquipo.create', 'description' => 'crear tipos de equipos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoEquipo.edit', 'description' => 'editar tipos de equipos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoEquipo.destroy', 'description' => 'eliminar tipos de equipos'])->syncRoles([$role1, $role2]);
        //TIPO SOFTWARE
        Permission::create(['name' => 'admin.tipoSoft.index', 'description' => 'ver el listado de tipos de software'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoSoft.create', 'description' => 'crear tipos de software'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoSoft.edit', 'description' => 'editar tipos de software'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tipoSoft.destroy', 'description' => 'eliminar tipos de software'])->syncRoles([$role1, $role2]);
        //ROLES
        Permission::create(['name' => 'admin.roles.index', 'description' => 'ver el listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'crear roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'editar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'eliminar roles'])->syncRoles([$role1]);
        //MARCAS
        Permission::create(['name' => 'admin.marcas.index', 'description' => 'ver el listado de las marcas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.marcas.create', 'description' => 'crear marcas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.marcas.edit', 'description' => 'editar marcas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.marcas.destroy', 'description' => 'eliminar marcas'])->syncRoles([$role1]);
        //ESTATUS
        Permission::create(['name' => 'admin.status.index', 'description' => 'ver el listado de los estatus'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.status.create', 'description' => 'crear estatus'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.status.edit', 'description' => 'editar estatus'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.status.destroy', 'description' => 'eliminar estatus'])->syncRoles([$role1]);
        //USUARIO
        Permission::create(['name' => 'profile.perfil.index', 'description' => 'ver el listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'profile.perfil.assignRoles', 'description' => 'Asignar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'profile.perfil.destroy', 'description' => 'Eliminar roles'])->syncRoles([$role1]);
        //EQUIPO COMPONENTE
        Permission::create(['name' => 'details.equipoComp.index', 'description' => 'ver el listado de detalles de equipo con componentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'details.equipoComp.create', 'description' => 'crear detalle de equipo con componentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'details.equipoComp.edit', 'description' => 'editar detalle de equipo con componentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'details.equipoComp.destroy', 'description' => 'eliminar detalle de equipo con componentes'])->syncRoles([$role1, $role2]);
        //EQUIPO LABORATORIO
        Permission::create(['name' => 'details.equipoLab.index', 'description' => 'ver el listado de detalles de equipos con laboratorios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'details.equipoLab.create', 'description' => 'crear detalle de equipos con laboratorios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'details.equipoLab.edit', 'description' => 'editar detalle de equipos con laboratorios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'details.equipoLab.destroy', 'description' => 'eliminar detalle de  equipos con laboratorios'])->syncRoles([$role1, $role2]);
        //EQUIPO SOFTWARE
        Permission::create(['name' => 'details.equipoSoft.index', 'description' => 'ver el listado de detalles de equipos con software'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'details.equipoSoft.create', 'description' => 'crear detalle de equipos con software'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'details.equipoSoft.edit', 'description' => 'editar detalle de equipos con software'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'details.equipoSoft.destroy', 'description' => 'eliminar detalle de  equipos con software'])->syncRoles([$role1, $role2]);
        //LABORATORIO EQUIPO
        Permission::create(['name' => 'details.labEquipo.index', 'description' => 'ver el listado de detalles de laboratorios con equipos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'details.labEquipo.create', 'description' => 'crear detalle de laboratorios con equipos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'details.labEquipo.edit', 'description' => 'editar detalle de laboratorios con equipos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'details.labEquipo.destroy', 'description' => 'eliminar detalle de  laboratorios con equipos'])->syncRoles([$role1, $role2]);
        //HISTORIAL
        Permission::create(['name' => 'historial.home', 'description' => 'ver la interfaz para ver el historial de cambios'])->syncRoles([$role1]);
        //REPORTES
        Permission::create(['name' => 'report.reportes', 'description' => 'ver la interfaz para generar los reportes'])->syncRoles([$role1]);
        Permission::create(['name' => 'report.equipoFull.pdf', 'description' => 'ver la interfaz para generar los reportes'])->syncRoles([$role1]);
        Permission::create(['name' => 'report.equipo.pdf', 'description' => 'ver la interfaz para generar los reportes'])->syncRoles([$role1]);
        Permission::create(['name' => 'report.labFull.pdf', 'description' => 'ver la interfaz para generar los reportes'])->syncRoles([$role1]);
        Permission::create(['name' => 'report.lab.pdf', 'description' => 'ver la interfaz para generar los reportes'])->syncRoles([$role1,$role2]);
    }
}
