<?php

namespace Database\Seeders;

use App\Models\Software;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoftwreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Software::create([
            'Software_id' => 'IDEA_Int-J',
            'descripcion' => 'IntelliJ IDEA',
            'tipoSoftware_id' => 'IDE'
        ]);
        Software::create([
            'Software_id' => 'VSCode',
            'descripcion' => 'Microsoft Visual Studio Code',
            'tipoSoftware_id' => 'IDE'
        ]);
        Software::create([
            'Software_id' => 'NetBeans',
            'descripcion' => 'Apache NetBeans',
            'tipoSoftware_id' => 'IDE'
        ]);
        Software::create([
            'Software_id' => 'mariaSQL',
            'descripcion' => 'MariaDB Server',
            'tipoSoftware_id' => 'SGBD'
        ]);
        Software::create([
            'Software_id' => 'Office_Excel',
            'descripcion' => 'Microsoft Excel',
            'tipoSoftware_id' => 'Soft_App'
        ]);
        Software::create([
            'Software_id' => 'Office_PP',
            'descripcion' => 'Microsoft PowerPoint',
            'tipoSoftware_id' => 'Soft_App'
        ]);
        Software::create([
            'Software_id' => 'Office_Word',
            'descripcion' => 'Microsoft Word',
            'tipoSoftware_id' => 'Soft_App'
        ]);
        Software::create([
            'Software_id' => 'pgSQL',
            'descripcion' => 'PostgreSQL',
            'tipoSoftware_id' => 'SGBD'
        ]);
        Software::create([
            'Software_id' => 'SQLserver',
            'descripcion' => 'Microsoft SQL Server',
            'tipoSoftware_id' => 'SGBD'
        ]);
        Software::create([
            'Software_id' => 'WIN10',
            'descripcion' => 'Sistema Operativo Windows 10',
            'tipoSoftware_id' => 'Sis_Op'
        ]);
        Software::create([
            'Software_id' => 'WIN11',
            'descripcion' => 'Sistema Operativo Windows 11',
            'tipoSoftware_id' => 'Sis_Op'
        ]);

    }
}
