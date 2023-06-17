<?php

namespace Database\Factories;

use App\Models\TipoEquipo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipo>
 */
class EquipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            //
            'No_Serie' => Str::random(30),
            'descripcion' => fake()->text(44),
            'contrasena' => Str::random(12),
            'estatus_id' => 1,
            'marca_id' => 3,
            'tipoEquipo_id' => 'Comp_Esc'
        ];
    }
}
