<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Zdjecia extends Model
{
    use HasFactory;
    protected $table = 'zdjecia';
    protected $fillable =['plik', 'opis', 'kategoria', 'plik_duze', 'autor', 'duze'];

    public function wiadomosc(): MorphToMany
    {
        return $this->morphedByMany(Wiadomosci::class, 'powiaz', 'zdjecia_powiazania')->withPivot('rodzaj')->withTimestamps();
    }


    public function galeria(): MorphToMany
    {
        return $this->morphToMany(Wiadomosci::class, 'powiaz', 'zdjecia_powiazania')->wherePivot('rodzaj', 'Galeria');
    }

}
