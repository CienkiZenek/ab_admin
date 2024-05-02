<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Zdjecia;
use Illuminate\Database\Seeder;
use App\Models\Watki;
use App\Models\Wiadomosci;
use App\Models\Pliki;
use App\Models\Listy;
use App\Models\Intencje;
use App\Models\Filmy;
use App\Models\Strony;
use App\Models\Ksiegarnie;
use App\Models\Biogram;
use App\Models\Modlitwy;
use App\Models\Kalendarium;
use App\Models\Czywiesz;
use App\Models\Zasoby;
use App\Models\Cytat;
use App\Models\Biografia;
use App\Models\Artykuly;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      Watki::factory(8)->create();
      Wiadomosci::factory(8)->create();
      Listy::factory(10)->create();
       Intencje::factory(10)->create();
       Filmy::factory(5)->create();
      /* Strony::factory(15)->create();*/
       Ksiegarnie::factory(12)->create();
       Biogram::factory(12)->create();
        Modlitwy::factory(12)->create();
        Kalendarium::factory(15)->create();
        Czywiesz::factory(15)->create();
        Zasoby::factory(12)->create();
        Cytat::factory(15)->create();
        Artykuly::factory(8)->create();
        Biografia::factory(12)->create();
        Pliki::factory(15)->create();
        Zdjecia::factory(12)->create();

    }
}
