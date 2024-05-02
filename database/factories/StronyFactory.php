<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\strony>
 */
class StronyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'opis' => $this->faker->text(500),
            'tytul' => $this->faker->text(90),
            'link' => $this->faker->url()
        ];
    }
}
