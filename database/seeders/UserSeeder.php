<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Marving Uriel Ramirez Villegas',
            'email' => '17030365@itcelaya.edu.mx',
            'password' => bcrypt('123456789')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Hugo Alfredo Silvano Lopez Granados',
            'email' => 'lppbdaistzeyzpufem@bbitf.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Usuario');

        User::factory(98)->create();
    }
}
