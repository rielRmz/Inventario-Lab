<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Marca::create([
            'descripcion' => 'Dell'
        ]);
        Marca::create([
            'descripcion' => 'Toshiba'
        ]);
        Marca::create([
            'descripcion' => 'Lanix'
        ]);
        Marca::create([
            'descripcion' => 'Mac'
        ]);
    }
}
