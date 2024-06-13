<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class Modlitwy extends Model
{
    use HasFactory;
    protected $table = 'modlitwy';
    protected $fillable =['nazwa', 'tresc', 'opis', 'widok', 'strona_glowna', 'zdjecie_karuzela', 'zdjecie_karuzela_podpis', 'zdjecie_karuzela_id', 'zrodlo_nazwa', 'zrodlo_link', 'zdjecie1', 'zdjecie2',
        'zdjecie1_podpis', 'zdjecie2_podpis', 'zdjecie1_id', 'zdjecie2_id','title', 'keywords', 'description'];

    public function setNazwaAttribute($value){
        $this->attributes['nazwa']=$value;
        $this->attributes['slug']=Str::slug($value, '-');
    }

    public function zdjecia(): MorphToMany
    {
        return $this->morphToMany(Zdjecia::class, 'powiaz', 'zdjecia_powiazania')->withTimestamps();
    }

    public function watki(): MorphToMany
    {
        return $this->morphToMany(Watki::class, 'powiazWatki', 'watki_powiazania')->withTimestamps();
    }

    public function pliki(): MorphToMany
    {
        return $this->morphToMany(Pliki::class, 'powiazPliki', 'pliki_powiazania')->withTimestamps();
    }
    public function galeria(): MorphToMany
    {
        return $this->morphToMany(Zdjecia::class, 'powiaz', 'zdjecia_powiazania')->wherePivot('rodzaj', 'Galeria');
    }
}
