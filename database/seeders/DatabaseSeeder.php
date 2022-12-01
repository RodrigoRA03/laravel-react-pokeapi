<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Entrenador;
use App\Models\Pokemon;
use App\Models\Torneo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(AdminSeeder::class);
//        Torneo::factory()->create();

        for ($i = 0; $i < 13; $i++) {
            $entrenador = Entrenador::factory()->create();
            $entrenador->pokemones()->saveMany(Pokemon::factory()->count(6)->make());
        }
    }
}
