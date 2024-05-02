<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KsiegarnieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nazwa' => $this->faker->text(50),
            'opis' => $this->faker->text(120),
            'link' => $this->faker->url()
        ];
    }
}
