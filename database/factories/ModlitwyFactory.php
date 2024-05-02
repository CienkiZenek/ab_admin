<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\modlitwy>
 */
class ModlitwyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nazwa' => $this->faker->text(60),
            'tresc' => $this->faker->text(400),
            'opis' => $this->faker->text(190),
            'zrodlo_nazwa' => $this->faker->text(50),
            'zrodlo_link' => $this->faker->url(),
            'title' => $this->faker->text(50),
            'keywords' => $this->faker->words(4,true),
            'description' => $this->faker->text(120)
        ];
    }
}
