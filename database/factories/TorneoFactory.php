<?php

namespace Database\Factories;

use App\Models\Torneo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Torneo>
 */
class TorneoFactory extends Factory
{
    protected $model = Torneo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombreTorneo'        => 'Torneo: ' . $this->faker->unique()->randomNumber(3),
            'numeroParticipantes' => $this->faker->numberBetween(10, 20),
            'fechaInicioRegistro' => now(),
            'fechaFinRegistro'    => $this->faker->dateTimeBetween('+1 day', '+10 days'),
            'activo'              => 1
        ];
    }
}
