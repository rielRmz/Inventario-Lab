<?php

namespace Database\Seeders;

use App\Models\TipoEquipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TIpoEquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TipoEquipo::create([
            'tipoEquipo_id' => 'Comp_All-in',
            'tipoEquipo' => 'Computadora All-in-One'
        ]);
        TipoEquipo::create([
            'tipoEquipo_id' => 'Comp_Esc',
            'tipoEquipo' => 'Computadora de Escritorio'
        ]);
        TipoEquipo::create([
            'tipoEquipo_id' => 'Comp_Lap',
            'tipoEquipo' => 'Computadora Portatil'
        ]);
    }
}
