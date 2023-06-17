<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Estatus;
use App\Models\TipoEquipo;
use App\Models\TipoSoftware;
use Database\Factories\EquipoFactory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //seeders de tablas de catalogo
        $this->call(LaboratorioSeeder::class);
        $this->call(TIpoComponenteSeeder::class);
        $this->call(TIpoEquipoSeeder::class);
        $this->call(TIpoSoftwareSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(EstatusSeeder::class);
        //seeders de equipos
        $this->call(PermisoSeeder::class);
        $this->call(UserSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);DTB16AL008624018663000
    }
}
