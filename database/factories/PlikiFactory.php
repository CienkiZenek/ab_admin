<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pliki>
 */
class PlikiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'typ' => $this->faker->randomElement(['pdf', 'word']),
            'nazwa' => $this->faker->text(40),
            'rodzaj' => $this->faker->randomElement(['zasob', 'dokument', 'modlitwa','ksiazka', 'skan', 'inny']),
            'opis' => $this->faker->text(100),
            'plik'=> $this->faker->file('storage/app/public/fakpdf','storage/app/public/pliki',false)
        ];
    }
}
