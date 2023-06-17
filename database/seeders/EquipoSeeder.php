<?php

namespace Database\Seeders;

use App\Models\Equipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Equipo::create([
            'No_Serie' => '11511300111280000064111JFXFQ',
            'descripcion' => 'Computadora de Escritorio modelo Vostro 3681',
            'contrasena' => '123456789',
            'estatus_id' => 1,
            'marca_id' => 3,
            'tipoEquipo_id' => 'Comp_Esc'
        ]);

        Equipo::factory(9)->create();
    }
}
