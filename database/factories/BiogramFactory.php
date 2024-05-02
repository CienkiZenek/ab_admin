<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\biogram>
 */
class BiogramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tresc' => $this->faker->text(120),
            'dzien_mies' => $this->faker->text(9),
            'rok' => $this->faker->date('Y'),
            'kolejnosc' => $this->faker->numberBetween(100, 10000)
        ];
    }
}
