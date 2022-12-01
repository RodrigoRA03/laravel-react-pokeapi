<?php

namespace Database\Factories;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'entrenador_id'  => 1,
            'pokemon_id'     => $this->faker->numberBetween(1, 100),
            'nombrePokemon' => $this->faker->name,
            'hp'             => $this->faker->numberBetween(1, 100),
            'ataque'         => $this->faker->numberBetween(1, 100),
            'defensa'        => $this->faker->numberBetween(1, 100),
            'velocidad'      => $this->faker->numberBetween(1, 100),
            'activo'         => Status::ACTIVO,
        ];
    }
}
