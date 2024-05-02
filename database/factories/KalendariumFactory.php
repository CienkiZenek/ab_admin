<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\kalendarium>
 */
class KalendariumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tytul' => $this->faker->text(70),
            'data' => $this->faker->date('Y-m-d'),
            'status' => $this->faker->randomElement(['Robocze','Opublikowane']),
            'naglowek' => $this->faker->text(200),
            'tresc' => $this->faker->text(500),
            'title' => $this->faker->text(50),
            'keywords' => $this->faker->words(4,true),
            'description' => $this->faker->text(120)


        ];
    }
}
