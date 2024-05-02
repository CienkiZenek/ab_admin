<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Watki;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\watki>
 */
class WatkiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tytul' => $this->faker->text(70)
        ];
    }
}
