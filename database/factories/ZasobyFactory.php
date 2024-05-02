<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\zasoby>
 */
class ZasobyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rodzaj' => $this->faker->randomElement(['ksiazka', 'galeria', 'wydarzenie' ]),
            'nazwa' => $this->faker->text(80),
            'opis' => $this->faker->text(300),
            'tresc' => $this->faker->text(1300),
            'title' => $this->faker->text(50),
            'keywords' => $this->faker->words(4,true),
            'description' => $this->faker->text(120)
        ];
    }
}
