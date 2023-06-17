<?php

namespace Database\Seeders;

use App\Models\TipoSoftware;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TIpoSoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TipoSoftware::create([
            'tipoSoftware_id' => 'IDE',
            'tipoSoftware' => 'Entorno de Desarrollo Integrado',
        ]);
        TipoSoftware::create([
            'tipoSoftware_id' => 'SGBD',
            'tipoSoftware' => 'Sistema Gestor de Bases de Datos'
        ]);
        TipoSoftware::create([
            'tipoSoftware_id' => 'Sis_Op',
            'tipoSoftware' => 'Sistema Operativo'
        ]);
        TipoSoftware::create([
            'tipoSoftware_id' => 'Soft_App',
            'tipoSoftware' => 'Software de Aplicacion'
        ]);
    }
}
