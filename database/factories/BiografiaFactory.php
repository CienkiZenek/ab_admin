<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Biografia>
 */
class BiografiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tytul' => $this->faker->text(90),
            'naglowek' => $this->faker->text(200),
            'tresc' => $this->faker->text(640),
            'autor' => $this->faker->text(20),
            'zdjecie1_podpis' => $this->faker->text(70),
            'zdjecie2_podpis' => $this->faker->text(70),
            'ramka1' => $this->faker->text(270),
            'ramka2' => $this->faker->text(170),
            'cytat1' => $this->faker->text(100),
            'cytat2' => $this->faker->text(100),
            'cytat3' => $this->faker->text(100),
            'cytat4' => $this->faker->text(100),
            'status' => $this->faker->randomElement(['Roboczy','Opublikowany']),
            'title' => $this->faker->text(50),
            'keywords' => $this->faker->words(4,true),
            'description' => $this->faker->text(120)
        ];
    }
}
