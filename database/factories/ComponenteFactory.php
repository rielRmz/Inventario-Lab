<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Componente>
 */
class ComponenteFactory extends Factory
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
            'Componente_id' => fake()->unique()->text(8),
            'descripcion' => fake()->text(50),
            'marca' => fake()->word(),
            'tipoComponente_id' => 'HDD',
        ];
    }
}
