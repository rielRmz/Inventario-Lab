<?php

namespace Database\Seeders;

use App\Models\Componente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComponenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Componente::create([
            'Componente_id' => 'HDD128Gb',
            'descripcion' => 'Unidad de Almacenamiento de Estado Solido de 128Gb',
            'marca' => 'Toshiba',
            'tipoComponente_id' => 'HDD',
        ]);

        Componente::create([
            'Componente_id' => 'HDD1Tb',
            'descripcion' => 'Unidad de Almacenamiento de Estado Solido de 1Tb',
            'marca' => 'Toshiba',
            'tipoComponente_id' => 'HDD',
        ]);

        Componente::create([
            'Componente_id' => 'HDD500Gb',
            'descripcion' => 'Unidad de Almacenamiento de Estado Solido de 500Gb',
            'marca' => 'Toshiba',
            'tipoComponente_id' => 'HDD',
        ]);

        Componente::create([
            'Componente_id' => 'RAM4Gb',
            'descripcion' => 'Memoria RAM de 4Gb',
            'marca' => 'KingStone',
            'tipoComponente_id' => 'Mem_RAM',
        ]);

        Componente::create([
            'Componente_id' => 'RAM8Gb',
            'descripcion' => 'Memoria RAM de 8Gb',
            'marca' => 'KingStone',
            'tipoComponente_id' => 'Mem_RAM',
        ]);
    }
}
