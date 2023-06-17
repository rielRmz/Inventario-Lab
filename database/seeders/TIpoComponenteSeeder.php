<?php

namespace Database\Seeders;

use App\Models\TipoComponente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TIpoComponenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TipoComponente::create([
            'tipoComponente_id' => 'HDD',
            'tipoComponente' => 'Unidad de Almacenamiento de Disco Rigido'
        ]);
        TipoComponente::create([
            'tipoComponente_id' => 'SSD',
            'tipoComponente' => 'Unidad de Almacenamiento de Estado Solido'
        ]);
        TipoComponente::create([
            'tipoComponente_id' => 'Proc',
            'tipoComponente' => 'Procesador'
        ]);
        TipoComponente::create([
            'tipoComponente_id' => 'Mem_RAM',
            'tipoComponente' => 'Memoria RAM'
        ]);
        TipoComponente::create([
            'tipoComponente_id' => 'Teclado',
            'tipoComponente' => 'Teclado'
        ]);
        TipoComponente::create([
            'tipoComponente_id' => 'Mouse',
            'tipoComponente' => 'Mouse'
        ]);
        TipoComponente::create([
            'tipoComponente_id' => 'Monitor',
            'tipoComponente' => 'Monitor'
        ]);
    }
}
