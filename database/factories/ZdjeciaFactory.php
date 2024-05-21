<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\zdjecia>
 */
class ZdjeciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kategoria' => $this->faker->randomElement(['Portret', 'Informacja', 'Dokument', 'Publikacja', 'Wydarzenie', 'Gazeta', 'Strachocina', 'Rakowiecka', 'Muzeum', 'Meczenstwo', 'Inne', 'Ilustracje', 'Relikwie', 'Modlitwa']),
            'opis' => $this->faker->text(120),
            'autor' => $this->faker->text(15),
            'plik'=> $this->faker->image('storage/app/public/zdjecia',1200,900,null,false)

        ];
    }
}
