<?php

namespace Database\Seeders;

use App\Models\Laboratorio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaboratorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Laboratorio::create([
            'id_laboratorio' => 'ALMAC-1',
            'laboratorio' => 'Almacen 1 (Planta alta, Ventanal sur)'
        ]);
        Laboratorio::create([
            'id_laboratorio' => 'LIS',
            'laboratorio' => 'Laboratorio de Ingenieria de Software'
        ]);
        Laboratorio::create([
            'id_laboratorio' => 'LPA',
            'laboratorio' => 'Laboratorio de Programacioon Avanzada'
        ]);
        Laboratorio::create([
            'id_laboratorio' => 'LPB',
            'laboratorio' => 'Laboratorio de Programacion Basica'
        ]);
        Laboratorio::create([
            'id_laboratorio' => 'LRC',
            'laboratorio' => 'Laboratorio de Redes'
        ]);
        Laboratorio::create([
            'id_laboratorio' => 'LSO',
            'laboratorio' => 'Laboratorio de Sistemas Operativo'
        ]);
        Laboratorio::create([
            'id_laboratorio' => 'LMM',
            'laboratorio' => 'Laboratorio de Multiples Medios'
        ]);
    }
}
