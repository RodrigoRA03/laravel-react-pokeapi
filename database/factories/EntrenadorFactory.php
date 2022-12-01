<?php

namespace Database\Factories;

use App\Models\Entrenador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EntrenadorFactory extends Factory
{
    protected $model = Entrenador::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'torneo_id'       => 1,
            'nombre'          => $this->faker->firstName,
            'apellidoPaterno' => $this->faker->lastName,
            'apellidoMaterno' => $this->faker->lastName,
            'correo'          => $this->faker->unique()->safeEmail,
            'fechaNacimiento' => $this->faker->dateTimeBetween('-30 years', '-18 years'),
            'activo'          => 1
        ];
    }
}
