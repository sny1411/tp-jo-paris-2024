<?php

namespace Database\Factories;

use App\Models\Sport;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sport>
 */
class SportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'annee_ajout' => $this->faker->biasedNumberBetween(1900,2023),
            'nb_disciplines' => $this->faker->randomDigit(),
            'nb_epreuves' => $this->faker->randomDigit(),
            'date_debut' => $this->faker->dateTimeInInterval,
            'date_fin' => $this->faker->dateTimeInInterval,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
