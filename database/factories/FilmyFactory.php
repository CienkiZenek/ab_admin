<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\filmy>
 */
class FilmyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rodzaj' => $this->faker->randomElement(['Wlasny', 'Obcy']),
            'tytul' => $this->faker->text(50),
            'opis' => $this->faker->text(200),
            'kanal' => $this->faker->text(30),
            'title' => $this->faker->text(50),
            'keywords' => $this->faker->words(4,true),
            'description' => $this->faker->text(120)
        ];
    }
}
