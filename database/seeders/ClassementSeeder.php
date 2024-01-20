<?php

namespace Database\Seeders;

use App\Models\Athlete;
use App\Models\Sport;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassementSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $faker = Factory::create('fr_FR');
        Sport::all()->each(function ($sport) use ($faker) {
            $numberOfAthletes = rand(2, 5);

            for ($i = 0; $i < $numberOfAthletes; $i++) {
                $athlete = Athlete::factory()->create();

                $sport->athletes()->attach($athlete->id, [
                    'rang' => rand(1, 10),
                    'performance' => $faker->randomElement(['excellent', 'moyen', 'mauvais']),
                ]);
            }
        });
    }
}
