<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\wiadomosci>
 */
class WiadomosciFactory extends Factory
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
            'komentarz' => $this->faker->text(240),
            'autor' => $this->faker->text(20),
            'zrodlo' => $this->faker->text(10),
            'film_podpis' => $this->faker->text(50),
            'zdjecie1_podpis' => $this->faker->text(70),
            'zdjecie2_podpis' => $this->faker->text(70),
            'ramka1' => $this->faker->text(270),
            'ramka2' => $this->faker->text(170),
            'cytat1' => $this->faker->text(100),
            'cytat2' => $this->faker->text(100),
            'cytat3' => $this->faker->text(100),
            'cytat4' => $this->faker->text(100),
            'link_tresc' => $this->faker->text(80),
            'link_url' => $this->faker->url(),
            'data' => $this->faker->date('Y-m-d'),
            'status' => $this->faker->randomElement(['Robocza','Opublikowana']),
            'rodzaj' => $this->faker->randomElement(['Wiadomosc', 'PortalDzialalnosc', 'PortalPublikacjeInych', 'Inna', 'Ogloszenie', 'Wydarzenie']),
            'title' => $this->faker->text(50),
            'keywords' => $this->faker->words(4,true),
            'description' => $this->faker->text(120)

        ];
    }
}
