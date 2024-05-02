<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\czywiesz>
 */
class CzywieszFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tytul' => $this->faker->text(60),
            'tresc' => $this->faker->text(220),
            'title' => $this->faker->text(50),
            'keywords' => $this->faker->words(4,true),
            'description' => $this->faker->text(120)
        ];
    }
}
