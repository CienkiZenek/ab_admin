<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\intencje>
 */
class IntencjeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['Nowa', 'Opublikowana', 'Archiwum']),
            'tresc_nadeslana' => $this->faker->text(500),
            'tresc_opublikowana' => $this->faker->text(300)
        ];
    }
}
